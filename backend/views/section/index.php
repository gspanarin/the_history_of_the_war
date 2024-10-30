<?php

use common\models\Section;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;


/** @var yii\web\View $this */
/** @var common\models\SectionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Розділи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">
    
    <p>
        <?= Html::a('Додати розділ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            //'id',
            'alias',
            [
                'attribute'=>'status',
                'class'=>'\dixonstarter\togglecolumn\ToggleColumn',
                'options'=>['style'=>'width:50px;'],
                'linkTemplateOn'=>'<a class="toggle-column btn btn-success btn-xs btn-block" data-pjax="0" href="{url}">{label}</a>',
                'linkTemplateOff'=>'<a class="toggle-column btn btn-warning btn-xs btn-block" data-pjax="0" href="{url}">{label}</a>'
            ],
            
            //'description:ntext',
            //'icon',   
            [
                'attribute' => 'pid',
                'filter' => Section::getSectionsList(),
                'value' => function ($model) {
                    $parent = Section::findOne(['id' => $model->pid]);
                    return $parent != null ? $parent->title : ' - ';
                }
            ],
            [
                'attribute' => 'sort',
                'class' => '\common\components\widgets\gridViewSortButton\SortColumn',
                //'options' => ['style'=>'width:50px;'],
                
            ],       
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Section $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    <?php Pjax::end();?>

</div>
