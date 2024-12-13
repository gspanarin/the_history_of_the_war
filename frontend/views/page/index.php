<?php

use common\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;

$this->title = 'Сторінки сайту';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-index">
	
	<div class="row p-3">
		<div class="col-12">
			<div class="heading-section justify-content-left"><h1 class="display-5"><?= Html::encode($this->title) ?></h1></div>
	

	<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			<?= ($dataProvider->totalCount ? 'Всього знайдено сторінок: ' . $dataProvider->totalCount . '<br>' : '') ?>
		</div> 
	</section>
	
	<section class="ftco-section ftco-degree-bg">
		<div class="row mb-2">
<?php foreach ($dataProvider->getModels() as $model){ 
	//$icon = $model->getIcon();
	$icon= null;
	$icon_img = 'cover.png';
	if ($icon){
		$icon_img = 'data:image/jpeg;charset=utf-8;base64,' . $icon;
	}
?>	 
			<div class="col-md-4 d-flex  ftco-animate">
				<div class="blog-entry align-self-stretch d-md-flex shadow-sm border rounded p-2">
					<a href="/article/view?id=<?= $model->id ?>" class="block-20" style="background-image: url('<?= $icon_img ?>');"></a><!--посилання!!! -->
					<div class="text d-block pl-md-6">
					<kbd class="badge badge-light mb-5 mt-5"><?= '44444' ?></kbd>
					<p class="heading"><a href="/article/view?id=<?= $model->id ?>"><?= Html::encode($model->title) ?></a></p>
					<p><a href="/article/view?id=<?= $model->id ?>" class="btn  btn-outline-info  py-2 px-3 ">Перейти</a></p>
					</div>  
				</div> 
			</div>
<?php } ?>	
		</div>        
	</section>

	</div> 
	</div> 
</div>

<?= LinkPager::widget([
		'pagination' => $dataProvider->pagination
	]);
?> 