<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\FieldSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="field-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'term_name') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'uri') ?>

    <?= $form->field($model, 'definition') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'default_value') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
