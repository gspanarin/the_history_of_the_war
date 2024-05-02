<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller{
    
    
    public function actionCreateAdmin(){
        $admin = new User();
        $admin->username = 'admin';
        $admin->setPassword('admin');
        $admin->generateAuthKey();
        $admin->email = 'gspanarin@gmail.com';
        $admin->status = 10;
        $admin->save();
    }
    
    public function actionIndex(){
        echo "Hello\n";
        echo "yii rbac/init \n";
    }
    
 
    public function actionInit(){
    // RULES
    // Правила
        Yii::$app->authManager->removeAllRules();
        Yii::$app->authManager->removeAllRoles();
        Yii::$app->authManager->removeAllPermissions();
        Yii::$app->authManager->removeAllAssignments();
        
        
        //общая проверка во всех разрешениях без правил на отсутствие блокирующего разрешения
        $BaseRule = new \common\rbac\BaseRule();
        Yii::$app->authManager->add($BaseRule);

        //только для разрешений
        $RuleUpdateDelete = new \common\rbac\RuleUpdateDelete(); 
        Yii::$app->authManager->add($RuleUpdateDelete);

        // правило только для роли admin
        $RuleForAdmin = new \common\rbac\RuleForAdmin(); 
        Yii::$app->authManager->add($RuleForAdmin);

        // правило только для роли employee
        $RuleForEmployee = new \common\rbac\RuleForEmployee();   
        Yii::$app->authManager->add($RuleForEmployee);

        // правило только для роли user
        $RuleForUser = new \common\rbac\RuleForUser();
        Yii::$app->authManager->add($RuleForUser);

        // правило только для роли guest
        $RuleForGuest = new \common\rbac\RuleForGuest();
        Yii::$app->authManager->add($RuleForGuest);

    // ROLES
    // Ролі 
        //Yii::$app->authManager->removeAllRoles();

        $role_supper_admin = Yii::$app->authManager->createRole('supper_admin');
        $role_supper_admin->description='supper_admin';
        Yii::$app->authManager->add($role_supper_admin);

        $role_admin = Yii::$app->authManager->createRole('admin');
        $role_admin->description='Сотрудник admin';
        $role_admin->ruleName=$RuleForAdmin->name;
        Yii::$app->authManager->add($role_admin);

        $role_employee = Yii::$app->authManager->createRole('employee');
        $role_employee->description='Сотрудник employee';
        $role_employee->ruleName=$RuleForEmployee->name;
        Yii::$app->authManager->add($role_employee);

        $role_user = Yii::$app->authManager->createRole('user');// авторизирован
        $role_user->description='Авторизированный пользователь';
        $role_user->ruleName=$RuleForUser->name;
        Yii::$app->authManager->add($role_user);

        $role_guest = Yii::$app->authManager->createRole('guest');// не авторизирован
        $role_guest->description='Не авторизированный пользователь';
        $role_guest->ruleName=$RuleForGuest->name;
        Yii::$app->authManager->add($role_guest);

        //наследование тольку у суппер админа
        Yii::$app->authManager->addChild($role_supper_admin, $role_admin);
        Yii::$app->authManager->addChild($role_supper_admin, $role_employee);
        Yii::$app->authManager->addChild($role_supper_admin, $role_user);
        Yii::$app->authManager->addChild($role_supper_admin, $role_guest);    
        
        
        
        
        // Создаем разрешение на доступ к странице управления пользователями.
        $permissionManageArticle = Yii::$app->authManager->createPermission('article_index');
        // Добавляем своё описание к разрешению, чтобы не забыть для чего мы его создавали.
        $permissionManageArticle->description = 'Доступ к странице управления статьями.';
        // Добавляем разрешение в систему через RBAC менеджер.
        Yii::$app->authManager->add($permissionManageArticle);
        // Ищем роль модератора.
        $roleAdmin = Yii::$app->authManager->getRole('supper_admin');
        // Добавляем (наследуем) разрешение для роли модератора.
        Yii::$app->authManager->addChild($roleAdmin, $permissionManageArticle);
        
        
        
        
        
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('supper_admin');
        $auth->assign($adminRole, 1);
        
        $adminEmployee = $auth->getRole('employee');
        $auth->assign($adminEmployee, 2);
    }
    
}
