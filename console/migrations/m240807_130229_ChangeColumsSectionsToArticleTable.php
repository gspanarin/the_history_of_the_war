<?php

use yii\db\Migration;


class m240807_130229_ChangeColumsSectionsToArticleTable extends Migration{

    public function safeUp(){
		$this->alterColumn('article', 'section_id_2', $this->integer(11)->null()->defaultValue(0));
		$this->alterColumn('article', 'section_id_3', $this->integer(11)->null()->defaultValue(0));
    }

   
}
