<?php

/** @var yii\web\View $this */

$this->title = 'Проект: історія війни';
?>
<div class="site-index">
    <div class="body-content">
<!--
    <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                <span class="subheading">головні колекції</span>
                <h2 class="mb-0">Колекцій ресурсу</h2>
            </div>
        </div>
  
        <div class="row">
            <div class="col-md-12">
                <div class="category-wrap">
                    <div class="row no-gutters">
                    <?php foreach ($sections as $section): ?>
                        <div class="col-md-2">
                            <div class="top-category text-center no-border-left">
                                <h3><a href="/article?section_id=<?= $section->id ?>"><?= $section->title ?></a></h3>
                                <span class="icon flaticon-contact"></span>
                                <p><span class="number"><?= $section->article_count?></span> <span>кількість статей</span></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
        -->
        
		
        
	<?php foreach ($sections as $section): ?>	
	<section class="services-section ftco-section">
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
		
		
		
		
		
		
		<!--
   
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets_new/images/bg-1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-0 bread">Архівування документів про війну</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="#">Історія війни <i class="ion-ios-arrow-round-forward"></i></a></span> <span>page <i class="ion-ios-arrow-round-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>-->
    
    <section class="services-section ftco-section">
      <div class="container">
      	<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">Заголовок</span>
            <h2 class="mb-4">Заголовок</h2>
            <p>Проєкт започаткований Українською бібліотечною асоціацією у березні 2022 р. З липня 2023 р.  його координацію здійснюють фахівці Харківської державної наукової бібліотеки ім. В. Г. Короленка.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-booking bg-light">
    	<div class="container ftco-relative">
    		<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">Заголовок</span>
            <h2 class="mb-4">Заголовок</h2>
            <p>Проєкт започаткований Українською бібліотечною асоціацією у березні 2022 р. З липня 2023 р.  його координацію здійснюють фахівці Харківської державної наукової бібліотеки ім. В. Г. Короленка.</p>
          </div>
        </div>
 
 
    	</div>
    </section>
		
	<section class="ftco-section ftco-pricing">
		<div class="container">
			<div class="row justify-content-center pb-3">
	  <div class="col-md-10 heading-section text-center ftco-animate">
		<span class="subheading">Заголовок</span>
		<h2 class="mb-4">Заголовок</h2>
		<p>Проєкт започаткований Українською бібліотечною асоціацією у березні 2022 р. З липня 2023 р.  його координацію здійснюють фахівці Харківської державної наукової бібліотеки ім. В. Г. Короленка.</p>
	  </div>
	</div>

		</div>
	</section>     
        
        
        
        
        
        <!--
        
        
        
        
        <br>
        <br><br><br><br><br><br><br>
        
        
        
        
        
        
        <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
          	<span class="subheading">Job Categories</span>
            <h2 class="mb-0">Top Categories</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate fadeInUp ftco-animated">
        		<ul class="category text-center">
        			<li><a href="#">Web Development <br><span class="number">354</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Graphic Designer <br><span class="number">143</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Multimedia <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Advertising <br><span class="number">90</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate fadeInUp ftco-animated">
        		<ul class="category text-center">
        			<li><a href="#">Education &amp; Training <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">English <br><span class="number">200</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Social Media <br><span class="number">300</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Writing <br><span class="number">150</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate fadeInUp ftco-animated">
        		<ul class="category text-center">
        			<li><a href="#">PHP Programming <br><span class="number">400</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Project Management <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Finance Management <br><span class="number">222</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Office &amp; Admin <br><span class="number">123</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate fadeInUp ftco-animated">
        		<ul class="category text-center">
        			<li><a href="#">Web Designer <br><span class="number">324</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Customer Service <br><span class="number">564</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Marketing &amp; Sales <br><span class="number">234</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Software Development <br><span class="number">425</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        </div>
    	</div>
    </section>
        -->
    </div>
</div>
