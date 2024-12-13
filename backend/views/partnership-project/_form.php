<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PartnershipProject;
use dosamigos\tinymce\TinyMce;
use yii\web\JsExpression;
/** @var yii\web\View $this */
/** @var common\models\PartnershipProject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="partnership-project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(
        PartnershipProject::getStatusList(),
        ['prompt' => ' ... Оберіть статус ... ',
        ]); 
	?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'icon')->fileInput() ?>

	<?php
	$icon = $model->getIcon();
	if ($icon){
		echo Html::img('data:image/jpeg;charset=utf-8;base64,' . $icon, ['width' => '100px', 'height' => 'auto']);
	}
	
	?>
	
    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
