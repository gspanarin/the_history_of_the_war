<?php

namespace backend\controllers;

use common\models\PartnershipProject;
use common\models\PartnershipProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PartnershipProjectController implements the CRUD actions for PartnershipProject model.
 */
class PartnershipProjectController extends Controller
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
     * Lists all PartnershipProject models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PartnershipProjectSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PartnershipProject model.
     * @param int $id ID
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
     * Creates a new PartnershipProject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate(){
        $model = new PartnershipProject();

        if ($this->request->isPost && $model->load($this->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if (!is_null($model->imageFile)){
				if (!$model->upload()) {
					throw new NotFoundHttpException('Невдалось завантажити файл');
				}
			}
			$model->imageFile = null;
            if ( $model->save()) {
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
     * Updates an existing PartnershipProject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if (!is_null($model->imageFile)){
				if (!$model->upload()) {
					throw new NotFoundHttpException('Невдалось завантажити файл');
				}
			}
			$model->imageFile = null;
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PartnershipProject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id){
        $this->findModel($id)->delete();
		if (fileExists($this->icon)){
			unlink($this->icon);
		}
		
        return $this->redirect(['index']);
    }

    /**
     * Finds the PartnershipProject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PartnershipProject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PartnershipProject::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	

	/**
	 * Функція виконує зміну статусу на протилежний. Використовується у відображенні списку Партнерськихз програм для зміни статусу без необхіодності входу у редагування запису
	 * @param type $id 
	 * @return type
	 */
	public function actionChangeStatus($id){
		$model = $this->findModel($id);
		if ($model->status == 1){
			$model->status = 0;
		} else {
			$model->status = 1;
		}
		$model->save();
		
		return $this->redirect(['index']);
	}
}
