<?php

use common\models\AuthorityType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AuthoritySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Типи авторитетних джерел';

$this->params['breadcrumbs'][] = ['label' => 'Авторитетні джерела', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'Типи джерел', 'url' => ['type-index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="authority-index">

    <p>
        <?= Html::a('Створити нове авторитетне джерело', ['create-authority-type'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $AuthorityTypeDataProvider,
        'filterModel' => $AuthorityTypeSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description',
            [
            
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update-type} {delete-type}',
                'buttons'=> [
                    'update-type' => function ($url, $type){
                        return Html::a(
                                "Оновити тип джереле", 
                                'update-type?' . 'id=' . $type->id,
                                [
                                    'title' => "Оновити тип джереле",
                                    'class' => 'btn btn-block btn-success',
                                ]
                            );
                    },
                    'delete-type' => function ($url, $type) {
                        return Html::a(
                                "Видалити тип", 
                                'delete-type?' . 'id=' . $type->id,
                                [
                                    'title' => "Видалити тип джереле",
                                    'class' => 'btn btn-block btn-danger',
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => 'Ви впевнені, що хочете видалити цей тип джерела?',
                                    ],
                                ]
                            );
                    },
                    
                ],
            ],
        ],
    ]); ?>
    

</div>
