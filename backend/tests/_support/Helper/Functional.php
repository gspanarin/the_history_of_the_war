<?php

namespace backend\tests\_support\Helper;

class Functional extends \Codeception\Module{
    
    public function sendPostRequest($uri, $parameters, $files = [], $server = [], $content = null)  {
        return $this->getModule('Yii2')->_request('POST', $uri, $parameters, $files, $server, $content);
    } 
    
}