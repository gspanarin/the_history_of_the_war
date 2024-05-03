<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = 'Створити дозвіл';
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/rbac']];
$this->params['breadcrumbs'][] = ['label' => 'Дозволи', 'url' => ['/rbac/permission-index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
