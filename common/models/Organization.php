<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "organization".
 *
 * @property int $id Ідентифікатор організації
 * @property int|null $status Статус
 * @property string $name Повна назва
 * @property string $short_name Скорочена назва
 * @property string|null $url URL сторінки
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата корегування
 */
class Organization extends \yii\db\ActiveRecord{
    
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
    public static function tableName()
    {
        return '{{%organization}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'short_name'], 'required'],
            [['name', 'short_name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор організації',
            'status' => 'Статус',
            'name' => 'Повна назва',
            'short_name' => 'Скорочена назва',
            'url' => 'URL сторінки',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
        ];
    }
}
