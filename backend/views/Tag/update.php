<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Field $model */

$this->title = 'Оновлення поля: ' . $model->term_name;
$this->params['breadcrumbs'][] = ['label' => 'Поля опису статей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->term_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="field-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
