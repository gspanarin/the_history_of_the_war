<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Feedback;
/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        
        
        $feedback = new Feedback();
        $feedback->name = $this->name;
        $feedback->email = $this->email;
        $feedback->subject = $this->subject;
        $feedback->body = $this->body;
        return $feedback->save();
        
        /*return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody(
                'E-mail відправника: ' . $this->email . "\r\n".
                "Ім'я відправника: " . $this->name .  "\r\n".
                'Тема повідомлення: ' . $this->subject . "\r\n".
                'Текст повідомлення: ' . $this->body
                )
            ->send();*/
    }
}
