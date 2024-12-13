<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PartnershipProject $model */

$this->title = 'Новий партнерський проект';
$this->params['breadcrumbs'][] = ['label' => 'Партнерські проекти', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partnership-project-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
