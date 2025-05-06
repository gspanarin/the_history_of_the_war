<?php


use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = "Зворотний зв'язок";
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="feedback-send">
    <div class="row heading-section justify-content-left p-4">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        Якщо у вас є пропозиції або запитання, будь ласка, заповніть форму нижче та надішліть їх нам. Дякуємо за зворотний зв'язок!
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'feedback']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label("Ім'я") ?>

                <?= $form->field($model, 'email')->label("E-mail") ?>

                <?= $form->field($model, 'subject')->label("Тема") ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->label("текст повідомлення") ?>

                <?= $form->field($model, 'verifyCode')->label("Код перевірки")->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Відправити', ['class' => 'btn btn-primary', 'name' => 'send-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
