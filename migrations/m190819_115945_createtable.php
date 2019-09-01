<?php

use yii\db\Migration;

/**
 * Class m190819_115945_createtable
 * var $model Activi
 */
class m190819_115945_createtable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id'=>$this->primaryKey(),
            'title'=>$this->string(150)->notNull(),
            'description'=>$this->text(),
            'dateStart'=>$this->date()->notNull(),
            'dateEnd'=>$this->date(),
            'duration'=>$this->integer()->notNull(),
            'author'=>$this->string(150),
            'file'=>$this->string(350),
            'repeatedType'=>$this->integer(),
            'isBlocked'=>$this->boolean()->notNull()->defaultValue(0),
            'useNotification'=>$this->boolean()->notNull()->defaultValue(0),
            'email'=>$this->string(150),
            'createAt'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'isDeleted'=>$this->boolean()->notNull()->defaultValue(0)
        ]);

        $this->createTable('users', [
            'id'=>$this->primaryKey(),
            'login'=>$this->string(150)->notNull(),
            'name'=>$this->string(150)->notNull(),
            'email'=>$this->string(150)->notNull(),
            'pass'=>$this->string(150)->notNull(),
            'token'=>$this->string(150),
            'auth_key'=>$this->string(150),
            'createAt'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'isDeleted'=>$this->boolean()->notNull()->defaultValue(0)
        ]);

        $this->createTable('day', [
            'id'=>$this->primaryKey(),
            'today'=>$this->date()->notNull(),
            'weekend'=>$this->boolean()->notNull()->defaultValue(0),
            'event'=>$this->text(),
            'createAt'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'hide'=>$this->boolean()->notNull()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('day');
        $this->dropTable('users');
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190819_115945_createtable cannot be reverted.\n";

        return false;
    }
    */
}
