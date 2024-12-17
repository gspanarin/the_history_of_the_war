<?php

use common\models\PartnershipProject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PartnershipProjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Партнерські проекти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partnership-project-index">

	<section class="ftco-section ftco-degree-bg">
		<div class="row mb-2">
    <?php
	foreach ($models as $model){
		$icon = $model->getIcon();
		$icon_img = 'cover.png';
		if ($icon){
			$icon_img = 'data:image/jpeg;charset=utf-8;base64,' . $icon;
		}
		?>	 
			<div class="col-md-4 d-flex  ftco-animate">
				<div class="blog-entry align-self-stretch d-md-flex shadow-sm border rounded p-2">
					
					<div class="text d-block pl-md-4">
					<p class="heading"><?= Html::img('data:image/jpeg;charset=utf-8;base64,' . $icon, ['width' => '100%', 'height' => 'auto']); ?></p>
					<h4 class="heading mb-3"><?= Html::encode($model->title) ?></h4>
					<div>
					<p><i><?= $model->operator ?></i></p>
					<p><?= $model->duration ?></p>
					<p><?= $model->description ?></p>
					<p><?= Html::a('<span>Посилання на проект</span>', $model->url, ['class' => 'profile-link'], ['target' => '_blank'])?></p>
					</div>
					<p></p>
					</div>  
				</div> 
			</div>
<?php 
	}
	
	?>
		</div>        
	</section>

</div>
