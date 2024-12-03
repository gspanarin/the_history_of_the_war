<?php

//use Yii;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="page-view">
	<div class="row p-3">
		<div class="col-12">
		<div class="heading-section justify-content-left"><h1><?= Html::encode($this->title) ?></h1></div>           
		</div>
	</div>
	<div class="container">	
		<?= $model->body ?>
	</div>
</div>
