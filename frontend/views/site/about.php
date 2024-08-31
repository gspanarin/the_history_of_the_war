<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Про проект';
$this->params['breadcrumbs'][] = $this->title;

$this->params['title'] = $this->title;
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>На цій сторінці має бути опис проекта для користувачів: звичайних читачів та дослідників</p>

    
</div>
