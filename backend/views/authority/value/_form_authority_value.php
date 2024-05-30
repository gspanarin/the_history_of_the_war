<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AuthorityType;
/** @var yii\web\View $this */
/** @var common\models\Authority $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="authority-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'authority_type_id')->dropDownList(
        AuthorityType::getlist(),
        ['prompt' => ' ... Оберіть тип значення ... ']);  ?>
    
    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
