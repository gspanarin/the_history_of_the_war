<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Article $model */

$this->title = 'Створити статтю';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">


    <?= $this->render('_form', [
        'model' => $model,
        'sections_list' => $sections_list,
        'fields' => $fields,
        'tags' => $tags,
        'files' => $files,
        'icon' => $icon,
    ]) ?>

</div>
