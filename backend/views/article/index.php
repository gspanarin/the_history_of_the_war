<?php

use common\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Section;
use common\models\User;
use yii\bootstrap4\LinkPager;
/** @var yii\web\View $this */
/** @var common\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Статті';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="article-index">


    <p>
        <?= Html::a('Додати статтю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'title',
				
            ],
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
                'attribute' => 'user_id',
                'filter' => User::getUsersList(),
                'value' => function($model){
                    return User::getFullName( $model->user_id );
                }
            ],
            //'metadata:ntext',
            [
                'attribute' => 'section_id',
                'filter' => Section::getSectionsList(),
                'value' => function ($model) {
                    $section = Section::findOne(['id' => $model->section_id]);
                    return $section != null ? $section->title : ' - ';
                }
            ],
            [
                'attribute' => 'status',
                'filter' => Article::getStatusList(),
                'value' => function($model){
                    return $model->getStatusTitle();
                }
            ],
            
			[
                'label' => 'Дата архівації',
				'format' => 'raw',
                'value' => function ($model) {
                   return $model->dateArchived;
                },
            ],  
			[
                'attribute' => 'created_at',
				'format' => 'raw',
                'value' => function ($model, $key, $index, $grid) {
                   return date('Y-m-d', $model->created_at) . '<br><span class="text-secondary">' . date('H:i:s', $model->created_at) . '</span>';
                },
            ],  
            //'updated_at',  
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

 
</div>
