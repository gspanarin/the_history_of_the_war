<?php
namespace backend\tests\functional;

use Yii;
use Codeception\Attribute\Skip;
use backend\tests\FunctionalTester;
use backend\tests\Helper\Functional;

class SectionCest{
   
    
    public function Index(FunctionalTester $I){      
        $I->amGoingTo("Перевірити стартову сторінку списку розділів");
        $I->amLoggedInAs(1);
        $I->amOnPage('official/section/index/');
        $I->see("Додати розділ");
        $I->makeHtmlSnapshot('SectionCest.Index');
    }
    
    
    public function Create(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість створення нового розділу");
        $I->amLoggedInAs(1);
        $I->amOnPage('official/section/create');
        $I->selectOption('Section[status]', '0');
        $I->fillField('Section[alias]', 'Аліас розділу');
        $I->fillField('Section[title]', 'Назва розділу');
        $section = \common\models\Section::find()->where(['status' => '1'])->offset(5)->one();
        $I->selectOption('Section[pid]', $section->id);
        $I->makeHtmlSnapshot('SectionCest.Create.Befor_submit');
        $I->click('button[type=submit]');
        $I->makeHtmlSnapshot('SectionCest.Create.After_submit');
    }
    
    
    public function Delete(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість видалення розділу");
        $organization = \common\models\Section::find()->one(); 
        $I->amLoggedInAs(1);
        $I->amOnPage('/official/section');
        $I->seeInSource('title="Delete" aria-label="Delete"');
        $I->amOnPage('/official/section/view?id=' . $organization->id);
        $Csrf = $I->createAndSetCsrfCookie('vSGGz9eNnXABUWNdZ0S0vW8zJkVfmz6g');
        $I->makeHtmlSnapshot('SectionCest.Delete.Before_SendPostRequest');
        $I->sendPostRequest('/official/section/delete?id=' . $organization->id, [$Csrf[0] => $Csrf[1]]);
        $I->makeHtmlSnapshot('SectionCest.Delete.After_SendPostRequest');
        $I->see("Розділ із ідентифікатором");
    }


    public function Update(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість оновлення існуючого розділу");
        $I->amLoggedInAs(1);
        $I->amOnPage('official/section/create');
        $I->selectOption('Section[status]', '0');
        $I->fillField('Section[alias]', 'Оновили аліас розділу');
        $I->fillField('Section[title]', 'Оновили назва розділу');
        $section = \common\models\Section::find()->where(['status' => '1'])->offset(10)->one();
        $I->selectOption('Section[pid]', $section->id);
        $I->makeHtmlSnapshot('SectionCest.Update.Befor_submit');
        $I->click('button[type=submit]');
        $I->makeHtmlSnapshot('SectionCest.Update.After_submit');
    }
    
    
    public function View(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість перегляду розділу");
        $I->amLoggedInAs(1);
        $section = \common\models\Section::find()->one(); 
        $I->amOnPage('official/section/view?id=' . $section->id);
        $I->seeInSource('<div class="section-view">');
        $I->seeInSource('<th>Аліас розділу</th>');
        $I->seeInSource('<th>Статус розділу</th>');
    }

}
