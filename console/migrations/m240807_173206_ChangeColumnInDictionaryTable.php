<?php

use yii\db\Migration;

/**
 * Class m240807_173206_ChangeColumnInDictionaryTable
 */
class m240807_173206_ChangeColumnInDictionaryTable extends Migration{

    public function safeUp(){
		$this->alterColumn('tag', 'term_name', $this->string()->notNull()->unique()->comment('Назва поля'));
		
		// ===================================================
        $this->dropForeignKey('fk-dictionary-tag_id', 'dictionary');
        $this->dropIndex('idx-tag_id', 'dictionary');
		$this->dropColumn('dictionary', 'tag_id');
		
		//=====================================================
		
		$this->addColumn('dictionary', 'term_name', $this->string()->notNull()->after('article_id')->comment('Назва поля'));
		$this->createIndex('idx-term_name', 'dictionary', 'term_name');
		
		return true;
    }

    
    public function safeDown(){
        echo "m240807_173206_ChangeColumnInDictionaryTable cannot be reverted.\n";

        return false;
    }

}
