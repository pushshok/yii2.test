<?php

use yii\db\Migration;

/**
 * Class m190821_133543_InsertBatch
 */
class m190821_133543_InsertBatch extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('activity', ['title', 'dateStart', 'user_id', 'useNotification'], [
            [Yii::$app->security->generateRandomString(), date('Y-m-d'), 1, 0],
            [Yii::$app->security->generateRandomString(), date('Y-m-d'), 1, 0],
            [Yii::$app->security->generateRandomString(), date('Y-m-d'), 2, 0],
            [Yii::$app->security->generateRandomString(), date('Y-m-d'), 2, 1],
            [Yii::$app->security->generateRandomString(), '2019-08-14', 2, 1],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_133543_InsertBatch cannot be reverted.\n";

        return false;
    }
    */
}
