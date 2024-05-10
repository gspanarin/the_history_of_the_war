<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use common\models\TagInputType;
use common\models\AuthorityType;
/** @var yii\web\View $this */
/** @var common\models\Field $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="field-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'term_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'definition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'es',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>
    

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_value')->textInput(['maxlength' => true]) ?>

    
    
    
    
    
    
    
    <?= $form->field($model, 'input_type')->dropDownList(
        TagInputType::getList(),
        ['prompt' => ' ... Оберіть метод вводу ... ']);    ?>

    <?= $form->field($model, 'input_source')->dropDownList(
        AuthorityType::getListIdsName(),
        ['prompt' => ' ... Оберіть метод вводу ... ']); ?>

    
  

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
