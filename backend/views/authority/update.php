<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */

$this->title = 'Update Authority: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authorities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authority-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
