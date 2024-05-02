<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = 'Оновлення ролі: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/rbac']];
$this->params['breadcrumbs'][] = ['label' => 'Ролі', 'url' => ['/rbac/role-index']];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
        'permissions' => $permissions,
    ]) ?>

</div>
