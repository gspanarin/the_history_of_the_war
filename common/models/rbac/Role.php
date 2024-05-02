<?php

namespace common\models\rbac;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Role extends \yii\db\ActiveRecord{
    
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
    
    public static function tableName(){
        return 'auth_item';
    }

    public static function primaryKey(){
    	return ['name'];
    }
        
    public function rules(){
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'type'], 'required'],
            [['description', 'rule_name',], 'string'],
            [['data'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Назва ролі',
            'type' => 'Тип',
            'description' => 'Опис ролі',
            'rule_name' => 'Назва правила для ролі',
            'data' => '???',
            'created_at' => 'Створена',
            'updated_at' => 'Оновлена',
        ];
    }
    
    public static function test($foo = ''){
        return '!!!!!' . $foo . '!!!!!';
    }

}
