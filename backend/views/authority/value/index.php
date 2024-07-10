<?php

use common\models\AuthorityValue;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AuthoritySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Авторитетні значення';

$this->params['breadcrumbs'][] = ['label' => 'Авторитетні джерела', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'Типи джерел', 'url' => ['type-index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="authority-index">

    <p>
        <?= Html::a('Створити нове авторитетне значення', ['create-authority-value'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $AuthorityValueDataProvider,
        'filterModel' => $AuthorityValueSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'authority_type_id',
                'value' => function($value){
                    return $value->authorityType->name;
                }
            ],
            'value',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update-value} {delete-value}',
                'buttons'=> [
                    'update-value' => function ($url, $value){
                        return Html::a(
                                "Оновити авторитетне значення", 
                                'update-value?' . 'id=' . $value->id,
                                [
                                    'title' => "Оновити авторитетне значення",
                                    'class' => 'btn btn-block btn-success',
                                ]
                            );
                    },
                    'delete-value' => function ($url, $value) {
                        return Html::a(
                                "Видалити значення", 
                                'delete-value?' . 'id=' . $value->id,
                                [
                                    'title' => "Видалити авторитетне значення",
                                    'class' => 'btn btn-block btn-danger',
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => 'Ви впевнені, що хочете видалити це авторитетне значення?',
                                    ],
                                ]
                            );
                    },
                    
                ],
            ],
        ],
    ]); ?>
    

</div>
