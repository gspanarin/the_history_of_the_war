<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = 'Оновлення дозволу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/rbac']];
$this->params['breadcrumbs'][] = ['label' => 'Дозволи', 'url' => ['/rbac/permission-index']];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
