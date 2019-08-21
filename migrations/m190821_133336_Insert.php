<?php

use yii\db\Migration;

/**
 * Class m190821_133336_Insert
 */
class m190821_133336_Insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'id'=>1,
            'email'=>'test@test.ru',
            'pass'=>'qwerqwer'
        ]);
        $this->insert('users', [
            'id'=>2,
            'email'=>'test2@test.ru',
            'pass'=>'qwerqwer'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_133336_Insert cannot be reverted.\n";

        return false;
    }
    */
}
