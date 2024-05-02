<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Source $model */

$this->title = 'Створити джерело/ЗМІ';
$this->params['breadcrumbs'][] = ['label' => 'Джерела', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
