<?php

namespace backend\tests;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */

use Tests\Support\Helper\Functional;

class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;
   /**
    * Define custom actions here
    */
    
    public function sendPostRequest($uri, $parameters, $files = [], $server = [], $content = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('sendPostRequest', func_get_args()));
    }

    
    public function test($text = '5555'){
        return $this->getScenario()->runStep(new \Codeception\Step\Action('dd', func_get_args()));
        
    }
}
