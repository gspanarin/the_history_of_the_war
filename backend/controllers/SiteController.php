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
use backend\controllers\BaseController;

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
        
		$popular_articles = Article::find()
				->where(['>', 'view', 0])
				->orderBy('view DESC')
				->limit(20)
				->all();
		
        //=========================================================================
        //          Статистика створення записів за останній тиждень
        //=========================================================================
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
        $date_from = strtotime("-2 week");
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
        
        for($i = 0; $i < 15; $i++){
            $current_date = date('Y-m-d', strtotime(" +$i day", $date_from));
            $labels[] = "'$current_date'";
            $data[] = (isset($date_count[$current_date]) ? $date_count[$current_date] : 0);
        }
        
        //=========================================================================
        //          Статистика використання полів/тегів
        //=========================================================================
        $lng = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'language'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                ->asArray()->all();
        
        $type = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'type'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                ->asArray()->all();
        
        /*$source = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'source'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                ->limit(20)
                ->asArray()->all();*/
        
        $source = \common\models\Source::find()
                ->select([
                    'source.title as value',
                    'count(article.id) as count'])
                ->joinwith('article')
                ->where('source.id = article.source_id')
                ->orderBy('count DESC')
                ->groupBy('value') 
                ->limit(20)
                ->asArray()->all();
        
        
        $format = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'format'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                ->asArray()->all();
        
        $creators = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'creator'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                //->limit(20)
                ->asArray()->all();

		$organization = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'provenance'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                //->limit(20)
                ->asArray()->all();
		
		$administrative_unit = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'subject_PlaceName'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                //->limit(20)
                ->asArray()->all();
		
		$geo = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'subject_spatial'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                //->limit(20)
                ->asArray()->all();
		
		$military_unit = \common\models\Dictionary::find()
                ->select([
                    'value',
                    'count(id) as count'])
                ->where(['term_name' => 'subject_military_unit'])
                ->orderBy('count DESC')
                ->groupBy('value') 
                //->limit(20)
                ->asArray()->all();
		
        //=========================================================================
        //          Статистика створення записів за операторами
        //=========================================================================
        
        $users = \common\models\Article::find()
                ->select([
                    'user.username as username',
                    'user.full_name as full_name',
                    'count(article.id) as count'])
                ->groupBy('user_id') 
                ->leftJoin('user', '`user`.`id` = `article`.`user_id`')
                ->orderBy('count DESC')
                //->limit(20)
                ->asArray()->all();
        
        return [
            'labels_str' => implode(',', $labels),
            'value_str' => implode(',', $data),
            'tags' => [
                    'lng' => $lng,
                    'type' => $type,
                    'source' => $source,
                    'format' => $format,
                    'creators' => $creators,
					'organization' => $organization,
					'administrative_unit' => $administrative_unit,
					'geo' => $geo,
					'military_unit' => $military_unit,
					
					
                ],
			'popular_articles' => $popular_articles,
            'users' => $users,
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (!\Yii::$app->user->can('backend')) {
                \Yii::$app->user->logout(true);
                \Yii::$app->session->setFlash('error', "Ваш обліковий запис не має доступу до цього розділу/функціоналу", false);
                //return parent::redirect(Yii::$app->params['frontend_url']);
                return parent::redirect('login');
            }
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
