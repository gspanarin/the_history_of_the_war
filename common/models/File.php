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
