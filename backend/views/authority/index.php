<?php

use common\models\Authority;
use common\models\AuthorityType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AuthoritySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Authorities';
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AuthorityType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    
    
    <p>
        <?= Html::a('Створити нове авторитетне значення', ['create-authority-value'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $AuthorityDataProvider,
        'filterModel' => $AuthoritySearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'authority_type_id',
            'value',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Authority $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
