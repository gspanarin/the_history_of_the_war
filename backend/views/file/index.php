<?php

use common\models\File;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\User;

/** @var yii\web\View $this */
/** @var common\models\FileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'status',
            [
                'attribute' => 'file_name',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->file_name, Url::to(['/article/download-file', 'id' => $model->id]), ['class' => 'profile-link']);
                }
            ],
            [
                'attribute' =>  'user_id',
                'label' => 'Користувач',
                'filter' => User::getUsersList(),
                'value' => function($model){
                    return User::getFullName($model->user_id);
                }
            ],
            //'article_id',
            [
                //'attribute' =>  'user_id',
                'label' => 'Стаття',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Перейти до статті', Url::to(['/article/view/', 'id' => $model->article_id]), ['target' => '_blank']);
                }
            ],
            //'type',
            //'extension',
            //'file_name',
            //'file_path',
            //'uploaded_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, File $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
