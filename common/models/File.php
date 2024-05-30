<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class File extends \yii\db\ActiveRecord{

    public function behaviors(){
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['uploaded_at'],
                ],
            ],
        ];
    }
    
    public static function tableName(){
        return '{{%file}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'user_id', 'article_id', 'uploaded_at'], 'integer'],
            [['user_id', 'article_id', 'file_name', 'file_path'], 'required'],
            [['type', 'extension'], 'string', 'max' => 10],
            [['file_name', 'file_path'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::class, 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор файлу',
            'status' => 'Статус',
            'user_id' => 'Ідентифікатор користувача',
            'article_id' => 'Ідентифікатор сттті',
            'type' => 'Тип об\'єкту',
            'extension' => 'Розширення файлу',
            'file_name' => 'Назва файлу',
            'file_path' => 'Шлях до файлу',
            'uploaded_at' => 'Дата завантаження',
        ];
    }
    
    public function getArticle()
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }
    
    public function createIcon(){
        
        switch ($this->extension) {
            case 'pdf':
                $imagick = new \Imagick();
                $imagick->readImage($this->file_path .'[0]');
                $imagick->writeImages(dirname($this->file_path) . '/icon.jpg', false);
                break;
            case 'jpg':
                copy($this->file_path, dirname($this->file_path) . '/icon.jpg');
                break;
            default:
                break;
        }
        

        return true;
    }
}
