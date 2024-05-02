<?php

use yii\db\Migration;

/**
 * Class m240406_134411_CreateTableMessage
 */
class m240406_134411_CreateTableMessage extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240406_134411_CreateTableMessage cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240406_134411_CreateTableMessage cannot be reverted.\n";

        return false;
    }
    */
}
