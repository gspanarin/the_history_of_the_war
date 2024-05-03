<?php

use yii\db\Migration;

class m240503_102537_CreateTableTask extends Migration{

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey()->comment(''),
            'status' => $this->integer(1)->defaultValue(0)->comment(''),
            'title' => $this->string()->notNull()->comment(''),
            'description' => $this->text()->defaultValue('')->comment(),
            'user_id' => $this->integer()->notNull()->comment(''),
            'created_at' => $this->integer()->notNull()->comment(''),
            'updated_at' => $this->integer()->notNull()->comment(''),
            
        ],$tableOptions);
    }

    public function safeDown(){
        $this->dropTable('{{%task}}');

        return false;
    }

}
