<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Section $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput()->dropDownList([0 => 'Не активний', 1 => 'Активний']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'icon')->fileInput(['multiple'=>'multiple']) ?>

    <?= $form->field($model, 'pid')->textInput()->dropDownList($sections_list, ['prompt'=>'Оберіть батьківський розділ']); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
