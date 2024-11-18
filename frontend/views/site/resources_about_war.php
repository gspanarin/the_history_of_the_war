<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Ресурси про війну';
$this->params['breadcrumbs'][] = $this->title;

$this->params['title'] = $this->title;
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="site-about">
	<div class="row p-3">
		<div class="col-12">
		<div class="heading-section justify-content-left"><h1><?= Html::encode($this->title) ?></h1></div>           
		</div>
	</div>

	<div class="container">	
		<div class="row mb-5  text-justify">
			<ul>
				<li>
					<a href="https://www.libr.dp.ua" target="_blank">Проект відбору та систематизації свідчень військової агресії у Дніпропетровській області</a>
					
				</li>
			</ul>
		</div>       
      </div>
   </div> 
</div>
