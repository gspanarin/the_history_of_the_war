<?php

namespace common\rbac;

//Правило для конкретной роли (присутствует у каждой роли кроме supper_admin)
//срабатывает при проверке на причастность к роли   ...->can('user')
// к примеру user
/*
   Обычная проверка на причастность к самой роли и базовая проверка от BaseRule
*/
class RuleForUser extends BaseRule{
    public $name='RuleForUser' ;

    public function execute($user_id, $role, $params){
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