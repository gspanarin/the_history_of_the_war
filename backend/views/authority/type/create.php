<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Authority $model */

$this->title = 'Створити авторитетне джерело';
$this->params['breadcrumbs'][] = ['label' => 'Авторитетні джерела', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Типи авторитетних джерел', 'url' => ['type-index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authority-create">

    <?= $this->render('_form_authority_type', [
        'model' => $model,
    ]) ?>

</div>
