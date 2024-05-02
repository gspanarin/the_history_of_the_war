<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "page".
 *
 * @property int $id Ідентифікатор сторінки
 * @property int|null $status Статус сторінки
 * @property string|null $type Тип
 * @property string $alias Аліас
 * @property string $title Заголовок
 * @property string|null $body Матеріал сторінки
 * @property int|null $created_at Створена
 * @property int|null $updated_at Оновлена
 */
class Page extends \yii\db\ActiveRecord{
    
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
    
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['alias', 'title'], 'required'],
            [['body'], 'string'],
            [['type', 'alias', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор сторінки',
            'status' => 'Статус сторінки',
            'type' => 'Тип',
            'alias' => 'Аліас',
            'title' => 'Заголовок',
            'body' => 'Матеріал сторінки',
            'created_at' => 'Створена',
            'updated_at' => 'Оновлена',
        ];
    }
}
