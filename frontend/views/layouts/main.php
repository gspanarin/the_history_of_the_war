<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="uk">
  <head>
    <title>Проєкт «Архівування документів про війну»</title>
	<meta name="description" content="Архівування документів про війну Харківська державна наукова бібліотека імені В.Г Короленка">
	<meta name="author" content="ХДНБ ім. В. Г. Короленка">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php $this->registerCsrfMetaTags() ?>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets_new/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets_new/css/animate.css">
    
    <link rel="stylesheet" href="/assets_new/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets_new/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets_new/css/magnific-popup.css">

    <link rel="stylesheet" href="/assets_new/css/aos.css">

    <link rel="stylesheet" href="/assets_new/css/ionicons.min.css">

    <link rel="stylesheet" href="/assets_new/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets_new/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/assets_new/css/flaticon.css">
    <link rel="stylesheet" href="/assets_new/css/icomoon.css">
    <link rel="stylesheet" href="/assets_new/css/style.css">
      
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  </head>
  <body>
<?php $this->beginBody() ?>
	  	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="https://korolenko.kharkov.com/"><img src="/assets_new/images/logo.svg" width="25" alt=""/>  ХДНБ ім. В.Г.Короленка</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Меню
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="/" class="nav-link">Головна</a></li>
	        	<li class="nav-item"><a href="/" class="nav-link">Про проєкт</a></li>
	        	<li class="nav-item"><a href="/" class="nav-link">Колекції</a></li>
	        	<li class="nav-item"><a href="/" class="nav-link">Користівачам</a></li>
	          <li class="nav-item"><a href="/" class="nav-link">Контакти</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	
	
	
		<div class="container">
			<section class="hero-wrap hero-wrap-2" style="background-image: url('/assets_new/images/bg.png'); background-size: cover; max-width:100%;" data-stellar-background-ratio="0.5">
				<div class="container-fluid">
	
						<div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
							<div class="col-md-9 ftco-animate pb-5 text-center">
								<p class="font-weight-light text-white text-uppercase">проєкт</p>
								<h1 class="mb-0 bread">Архівування документів про війну</h1>
								<p class="subheading mt-5 text-white ">Ініціатор проєкту – ВГО Українська бібліотечна асоціація</p>
							</div>
						</div>
					
				</div>
			</section>

			
			
			<section >
				<div class="container-fluid">
					<div class="container">   
					<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
					</div>
				</div>
			</section>
			
			
			
			
			
			
			
			<?= Alert::widget() ?>
			<?= $content ?>
		</div>



<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?>  2022-<?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<script src="/assets_new/js/jquery.min.js"></script>
	<script src="/assets_new/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="/assets_new/js/popper.min.js"></script>
	<script src="/assets_new/js/bootstrap.min.js"></script>
	<script src="/assets_new/js/jquery.easing.1.3.js"></script>
	<script src="/assets_new/js/jquery.waypoints.min.js"></script>
	<script src="/assets_new/js/jquery.stellar.min.js"></script>
	<script src="/assets_new/js/owl.carousel.min.js"></script>
	<script src="/assets_new/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets_new/js/aos.js"></script>
	<script src="/assets_new/js/jquery.animateNumber.min.js"></script>
	<script src="/assets_new/js/bootstrap-datepicker.js"></script>
	<script src="/assets_new/js/jquery.timepicker.min.js"></script>
	<script src="/assets_new/js/scrollax.min.js"></script>
	<script src="/assets_new/js/google-map.js"></script>
	<script src="/assets_new/js/main.js"></script>
	
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= Yii::$app->params['google_analytics_code'] ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '<?= Yii::$app->params['google_analytics_code'] ?>');
</script>
<?php $this->endBody() ?>	
</body>
</html>
<?php $this->endPage();
