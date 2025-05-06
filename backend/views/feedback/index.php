<?php

use common\models\Feedback;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\FeedbackSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Відгуки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'status',
            'created_at:date',
            'name',
            'email:email',
            'subject',
            'body:ntext', 
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="btn btn-primary">Переглянути</span>', ['/feedback/view', 'id' => $model->id]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn btn-danger">Видалити</span>', ['/feedback/delete', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
