<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Article;
use common\models\File;

class UploadForm extends Model{
    
    public $files;

    
    public function rules(){
        return [
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, avi, mp3, pdf, txt, doc', 'maxFiles' => 10],
        ];
    }
    
    
    public function upload($article){
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $fileDB = new File([
                    'article' => $article,
                    'file' => $file]);
                $file->saveAs($fileDB->file_path);
                $fileDB->save();
            }
            return true;
        } else {
            return false;
        }
    }
}