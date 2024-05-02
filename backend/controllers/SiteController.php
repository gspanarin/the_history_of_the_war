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
        

        $oStatistic = StatisticController::getDataForChart();
        
        return $this->render('index');
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
