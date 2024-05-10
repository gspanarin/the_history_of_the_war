<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */

$this->title = 'Створити авторитетне значення';
$this->params['breadcrumbs'][] = ['label' => 'Авторитетні значення', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authority-create">

    <?= $this->render('_form_authority_value', [
        'model' => $model,
    ]) ?>

</div>
