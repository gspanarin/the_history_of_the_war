<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */

$this->title = 'Оновлення авторитетного значення: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Авторитетні джерела', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Авторитетні значення', 'url' => ['type-index']];
$this->params['breadcrumbs'][] = ['label' => $model->value, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="authority-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_authority_value', [
        'model' => $model,
    ]) ?>

</div>
