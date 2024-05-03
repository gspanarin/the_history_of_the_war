<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Organization $model */

$this->title = 'Створити організацію';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
