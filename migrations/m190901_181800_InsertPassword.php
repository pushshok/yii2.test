<?php

use yii\db\Migration;

/**
 * Class m190901_181800_InsertPassword
 */
class m190901_181800_InsertPassword extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('users', ['pass'=>\Yii::$app->security->generatePasswordHash('123456')], ['id'=>1]);
        $this->update('users', ['pass'=>\Yii::$app->security->generatePasswordHash('123456')], ['id'=>2]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190901_181800_InsertPassword cannot be reverted.\n";

        return false;
    }
    */
}
