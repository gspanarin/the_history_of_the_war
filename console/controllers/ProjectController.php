<?php

namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\helpers\Inflector;
use common\models\User;

/*use backend\controllers\ArticleController;
use backend\controllers\UserController;
use backend\controllers\OrganizationController;
use backend\controllers\SectionController;*/

//yii project/init

class ProjectController extends Controller{
    
    
    public function actionInit(){
        $this->createAdmin();
        $this->CreateRBACData();
        
        
    }
    
    
    private function CreateAdmin(){
        echo "=====================================\r\n";
        echo "=== Create 'admin' user ===";
        echo "=====================================\r\n";
        $admin = new User();
        $admin->username = 'admin';
        $admin->setPassword('admin');
        $admin->generateAuthKey();
        $admin->email = 'gspanarin@gmail.com';
        $admin->status = 10;
        $admin->save();
        
        
        echo "=====================================\r\n";
        echo "=== Create 'employee' user ===";
        echo "=====================================\r\n";
        $admin = new User();
        $admin->username = 'employee';
        $admin->setPassword('employee');
        $admin->generateAuthKey();
        $admin->email = 'employee@gmail.com';
        $admin->status = 10;
        $admin->save();
        
        
        echo "=====================================\r\n";
        echo "=== Create 'user' user ===";
        echo "=====================================\r\n";
        $admin = new User();
        $admin->username = 'user';
        $admin->setPassword('user');
        $admin->generateAuthKey();
        $admin->email = 'user@gmail.com';
        $admin->status = 10;
        $admin->save();
        
    }
    
    public function actionIndex(){
        echo "Hello\n";
    }
    
    
    private function CreateRBACData(){
        echo "=====================================\r\n";
        echo "=== RBAC ===";
        echo "=====================================\r\n";
        echo "Clear RBAC tables\r\n";
        Yii::$app->authManager->removeAllRules();
        Yii::$app->authManager->removeAllRoles();
        Yii::$app->authManager->removeAllPermissions();
        Yii::$app->authManager->removeAllAssignments();
        
        echo "Create roles\r\n";
        
        //supper_admin
        $role_supper_admin = Yii::$app->authManager->createRole('supper_admin');
        $role_supper_admin->description ='Супер адмін';
        Yii::$app->authManager->add($role_supper_admin);
        
        //admin
        $role_admin = Yii::$app->authManager->createRole('admin');
        $role_admin->description ='Адміністратор/модератор';
        Yii::$app->authManager->add($role_admin);
        
        //employee
        $role_employee = Yii::$app->authManager->createRole('employee');
        $role_employee->description ='Бібліотека-учасник';
        Yii::$app->authManager->add($role_employee);
        
        //user
        $role_user = Yii::$app->authManager->createRole('user');
        $role_user->description ='Авторизований користувач';
        Yii::$app->authManager->add($role_user);
        
        //guest
        $role_guest = Yii::$app->authManager->createRole('guest');
        $role_guest->description ='Неавторизований користувач';
        Yii::$app->authManager->add($role_guest);
        
        echo "Create rules\r\n";
        
        echo "Create permissions\r\n";
        echo "\r\n";
        // Створюємо дозвл на доступ до КРУД Статтями.
        $permissionManageArticle = Yii::$app->authManager->createPermission('article_*');
        $permissionManageArticle->description = 'Керування Статтями';
        Yii::$app->authManager->add($permissionManageArticle);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManageArticle);
        
        
        // Створюємо дозвл на доступ до КРУД Організаціями
        $permissionManageOrganization = Yii::$app->authManager->createPermission('organization_*');
        $permissionManageOrganization->description = 'Керування Організаціями';
        Yii::$app->authManager->add($permissionManageOrganization);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManageOrganization);
       
        // Створюємо дозвл на доступ до КРУД Сторінками/Інструкціями
        $permissionManagePage = Yii::$app->authManager->createPermission('page_*');
        $permissionManagePage->description = 'Керування Сторінками/Інструкціями';
        Yii::$app->authManager->add($permissionManagePage);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManagePage);
        
        // Створюємо дозвл на доступ до КРУД Розділами/Підрозідлами
        $permissionManageSection = Yii::$app->authManager->createPermission('section_*');
        $permissionManageSection->description = 'Керування Розділами/Підрозідлами';
        Yii::$app->authManager->add($permissionManageSection);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManageSection);
        
        // Створюємо дозвл на доступ до КРУД Полями опису статей
        $permissionManageTag = Yii::$app->authManager->createPermission('tag_*');
        $permissionManageTag->description = 'Керування Полями опису статей';
        Yii::$app->authManager->add($permissionManageTag);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManageTag);
        
        // Створюємо дозвл на доступ до КРУД Користувачами
        $permissionManageUser = Yii::$app->authManager->createPermission('user_*');
        $permissionManageUser->description = 'Керування Користувачами';
        Yii::$app->authManager->add($permissionManageUser);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManageUser);
        
        // Створюємо дозвл на доступ до КРУД RBAC
        $permissionManageRbac = Yii::$app->authManager->createPermission('rbac_*');
        $permissionManageRbac->description = 'Керування RBAC';
        Yii::$app->authManager->add($permissionManageRbac);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionManageRbac);
        
        // Створюємо дозвл на доступ до КРУД RBAC
        $permissionDevelop = Yii::$app->authManager->createPermission('develop');
        $permissionDevelop->description = 'Розширення та проектування системи';
        Yii::$app->authManager->add($permissionManageRbac);
        Yii::$app->authManager->addChild($role_supper_admin, $permissionDevelop);
        
        
        
        echo "Set role for users 'admin', 'employee', 'user'\r\n";
        $auth = Yii::$app->authManager;
        $auth->assign($role_supper_admin, 1);
        
        $auth = Yii::$app->authManager;
        $auth->assign($role_employee, 2);
        
        $auth = Yii::$app->authManager;
        $auth->assign($role_user, 3);
    }
    
    
    
    public function actionAllControllerActions(){
        $controllers = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@backend/controllers'), ['recursive' => true]);
        $actions = [];
        foreach ($controllers as $controller) {
            $contents = file_get_contents($controller);
            $controllerId = Inflector::camel2id(substr(basename($controller), 0, -14));
            preg_match_all('/public function action(\w+?)\(/', $contents, $result);
            foreach ($result[1] as $action) {
                $actionId = Inflector::camel2id($action);
                $route = $controllerId . '/' . $actionId;
                $actions[$route] = $route;
            }
        }
        asort($actions);
        
        print_r($actions);
        
        //return $actions;
    }
    
    
}
