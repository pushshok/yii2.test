<?php

use yii\db\Migration;

/**
 * Class m190819_152330_create_key
 */
class m190819_152330_create_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('userEmailUni', 'users', 'email', true);
        $this->addColumn('activity', 'user_id', $this->integer()->notNull());
        $this->addForeignKey('activity_userFK', 'activity', 'user_id', 'users', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity_userFK', 'activity');
        $this->dropColumn('activity', 'user_id');
        $this->dropIndex('userEmailUni', 'users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190819_152330_create_key cannot be reverted.\n";

        return false;
    }
    */
}
