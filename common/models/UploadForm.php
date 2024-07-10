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
            [['files'], 'file', 'skipOnEmpty' => false,  'extensions' => Yii::$app->params['backend.article.upload_file_extensions'], 'maxFiles' => 5],            
        ];
    }
    
    /*
     * ToDo:
     * валідацію типів перенести у окрему функцію і прибрати із rules()
     * На поточний момент при обранні декількох файлів і наявності одного файлу недозволеного формату, не завантажуються усі файли
     */
    public function upload($article){
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $path = $this->createPath($article) . '/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $fileDB = new File();
                $fileDB->user_id = Yii::$app->user->getId();
                $fileDB->extension = $file->extension;
                //$fileDB->type = 'main';
                $fileDB->file_name = $file->name;
                $fileDB->file_path = $path;
                $fileDB->article_id = $article->id;
                $fileDB->save();
            }
            return true;
        } else {
            return false;
        }
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