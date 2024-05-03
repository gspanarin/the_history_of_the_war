<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput()->dropDownList(
            [0 => 'Видалений', 9 => 'Вимкнений', 10 => 'Активний'], ['prompt' => 'Оберіть вірний статус'])  ?>
    
    <?= $form->field($model, 'full_name')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    
    
    
    
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Доступні ролі</h3>
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
                
<?php foreach ($roles as $role): ?>      
                
                
                <tr>
                    <td><?= $role['item']->name ?></td>
                    <td><?= $role['item']->description ?></td>
                    <td>
                    <?php 
                    if($role['value'])
                        echo Html::a('On',  ['user-role-toggle', 'user_id' => $model->id, 'role_name' => $role['item']->name, 'status' => 'on'], ['class' => "btn btn-success"]);
                    else
                        echo Html::a('Off', ['user-role-toggle', 'user_id' => $model->id, 'role_name' => $role['item']->name, 'status' => 'off'], ['class' => "btn btn-secondary"]);
                    ?>
                    </td>
                </tr>
<?php endforeach; ?>            
            </tbody>
            </table>
        </div>

    </div>

</div>
