<?php

use common\models\PartnershipProject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PartnershipProjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Інші проєкти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partnership-project-index">
	<div class="row p-3">
		<div class="col-12">
			<div class="heading-section justify-content-left"><h1><?= Html::encode($this->title) ?></h1></div>           
		</div>
	</div>
	<div class="container">
		<div class="row mb-5  text-justify">
			<div class="col-12">
				<p class="h3">Об’єднаймо зусилля для збереження історії!</p>
				<p>
					На цій сторінці представлені партнерські проєкти, що документують події російсько-української війни.
				</p>
				<p>
					Якщо ваша бібліотека чи установа займається збереженням свідчень про війну, пропонуємо розмістити інформацію про ваш проєкт у Цифровому архіві, заповнивши форму: <a href="https://forms.gle/VufuEeVGSL71zXfa7" target="_blank">https://forms.gle/VufuEeVGSL71zXfa7</a>.
				</p>
				<p>
					Дякуємо за ваш внесок у документування та збереження пам’яті!
				</p>
			</div>
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
						<div class="text d-block">
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
		</div>
	</div>
</div>
