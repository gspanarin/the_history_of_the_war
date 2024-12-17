<?php

use common\models\PartnershipProject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PartnershipProjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Партнерські проекти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partnership-project-index">


    <p>
        <?= Html::a('Додати новий проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute' => 'status',
				'filter' => PartnershipProject::getStatusList(),
				'format' => 'raw',
				'value' => function($model){
                    return 
						Html::a($model->getStatusTitle(), ['change-status', 'id' => $model->id])
					
						;
                }
			],
            'title',
            [
				'attribute' => 'icon',
				'format' => 'raw',
				'value' => function($model){
					$icon = $model->getIcon();
					if ($icon){
						return Html::img('data:image/jpeg;charset=utf-8;base64,' . $icon, ['width' => '100px', 'height' => 'auto']);
					}
				}
			],
            'operator',
            //'description',
            'url:url',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PartnershipProject $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
