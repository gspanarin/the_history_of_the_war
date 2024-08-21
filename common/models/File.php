<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;
/**
 * This is the model class for table "file".
 *
 * @property int $id Ідентифікатор файлу
 * @property int|null $status Статус
 * @property int $user_id Ідентифікатор користувача
 * @property int $article_id Ідентифікатор сттті
 * @property string|null $type Тип об'єкту
 * @property string|null $extension Розширення файлу
 * @property string $file_name Назва файлу
 * @property string $file_path Шлях до файлу
 * @property int|null $uploaded_at Дата завантаження
 *
 * @property Article $article
 */
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
    
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
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
            'id' => 'ID',
            'status' => 'Status',
            'user_id' => 'User ID',
            'article_id' => 'Article ID',
            'type' => 'Type',
            'extension' => 'Extension',
            'file_name' => 'File Name',
            'file_path' => 'File Path',
            'uploaded_at' => 'Uploaded At',
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
    
	//
	//Треба переналаштувати формування шляху і внести зміни у записи у базі
	//
    public function createIcon(){
        //if (file_exists(Yii::$app->params['storage_path'] . $this->file_path)){
		if (file_exists($this->file_path)){
			switch ($this->extension) {
				case 'pdf':
					$imagick = new \Imagick();
					//$imagick->readImage(Yii::$app->params['storage_path'] . $this->file_path .'[0]');
					$imagick->readImage( $this->file_path .'[0]' );
					$imagick->setBackgroundColor('white');
					$imagick->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);
					$imagick->setImageAlphaChannel(\Imagick::ALPHACHANNEL_REMOVE);

					//$imagick->writeImages(dirname(Yii::$app->params['storage_path'] . $this->file_path) . '/icon.jpg', false);
					$imagick->writeImages(dirname($this->file_path) . '/icon.jpg', false);
					$imagick->clear(); 
					$imagick->destroy();
					break;
				case 'jpg':
					//copy($this->file_path, dirname(Yii::$app->params['storage_path'] . $this->file_path) . '/icon.jpg');
					copy($this->file_path, dirname($this->file_path) . '/icon.jpg');
					break;
				default:
					break;
			}
		}else{
			throw new NotFoundHttpException('Нажаль, не вдалось знайти цей файл');
		}

        return true;
    }
	

	/**
	 * Функція повертає шлях до сховища для 
	 * @return string:boolean - повертає або шлях до сховища, або false
	 */
	public function getBasicPath(){
		foreach (Yii::$app->params['storages'] as $storage => $param){
			if ($this->article_id >= $param->ids_start && ($this->article_id <= $param->ids_stop || $param->ids_stop == 0)){
				return $param->path;
			}
		}
		
		return false;
	}
    
}
