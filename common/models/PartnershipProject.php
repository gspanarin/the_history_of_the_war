<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;



/**
 * This is the model class for table "partnership_project".
 *
 * @property int $id Ідентифікатор проекту
 * @property int|null $status Статус проекту
 * @property string $title Назва
 * @property string|null $icon Файл іконки проекту
 * @property string $operator Назва
 * @property string $description Анотація
 * @property string $url url
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата корегування
 */
class PartnershipProject extends \yii\db\ActiveRecord{
	
	private const StatusList = [
		0 => 'Прихований',
		1 => 'Опублікований'
	];
	
	public $imageFile;
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
    public static function tableName()
    {
        return 'partnership_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(){
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'operator', 'url'], 'required'],
            [['title', 'operator', 'duration', 'icon', 'url'], 'string', 'max' => 256],
			[['description'], 'string'],
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, bmp'],
			[['imageFile'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'title' => 'Назва',
            'icon' => 'Іконка',
            'operator' => 'Організація/оператор',
			'duration' => 'Тривалість',
            'description' => 'Опис',
            'url' => 'Посилання',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
        ];
    }
	
	/**
	 * 
	 * @return type
	 */
	public static function getStatusList(){
		return self::StatusList;
	}
	
	/**
	 * 
	 * @return type
	 */
	public function getStatusTitle(){
		return $this->StatusList[$this->status];
	}
	
	/**
	 * 
	 * @return boolean
	 */
	public function upload(){
        if ($this->validate()) {
			$path = '/partnership_project/icon/';
			$filename = md5($this->imageFile->baseName) . '-'. $this->imageFile->baseName . '.' . $this->imageFile->extension;
			if (!file_exists(Yii::$app->params['storage_path'] . $path)) {
				mkdir(Yii::$app->params['storage_path'] . $path, 0755, true);
			}
            $this->imageFile->saveAs(Yii::$app->params['storage_path'] . $path . $filename);
			$this->icon = Yii::$app->params['storage_path'] . $path . $filename;
            return true;
        } else {
            return false;
        }
    }
	
	/**
	 * 
	 * @return boolean
	 */
	public function getIcon(){   
        if(file_exists($this->icon) && is_file($this->icon)){
			return base64_encode(file_get_contents($this->icon));
		}else{
            return false;
        }
    }
}
