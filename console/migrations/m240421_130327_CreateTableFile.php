<?php

use yii\db\Migration;

class m240421_130327_CreateTableFile extends Migration{

    public function safeUp(){
        $this->createTable('file', [
            'id' => $this->primaryKey()->comment('Ідентифікатор файлу'),
            'status' => $this->integer(1)->defaultValue(0)->comment('Статус'),
            'user_id' => $this->integer()->notNull()->comment('Ідентифікатор користувача'),
            'article_id' => $this->integer()->notNull()->comment('Ідентифікатор сттті'),
            'type' => $this->string(10)->comment("Тип об'єкту"),
            'extension' => $this->string(10)->comment('Розширення файлу'),
            'file_name' => $this->string()->notNull()->comment('Назва файлу'),
            'file_path' => $this->string()->notNull()->comment('Шлях до файлу'),
            'uploaded_at' => $this->integer()->comment('Дата завантаження'),
        ]);

        $this->addForeignKey(
            'fk-file-article_id',
            'file',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
                        
        return true;
    }

    public function safeDown(){
        $this->dropTable('file');
        $this->dropForeignKey('fk-file-article_id', 'file');

        return true;
    }
}
