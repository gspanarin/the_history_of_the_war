<?php

/** @var \yii\web\View $this */
/** @var string $content */

//use yii;
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
    <!-- ----------------это все меняем------------------->          
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">  <a class="navbar-brand" href="/"><img src="/assets_new/images/logo.svg" width="28" alt=""/> <span>Цифровий&nbsp;архів</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"><span class="oi oi-menu"></span> Меню</button>
            
    <!-- ----------------надо прописать ссылки для меню------------------->    
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'about' ? ' active ':'') ?>"><a href="/site/about" class="nav-link">Про архів</a></li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'for-members' ? ' active ':'') ?>"><a href="/site/for-members" class="nav-link">Учасникам проєкту</a></li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'collections' ? ' active ':'') ?>"><a href="/site/collections" class="nav-link">Путівник</a></li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'for-users' ? ' active ':'') ?>"><a href="/site/for-users" class="nav-link">Користувачам</a></li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'contact' ? ' active ':'') ?>"><a href="/site/contact" class="nav-link">Контакти</a></li>
                </ul>
            </div>
        </div>
    </nav> 
      
 <!-- ----------------2 варианта вывода заголовка: для индекса Н1 и для остальных страниц ------------------->    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/assets_new/images/bg.png'); background-size: cover; max-width:100%;" data-stellar-background-ratio="0.5">
        <div class="container-fluid">
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-lg-10 heading-section  ftco-animate text-center  mb-1">
                        <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') {?>
						<h1>Архівування документів про війну</h1> <!--ТОЛЬКО для главной страниці-->
						<?php }else{?>
                        <p class="h1">Архівування документів про війну</p> <!-- для всех остальных-->
						<?php } ?>
                    </div>
            </div>
        </div>
    </section>  
      
 <!-- ----------------тут вставить свою форму поиска. Фильтры будут ниже в _sup_footer.php------------------->   
 <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') {?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 ftco-animate">
                    <div class="text-center ftco-animate">
                        <!- начало вставки формы поиска--->
                        <form action="/article" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" name="qwery" class="form-control" placeholder="Шукати...">
                            </div>
                        </form>
                        <!- конец формы поиска--->
                    </div>     
                </div>    
            </div>
        </div>
    </section>  
<?php } ?>
    <!--breadcrumb-->  
    <section >
        <div class="container-fluid">
            <div class="container"> 
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->       

 <!-- будем делать тут дополнительную информацию -->        
    <section class=" ftco-section">
        <div class="container ">
            <?= $content ?>
            <?= Alert::widget() ?>
        </div>
    </section>	                    
<!-- ФУТЕР. в идеале все лучше делать require, чтобы потом при редактировании было удобней-->           
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5"><!--  ml-md-5-->
                <div class="col-lg">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Розділи</h2>
<ul class="list-unstyled">
         <li><a href="#" class="py-2 d-block">Державна політика   </a></li>
         <li><a href="#" class="py-2 d-block">Докази російської агресії   </a></li>
         <li><a href="#" class="py-2 d-block">Докази українського спротиву   </a></li>
         <li><a href="#" class="py-2 d-block">Волонтерський рух в Україні   </a></li>
         <li><a href="#" class="py-2 d-block">Міжнародна підтримка</a></li>
         <li><a href="#" class="py-2 d-block">Культура під час війни  </a></li> 
</ul>
					</div>
				</div>
                <div class="col-lg">
					<div class="ftco-footer-widget mb-4 ">
					    <h2 class="ftco-heading-2">Інформація</h2>
<ul class="list-unstyled">
                <li><a href="/site/collections" class="py-2 d-block">Путівник</a></li>
                <li><a href="/site/for-members" class="py-2 d-block">Учасникам проєкту</a></li>
                <li><a href="/site/for-users" class="py-2 d-block">Користувачам</a></li>
                <li><a href="/site/legal-policy" class="py-2 d-block">Правова політика</a></li>
</ul>
					</div>
				</div>
                <div class="col-lg">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2 logo">Про архів</h2>
 <p>Проєкт «Архівування документів про війну» об'єднав зусилля бібліотекарів з усієї України з метою створення цифрового архіву, що відображає події російсько-української війни. </p>
<p><a href="/site/about" class="text-white"><u>Докладніше ... </u></a></p>
					</div>
				</div>
                <div class="col-lg">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2"><span class="font-weight-light">Є питання? </span><br>Ми на зв'язку!</h2>
<div class="block-23 mb-3">
<div class="tagcloud"><a href="mailto:warinukrainearchive2022@gmail.com" class="tag-cloud-link text-white">warinukrainearchive2022@gmail.com</a></div>
</div>

<!--<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
</ul>-->
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                <p>&copy;2022-<script>document.write(new Date().getFullYear());</script> <strong>«Архівування документів про війну»</strong></p>
                </div>
            </div>
        </div>
    </footer>


<!-- ----------------ниже оставляем как есть------------------->             
      
  <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
    </div>
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