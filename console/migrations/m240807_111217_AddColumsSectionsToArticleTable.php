<?php

use yii\db\Migration;

class m240807_111217_AddColumsSectionsToArticleTable extends Migration{
	
    public function safeUp(){
		$this->addColumn('article', 'section_id_2', $this->integer(11)->notNull()->defaultValue(0)->comment('Другий Розділ/тематика')->after('section_id'));
		$this->addColumn('article', 'section_id_3', $this->integer(11)->notNull()->defaultValue(0)->comment('Третій Розділ/тематика')->after('section_id_2'));
		
		return true;
    }


    public function safeDown(){
        $this->dropColumn('tag', 'section_id_2');
		$this->dropColumn('tag', 'section_id_3');
		
        return true;
    }
}
