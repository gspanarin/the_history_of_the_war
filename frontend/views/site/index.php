<?php

/** @var yii\web\View $this */
$section_number = 1;
use yii\helpers\Html;


$this->params['title'] = $this->title = Html::encode(Yii::$app->name);
$this->params['subtitle'] = Html::encode('проєкт');
?>

<div class="container">
	<div class="site-index">
		<div class="body-content">
			<div class="row heading-section justify-content-left p-5">
	<?php foreach ($sections as $section): ?>	
	<!--
	<section class="services-section ftco-section <?php echo ($section_number % 2 != 0 ? ' bg-light' : ''); ?>">
      <div class="container <?php echo ($section_number % 2 == 0 ? ' ftco-relative' : ''); ?>">
      	<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<p class="subheading">кількість статей у розділі: <span class="badge badge-dark"><?= $section->article_count?></span></p>
            <h2 class="mb-4"><?= $section->title ?></h2>
                <p><?= $section->description ?></p> 
              <p><a href="/article?section_id=<?= $section->id ?>" class="btn btn-primary btn-outline-primary mt-4 px-4 py-2">Перейти</a></p>
          </div>
        </div>
      </div>
    </section>	
	-->
		
	<div class="col-lg-4">
		<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative h-250 bg-lighter">
			<div class="col p-4 d-flex flex-column position-static">
				<h2 class="card-title"><a href="#" class="colorlink"><?= $section->title ?></a></h2>
				<p class="card-title mb-4 lead">Кількість статей у розділі: <span class="badge badge-primary"><?= $section->article_count?></span></p>
				<p class="card-text mb-4 ">&nbsp;</p>
				<button type="button" class="btn btn-lg  btn-outline-secondary mt-2  font-weight-bold ">Перейти</button>
			</div>
		</div>
	</div>
	<?php $section_number++;?>
	<?php endforeach; ?>	
			</div>
		</div>
	</div>
</div>




