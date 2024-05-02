<?php

use yii\db\Migration;

class m240501_183713_CreateTableDictionary extends Migration{

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%dictionary}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull()->comment(''),
            'tag_id' => $this->integer()->notNull()->comment(''),
            'value' => $this->string()->notNull()->comment(''),
            
        ], $tableOptions);
        
        $this->createIndex('idx-article_id', '{{%dictionary}}', 'article_id');
        $this->createIndex('idx-tag_id', '{{%dictionary}}', 'tag_id');
        $this->createIndex('idx-value', '{{%dictionary}}', 'value');
        
        $this->addForeignKey('fk-dictionary-article_id', '{{%dictionary}}', 'article_id', 'article', 'id');
        $this->addForeignKey('fk-dictionary-tag_id', '{{%dictionary}}', 'tag_id', 'tag', 'id');
        
        return true;
    }


    public function safeDown(){
        $this->dropForeignKey('fk-dictionary-article_id');
        $this->dropForeignKey('fk-dictionary-tag_id', '{{%dictionary}}');
        
        $this->dropIndex('idx-article_id', '{{%dictionary}}');
        $this->dropIndex('idx-tag_id', '{{%dictionary}}');
        $this->dropIndex('idx-value', '{{%dictionary}}');
        
        $this->delete('{{%dictionary}}');
        
        
        return true;
    }


}

