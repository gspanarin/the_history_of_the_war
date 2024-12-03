<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\web\JsExpression;
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
        'options' => ['rows' => 12],
        'language' => 'uk',
        'clientOptions' => [
			
			
			
			'file_picker_callback' => new JsExpression("function(cb, value, meta) {
				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');

				// Note: In modern browsers input[type=\"file\"] is functional without 
				// even adding it to the DOM, but that might not be the case in some older
				// or quirky browsers like IE, so you might want to add it to the DOM
				// just in case, and visually hide it. And do not forget do remove it
				// once you do not need it anymore.

				input.onchange = function() {
				  var file = this.files[0];

				  var reader = new FileReader();
				  reader.onload = function () {
					// Note: Now we need to register the blob in TinyMCEs image blob
					// registry. In the next release this part hopefully won't be
					// necessary, as we are looking to handle it internally.
					var id = 'blobid' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var base64 = reader.result.split(',')[1];
					var blobInfo = blobCache.create(id, file, base64);
					blobCache.add(blobInfo);

					// call the callback and populate the Title field with the file name
					cb(blobInfo.blobUri(), { title: file.name });
				  };
				  reader.readAsDataURL(file);
				};

				input.click();
			   }"),
			
			
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste",
                "image",
                "link",
				"table",
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
