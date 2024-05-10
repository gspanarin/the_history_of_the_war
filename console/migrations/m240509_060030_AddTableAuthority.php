<?php

use yii\db\Migration;

class m240509_060030_AddTableAuthority extends Migration{

    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%authority_type}}', [
            'id' => $this->primaryKey()->comment('Ідентифікатор виду авторитетного джерела'),
            'name' => $this->string()->notNull()->comment('Назва виду авторитетного джерела'),
            'description' => $this->string(256)->comment('Короткий опис'),
        ],$tableOptions);
        $this->createIndex('idx-authority_type-name', '{{%authority_type}}', 'name');
        
        
        $this->createTable('{{%authority}}', [
            'id' => $this->primaryKey()->comment('Ідентифікатор авторитетного значення'),
            'authority_type_id' => $this->integer()->notNull()->comment('Ідентифікатор виду авторитетного джерела'),
            'value' => $this->string()->notNull()->comment('Авторитетне значення'),
        ],$tableOptions);
        $this->createIndex('idx-authority-value', '{{%authority}}', 'value');
        $this->createIndex('idx-authority-type', '{{%authority}}', 'authority_type_id');
        
        $this->addForeignKey(
            'fk-authority-authority_type_id',
            'authority',
            'authority_type_id',
            'authority_type',
            'id',
            'CASCADE'
        );
    }

    public function safeDown(){
        $this->dropIndex('idx-authority_type-name', '{{%authority_type}}');
        $this->dropIndex('idx-authority-value', '{{%authority}}');
        $this->dropForeignKey('fk-authority-authority_type_id', 'authority',);
        $this->dropIndex('idx-authority-type', '{{%authority}}');
        
        $this->dropTable('{{%authority}}');
        $this->dropTable('{{%authority_type}}');
        
        return true;
    }


}
