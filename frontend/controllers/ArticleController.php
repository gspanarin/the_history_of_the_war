<?php

namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\models\Article;
use common\models\ArticleSearch;
use common\models\Section;

use yii\data\ArrayDataProvider;
use yii\web\Controller;
use common\models\Tag;
use common\models\File;


class ArticleController extends Controller{


    public function actionIndex($section_id = null){
        $searchModel = new ArticleSearch();
        $queryParams = $this->request->queryParams;
        $sections = [];
        $sections_ids[] = $section_id;
        if ($section_id){
            $sections = Section::find()->where(['pid' => $section_id])->all();
            foreach ($sections as $section)
                $sections_ids[] = $section->id;
        }
        
        if (count($sections_ids) > 0)
            $queryParams = array_merge($queryParams, ['ArticleSearch' => ['section_array' => $sections_ids]]);
        $current_section = Section::findOne(['id' => $section_id]);
        $dataProvider = $searchModel->search($section_id ? $queryParams : null);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sections' => $sections,
            'current_section' => $current_section
        ]);
    }

    
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
    
}
