<?php

use common\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Сторінки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p>
        <?= Html::a('Створити сторінку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'status',
            //'type',
			'title',
            [
                'attribute' => 'alias',
				'label' => 'Внутрішній сайт',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->alias, Url::to('page/' . $model->alias . '.html'));
                }
            ],
			[
                'attribute' => 'alias',
				'label' => 'Читацький сайт',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->alias, Url::to('/page/' . $model->alias . '.html'));
                }
            ],
            
            //'body:ntext',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Page $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
