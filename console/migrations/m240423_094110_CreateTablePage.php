<?php

use yii\db\Migration;

class m240423_094110_CreateTablePage extends Migration{

    public function safeUp(){
        $this->createTable('page', [
            'id' => $this->primaryKey()->comment('Ідентифікатор сторінки'),
            'status' => $this->integer()->defaultValue(0)->comment('Статус сторінки'),
            'type' => $this->string()->comment('Тип'),
            'alias' => $this->string()->notNull()->comment('Аліас'),
            'title' => $this->string()->notNull()->comment('Заголовок'),
            'body' => $this->text()->comment('Матеріал сторінки'),
            'created_at' => $this->integer()->comment('Створена'),
            'updated_at' => $this->integer()->comment('Оновлена'),
        ]);
        
        return true;
    }

    public function safeDown(){
        $this->dropTable('page');

        return true;
    }

}
