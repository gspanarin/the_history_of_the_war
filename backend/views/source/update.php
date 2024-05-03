<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Source $model */

$this->title = 'Оновити джерело: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Джерела', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="source-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
