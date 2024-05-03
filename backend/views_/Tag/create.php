<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Field $model */

$this->title = 'Створити новий тег';
$this->params['breadcrumbs'][] = ['label' => 'Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
