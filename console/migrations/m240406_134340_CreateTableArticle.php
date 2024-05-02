<?php

use yii\db\Migration;

class m240406_134340_CreateTableArticle extends Migration{

    public function safeUp(){
        $this->createTable('article', [
            'id' => $this->primaryKey()->comment('Ідентифікатор статті'),
            'user_id' => $this->integer()->notNull()->comment('Оператор'),
            'metadata' => $this->text()->notNull()->comment('Метаданні'),
            'icon' => $this->string(50)->defaultValue(null)->comment('Посилання на іконку для статті'),
            'source_id' => $this->integer()->defaultValue(null)()->comment('Ідентифікатор джерела статті'),
            'section_id' => $this->integer()->notNull()->comment('Розділ/тематика'),
            'status' => $this->integer()->defaultValue(null)->comment('Статус'),
            'view' => $this->integer()->defaultValue(null)->comment('Кількість переглядів'),
            'share' => $this->integer()->defaultValue(null)->comment('Кількість перепостів'),
            'average_score' => $this->integer()->defaultValue(null)->comment('Середня оцінка'),
            'created_at' => $this->integer()->comment('Дата створення'),
            'updated_at' => $this->integer()->comment('Дата корегування'),
        ]);
        
        $this->addForeignKey(
            'fk-article-section_id',
            'article',
            'section_id',
            'section',
            'id',
            'CASCADE'
        );
        
        $this->addForeignKey(
            'fk-article-user_id',
            'article',
            'user',
            'user_id',
            'id',
            'CASCADE'
        );
        
        $this->createIndex('idx-article-user_id', 'article', 'user_id');
        
        return true;
    }

    public function safeDown(){
        $this->dropTable('article');
        $this->dropForeignKey('fk-article-section_id', 'article');
        $this->dropForeignKey('fk-article-user_id', 'article');
        $this->dropIndex('idx-article-user_id', 'article');
        
        return true;
    }

}
