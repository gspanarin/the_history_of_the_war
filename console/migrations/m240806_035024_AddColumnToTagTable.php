<?php

use yii\db\Migration;


class m240806_035024_AddColumnToTagTable extends Migration{

    public function safeUp(){
		$this->addColumn('tag', 'ord', $this->integer(11)->notNull()->defaultValue(0)->comment('Порядок сортування полів')->after('input_source'));
		//ALTER TABLE `tag` ADD `ord` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Порядок сортування полів' AFTER `input_source`, ADD UNIQUE `ord` (`ord`(11));
		
		return true;
    }


    public function safeDown(){
        $this->dropColumn('tag', 'ord');

        return true;
    }

    
}
