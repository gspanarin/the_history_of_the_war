<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\components\statistic\Loger;

/**
 * Description of BaseController
 *
 * @author Panarin
 */
class BaseController extends Controller {

    public function beforeAction($action){
        if (parent::beforeAction($action)) { 
            if (!\Yii::$app->user->can(Yii::$app->controller->id . '_' . $action->id) && !\Yii::$app->user->can(Yii::$app->controller->id . '_*') && $action != 'logout') {
                Yii::$app->session->setFlash('error', "Ваш обліковий запис не має доступу до цього розділу/функціоналу", false);
                return $this->goHome();
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterAction($action, $result){
        $loger = new Loger();
        $loger->setModule(Yii::$app->id)->setController(Yii::$app->controller->id)->setAction($action->id)->setDump('')->setUser(Yii::$app->user->id)->log();
        $result = parent::afterAction($action, $result);
        return $result;
    }
    
    public static function permissions_list(){
        return [
            'create',
            'delete',
            'index',
            'update',
            'view',
        ];
    }
}
