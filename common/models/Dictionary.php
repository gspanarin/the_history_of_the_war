<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dictionary".
 *
 * @property int $id
 * @property int $article_id
 * @property int $tag_id
 * @property string $value
 *
 * @property Article $article
 * @property Tag $tag
 */
class Dictionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dictionary}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'term_name', 'value'], 'required'],
            [['article_id'], 'integer'],
            [['value', 'term_name'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::class, 'targetAttribute' => ['article_id' => 'id']],
            [['term_name'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::class, 'targetAttribute' => ['term_name' => 'term_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'term_name' => 'Term name',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::class, ['term_name' => 'term_name']);
    }
	
	
	public static function getAllTermNames(){
	
		return Dictionary::find()->select('term_name')->indexBy('term_name')->distinct()->column();
	}
}
