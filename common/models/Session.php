<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Session extends \yii\db\ActiveRecord{
   
    public static function tableName(){
        return '{{%session}}';
    }

}
