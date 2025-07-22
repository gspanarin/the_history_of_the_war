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

use yii\data\Pagination;

use common\components\helpers\UrlManager;


class ArticleController extends Controller{


    public function actionIndex($section_id = null){
        $filter = [];
        $searchModel = new ArticleSearch();
        $queryParams = $this->request->queryParams;
		$search_params = [];
        $sections = [];
        $sections_ids[] = $section_id;
        if (isset($queryParams['section_id'])){
            $sections = Section::find()->where(['pid' => $section_id])->all();
            foreach ($sections as $section){
                $sections_ids[] = $section->id;
            }
            $search_params['ArticleSearch']['section_array'] = $sections_ids;
            unset($queryParams['section_id']);
        }
        foreach ($queryParams as $key => $value){
            switch ($key) {
                case 'page':
                case 'per-page':
                    $search_params[$key] = $value;
                    break;
                default:
                    $search_params['ArticleSearch'][$key] = $value;
                    break;
            }
        }
        $queryParams = [];
        if (!empty($search_params['ArticleSearch'])){
            foreach ($search_params['ArticleSearch'] as $key => $value){
                if ($key != null && $key != '' && $value != null && $value != ''){
                    if ($key == 'section_array'){
                        $queryParams[] = [
                            'label' => 'Розділ',
                            'term' => 'section_id',
                            'value' => Section::find()->select('title')->where(['id' => $this->request->queryParams['section_id']])->scalar()  ,
                            'delete_url' => UrlManager::Url('/article', ['section_id' => null])
                        ];	
                    }else{
                        $queryParams[] = [
                            'label' => Tag::getTagLabelByName($key),
                            'term' => $key,
                            'value' => $value,
                            'delete_url' => UrlManager::Url('/article', [$key => null])
                        ];	
                    }
                }
            }
        }else{
            $search_params['ArticleSearch'] = [];
        }
		

        //dd($queryParams);
        //if (count($sections_ids) > 0){
        //    $queryParams = array_merge($queryParams, ['ArticleSearch' => ['section_array' => $sections_ids]]);
        //}
        $current_section = Section::findOne(['id' => $section_id]);
        $dataProvider = $searchModel->search($search_params);
        $dataProvider->pagination = new Pagination([
            'totalCount' => $dataProvider->getTotalCount(),
            //'defaultPageSize' => Yii::$app->params['frontend.article.pagination_pagesize']
        ]);
		
        $searchForm = new \frontend\models\ArticleSearchForm();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sections' => $sections,
            'current_section' => $current_section,
            'request_params' => $queryParams,
            'search_form' => $searchForm,
            'filter' => $search_params['ArticleSearch'],
        ]);
    }

	
    public function actionSection($section_id = null){
		
        $searchModel = new ArticleSearch();
        $queryParams = $this->request->queryParams;
		$search_params = [];
        $sections = [];
        $sections_ids[] = $section_id;
        if (isset($queryParams['section_id'])){
            $sections = Section::find()->where(['pid' => $section_id])->all();
			foreach ($sections as $section)
				$sections_ids[] = $section->id;
			$search_params['ArticleSearch']['section_array'] = $sections_ids;
			unset($queryParams['section_id']);
		}
		foreach ($queryParams as $key => $value){
			switch ($key) {
				case 'page':
				case 'per-page':
					$search_params[$key] = $value;
					break;
				default:
					$search_params['ArticleSearch'][$key] = $value;
					break;
			}
			
		}

        //if (count($sections_ids) > 0){
        //    $queryParams = array_merge($queryParams, ['ArticleSearch' => ['section_array' => $sections_ids]]);
		//}
        $current_section = Section::findOne(['id' => $section_id]);
        $dataProvider = $searchModel->search($search_params);
        $dataProvider->pagination = new Pagination([
            'totalCount' => $dataProvider->getTotalCount(),
			//'defaultPageSize' => Yii::$app->params['frontend.article.pagination_pagesize']
			]);
				
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sections' => $sections,
            'current_section' => $current_section,
        ]);
    }
    
    public function actionView($id){
		$model = $this->findModel($id);
		$model->processCountViewPost();
		
        $tags = Tag::Find()->all();
        
        foreach ($tags as $tag){
            $fields[$tag->term_name] = [
                'value' => '',
            ];
		}
        
		//dd($model->JSONLD);
		
        return $this->render('view', [
            'model' => $model,
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
