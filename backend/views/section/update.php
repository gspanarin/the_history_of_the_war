<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Section $model */

$this->title = 'Update Section: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sections_list' => $sections_list
    ]) ?>

</div>
