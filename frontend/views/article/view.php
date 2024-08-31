<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Section;


/** @var yii\web\View $this */
/** @var common\models\Article $model */

$this->title = $model->getTitle() . ' (id: ' . $model->id . ')';
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->params['title'] = $model->getTitle();
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="article-view">

	<div>
		<div class='float-right font-weight-light'>
			Всього переглядів: <?= $model->view ?>
		</div>
	</div>
		
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            /*[
                'attribute' => 'user_id',
                'filter' => User::getUsersList(),
                'value' => function($model){
                    return User::getFullName( $model->user_id );
                }
            ],*/
            [
                'attribute' => 'section_id',
                'value' => function($model){
                    $section = Section::findOne(['id' => $model->section_id]);
                    return $section != null ? $section->title : ' - ';
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->getStatusTitle();
                }
            ],
            /*'created_at:dateTime',
            'updated_at:dateTime',*/
            [
                'attribute' => 'metadata',
                'format' => 'RAW',
                'value' => function($model){
                    $metadata_str = '<ul>';
                    $metadata = json_decode($model->metadata, true);
                    foreach ($metadata as $tag => $values){
                        $metadata_str .= '<li>' . $tag . '<ul>'; 
                        foreach ($values as $value)
                            $metadata_str .= '<li>' . $value . '</li>'; 
                        $metadata_str .= '</ul></li>'; 
                    }
                    $metadata_str .= '</ul>';
                
                    //$metadata_str = '';
                    return $metadata_str;
                }
            ], 
            [
                'attribute' => 'files',
                'label' => 'Приєднані файли',
                'format' => 'raw',
                'value' => function($model){
                    $file_tml = '';
                    foreach ($model->files as $file)
                        $file_tml .= Html::a($file->file_name, ['article/download-file', 'id' => $file->id], ['class' => 'profile-link'])  . '<br>';
                
    
                    return $file_tml;
                }
            ]
        ],
    ]) ?>

</div>
