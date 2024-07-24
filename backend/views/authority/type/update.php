<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */

$this->title = 'Оновлення типа авторитетних джерел: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Авторитетні джерела', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Типи авторитетних джерел', 'url' => ['type-index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="authority-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_authority_type', [
        'model' => $model,
    ]) ?>

</div>
