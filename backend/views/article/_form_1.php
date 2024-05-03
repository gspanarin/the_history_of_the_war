<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

?>

<div class="article-form">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
     <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.tag-item',
        //'limit' => 10,
        'min' => 1,
        //'insertButton' => '.add-tag',
        //'deleteButton' => '.remove-tag',
        'model' => $tags[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'description',
        ],
    ]); ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 200px;">Поле</th>
                <th >Значення</th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($tags as $tag): ?>
            <tr class="tag-item">
                <td class="vcenter">
                    <?= $form->field($tag, "label")->label(false)->textInput(['maxlength' => true, 'readonly' => true]) ?>
                </td>
                <td>
                    <?= $this->render('_form-terms', [
                        'form' => $form,
                        'fields' => $fields,
                        'tags' => $tags,
                        'tag' => $tag,
                    ]) ?>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
    </table>

    <?php DynamicFormWidget::end(); ?>
    <?= $form->field($model, 'section_id')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    

</div>
