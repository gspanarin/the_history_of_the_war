<?php

use wbraganca\dynamicform\DynamicFormWidget;


    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.house-item',
        'limit' => 10,
        'min' => 1,
        'insertButton' => '.add-house',
        'deleteButton' => '.remove-house',
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
                <th>Значення поля</th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($tags as $tag): ?>
            <tr class="house-item">
                <td class="vcenter">
                    <!--
                    <?= $form->field($tag, "label")->label(false)->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    -->
                    <h5 data-toggle="tooltip" title="<?= $tag->definition?>"><?= $tag->label ?></h5>
                    <p class="tag-details text-primary" data-term_name="<?= $tag->term_name ?>">підказка для поля</p>
                  
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

