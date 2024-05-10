<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag_input_type".
 *
 * @property int $id Ідентифікатор методу вводу
 * @property string $name Назва методу вводу
 * @property string|null $description Опис методу вводу
 *
 * @property Tag[] $tags
 */
class TagInputType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag_input_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор методу вводу',
            'name' => 'Назва методу вводу',
            'description' => 'Опис методу вводу',
        ];
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['input_type' => 'id']);
    }
    
    public static function getList(){
        return  TagInputType::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();
    }
}
