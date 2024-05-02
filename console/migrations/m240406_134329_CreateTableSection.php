<?php

use yii\db\Migration;

class m240406_134329_CreateTableSection extends Migration{
    public function safeUp(){
        $this->createTable('section', [
            'id' => $this->primaryKey()->comment('Ідентифікатор розділу'),
            'alias' => $this->string()->comment('Аліас розділу')->notNull(),
            'status' => $this->integer()->defaultValue(0)->comment('Статус розділу'),
            'title' => $this->string()->comment('Назва')->notNull(),
            'description' => $this->text()->comment('Детальний опис'),
            'icon' => $this->string()->comment('Іконка'),
            'pid' => $this->integer()->defaultValue(0)->comment('Батьківський розділ'),
            'sort' => $this->string(20)->notNull()->comment('Порядок сортування'),
            'created_at' => $this->integer()->comment('Дата створення'),
            'updated_at' => $this->integer()->comment('Дата корегування'),
        ]);
        
        $this->createIndex('idx-section-alias', 'section', 'alias', true);
        
        return true;
    }

    public function safeDown(){
        $this->dropTable('section');
        $this->dropIndex('idx-section-alias', 'section');
        
        return true;
    }

}
