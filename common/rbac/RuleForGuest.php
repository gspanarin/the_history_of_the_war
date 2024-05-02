<?php

namespace common\rbac;

class RuleForGuest extends BaseRule {
    public $name='RuleForGuest' ;

    public function execute($user_id, $role, $params)
    {
        $parent= parent::execute($user_id, $role, $params);
        if($parent===1)return true;
        if($parent==false)return false;

        if(isset(Yii::$app->authManager->getRolesByUser($user_id)[$role->name]))return true;
        return  false;
    }
}
