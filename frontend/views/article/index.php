<?php

use common\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Section;
use common\models\User;
use yii\widgets\ListView;
/** @var yii\web\View $this */
/** @var common\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Статті';
//$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Статті';
$this->params['breadcrumbs'][] = ['label' => 'Усі статті', 'url' => ['index']];
if (isset($current_section))
    $this->params['breadcrumbs'][] = ['label' => 'Розділ "' . $current_section->title . '"', 'url' => ['index', 'section_id' => $current_section->id]];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="article-index">

    
<div class="col-md-9">
Підкатегорії:

<ul>
    <?php foreach($sections as $section): ?>
    <li><a href="?section_id=<?= $section->id ?>"><?= $section->title ?> (<?= $section->getArticle_count() ?>)</a></li>
    <?php endforeach; ?>
</ul>
</div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'current_icon',
                'format' => 'RAW',
                'value' => function ($model){
                    $icon = $model->getIcon();
                    if ($icon)
                        return Html::img('data:image/jpeg;charset=utf-8;base64,' . $icon, ['width' => '100px', 'height' => 'auto']);
                    else
                        return 'Іконка відсутня';
                }
            ],
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => function($model){
                    return Html::a( Html::encode($model->title), ['view', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'section_id',
                'filter' => Section::getSectionsList(isset($current_section) ? $current_section->id : null),
                'value' => function ($model) {
                    $section = Section::findOne(['id' => $model->section_id]);
                    return $section != null ? $section->title : ' - ';
                }
            ],
            
            [
                'attribute' => 'created_at',
                'value' => function ($model, $key, $index, $grid) {
                   return date('Y-m-d', $model->created_at);
                },
            ],  
            //'updated_at',  
            
        ],
    ]); ?>


</div>
