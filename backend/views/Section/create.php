<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Section $model */

$this->title = 'Створити розділ';
$this->params['breadcrumbs'][] = ['label' => 'Розділи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-create">

    <?= $this->render('_form', [
        'model' => $model,
        'sections_list' => $sections_list,
    ]) ?>

</div>
