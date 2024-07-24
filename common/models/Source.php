<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property int $id Ідентифікатор джерела
 * @property string $title Назва джерела
 * @property string|null $description Опис
 * @property string $url Посилання на джерело/ЗМІ
 * @property string|null $icon іконка/лого
 *
 * @property Article[] $articles
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%source}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['description'], 'string'],
            [['title', 'url', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор джерела',
            'title' => 'Назва джерела',
            'description' => 'Опис',
            'url' => 'Посилання на джерело/ЗМІ',
            'icon' => 'іконка/лого',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasMany(Article::class, ['source_id' => 'id']);
    }
    
    public static function list(){
        $sources = [];
        foreach (Source::find()->select(['id', 'title'])->all() as $source)
           $sources[$source['id']] = $source['title'];
        
        return $sources;
    }
}
