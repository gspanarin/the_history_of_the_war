<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Шановний(на), <?= $user->username ?>,

Ви отримали цього листа, тому що ви, або хтось інший, натиснули кнопку Відновлення пароля на сайті проєкту. Якщо це були не ви, просто проігноруйте цей лист.

Перейдіть за цим посиланням, щоб скинути свій пароль:

<?= $resetLink ?>

