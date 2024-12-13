<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PartnershipProject $model */

$this->title = 'Оновлення партнерського проекту: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Партнерські проекти', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partnership-project-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
