<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Користувачам';
$this->params['breadcrumbs'][] = $this->title;

$this->params['title'] = $this->title;
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="site-about">
	<div class="row heading-section justify-content-left p-4">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
   
	<section class="ftco-section ftco-degree-bg">
		<div class="container">
			<div class="row text-justify">
				<p >Цифровий архів про російсько-українську війну надає вільний і безкоштовний доступ до своїх матеріалів у форматі 24/7. Це означає, що будь-яка зацікавлена особа може переглядати, копіювати та поширювати матеріали архіву, дотримуючись Закону України «<a href="https://ips.ligazakon.net/document/T222811">Про авторське право і суміжні права</a>».</p>
				<p>Мета нашої політики доступу:</p>
				<ul>
					<li>Максимальна відкритість: забезпечити доступ для якомога більшої кількості людей, зацікавлених у подіях російсько-української війни.</li>
					<li>Збереження історичної пам'яті: сприяти дослідженню та вивченню подій війни.</li>
					<li>Підтримка свободи слова: забезпечити поширення достовірної інформації про війну.</li>
				</ul>
				<p><strong>Важливі зауваження:</strong></p>
				<ul>
					<li>Авторське право. До архіву надається вільний доступ, необхідно пам'ятати про авторські права на оригінальні матеріали. Використання цих матеріалів у комерційних цілях або з порушенням авторських прав заборонено.</li>
					<li>Етичні норми. При використанні матеріалів архіву просимо поважати людську гідність та дотримуватися етичних норм.</li>
					<li>Збереження цілісності матеріалів. Просимо не вносити зміни до матеріалів архіву та посилатися на джерело при їх використанні.
					</li>
				</ul>
				<p>&nbsp;</p>
				<h2>Як отримати доступ до архіву:</h2>
				<p>Для доступу до архіву достатньо мати пристрій з підключенням до інтернету та веб-браузер. Весь контент архіву доступний онлайн і не вимагає реєстрації.</p>
				<p>Ми постійно працюємо над розширенням доступу до архіву та покращенням його функціоналу. Якщо у вас виникли будь-які питання, звертайтеся до нас за допомогою форми зворотного зв'язку.</p>
			</div>
		</div> 
	</section>
</div>