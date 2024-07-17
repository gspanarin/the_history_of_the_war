<?php

namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\File;
use Smalot\PdfParser\Parser;

//yii file/extract-text-from-pdf

class FileController extends Controller{
    

    /**
     * Функція, яка обирає файл із розширенням pdf та намагається вивантажити з них текстовий рівень
     * текст буде попадати у таблицю для пошуку
     */
    public function actionExtractTextFromPdf(){
        $file = File::find()->where(['status' => 0, 'extension' => 'pdf'])->one();
        
        // Parse pdf file using Parser library 
        $parser = new \Smalot\PdfParser\Parser(); 
        $pdf = $parser->parseFile($file->file_path); 
 
        // Extract text from PDF 
        $textContent = $pdf->getText();
        

                
        
        dd($textContent);
        
    }
    
    
}
