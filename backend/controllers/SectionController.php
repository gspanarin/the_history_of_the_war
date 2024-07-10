<?php

namespace backend\controllers;

use Yii;
use common\models\Section;
use common\models\SectionSearch;
use yii\filters\VerbFilter;
use backend\controllers\BaseController;

/**
 * SectionController implements the CRUD actions for Section model.
 */
class SectionController extends BaseController{

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
    
    public function actions(){
        return [
            'toggle-update' => [
                'class' => '\dixonstarter\togglecolumn\actions\ToggleAction',
                'modelClass' => Section::className()
            ],
            'sort-update' => [
                'class' =>'\common\components\widgets\gridViewSortButton\actions\SortAction',
                'modelClass' => Section::className()
            ]
        ];
    }
    
    
    /**
     * Lists all Section models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SectionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Section model.
     * @param int $id Ідентифікатор розділу
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
     * Creates a new Section model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Section();
        $sections_list = Section::getSectionsList();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'sections_list' => $sections_list,
        ]);
    }

    /**
     * Updates an existing Section model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Ідентифікатор розділу
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sections_list = Section::getSectionsList();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'sections_list' => $sections_list
        ]);
    }

    /**
     * Deletes an existing Section model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Ідентифікатор розділу
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id){
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Розділ із ідентифікатором ' . $id . ' видалений');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Section model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Ідентифікатор розділу
     * @return Section the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Section::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    public function setSort($id, $move){
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $model = Section::findOne([$id])->find();
            //print_R($model);
            
             //$model = $this->findModel($id);
             //$model->setScenario($this->scenario);
             //$model->setAttribute($this->attribute,$this->setValue($model->{$this->attribute},$model));
             //if($model->save()){
                 return ['success'=>true];
             //}else{
             //    return ['success'=>false];
             //}
        }
    }
}
