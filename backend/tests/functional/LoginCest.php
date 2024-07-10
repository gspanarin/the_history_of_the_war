<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class LoginCest{
    
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    /*public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }*/
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I){
        
        $I->amGoingTo("Check login on backend"); 
        
        $I->amOnPage('official/site/login');
        $I->see("Sign In");
        
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin');
        
        $I->click('button[type=submit]');

        $I->see("Dashboard");
        
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
}
