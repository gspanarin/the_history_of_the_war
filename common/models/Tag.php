<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "Tag".
 *
 * @property int $id Ідентификатор поля
 * @property string $term_name Назва поля
 * @property string $label Підпис поля
 * @property string $uri uri
 * @property string $definition Опис поля
 * @property string|null $comment Комментар для застосування
 * @property string|null $note Примітка
 * @property string|null $default_value Значення за замовчуванням
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата корегування
 */
class Tag extends \yii\db\ActiveRecord{

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
        return '{{%tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_name', 'label', 'uri', 'definition'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['term_name', 'label', 'uri', 'definition', 'note', 'default_value'], 'string', 'max' => 255],
            [['comment'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентификатор поля',
            'term_name' => 'Назва поля',
            'label' => 'Підпис поля',
            'uri' => 'uri',
            'definition' => 'Опис поля',
            'comment' => 'Комментар для застосування',
            'note' => 'Примітка',
            'default_value' => 'Значення за замовчуванням',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
        ];
    }
    
    public static function getTagIdByName($tag){
        $result = Tag::find()->where(['term_name' => $tag])->select('id')->one();
        
        return $result->id;
    }
}
