<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Article $model */

$this->title = 'Редагування статті: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="article-update">
    
    <?= $this->render('_form', [
        'model' => $model,
        'sections_list' => $sections_list,
        'fields' => $fields,
        'tags' => $tags,
        'files' => $files,
        'icon' => $icon
    ]) ?>

</div>
