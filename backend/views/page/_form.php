<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/** @var yii\web\View $this */
/** @var common\models\Page $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'status')->textInput()->dropDownList([0 => 'Не опублікована', 1 => 'Опублікована']); ?>
    
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'uk',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste",
                "image",
                "link"
            ],
            'toolbar' => "undo redo | styles | fontsize | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            'a11y_advanced_options' => true,
            'automatic_uploads' => true,
            'file_picker_types' => 'file image media',
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
