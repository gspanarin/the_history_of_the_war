<?php

namespace common\rbac;

/*
В нем мы также наследуемся от BaseRule
*/ 
class RuleUpdateDelete extends BaseRule
{
    public $name = 'RuleUpdateDelete' ;

    public function execute($user_id, $permission, $params)
    {
       // пропускаем базовые проверки
         $parent= parent::execute($user_id, $permission, $params);
        if($parent===1)return true;
        if($parent==false)return false;

       // пропускаем такие роли как admin и customer
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('customer'))return true;

        if(isset($params['class'])  && method_exists($params['class'], 'can') ){
            // проверка принадлежности пользователя к изменяемому объекту
            if(method_exists($params['class'], 'can'))
            return $params['class']::can($user_id);
            else return false;
        }
        return false;
    }
}