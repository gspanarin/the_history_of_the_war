<?php

use common\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Правила та права користувачів';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
    
    <?= Html::a('Ролі', ['role-index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Правила', ['rule-index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Дозволи', ['permission-index'], ['class' => 'btn btn-primary']) ?>

</div>
