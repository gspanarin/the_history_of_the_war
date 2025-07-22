<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Section;
use yii\helpers\Url;

$icon = $model->getIcon();
$icon_img = 'cover.png';

$this->registerJs($model->jsonld, \yii\web\View::POS_HEAD);

$this->registerMetaTag(['name' => 'og:type','content' => 'article']);
$this->registerMetaTag(['name' => 'og:url', 'content' => Url::home(true) . 'article/view?id=' . $model->id]);
$this->registerMetaTag(['name' => 'og:site_name ', 'content' => 'Архівування документів про війну']);
$this->registerMetaTag(['name' => 'og:description', 'content' => Html::encode($model->description[0])]);
$this->registerMetaTag(['name' => 'og:title', 'content' => Html::encode($model->title)]);
if ($icon){
	$this->registerMetaTag(['name' => 'og:image', 'content' => 'data:image/jpeg;charset=utf-8;base64,' . $icon]);
}
$this->registerMetaTag(['name' => 'og:locale', 'content' => 'uk_UA']);


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
<div class="article-view" itemscope itemtype="https://schema.org/NewsArticle">

	<div class="row p-3">
		<div class="col-12">
			
			<!--Зробити умову за датою публікації для виводу маркера -->
			<?php if ($model->IsNewArticle) { ?>
			<p><span class="badge badge-primary">Нова стаття</span></p>
			<?php } ?>
			<div class="heading-section justify-content-left"><h1 class="display-5" itemprop="name"><?= $model->title ?></h1></div>       

			<div class="tagcloud pt-3"><a href="/article?section_id=<?= $model->section_id ?>" class="tag-cloud-link"><?= $model->section->title ?></a></div>

			<p class="lead pt-3"><span class="icon-calendar"></span> Дата публікації: <strong><?= $model->dateEvent ?></strong>
			<br>Ідентифікатор статті: <strong><?= $model->id ?>
			</p>
	
			<p class="pt-2"><span itemprop = "articleSection"><?= $model->section->title ?></span></p>   

			<?php 
			
			if ($icon){
				$icon_img = 'data:image/jpeg;charset=utf-8;base64,' . $icon;
			}
			?>
			<p><img src="<?= $icon_img ?>" class="img-thumbnail" alt="" id="cover_icon" itemprop="primaryImageOfPage"/></p>  

        
		</div>    
	</div>  

	<section class="services-section ftco-section rowjustify-content-left p-2 ">
		<!-- у якому порядку виводити ці параметри - уточнити та переставити-->
		<ul class="list-inline">
                    <li class="mt-3"><span class="icon-wallpaper"></span> Анотація: <span itemprop="about"><?php foreach ($model->description as $item){ echo $item . '<br>'; } ?></span></li>
			
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
			if (count($model->creator) > 0){
				echo $this->render('tag_list', [
					'title' => 'Автори/Упорядники/Кореспонденти',
					'items' => $model->creator,
					'schema' => 'itemprop="creator"',
					'schema_type' => 'itemscope itemtype="http://schema.org/Person"',
				]) ;
			}
			
			if (count($model->subject) > 0){
				echo $this->render('tag_list', [
					'title' => 'Ключові слова',
					'items' => $model->subject,
					'schema' => 'itemprop="keywords"'
				]) ;
			}
			
			if (count($model->subject_organization) > 0){
				echo $this->render('tag_list', [
					'title' => 'Організація, установа',
					'items' => $model->subject_organization,
					'schema' => 'itemprop="legalName"',
					'schema_type' => 'itemscope itemtype="http://schema.org/Organization"',
				]) ;
			}
			
			if (count($model->subject_military_unit) > 0){
				echo $this->render('tag_list', [
					'title' => 'Військовий підрозділ',
					'items' => $model->subject_military_unit,
					'schema' => 'itemprop="legalName"',
					'schema_type' => 'itemscope itemtype="http://schema.org/Organization"',
				]) ;
			}
			?>
			
			
		</ul> 

	</section>     
    
	<div class="row  p-4">    
		<ul class="list-inline">
			<li><span class="icon-calendar-check-o"></span> Матеріал архівовано: <strong><span itemprop="archivedAt"><?= $model->DateArchived?></span></strong></li>    
			<li></span> Архіватор: <strong><?= $model->provenance?></strong></li>   
		</ul>    
	</div>  


</div>
