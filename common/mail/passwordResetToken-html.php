<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Шановний(на), <?= Html::encode($user->username) ?>,</p>

	<p>Ви отримали цього листа, тому що ви, або хтось інший, натиснули кнопку Відновлення пароля на сайті проєкту. Якщо це були не ви, просто проігноруйте цей лист.</p>
	
    <p>Перейдіть за цим посиланням, щоб скинути свій пароль:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
