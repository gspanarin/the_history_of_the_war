<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Редагування користувача: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="user-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
