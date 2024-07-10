<?php
namespace backend\tests\functional;

use Yii;
use Codeception\Attribute\Skip;
use backend\tests\FunctionalTester;
use backend\tests\Helper\Functional;

class OrganizationCest{
   
    
    public function Index(FunctionalTester $I){      
        $I->amGoingTo("Перевірити стартову сторінку списку організацій");
        $I->amLoggedInAs(1);
        $I->amOnPage('official/organization/index/');
        $I->see("Додати нову організацію");
        $I->makeHtmlSnapshot('OrganizationCest.Index');
    }
    
    
    public function Create(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість створення нової організації");
        $I->amLoggedInAs(1);
        $I->amOnPage('official/organization/create');
        $I->selectOption('Organization[status]', '0');
        $I->fillField('Organization[name]', 'Тестова організація');
        $I->fillField('Organization[short_name]', 'Коротка назва організації');
        $I->fillField('Organization[url]', 'URL на сторінку організації');
        $I->makeHtmlSnapshot('OrganizationCest.Create.Befor_submit');
        $I->click('button[type=submit]');
        $I->makeHtmlSnapshot('OrganizationCest.Create.After_submit');
    }
    
    
    public function Delete(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість видалення організації");
        $organization = \common\models\Organization::find()->one(); 
        $I->amLoggedInAs(1);
        $I->amOnPage('/official/organization');
        $I->seeInSource('title="Delete" aria-label="Delete"');
        $I->amOnPage('/official/organization/view?id=' . $organization->id);
        $Csrf = $I->createAndSetCsrfCookie('vSGGz9eNnXABUWNdZ0S0vW8zJkVfmz6g');
        $I->makeHtmlSnapshot('OrganizationCest.Delete.Before_SendPostRequest');
        $I->sendPostRequest('/official/organization/delete?id=' . $organization->id, [$Csrf[0] => $Csrf[1]]);
        $I->makeHtmlSnapshot('OrganizationCest.Delete.After_SendPostRequest');
        $I->see("Організація із ідентифікатором");
    }


    public function Update(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість оновлення існуючої організації");
        $I->amLoggedInAs(1);
        $organization = \common\models\Organization::find()->one(); 
        $I->amOnPage('official/organization/update?id=' . $organization->id);
        $I->seeInSource('action="/official/organization/update?id=' . $organization->id . '"');
        $I->fillField('Organization[name]', 'Харківська державна бібліотека ім В.Г.Короленко');
        $I->fillField('Organization[short_name]', 'ХДНБ');
        $I->fillField('Organization[url]', 'http://warhistory/mainorganization');
        $I->click('button[type=submit]');
        $I->makeHtmlSnapshot('OrganizationCest.Update.After_submit');
    }
    
    
    public function View(FunctionalTester $I){
        $I->amGoingTo("Перевірити можливість перегляду організації");
        $I->amLoggedInAs(1);
        $organization = \common\models\Organization::find()->one(); 
        $I->amOnPage('official/organization/view?id=' . $organization->id);
        $I->seeInSource('<div class="organization-view">');
        $I->seeInSource('<tr><th>Повна назва</th><td>');
        $I->seeInSource('<tr><th>Скорочена назва</th><td>');
    }

}
