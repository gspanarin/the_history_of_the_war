<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\models\Article;
use common\models\ArticleSearch;
use common\models\Tag;
use common\models\Section;
use common\models\UploadForm;
use common\models\File;
use yii\web\UploadedFile;
use yii\data\ArrayDataProvider;
use backend\controllers\BaseController;


class ArticleController extends BaseController{

    public static function permissions_list(){
        return array_merge(['delete-file'], parent::permissions_list());
    }
    
    
    
    
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
     * Lists all Article models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param int $id Ідентифікатор статті
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
        $tags = Tag::Find()->all();
        
        foreach ($tags as $tag)
            $fields[$tag->term_name] = [
                'value' => '',
            ];
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'fields' => $fields,
            'tags' => $tags,
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate(){
        $model = new Article();
        $sections_list = Section::getSectionsList();
        $tags = Tag::Find()->all();
        $icon = $model->getIcon(); 
        
        $fields = [];
        foreach ($tags as $tag)
            $fields[$tag->term_name][] = '';
        
        $files = new ArrayDataProvider([
            'allModels' => $model->files,
        ]);
        
        if ($this->request->isPost) {
            
            $fields = $this->request->post();
            foreach($fields['Article'] as $key => $values)
                if (substr($key, 0, 4) == 'tags')
                    foreach ($values as $value)
                        if (trim($value) != '')
                            $metadata[substr($key, 5)][] = $value;

            $model->metadata = json_encode($metadata, JSON_UNESCAPED_UNICODE);
            $model->user_id = Yii::$app->user->getId();
            if ($model->load($this->request->post()) && $model->save()) {
                $uploadForm = new UploadForm();
                $uploadForm->files = UploadedFile::getInstances($model, 'files');            
                if ($uploadForm->upload($model)) {
                    //Обробка ситуації, коли не завантажилися файли
                }
                
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'sections_list' => $sections_list,
            'fields' => $fields,
            'tags' => $tags,
            'files' => $files,
            'icon' => $icon,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Ідентифікатор статті
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);
        $sections_list = Section::getSectionsList();
        $metadata = json_decode($model->metadata);
        $tags = Tag::Find()->all();
        $icon = $model->getIcon(); 
        
        foreach ($tags as $tag)
            if (isset($metadata->{$tag->term_name}))
                foreach ($metadata->{$tag->term_name} as $value)
                    $fields[$tag->term_name][] = $value;
            else 
                $fields[$tag->term_name][] = '';
        
        $files = new ArrayDataProvider([
            'allModels' => $model->files,
        ]);
        
        if ($this->request->isPost){
            $uploadForm = new UploadForm();
            $uploadForm->files = UploadedFile::getInstances($model, 'files');            
            if ($uploadForm->upload($model)) {
                // file is uploaded successfully
                //return;
            }
            $metadata = [];
            $fields = $this->request->post();
            
            foreach($fields['Article'] as $key => $values)
                if (substr($key, 0, 4) == 'tags')
                    foreach ($values as $value)
                        if (trim($value) != '')
                            $metadata[substr($key, 5)][] = $value;

            $model->metadata = json_encode($metadata, JSON_UNESCAPED_UNICODE);
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'sections_list' => $sections_list,
            'fields' => $fields,
            'tags' => $tags,
            'files' => $files,
            'icon' => $icon
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Ідентифікатор статті
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Ідентифікатор статті
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    public function actionDownloadFile($id){
        $file = File::FindOne($id);
        if ($file)
            return \Yii::$app->response->sendFile($file->file_path);
    }
    
    public function actionDeleteFile($article_id, $file_id ){
        $file = File::FindOne($file_id);
        if ($file){
            if (file_exists($file->file_path))
                unlink($file->file_path);
            $file->delete();
            
            return $this->redirect(['update', 'id' => $article_id]);
        }
    }
    
    public function actionCreateIcon($article_id, $file_id ){
        $file = File::FindOne($file_id);
        if ($file){
            $file->createIcon();
            
            return $this->redirect(['update', 'id' => $article_id]);
        }
    }
    
    public function actionDeleteIcon($article_id){
        $model = Article::FindOne($article_id);
        $model->DeleteIcon();
        
        return $this->redirect(['update', 'id' => $article_id]);
    }
    
    
    
    
}
