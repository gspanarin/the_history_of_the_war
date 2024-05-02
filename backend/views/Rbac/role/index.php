<?php

use common\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\rbac\Role;
use common\widgets\Alert;


/** @var yii\web\View $this */
/** @var common\models\PageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Керування ролями';
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Ролі', 'url' => ['role-index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="page-index">
    

    <p>
        <?= Html::a('Додати роль', ['role-create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description',
            'rule_name',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '<div class="pull-right" >{update}{delete}</div>',
                'buttons' => [
                    'update' => function($url, $model, $key){
                        return Html::a('Update', ['role-update', 'id' => $model->name], ['class' => 'btn btn-primary']);
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('Delete', ['role-delete', 'id' => $model->name], ['class' => 'btn btn-primary', 'data-confirm' => "Are you sure you want to delete this item?", 'data-method' => "post"]);                        
                    } 
                ]
            ]
        ],
    ]); ?>


</div>
