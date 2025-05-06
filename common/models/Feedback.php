<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name Ім'я
 * @property string $email
 * @property string $subject Тема
 * @property string $body Повідомлення
 * @property int $created_at Дата створення
 * @property int $updated_at Дата корегування
 * @property int|null $status Статус
 */
class Feedback extends \yii\db\ActiveRecord{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * 
     * @return type
     */
    public function behaviors(){
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => 0],
            [['name', 'email', 'subject', 'body'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ім\'я',
            'email' => 'Email',
            'subject' => 'Тема',
            'body' => 'Повідомлення',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
            'status' => 'Статус',
        ];
    }

}
