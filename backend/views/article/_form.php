<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Tabs;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
?>

<div class="person-form">
    
<?php
    
    $form = ActiveForm::begin([
        'id' => 'dynamic-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]);
?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>
<?php    
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Загальні відомості',
                'content' => $this->render('_form_common', [
                        'form' => $form,
                        'model' => $model,
                        'sections_list' => $sections_list,
                        'fields' => $fields,
                        'tags' => $tags,
                        'icon' => $icon
                    ]),
                'active' => true
            ],
            [
                'label' => 'Опис матеріалу',
                'content' => $this->render('_form_metadata', [
                        'form' => $form,
                        'model' => $model,
                        'sections_list' => $sections_list,
                        'fields' => $fields,
                        'tags' => $tags,
                    ]),
                //'headerOptions' => [...],
                'options' => ['id' => 'myveryownID'],
            ],
            [
                'label' => 'Файли',
                'content' => $this->render('_form_files', [
                        'form' => $form,
                        'model' => $model,
                        //'sections_list' => $sections_list,
                        //'fields' => $fields,
                        //'tags' => $tags,
                        'files' => $files,
                    ]),
            ],

        ],
    ]);
    
    
    ActiveForm::end(); ?>
   
</div>


<?php

Modal::begin([
    'id' => 'tag-detail-window',
    'options' => [
        //'class' => 'modal-lg',
    ],
]);

echo '<i class="fas fa-2x fa-sync fa-spin"></i>';

Modal::end();


$script = <<< JS
$(function(){
    // ініціалізація підказок для всіх елементів, які мають атрибут data-toggle="tooltip"
    $('[data-toggle="tooltip"]').tooltip();
});

$('.tag-details').click(function(){
    var tag = this.dataset.term_name;
    var window = $('#tag-detail-window');     
    window.find('.modal-body').html('<i class="fas fa-2x fa-sync fa-spin"></i>'); 
    window.modal('show');
    $.ajax({
        url: '/official/tag/tag-details',
        type: 'post',
        data: {'term_name' : tag},
        success: function (data) {
            data = JSON.parse( data );
            window.find('.modal-body').html(data);
            
        }
    });
});
JS;


$this->registerJs($script, yii\web\View::POS_END);
