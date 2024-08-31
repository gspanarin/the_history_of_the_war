<?php

/** @var yii\web\View $this */
$section_number = 1;
use yii\helpers\Html;


$this->params['title'] = $this->title = Html::encode(Yii::$app->name);
$this->params['subtitle'] = Html::encode('проєкт');
?>
<div class="site-index">
    <div class="body-content">

	<?php foreach ($sections as $section): ?>	
		
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
		
	<?php $section_number++;?>
	<?php endforeach; ?>	


    </div>
</div>
