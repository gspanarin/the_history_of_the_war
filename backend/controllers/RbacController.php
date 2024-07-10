<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\rbac\Role;
use common\models\rbac\RoleSearch;
use common\models\rbac\Permission;
use common\models\rbac\PermissionSearch;
use yii\data\ArrayDataProvider;
use backend\controllers\BaseController;

class RbacController extends BaseController{

    private $not_deleted_role = ['admin', 'supper_admin'];
    
    

    
    public function behaviors(){
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    
    public function actionIndex() {
        return $this->render('index');
    }

    
    
    
    
    
    
    public function actionRoleIndex() {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('role/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionRoleCreate(){
        $model = new Role();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $new_role = Yii::$app->authManager->createRole($model->name);
            $new_role->description = $model->description;
            //$role_admin->ruleName = $RuleForAdmin->name;
            Yii::$app->authManager->add($new_role);
            return $this->redirect(['rbac/role-view', 'id' => $model->name]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('role/create', [
            'model' => $model,
        ]);
    }

    
    public function actionRoleUpdate($id){
        $model = $this->findModelByAttr('Role', 'name', $id);
        
        $permissions = [];
        $all_permissions = Yii::$app->authManager->getPermissions();
        $role_permissions = Yii::$app->authManager->getPermissionsByRole($id);
        foreach ($all_permissions as $item){
            $permissions[] = [
                'item' => $item,
                'value' => in_array($item, $role_permissions) ? true : false,
            ];
        }
        
        if ($this->request->isPost && $model->load($this->request->post())) {
            if (in_array($id, $this->not_deleted_role)){
                Yii::$app->session->setFlash('error', "Роль $id не доступна для корегування");
                return $this->redirect(['rbac/role-index']);
            }else{
                
                $current_role = Yii::$app->authManager->getRole($model->name);
                $current_role->description = $model->description;  
            }
            return $this->redirect(['rbac/role-view', 'id' => $model->name]);
        }

        return $this->render('role/update', [
            'model' => $model,
            'permissions' => $permissions,
        ]);
    }

    
    public function actionRoleView($id){
        return $this->render('role/view', [
            'model' => $this->findModelByAttr('Role', 'name', $id),
        ]);
    }
    

    public function actionRoleDelete($id){
        if (in_array($id, $this->not_deleted_role)){
            Yii::$app->session->setFlash('error', "Роль $id не доступна для видалення");
        } else {
            $this->findModelByAttr('Role', 'name', $id)->delete();
        }
        
        return $this->redirect(['rbac/role-index']);
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    public function actionPermissionIndex() {
        $searchModel = new PermissionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('permission/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionPermissionCreate(){
        $model = new Permission();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $new_permission = Yii::$app->authManager->createPermission($model->name);
            // Добавляем своё описание к разрешению, чтобы не забыть для чего мы его создавали.
            $new_permission->description = $model->description;
            // Добавляем разрешение в систему через RBAC менеджер.
            Yii::$app->authManager->add($new_permission);
            //return $this->redirect(['rbac/permission-view', 'id' => $model->name]);
            return $this->redirect(['rbac/permission-index']);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('permission/create', [
            'model' => $model,
        ]);
    }

    
    public function actionPermissionUpdate($id){
        $model = $this->findModelByAttr('Permission', 'name', $id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->save();    
            return $this->redirect(['rbac/role-view', 'id' => $model->name]);
        }

        return $this->render('permission/update', [
            'model' => $model,
        ]);
    }

    
    public function actionPermissionView($id){
        return $this->render('permission/view', [
            'model' => $this->findModelByAttr('Permission', 'name', $id),
        ]);
    }
    

    public function actionPermissionDelete($id){
        $this->findModelByAttr('Permission', 'name', $id)->delete();
        return $this->redirect(['rbac/role-index']);
    }
    
    public function actionPermissionToggle($id, $permission, $status){
        if ($status == 'off'){
            $current_role = Yii::$app->authManager->getRole($id);
            $current_permission = Yii::$app->authManager->getPermission($permission);
            Yii::$app->authManager->addChild($current_role, $current_permission);    
        }else{
            $current_role = Yii::$app->authManager->getRole($id);
            $current_permission = Yii::$app->authManager->getPermission($permission);
            Yii::$app->authManager->removeChild($current_role, $current_permission);    
        }
        
        return $this->redirect(['rbac/role-update', 'id' => $id]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    protected function findModelByAttr($class, $attr, $value){
        //if (($model = $class::findOne([$attr => $value])) !== null) {
        if (($model = call_user_func("\\common\\models\\rbac\\$class::findOne",$value)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findModel($id){
        if (($model = Role::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}
