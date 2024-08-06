<?php

use common\models\Tag;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\FieldSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Поля опису статей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-index">

    <p>
        <?= Html::a('Додати нове поле', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'term_name',
            'label',
            //'uri',
            'definition',
            //'comment',
            //'note',
            //'default_value',
			'ord',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tag $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
