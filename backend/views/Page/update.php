<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = 'Оновлення сторінки: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сторінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
