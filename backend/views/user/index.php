<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Organization;
/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Користувачі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'full_name',
            [
                'attribute' => 'organization_id',
                'filter' => Organization::getList(),
                'label' => 'Organization',
                'value' => function($model){
                    return $model->getOrganizationTitle();
                }
            ],
            [
				'label' => 'На сайті',
				'format' => 'raw',
				'value' => function($model){
					return $model->session ? '<span class="bg-success">on-line</span>' : '<span class="bg-secondary">off-line</span>';
				}
			],
			[
                'attribute' => 'status',
                'filter' => User::getStatusList(),
                'value' => function ($model) {
                    return $model->getStatusTitle();
                }
            ],
            [
                'attribute' => 'roles',
                'label' => 'Ролі',
                'format' => 'raw',
                'filter' => \common\models\rbac\Role::getRolesList(),
                //'filter' => User::getUsersList(),
                'value' => function($model){

                    $result = '';
                    foreach (\Yii::$app->authManager->getRolesByUser($model->id) as $role_name => $link)
                        $result .= $role_name . '<br>';
                    return $result;
                }
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
