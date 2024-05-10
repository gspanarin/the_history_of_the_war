<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="authority-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'authority_type_id')->textInput() ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
