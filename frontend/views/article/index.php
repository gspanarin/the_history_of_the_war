<?php

use common\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Section;
use common\models\User;
use yii\widgets\ListView;
use yii\bootstrap4\LinkPager;
/** @var yii\web\View $this */
/** @var common\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Статті';
//$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Статті';
$this->params['breadcrumbs'][] = ['label' => 'Усі статті', 'url' => ['index']];
if (isset($current_section)){
    $this->params['breadcrumbs'][] = ['label' => 'Розділ "' . $current_section->title . '"', 'url' => ['index', 'section_id' => $current_section->id]];
	$this->title = $current_section->title;
}else{
	$this->params['breadcrumbs'][] = $this->title;
}

?>

<div class="article-index">
	
	<div class="row p-3">
		<div class="col-12">
    <div class="heading-section justify-content-left"><h1 class="display-5"><?= Html::encode($this->title) ?></h1></div>
	
	<h2 class="badge badge-dark  mb-3 mt-3">Підкатегорії: </h2>

	<div class="tagcloud ">
    <ul class="list-inline">
	<?php foreach($sections as $section): ?>
		<li><a href="/article/?section_id=<?= $section->id ?>"><?= $section->title ?> <span class="badge badge-primary"><?= $section->getArticle_count() ?></span></a></li>
	<?php endforeach; ?>
    </ul>
    </div>
	
	<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			<?= ($dataProvider->totalCount ? 'Всього знайдено статей: ' . $dataProvider->totalCount . '<br>' : '') ?>

		</div> 
	</section>
	
	<section class="ftco-section ftco-degree-bg">
		<div class="row mb-2">
<?php foreach ($dataProvider->getModels() as $model){ 
	$icon = $model->getIcon();
	$icon_img = 'cover.png';
	if ($icon){
		$icon_img = 'data:image/jpeg;charset=utf-8;base64,' . $icon;
	}
?>	 
			<div class="col-md-4 d-flex  ftco-animate">
				<div class="blog-entry align-self-stretch d-md-flex shadow-sm border rounded p-2">
					<a href="/article/view?id=<?= $model->id ?>" class="block-20" style="background-image: url('<?= $icon_img ?>');"></a><!--посилання!!! -->
					<div class="text d-block pl-md-4">
					<kbd class="badge badge-light mb-3 mt-3"><?= $model->dateEvent ?></kbd>
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