<?php

use yii\db\Migration;
use common\models\Article;

class m240810_120543_RepairArticleMetadata extends Migration{

    public function safeUp(){
		$this->execute(file_get_contents(__DIR__ .'/db_sql/article_20240809.sql')); 
		
		$articles = Article::find()->where(['<','id', 1043])->all();
		//$articles = Article::find()->where(['id' => 200])->all();
		foreach ($articles as $article){
			$sql = 'select metadata from article_20240809 where id = ' . $article->id;
			$article_20240809 = \Yii::$app->getDb()->createCommand($sql)->queryAll();
			if ($article_20240809){
				$article->metadata = $article_20240809[0]['metadata'];
				$article->refreshTag();
				$article->save();
			}
		}
		
		return true;
    }


    public function safeDown(){
        $this->dropTable('article_20240809');

        return true;
    }

}
