<?php

namespace common\rbac;

use Yii;
/*
    Проверка на роль supper_admin и запрещающее разрешение,
    это требуется у всех ролей 
*/
class BaseRule  extends \yii\rbac\Rule{
    
    public $name ='BaseRule';
    
    public function execute($user_id, $permission, $params){
        
     
        
        if(Yii::$app->user->can('supper_admin') )
            return 1;
        // при налии блокирующего разрешения у пользователя
        if(Yii::$app->user->can($permission->name.'_not') )
            return false; 
        //Даже у роли admin и manager может быть блокирующее разрешение
        
        return true;
    }
}