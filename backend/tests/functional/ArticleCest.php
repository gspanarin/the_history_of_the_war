<?php
/*
https://codeception.com/docs/AdvancedUsage
https://stackoverflow.com/questions/52654089/yii2-codeception-functional-tests-click-on-ok-button-of-confirm-dialog
https://stackoverflow.com/questions/56700802/how-to-do-post-request-in-codeception-functionaltest-with-json-body
*/
namespace backend\tests\functional;

use Yii;
use Codeception\Attribute\Skip;
use backend\tests\FunctionalTester;
use backend\tests\Helper\Functional;
use common\models\User;

class ArticleCest{
   
    
    public function Index(FunctionalTester $I){      
        $I->amGoingTo("Перевірити стартову сторінку списку усіх статей");
        $admin = User::findByUsername('admin');
        $I->amLoggedInAs($admin);
        $I->amOnPage('official/article/index/');
        $I->see("Статті");
        $I->makeHtmlSnapshot('ArticleCest.Index');
        $I->see("Додати статтю");
    }
    
    
    public function Create(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість створення нових статей");
        $I->amLoggedInAs(1);
        $I->amOnPage('official/article/create');
        $section = \common\models\Section::find()->where(['>','pid', 0])->one(); 
        $I->selectOption('Article[section_id]', $section->id);
        $I->selectOption('Article[status]', '0');
        $I->fillField('Article[tags_title][]', 'Test.ArticleCreate.Title');
        $I->fillField('Article[tags_description][]', 'Test.ArticleCreate.Description');
        $I->makeHtmlSnapshot('ArticleCest.Create.Befor_submit');
        $I->click('#dynamic-form button[type=submit]');
        $I->makeHtmlSnapshot('ArticleCest.Create.After_submit');
    }
    
    
    public function Delete(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість видалення статей");
        $article = \common\models\Article::find()->one(); 
        $I->amLoggedInAs(1);
        $I->amOnPage('/official/article');
        $I->seeInSource('title="Delete" aria-label="Delete"');
        $I->amOnPage('/official/article/view?id=' . $article->id);
        $Csrf = $I->createAndSetCsrfCookie('vSGGz9eNnXABUWNdZ0S0vW8zJkVfmz6g');
        $I->makeHtmlSnapshot('ArticleCest.Delete.Before_SendPostRequest');
        $I->sendPostRequest('/official/article/delete?id=' . $article->id, [$Csrf[0] => $Csrf[1]]);
        $I->makeHtmlSnapshot('ArticleCest.Delete.After_SendPostRequest');
        $I->see("Стаття із ідентифікатором");
    }


    public function Update(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість оновлення існуючої статті");
        $I->amLoggedInAs(1);
        $article = \common\models\Article::find()->one(); 
        $I->amOnPage('official/article/update?id=' . $article->id);
        $I->see("Статті");
        $I->fillField('Article[tags_source][]', 'http://www.site.ua/news/12');
        $I->click('#dynamic-form button[type=submit]');
        $I->makeHtmlSnapshot('ArticleCest.Update.After_submit');
    }
    
    
    public function View(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість перегляду статті");
        $I->amLoggedInAs(1);
        $article = \common\models\Article::find()->one(); 
        $I->amOnPage('official/article/view?id=' . $article->id);
        $I->see("Розділ/тематика");
    }
    
    
    public function AddFileWithTrueExtension(FunctionalTester $I){
        $I->amGoingTo("Додаємо файл дозволеного типу");
        $section = \common\models\Section::find()->where(['<>','pid', 0])->one(); 
        $I->amGoingTo("Перевірити коректність завантаження файлів");
        $I->amLoggedInAs(1);
        $I->amGoingTo("Пробуємо завантажити файл дозволеного формату");
        $I->amOnPage('/official/article/create');
        $I->selectOption('Article[section_id]', $section->id);
        $I->selectOption('Article[status]', '0');
        $I->fillField('Article[tags_title][]', 'Test.ArticleAddFile.Title');
        $I->fillField('Article[tags_description][]', 'Test.ArticleAddFile.Description');
        $I->attachFile('//*[@id="article-files"]', 'article.pdf');
        $I->click('#dynamic-form button[type=submit]');
        $I->cantSee('При завантаженні файлу виникла проблема');
        $I->makeHtmlSnapshot('ArticleCest.AddFileWithTrueExtension');
    }
    
    
    public function AddFileWithWrongExtension(FunctionalTester $I){
        $I->amGoingTo("Додаємо файл не дозволеного типу");
        $section = \common\models\Section::find()->where(['<>','pid', 0])->one(); 
        $I->amGoingTo("Перевірити коректність завантаження файлів");
        $I->amLoggedInAs(1);
        $I->amGoingTo("Пробуємо завантажити файл НЕ дозволеного формату");
        $I->amOnPage('/official/article/create');
        $I->selectOption('Article[section_id]', $section->id);
        $I->selectOption('Article[status]', '0');
        $I->fillField('Article[tags_title][]', 'Test.ArticleAddFile.Title');
        $I->fillField('Article[tags_description][]', 'Test.ArticleAddFile.Description');
        $I->attachFile('//*[@id="article-files"]', 'presentation.ppt');
        $I->click('#dynamic-form button[type=submit]');
        $I->see('При завантаженні файлу виникла проблема');
        $I->makeHtmlSnapshot('ArticleCest.AddFileWithWrongExtension');
    }
    
    
    public function DownloadFile(FunctionalTester $I){
        $I->amGoingTo("Зкачати файли із запису статті");
        $I->amLoggedInAs(1);
        $article = \common\models\Article::find()->one(); 
        $I->amOnPage('official/article/update?id=' . $article->id);
        $I->click('html/body/div[1]/div[1]/div[2]/div/div[1]/form/div[2]/div[3]/div[1]/table/tbody/tr/td[2]/a');
        $I->makeHtmlSnapshot('ArticleCest.DownloadFile');
    }
}
