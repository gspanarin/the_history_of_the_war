<?php

namespace common\rbac;

use Yii;

class RuleForEmployee extends BaseRule {
    
    public $name='RuleForEmployee' ;

    public function execute($user_id, $role, $params){
        //echo "RuleForEmployee\r\n";
        //dump([$user_id, $role, $params]);
        //die();
        
        
        $parent = parent::execute($user_id, $role, $params);
        if($parent===1) 
            return true;
        if($parent==false)
            return false;
        if(isset(Yii::$app->authManager->getRolesByUser($user_id)[$role->name]))
            return true;
        
        return  false;
    }
}
