<?php

/** @var yii\web\View $this */
$section_number = 0;
use yii\helpers\Html;


$this->title = Html::encode(Yii::$app->name);
?>
<div class="site-index">
    <div class="body-content">

	<?php foreach ($sections as $section): ?>	
	<section class="ftco-section <?php echo ($section_number % 2 ? ' bg-light' : ''); $section_number++; ?>">
      <div class="container">
      	<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">Заголовок</span>
            <h2 class="mb-4"><a href="/article?section_id=<?= $section->id ?>"><?= $section->title ?></h2></a>
            <p>Проєкт започаткований Українською бібліотечною асоціацією у березні 2022 р. З липня 2023 р.  його координацію здійснюють фахівці Харківської державної наукової бібліотеки ім. В. Г. Короленка.</p>
			<p><span>кількість статей у розділі: <span class="number"><?= $section->article_count?></span></span></p>
          </div>
        </div>
      </div>
    </section>	
	<?php endforeach; ?>	
		
    </div>
</div>
