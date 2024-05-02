<?php
namespace common\components\widgets\gridViewSortButton\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use yii\web\MethodNotAllowedHttpException;

class sortAction extends Action{
    public $modelClass;
    
    public function run($id, $move){
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $model = $this->findModel($id);
            if ($move == 'up'){
                $secondModel = $this->findModelByAttr(['pid' => $model->pid, 'sort' => $model->sort - 1]);
            }else{
                $secondModel = $this->findModelByAttr(['pid' => $model->pid, 'sort' => $model->sort + 1]);
            }

            $tmp_sort = $model->sort;
            $model->sort = $secondModel->sort;
            $secondModel->sort = $tmp_sort;

            if($model->save() && $secondModel->save()){
                return ['success' => true];
            }else{
                return ['success' => false];
            }
        }
    }
    
    
    
    protected function findModel($id){
        $class = $this->modelClass;
        if ($id !== null && ($model = $class::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    protected function findModelByAttr($attr = []){
        $class = $this->modelClass;
        if (($model = $class::find()->where($attr)->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
