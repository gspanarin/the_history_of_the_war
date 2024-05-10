<?php

namespace backend\controllers;

use common\models\Authority;
use common\models\AuthoritySearch;
use common\models\AuthorityType;
use common\models\AuthorityTypeSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorityController implements the CRUD actions for Authority model.
 */
class AuthorityController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
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

    /**
     * Lists all Authority models.
     *
     * @return string
     */
    public function actionIndex(){
        $AuthoritySearchModel = new AuthoritySearch();
        $AuthorityDataProvider = $AuthoritySearchModel->search($this->request->queryParams);

        $AuthorityTypeSearchModel = new AuthorityTypeSearch();
        $AuthorityTypeDataProvider = $AuthorityTypeSearchModel->search($this->request->queryParams);
        
        
        return $this->render('index', [
            'AuthoritySearchModel' => $AuthoritySearchModel,
            'AuthorityDataProvider' => $AuthorityDataProvider,
            'AuthorityTypeSearchModel' => $AuthorityTypeSearchModel,
            'AuthorityTypeDataProvider' => $AuthorityTypeDataProvider,
        ]);
    }

    /**
     * Displays a single Authority model.
     * @param int $id Ідентифікатор авторитетного значення
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Authority model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Authority();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Authority model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Ідентифікатор авторитетного значення
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Authority model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Ідентифікатор авторитетного значення
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Authority model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Ідентифікатор авторитетного значення
     * @return Authority the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Authority::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function actionCreateAuthorityType(){
        $model = new AuthorityType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create-authority-type', [
            'model' => $model,
        ]);
    }
    
    public function actionCreateAuthorityValue(){
        $model = new Authority();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create-authority-value', [
            'model' => $model,
        ]);
    }
}
