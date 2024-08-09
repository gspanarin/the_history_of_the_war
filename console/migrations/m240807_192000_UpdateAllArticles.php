<?php

use yii\db\Migration;
use common\models\Article;
use common\models\Tag;

class m240807_192000_UpdateAllArticles extends Migration{

    public function safeUp(){
	
		$tags = Tag::find()->where(['like', 'term_name', '%%:%%', false])->all();
		foreach ($tags as $tag){
			$tag->term_name = str_replace(':', '_', $tag->term_name);
			$tag->save();
		}
		
		//=============================================
		$this->truncateTable('dictionary');
		//=============================================
		$articles = Article::find()->all();
		foreach ($articles as $article){
			$article->refreshTag();
			$article->save();
		}
			
		return true;
    }


    public function safeDown(){
        echo "m240807_192000_UpdateAllArticles cannot be reverted.\n";

        return false;
    }

   
}
