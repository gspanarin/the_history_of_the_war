<?php

use yii\helpers\Html;
use common\models\User;
/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Редагування користувача: ' . User::getFullName($model->id ) . ' (id: ' . $model->id . ')';
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => User::getFullName($model->id ) . ' (id: ' . $model->id . ')', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="user-update">


    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
        'organizations' => $organizations
    ]) ?>

</div>
