<?php

use common\models\Dictionary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\DictionarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dictionaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dictionary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'article_id',
			[
				'attribute' => 'term_name',
				'filter' => Dictionary::getAllTermNames(),
				
			],
			
            'value',
			[
                //'attribute' =>  'user_id',
                'label' => 'Стаття',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Перейти до статті', Url::to(['/article/view/', 'id' => $model->article_id]), ['target' => '_blank']);
                }
            ],
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dictionary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],*/
        ],
    ]); ?>


</div>
