<?php

namespace backend\controllers;

use common\models\AuthorityValue;
use common\models\AuthorityValueSearch;
use common\models\AuthorityType;
use common\models\AuthorityTypeSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorityController implements the CRUD actions for Authority model.
 */
class AuthorityController extends Controller{

    
    public function behaviors(){
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    public function actionIndex(){
        return $this->render('index');
    }

    
    //===============================================================
    //===============================================================
    //===============================================================
    
    
    public function actionTypeIndex(){
        $AuthorityTypeSearchModel = new AuthorityTypeSearch();
        $AuthorityTypeDataProvider = $AuthorityTypeSearchModel->search($this->request->queryParams);
        
        return $this->render('type/index', [
            'AuthorityTypeSearchModel' => $AuthorityTypeSearchModel,
            'AuthorityTypeDataProvider' => $AuthorityTypeDataProvider,
        ]);
    }
    

    public function actionCreateAuthorityType(){
        $model = new AuthorityType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect('type-index');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('type/create', [
            'model' => $model,
        ]);
    }
    
    
    public function actionUpdateType($id){
        $model = AuthorityType::findOne($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['type-index']);
        }

        return $this->render('type/update', [
            'model' => $model,
        ]);
    }
    
    
    public function actionDeleteType($id){
        $model = AuthorityType::findOne($id);
        $model->delete();
                
        return $this->redirect(['type-index']);
    }
    
    
    //===============================================================
    //===============================================================
    //===============================================================
    
    
    public function actionValueIndex(){
        $AuthorityValueSearchModel = new AuthorityValueSearch();
        $AuthorityValueDataProvider = $AuthorityValueSearchModel->search($this->request->queryParams);

        
        return $this->render('value/index', [
            'AuthorityValueSearchModel' => $AuthorityValueSearchModel,
            'AuthorityValueDataProvider' => $AuthorityValueDataProvider,

        ]);
    }
    
    
    public function actionCreateAuthorityValue(){
        $model = new AuthorityValue();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect('value-index');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('value/create', [
            'model' => $model,
        ]);
    }
    
    
    public function actionUpdateValue($id){
        $model = AuthorityValue::findOne($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['value-index']);
        }

        return $this->render('value/update', [
            'model' => $model,
        ]);
    }
    
    
    public function actionDeleteValue($id){
        $model = AuthorityValue::findOne($id);
        $model->delete();
                
        return $this->redirect(['value-index']);
    }
}
