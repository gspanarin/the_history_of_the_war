<?php

use yii\db\Migration;

/**
 * Class m241212_060355_AddTablePartnershipProject
 */
class m241212_060355_AddTablePartnershipProject extends Migration{
	
    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%partnership_project}}', [
            'id' => $this->primaryKey()->comment('Ідентифікатор проекту'),
			//Статус
			'status' => $this->integer()->defaultValue(0)->comment('Статус проекту'),
			//Назва
			'title' => $this->string(256)->notNull()->comment('Назва'),
			//Іконка
			'icon' => $this->string(256)->defaultValue('')->comment('Файл іконки проекту'),
			//Організхація-оператор
			'operator' => $this->string(256)->notNull()->comment('Назва'),
			//Тривалість проекту
			'duration' => $this->string()->defaultValue('')->comment('Тривалість проекту'),
			//Анотація
			'description' => $this->text()->comment('Анотація'),
			//Посилання
			'url' => $this->string()->notNull()->comment('url'),
			//Дата створення
			//Дата оновлення
			'created_at' => $this->integer()->comment('Дата створення'),
            'updated_at' => $this->integer()->comment('Дата корегування'),
        ],$tableOptions);

    }

    public function safeDown(){
        $this->dropTable('{{%partnership_project}}');
       
        return true;
    }
}
