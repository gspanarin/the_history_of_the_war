<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class File extends \yii\db\ActiveRecord{

    
    public function __construct($param = []) {
        parent::init();
        if (isset($param['article']) && $this->article_id == null)    
            $this->article_id = $param['article']->id;        
        if (isset($param['file']) && $this->extension == null)
            $this->extension = $param['file']->extension;
        if (isset($param['file']) & $this->file_name == null)
            $this->file_name = $param['file']->name;
        if (isset($param['article']) && isset($param['file']) && $this->file_path == null)
            $this->file_path = $this->createPath($param['article'])  . '/' . $this->file_name;
        if ($this->user_id == null)
            $this->user_id = Yii::$app->user->getId();
    }
    
    
    public function rules(){
        return [
            [['status', 'uploaded_at', 'article_id', 'user_id'], 'integer'],
            [['user_id', 'article_id', 'file_name', 'file_path'], 'required'],
            [['file_name', 'file_path'], 'string', 'max' => 255],
            [['type', 'extension'], 'string', 'max' => 10],
        ];
    }
    
    
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

    
    private function createPath(Article $article){
        $path[] = date('Y', $article->created_at);
        $path[] = date('m', $article->created_at);
        $path[] = $article->id;

        $currentFolder = Yii::$app->params['storage_path'];
        foreach ($path as $folder){
            if (!file_exists($currentFolder . '//' . $folder))
                mkdir($currentFolder . '//' . $folder);
            $currentFolder .= '//' . $folder;
        }
        
        return Yii::$app->params['storage_path'] . implode('//', $path);
    }
}
