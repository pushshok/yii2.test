<?php

use yii\db\Migration;

/**
 * Class m190821_123505_AlterColumn
 */
class m190821_123505_AlterColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('activity', 'duration', $this->integer());
        $this->alterColumn('users', 'login', $this->string(150));
        $this->alterColumn('users', 'name', $this->string(150));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190821_123505_AlterColumn cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_123505_AlterColumn cannot be reverted.\n";

        return false;
    }
    */
}
