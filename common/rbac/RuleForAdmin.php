<?php

namespace common\rbac;

class RuleForAdmin extends BaseRule {
    public $name='RuleForAdmin' ;

    public function execute($user_id, $role, $params){
        
        return true;
        dump([$user_id, $role, $params]);
        die();
        
        $parent = parent::execute($user_id, $role, $params);
        if($parent === 1) 
            return true;
        if($parent == false)
            return false;
        if(isset(Yii::$app->authManager->getRolesByUser($user_id)[$role->name]))
            return true;
        
        return  false;
    }
}
