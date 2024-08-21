<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Шановний(на), <?= $user->username ?>,

Будь ласка, перейдіть за посиланням, щоб підтвердити ваш email:

<?= $verifyLink ?>
