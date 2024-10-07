<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Користувачам';
$this->params['breadcrumbs'][] = $this->title;

$this->params['title'] = $this->title;
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="site-for-users">
	<div class="row p-3">
		<div class="col-12">
			<div class="heading-section justify-content-left"><h1><?= Html::encode($this->title) ?></h1></div>           
		</div>
	</div>   

	<div class="container">
		<div class="row mb-5  text-justify">
			<div class="col-12">
				<p>Цифровий архів про російсько-українську війну надає вільний і безкоштовний доступ до своїх матеріалів у форматі 24/7. </p>
				<p>Це означає, що будь-яка зацікавлена особа може переглядати, копіювати та поширювати матеріали архіву, дотримуючись Закону України «<a href="https://ips.ligazakon.net/document/T222811" target="_blank">Про авторське право і суміжні права</a>».</p>
			</div>
			<div class="col-lg-9">
				<div class="mt-4">
					<p class="h3">Мета нашої політики доступу:</p>
					<ul>
						<li>Максимальна відкритість: забезпечити доступ для якомога більшої кількості людей, зацікавлених у подіях російсько-української війни.</li>
						<li>Збереження історичної пам'яті: сприяти дослідженню та вивченню подій війни.</li>
						<li>Підтримка свободи слова: забезпечити поширення достовірної інформації про війну.</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 ">
				<div class="bg-info p-3">
					<p class="text-white text-bold text-left p-2"><span class="icon-exclamation-circle"></span> Ми дотримуємося авторського права, етичних норм та стежимо за збереженням цілісності матеріалів.</p>
				</div>
			</div>
			<div class="col-12">
				<div class="mt-4">
					<p><strong>Важливі зауваження:</strong></p>
					<ul>
						<li><strong>Авторське право. </strong>До архіву надається вільний доступ, необхідно пам'ятати про авторські права на оригінальні матеріали. Використання цих матеріалів у комерційних цілях або з порушенням авторських прав заборонено.</li>
						<li><strong>Етичні норми. </strong>При використанні матеріалів архіву просимо поважати людську гідність та дотримуватися етичних норм.</li>
						<li><strong>Збереження цілісності матеріалів. </strong>Просимо не вносити зміни до матеріалів архіву та посилатися на джерело при їх використанні.
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12">
				<div class="mt-4 p-4 bg-light">
					<h2 class="text-info display-5">Як отримати доступ до архіву:</h2>
					<p>Для доступу до архіву достатньо мати пристрій з підключенням до інтернету та веббраузер. Весь контент архіву доступний онлайн і не вимагає реєстрації.</p>
					<p>Ми постійно працюємо над розширенням доступу до архіву та покращенням його функціоналу. Якщо у вас виникли будь-які питання, звертайтеся до нас:<!-- за допомогою форми зворотного зв'язку.--></p>
					<p><span class="icon-envelope-o"></span> <a href="mailto:warinukrainearchive2022@gmail.com">warinukrainearchive2022@gmail.com</a></p>
				</div>
			</div>  
		</div>        
	</div>
</div>
