<?php

use yii\db\Migration;

class m240406_134307_CreateTableOrganization extends Migration{

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable(
            '{{%organization}}', 
            [
                'id' => $this->primaryKey()->comment('Ідентифікатор організації'),
                'alias' => $this->string()->comment('Alias для організації')->notNull(),
                'status' => $this->integer()->defaultValue(0)->comment('Статус'),
                'name' => $this->string()->comment('Повна назва')->notNull(),
                'short_name' => $this->string()->comment('Скорочена назва')->notNull(),
                'url' => $this->string()->comment('URL сторінки'),
                'created_at' => $this->integer()->comment('Дата створення'),
                'updated_at' => $this->integer()->comment('Дата корегування'),
            ],
            $tableOptions);
        
        return true;
    }

    public function safeDown(){
        $this->dropTable('{{%organization}}');
        
        return true;
    }
}
