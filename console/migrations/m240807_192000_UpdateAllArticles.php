<?php

use yii\db\Migration;
use common\models\Article;

class m240807_192000_UpdateAllArticles extends Migration{

    public function safeUp(){
		$this->truncateTable('dictionary');
		
		$articles = Article::find()->all();
		foreach ($articles as $article){
			$article->save();
		}
			
    }


    public function safeDown(){
        echo "m240807_192000_UpdateAllArticles cannot be reverted.\n";

        return false;
    }

   
}
