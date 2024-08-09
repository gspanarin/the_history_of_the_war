<?php

use yii\db\Migration;

class m240809_192853_CreateTableSession extends Migration{
	
    public function safeUp(){
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable(
            '{{%session}}', 
            [
                'id' => $this->string(40)->notNull()->comment('Ідентифікатор сессії'),
                'expire' => $this->integer()->defaultValue(0),
				'data' => $this->binary(429496729)->comment('Сессійна інформація користувача'),
				'user_id' => $this->integer(11)->comment('Ідентифікатор користувача'),
				'last_write' => $this->integer()->notNull()->comment('Дата та час останного відвідування')
            ],
            $tableOptions);
		
		$this->addPrimaryKey('id', '{{%session}}', 'id');
		
		return true;
    }


    public function safeDown(){
        $this->dropTable('{{%session}}');

        return true;
    }

}
