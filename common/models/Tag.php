<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\TagInputType;
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
            [['term_name', 'label', 'uri', 'definition', 'note', 'default_value', 'input_type', 'input_source'], 'string', 'max' => 255],
            [['comment'], 'string'],
            [['input_type'], 'exist', 'skipOnError' => true, 'targetClass' => TagInputType::class, 'targetAttribute' => ['input_type' => 'id']],
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
            'input_type' => 'Тип методу вводу',
            'input_source' => 'Джерело вводу',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
        ];
    }
    
    /**
     * Gets query for [[Dictionaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDictionaries()
    {
        return $this->hasMany(Dictionary::class, ['tag_id' => 'id']);
    }

    /**
     * Gets query for [[InputType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInputTypeMethod(){        
        $method = TagInputType::findOne($this->input_type); 

        return isset($method) ? $method->name : null;
    }
    
    public function getInputTypeStandartValue(){        
        $list = AuthorityValue::find()
                ->select(['value', 'id'])
                ->where(['authority_type_id' => $this->input_source])
                ->indexBy('id')
                ->column();; 

        return $list;
    }
    
    public static function getTagIdByName($tag){
        $result = Tag::find()->where(['term_name' => $tag])->select('id')->one();
        
        return $result->id;
    }
}
