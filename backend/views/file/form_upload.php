<?php

use app\models\Attachments;
$attachment = new Attachments();
 
$attach_form = ActiveForm::begin(
[
'options' => ['enctype' => 'multipart/form-data'],
'id' => 'upload-attachment',
'action' => Yii::$app->homeUrl."mail/ajax"
]
);
echo $attach_form->field($attachment, 'kind')->hiddenInput(['value' => 'attachupload']);
echo $attach_form->field($attachment, 'file')->fileInput();
?>
<label class="btn btn-primary">
<i class="glyphicon glyphicon-upload"></i> Загрузить файл
<?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Сохранить', ['class' => 'btn btn-default', 'style' => 'display:none']) ?>
</label>
<?php ActiveForm::end(); ?>