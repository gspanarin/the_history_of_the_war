<?php

use yii\helpers\Html;


$this->title = 'Авторитетны джерела';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authority-index">

    <p>
        <?= Html::a('Типи авторитетних джерел', ['type-index'], ['class' => 'btn btn-success']) ?>
    </p>
        
    <p>
        <?= Html::a('Значення авторитетних джерел', ['value-index'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
