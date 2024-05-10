<?php

use yii\db\Migration;

class m240509_055303_AddColumnInputTypeToTag extends Migration{

    public function safeUp(){
        $this->addColumn('tag', 'input_type', $this->integer()->defaultValue(null)->comment('Тип методу вводу')->after('default_value'));
        $this->addColumn('tag', 'input_source', $this->integer()->comment('Джерело вводу')->after('input_type'));
        
        return true;
    }

    public function safeDown(){
        $this->dropColumn('tag', 'input_type');
        $this->dropColumn('tag', 'input_source');
        
        return false;
    }
}
