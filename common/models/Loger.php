<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Loger extends \yii\db\ActiveRecord{
    
    public function behaviors(){
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }
    
    public static function tableName(){
        return 'statistic';
    }

    public function attributeLabels(){
        return [
            'id' => 'Ідентификатор поля',
            'created_at' => 'Дата створення',
        ];
    }
}
