<?php

use yii\db\Migration;

class m250506_035833_CreateTableFeedback extends Migration{
    private $table_name = 'feedback';

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'name' =>  $this->string()->notNull()->comment('Ім\'я'),
            'email' => $this->string()->notNull()->comment(''),
            'subject' => $this->string()->notNull()->comment('Тема'),
            'body' => $this->text()->notNull()->comment('Повідомлення'),
            'created_at' => $this->integer()->notNull()->comment('Дата створення'),
            'updated_at' => $this->integer()->notNull()->comment('Дата корегування'),
            'status' => $this->integer()->defaultValue(0)->comment('Статус'),
        ], $tableOptions);
        
        return true;
    }

    public function safeDown(){
        $this->dropTable($this->table_name);

        return true;
    }

}
