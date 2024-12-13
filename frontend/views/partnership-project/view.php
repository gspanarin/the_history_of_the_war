<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\PartnershipProject $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Партнерські проекти', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="partnership-project-view">
    <p>
        <?= Html::a('Оновити запис', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити запис', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
			[
				'attribute' => 'status',
				'value' => function($model){
                    return $model->getStatusTitle();
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
			'duration',
            
			[
				'attribute' => 'description',
				'format' => 'raw'
			]
			,
            'url:url',
            'created_at:dateTime',
            'updated_at:dateTime',
        ],
    ]) ?>

</div>
