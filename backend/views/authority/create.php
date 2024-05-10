<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */

$this->title = 'Create Authority';
$this->params['breadcrumbs'][] = ['label' => 'Authorities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authority-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
