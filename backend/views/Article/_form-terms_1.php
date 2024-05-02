<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-tag-value',
    'widgetItem' => '.tag-value-item' ,
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-tag-value',
    'deleteButton' => '.remove-tag-value',
    'model' => $tags[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'description'
    ],
]); ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Значення поля</th>
            <th class="text-center">
                <button type="button" class="add-tag-value btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
    </thead>
    <tbody class="container-tag-value">
    <?php foreach ($fields[$tag->term_name] as $field => $value): ?>
        <tr class="tag-value-item">
            <td class="vcenter">
                <?= Html::input('text', "Article[tags_$tag->term_name][]", $value,['class' => "form-control"]) ?>
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-tag-value btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
     <?php endforeach; ?>
    </tbody>
</table>

<?php DynamicFormWidget::end(); ?>