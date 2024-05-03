<?php

use yii\db\Migration;

//https://www.dublincore.org/specifications/dublin-core/dcmi-terms/
class m240409_121758_CreateTableTag extends Migration{

    public function safeUp(){
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey()->comment('Ідентификатор поля'),
            'term_name' => $this->string()->notNull()->comment('Назва поля'),
            'label' => $this->string()->notNull()->comment('Підпис поля'),
            'uri' => $this->string()->notNull()->comment('uri'),
            'definition' => $this->string()->notNull()->comment('Опис поля'),
            'comment' => $this->text()->comment('Комментар для застосування'),
            'note' => $this->string()->comment('Примітка'),
            'default_value' => $this->string()->comment('Значення за замовчуванням'),
            'created_at' => $this->integer()->comment('Дата створення'),
            'updated_at' => $this->integer()->comment('Дата корегування'),
        ]);
        
        return true;
    }   

    public function safeDown(){
        $this->dropTable('{{%tag}}');

        return true;
    }

   
}
