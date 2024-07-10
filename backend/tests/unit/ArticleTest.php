<?php

namespace Tests\Unit;

use Yii;
use \Tests\Support\UnitTester;
use common\models\Article;
use backend\controllers\ArticleController;
use yii\web\NotFoundHttpException;

class ArticleTest extends \Codeception\Test\Unit{


    public function testGetPermissionsList(){        
        $permissions_list = ArticleController::permissions_list();
        $all_actions = get_class_methods(Yii::$app->createControllerByID('article'));
        $this->assertIsArray($permissions_list, 'Контролер повернув масив дозволів');
        $this->assertNotEmpty($permissions_list, 'Контрорлер повернув не порожній масив дозволів');
        foreach ($permissions_list as $permission)
            $this->assertContains ($this->uriNameToAction($permission), $all_actions, 'Дозвіл на дію є у переліку екшенів контролеру');

    }
    
    
    public function testCreateArticleWithCorrectData(){
        $model = new Article();
        $post = [
            'Article' => [
                'user_id' => 1,
                'section_id' => 6,
                'status' => 0,
                'source_id' => 1,
                'tags_title' => ['Тестовий запис'],
                'tags_subject' => ['перелік тем документу'],
                'tags_description' => ['Опис документу'],
                'tags_source' => ['http://www.site.ua/'],
                'files' => [],
            ]
        ];
                
        $this->assertTrue($model->load($post), "Виконуємо завантаження даних із форми у об'єкт статті");
        $this->assertTrue($model->save(), 'Виконуємо збереження запису статті у базу');
        $saved_article = Article::find(1)->where(['section_id' => 6])->one();
        $this->assertContains('Тестовий запис', $saved_article, 'Збереження запису виконано успішно');
    }
    
    
    public function testCreateArticleWithNotCorrectData(){
        $model = new Article();
        $post = [
            'Article' => [
                //'user_id' => 1,
                //'section_id' => 6,
                'status' => 0,
                //'source_id' => 1,
                'files' => [],
            ]
        ];
                
        $this->assertTrue($model->load($post), "Перевіряємо завантаження даних із форми у об'єкт");
        $this->assertFalse($model->save(), 'Виконуємо збереження запису статті у базу');
    }

    
    public function testUpdateArticleWithCorrectData(){
        $model = Article::findOne(1);
        $model->section_id = 3;
        $model->status = null;  
        $this->assertTrue($model->save(), 'Save model');
    }
    
    
    public function testGetTagValueWithCorrectData(){
        $model = Article::find()->one();
        $this->assertIsString($model->tag_value('title'), 'Считаємо значення тегу Title');
    }
    
    
    public function testGetTagValueWithNotCorrectData(){
        $model = Article::find()->one();
        $this->assertTrue($model->tag_value('XXXXXX') == '', 'Считаємо значення НЕВІРНОГО тегу XXXXXX');
        $this->assertTrue($model->tag_value('title', 100) == '', 'Считаємо значення вірного тегу title, але невірного номеру 100');
    }
    
    /*public function testViewArticle(){
        
    }
    

    public function testDeleteArticle(){
        
    }
    

    public function testAddFileToArticle(){
        
    }
    

    public function testDeleteFileFromArticle(){
        
    }*/
 
    
    
    
    public function testArticleControllerActionViewWithCorrectData(){
        $article = Article::find()->one();
        //$oArticle = Yii::$app->createControllerByID('article');
        //$oArticle = Yii::$app->createController('official/article/index');
        //$oArticle = Yii::$app->controller;
        //$oArticle = Yii::$app->createControllerByID('article');
        //dd($oArticle->actionView($article->id));
        //dd($oArticle->runAction('view'));
        
        $this->assertStringContainsString($article->title ,Yii::$app->runAction('article/view', ['id' => $article->id]) );
        
    }
    
    
    
    
    
    
    
    
    
    private function uriNameToAction($string){
        $string = str_replace(' ', '', 
            ucwords(str_replace(['-', '_'], 
            ' ', $string))
        );
  
        return 'action' . $string;
    }
    
}
