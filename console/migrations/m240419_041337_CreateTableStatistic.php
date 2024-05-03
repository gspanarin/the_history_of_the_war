<?php

use yii\db\Migration;

class m240419_041337_CreateTableStatistic extends Migration{

    public function safeUp(){
        $this->createTable('{{%statistic}}', [
            'id' => $this->primaryKey()->comment('Ідентифікатор запису'),
            'user_id' => $this->integer()->comment('Ідентифікатор користувача'),
            'module' => $this->string(40)->comment('Модуль'),
            'controller' => $this->string(40)->comment('Контролер'),
            'action' => $this->string(40)->comment('Операція'),
            'dump' => $this->text()->comment('Перелік дій'),
            'created_at' => $this->integer()->comment('Дата виконання операції'),
        ]);
        
        $this->createIndex('ids-module', 'statistic', 'module');
        $this->createIndex('ids-module-controller', 'statistic', ['module', 'controller']);
        $this->createIndex('ids-module-controller-action', 'statistic', ['module', 'controller', 'action']);
        
        return true;
    }

    public function safeDown(){
        $this->dropTable('{{%statistic}}');
        $this->dropIndex('ids-module', 'statistic');
        $this->dropIndex('ids-module-controller', 'statistic');
        $this->dropIndex('ids-module-controller-action', 'statistic');
        
        return true;
    }
}
