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
use common\components\helpers\UrlManager;
use yii\jui\AutoComplete;
use frontend\models\ArticleSearchForm;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
/** @var common\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


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
	
	
	
<?php if (!empty($request_params)){ ?>
<div>
	<h4>Обрані пошукові фільтри:</h4>
	<ul>
<?php foreach($request_params as $param) : ?>
		<li><strong><?= $param['label'] ?></strong>: <?= $param['value'] ?><span class="close-image-icon"><a href="<?= $param['delete_url'] ?>" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a></span></li>
<?php endforeach; ?>
	</ul>
</div>
<?php } ?>
	
	<?php  //dd($request_params); ?>
	
<div>
	<form action="/article" method="get">
		<div class="row heading-section mt-5  mb-5" >
	
				<div class="form-group col-lg-6">
					<label for="title">Розділ</label>
					<select name="section_id" class="form-control">
						<?php foreach (Section::getSectionsList() as $key => $value) { ?>
						<option value="<?= $key?>" <?= (isset($request_params['section_id']) && $request_params['section_id'] == $key ? ' selected ': '') ?> ><?= $value ?></option>
						<?php } ?>
					</select>
				</div>
			
				<div class="form-group col-lg-6">
					<label for="title">Назва статті</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Назва статті">
				</div>

				<div class="form-group col-lg-6">
					<label for="subject">За ключовими словами</label>
					<input type="text" class="form-control" name="subject" id="subject" placeholder="ключові слова">
				</div>

				<div class="form-group col-lg-6">
					<label for="subject">За джерелом публікації статті</label>
					<input type="text" class="form-control" name="source" id="source" placeholder="URL-адреса джерела">
				</div>

				<div class="form-group col-lg-6">
					<label for="subject">За видавецем</label>
					<input type="text" class="form-control" name="publisher" id="publisher" placeholder="назва організації-видавця статті">
				</div>

				<div class="form-group col-lg-6">
					<label for="subject">Автор, редактор статті</label>
					<input type="text" class="form-control" name="creator" id="creator" placeholder="ПІБ автора">
				</div>
	
		</div>
		<button type="submit" class="btn btn-primary">Знайти</button>
	</form>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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