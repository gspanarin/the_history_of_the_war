<?php

use yii\db\Migration;

class m240509_092439_AddTableTagInputType extends Migration{

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%tag_input_type}}', [
            'id' => $this->primaryKey()->comment('Ідентифікатор методу вводу'),
            'name' => $this->string()->notNull()->comment('Назва методу вводу'),
            'description' => $this->text()->comment('Опис методу вводу'),
        ],$tableOptions);
        
        $this->addForeignKey(
            'fk-tag-input_type',
            'tag',
            'input_type',
            'tag_input_type',
            'id',
            'CASCADE'
        );
        
        $this->batchInsert('{{%tag_input_type}}', ['name'],[
            ['SimpleText'],     // звичайне поле вводу
            ['TextArea'],       // поле вводу багаторядкового тексту
            ['Dictionary'],     // ввод через словник - запит до бази
            ['DatePicker'],     // заповнення дати через календар
            ['StandartValue'],  // заповнення через перелік значень - авторитетні записи
        ]);
        
        return true;
    }

    public function safeDown(){
        $this->dropForeignKey('fk-tag-input_type','tag');
        $this->dropTable('tag_input_type');

        return true;
    }
}
