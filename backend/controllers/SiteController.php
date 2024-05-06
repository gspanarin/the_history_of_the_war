<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\components\statistic\Loger;
//use common\models\Statistic;
use backend\controllers\StatisticController;
use common\models\Article;
/**
 * Site controller
 */
class SiteController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    
    public function afterAction($action, $result){
        $loger = new Loger();
        $loger->setModule(Yii::$app->id)->setController(Yii::$app->controller->id)->setAction($action->id)->setDump('')->setUser(Yii::$app->user->id)->log();
        $result = parent::afterAction($action, $result);
        return $result;
    }
    
    /**
     * {@inheritdoc}
     */
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'error-page',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(){
        $chartData = $this->getDataForChart(); 

        $oStatistic = StatisticController::getDataForChart();
        
        return $this->render('index', [
            'chartData' => $chartData
        ]);
    }

    
    private function getDataForChart(){
        /*
        SELECT
                from_unixtime(created_at, '%Y-%m-%d') as year_and_month, 
           count(id) as c_article
        FROM article
        WHERE 
                created_at BETWEEN UNIX_TIMESTAMP('2024-04-01') AND UNIX_TIMESTAMP('2024-04-29')
        GROUP BY year_and_month         
        */        
        
        $data = [];
        $date_from = strtotime("-1 week");
        $date_to = strtotime("now");
        //$date_from = strtotime("-2 week");
        //$date_to = strtotime("-1 week");
   
        $articles = Article::find()
        ->select([
            'from_unixtime(created_at, "%Y-%m-%d") as date',
            'count(id) as c_article'
        ])
        ->where(['between', 'created_at', $date_from, $date_to ])
        ->groupBy('date') // group the result to ensure aggregation function works
        ->asArray()->all();
        
        $date_count = [];
        foreach ($articles as $item)
            $date_count[$item['date']] = $item['c_article']; 
        
        for($i = 0; $i < 7; $i++){
            $current_date = date('Y-m-d', strtotime(" +$i day", $date_from));
            $labels[] = "'$current_date'";
            $data[] = (isset($date_count[$current_date]) ? $date_count[$current_date] : 0);
        }
        
        //=========================================================================
        $lng = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['tag_id' => 15])
                ->groupBy('value') 
                ->asArray()->all();
        
        $type = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['tag_id' => 4])
                ->groupBy('value') 
                ->asArray()->all();
        
        $source = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['tag_id' => 5])
                ->groupBy('value') 
                ->asArray()->all();
        
        $format = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['tag_id' => 13])
                ->groupBy('value') 
                ->asArray()->all();
        
        $creators = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['tag_id' => 8])
                ->groupBy('value') 
                ->asArray()->all();

        return [
            'labels_str' => implode(',', $labels),
            'value_str' => implode(',', $data),
            'tags' => [
                    'lng' => $lng,
                    'type' => $type,
                    'source' => $source,
                    'format' => $format,
                    'creators' => $creators
                ]
        ];
    }
    
    
    
    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';
//dump($this);
//die();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
