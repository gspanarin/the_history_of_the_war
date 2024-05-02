<?php

use yii\db\Migration;

class m240418_112851_AddColumnToUser extends Migration{

    public function safeUp(){
        $this->addColumn('user', 'full_name', $this->string(128)->comment("Повне ім'я"));
        $this->addColumn('user', 'organization_id', $this->integer()->comment('Назва закладу'));
        $this->addForeignKey('fk-user-organization_id',
            'user',
            'organization_id',
            'organization',
            'id',
            'CASCADE');
        
        return true;
    }

    public function safeDown(){
        $this->dropColumn('user', 'full_name');
        $this->dropColumn('user', 'organization_id');
        $this->dropForeignKey('fk-user-organization_id', 'user');
        
        return true;
    }
}
