<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Section;

$this->title = $model->BreadcrumbTitle;
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];

foreach ($model->SectionsPath as $section_item){
	$this->params['breadcrumbs'][] = ['label' => $section_item->title, 'url' => ['/article/?section_id=' . $section_item->id]];
}
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
$this->params['title'] = $model->getTitle();
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="article-view">

	<div class="row p-3">
		<div class="col-12">
			
			<!--Зробити умову за датою публікації для виводу маркера -->
			<?php if ($model->IsNewArticle) { ?>
			<p><span class="badge badge-primary">Нова стаття</span></p>
			<?php } ?>
			<div class="heading-section justify-content-left"><h1 class="display-5"><?= $model->title ?></h1></div>       

			<div class="tagcloud pt-3"><a href="/article?section_id=<?= $model->section_id ?>" class="tag-cloud-link"><?= $model->section->title ?></a></div>

			<p class="lead pt-3"><span class="icon-calendar"></span> Дата публікації: <strong><?= $model->dateEvent ?></strong>
			<br>Ідентифікатор статті: <strong><?= $model->id ?>
			</p>
	
			<p class="pt-2"><?= $model->section->title ?></p>   

			<?php 
			$icon = $model->getIcon();
			$icon_img = 'cover.png';
			if ($icon){
				$icon_img = 'data:image/jpeg;charset=utf-8;base64,' . $icon;
			}
			?>
			<p><img src="<?= $icon_img ?>" class="img-thumbnail" alt=""/></p>  

        
		</div>    
	</div>  

	<section class="services-section ftco-section rowjustify-content-left p-2 ">
		<!-- у якому порядку виводити ці параметри - уточнити та переставити-->

		<ul class="list-inline">
			<li class="mt-3"><span class="icon-wallpaper"></span> Анотація: <?= $model->description ?></li>
			
			<?php
			$file_tml = '';
			foreach ($model->files as $file)
				$file_tml .= Html::a('Скачати / переглянути', ['article/download-file', 'id' => $file->id], ['class' => 'profile-link'])  . '<br>';
			?>
			<li><span class="icon-picture_as_pdf"></span> Приєднані файли: <strong><?= $file_tml ?></strong></li>
			<li class="mt-3"><span class="icon-picture_in_picture"></span> Джерело: <a href="<?= $model->url ?>" target="_blank"><strong><?= $model->url ?></strong></a></li>
		</ul>


		
		<ul class="comment-list">
			<?php
			if (count($model->subject) > 0){
				echo $this->render('tag_list', [
					'title' => 'Ключові слова',
					'items' => $model->subject
				]) ;
			}
			
			if (count($model->subject_organization) > 0){
				echo $this->render('tag_list', [
					'title' => 'Організація, установа',
					'items' => $model->subject_organization
				]) ;
			}
			
			if (count($model->subject_military_unit) > 0){
				echo $this->render('tag_list', [
					'title' => 'Військовий підрозділ',
					'items' => $model->subject_military_unit
				]) ;
			}
			?>
			
			
		</ul> 

	</section>     
    
	<div class="row  p-4">    
		<ul class="list-inline">
			<li><span class="icon-calendar-check-o"></span> Матеріал архівовано: <strong><?= $model->DateArchived?></strong></li>    
			<li></span> Установа-архіватор: <strong><?= $model->provenance?></strong></li>   
		</ul>    
	</div>  


</div>
