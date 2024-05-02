<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\models\Statistic;
use backend\controllers\BaseController;

class StatisticController extends BaseController{

    
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
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

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
    
    
    public static function getDataForChart($data1 = null, $data2 = null){
        $statistics = Statistic::find()
            ->where([
                'controller' => 'article'
            ])
            ->AndWhere([
                'between', 
                'created_at', 
                strtotime('-2 week', strtotime(date('Y-m-d',time()))),
                time() 
            ])->AndWhere([
                'in',
                'action',
                ['create', 'update']
            ])->all();
        
        for($i = 0; $i < 7; $i++)
            $dates[] = [
                date('m-d',strtotime("-$i day", strtotime(date('Y-m-d',time())))),
                date('m-d',strtotime('-' . ($i + 7) .' day', strtotime(date('Y-m-d',time())))),
            ];
        
        //dd($statistics);
        //die();
        
        //[[1, 2], 'February', 'March', 'April', 'May', 'June', 'July'],
        
        return [];
    }
}
