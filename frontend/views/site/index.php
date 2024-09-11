<?php

/** @var yii\web\View $this */
$section_number = 1;
use yii\helpers\Html;


$this->params['title'] = $this->title = Html::encode(Yii::$app->name);
$this->params['subtitle'] = Html::encode('проєкт');
?>

<style>
.btn-cont {
	width: 100%;
	//height: 30px;
	position: absolute;
	bottom: 20px;
	left: 0;
	display: flex;
	align-items: center;
	justify-content: center;
}

</style>

<div class="container">
	<div class="site-index">
		<div class="body-content">
			<div class="row heading-section justify-content-left p-5">
	<?php foreach ($sections as $section): ?>	
	
	<div class="col-lg-4">
		<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative h-250 bg-lighter">
			<div class="col p-4 d-flex flex-column text-center position-static">
				<h2 class="card-title"><a href="/article?section_id=<?= $section->id ?>" class="colorlink"><?= $section->title ?></a></h2>
				<p class="card-title mb-4 lead">Кількість статей у розділі: <span class="badge badge-primary"><?= $section->article_count?></span></p>                
				<div class="btn-cont">				
                <a href="/article?section_id=<?= $section->id ?>"  class="btn btn-lg  btn-outline-secondary mt-2  font-weight-bold button">Перейти</a>
				</div>
			</div>
		</div>
	</div>
	<?php $section_number++;?>
	<?php endforeach; ?>	
			</div>
		</div>
	</div>
</div>

