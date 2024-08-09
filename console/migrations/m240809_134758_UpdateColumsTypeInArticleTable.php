<?php

use yii\db\Migration;
use common\models\Article;

class m240809_134758_UpdateColumsTypeInArticleTable extends Migration{

    public function safeUp(){
		$this->alterColumn('article', 'view', $this->integer()->defaultValue(0)->comment('Кількість переглядів'));
		$this->alterColumn('article', 'share', $this->integer()->defaultValue(0)->comment('Кількість перепостів'));
		$this->alterColumn('article', 'average_score', $this->integer()->defaultValue(0)->comment('Середня оцінка'));
		//=============================================
		Article::updateAll(['view' => 0, 'share' => 0, 'average_score' => 0]);
		
    }


    public function safeDown(){
        echo "m240809_134758_UpdateColumsTypeInArticleTable cannot be reverted.\n";

        return false;
    }

}
