<?php

use yii\db\Migration;

class m240607_071652_ChangeColumnsInTableSection extends Migration{

    public function safeUp(){
        $this->alterColumn('{{%section}}', 'sort', $this->integer()->defaultValue(0)->comment('Порядок сортування'));
        
        return true;
    }


    public function safeDown(){
        $this->alterColumn('{{%section}}', 'sort', $this->string(20)->notNull()->comment('Порядок сортування'));

        return true;
    }

   
}
