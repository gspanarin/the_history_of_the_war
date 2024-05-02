<?php

namespace common\components\statistic;

use common\models\Loger as LogerModel;

class Loger {
    private $model;
    
    public function __construct() {
        //parent::__construct();
        $this->model = new LogerModel();
    }
    
    public function log(){
        $this->model->save();
    }
    
    public function setModule($module){
        $this->model->module = $module;
        return $this;
    }
    
    
    public function setController($controller){
        $this->model->controller = $controller;
        return $this;
    }
    
    public function setAction($action){
        $this->model->action = $action;
        return $this;
    }
    
    public function setUser($user_id){
        $this->model->user_id = $user_id;
        return $this;
    }
    
    public function setDump($dump){
        $this->model->dump = $dump;
        return $this;
    }
}

