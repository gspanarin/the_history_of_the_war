<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Organization $model */

$this->title = 'Оновити організацію: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Організації', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="organization-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
