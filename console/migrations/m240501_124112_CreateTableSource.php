<?php

use yii\db\Migration;

class m240501_124112_CreateTableSource extends Migration{

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%source}}', [
            'id' => $this->primaryKey()->comment('Ідентифікатор джерела'),
            'title' => $this->string()->notNull()->comment('Назва джерела'),
            'description' => $this->text()->comment('Опис'),
            'url' => $this->string()->notNull()->comment('Посилання на джерело/ЗМІ'),
            'icon' => $this->string()->comment('іконка/лого'),
        ], $tableOptions);
        
        $this->createIndex('idx-source-title', '{{%source}}', 'title');
        $this->createIndex('idx-source-url', '{{%source}}', 'url');
        
        $this->addForeignKey(
            'fk-article-source_id',
            'article',
            'source_id',
            'source',
            'id',
            'CASCADE'
        );
        
        return true;
    }

    public function safeDown(){
        $this->dropIndex('idx-source-title', '{{%source}}');
        $this->dropIndex('idx-source-url', '{{%source}}');
        $this->dropIndex('idx-source-icon', '{{%source}}');
        $this->dropForeignKey('fk-article-source_id', '{{%article}}');
        $this->delete('{{%source}}');
        
        return true;
    }
}
