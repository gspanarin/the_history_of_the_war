<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->hiddenInput(['value' => 2])->label(false) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Доступні дозволи</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
            <thead>
                <tr>
                <th>Назва</th>
                <th>Опис</th>
                <th style="width: 40px">Стан</th>
                </tr>
            </thead>
            <tbody>
                
<?php foreach ($permissions as $permission): ?>      
                
                
                <tr>
                    <td><?= $permission['item']->name ?></td>
                    <td><?= $permission['item']->description ?></td>
                    <td>
                    <?php 
                    if($permission['value'])
                        echo Html::a('On', ['permission-toggle', 'id' => $model->name, 'permission' => $permission['item']->name, 'status' => 'on'], ['class' => "btn btn-success"]);
                    else
                        echo Html::a('Off', ['permission-toggle', 'id' => $model->name, 'permission' => $permission['item']->name, 'status' => 'off'], ['class' => "btn btn-secondary"]);
                    ?>
                    </td>
                </tr>
<?php endforeach; ?>            
            </tbody>
            </table>
        </div>

    </div>
    
    
    
    
   
    
</div>
