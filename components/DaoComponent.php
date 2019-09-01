<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 21.08.19
 * Time: 18:19
 */

namespace app\components;


use app\base\BaseComponent;
use yii\db\Connection;
use yii\db\Query;

class DaoComponent extends BaseComponent
{
    public function getDb(): Connection {
        return \Yii::$app->db;
    }

    public function getUsers() {
        $sql = 'select * from users;';
        return $this->getDb()->createCommand($sql)->queryAll();
    }

    public function getActivityUser($user_id) {
        $sql = 'select * from activity where user_id=:user;';
        return $this->getDb()->createCommand($sql, [':user'=>$user_id])->queryAll();

    }

    public function getActivityAny() {
        $query=new Query();
        $data = $query->from('activity')
            ->andWhere(['user_id'=>1])
            ->orderBy(['dateStart'=>SORT_DESC])
            ->limit(2)
            //->one($this->getDb());
            //->createCommand()->rawSql;
        ->createCommand()->queryOne();
        return $data;
    }

    public function getCountActivity() {
        $query = new Query();
        $data = $query->from('activity')
            ->select('count(id) as cnt')
            ->scalar($this->getDb());
        return $data;
    }

    public function getReader(){
        $query = new Query();
        $data = $query->from('activity')
            ->createCommand()->query();
        return $data;
    }

    public function inserts(){
        $trans=$this->getDb()->beginTransaction();
        try{
            $this->getDb()->createCommand()
                ->update('users', ['email'=>'email@email.ru'],['id'=>1])
                ->execute();
            throw new \Exception('error');
            $this->getDb()->createCommand()
                ->update('users', ['email'=>'email22@email.ru'],['id'=>2])
                ->execute();
            $trans->commit();
        } catch (\Exception $e){
            $trans->rollBack();
        }
    }

    public function insertNew(){
        $this->getDb()->transaction(function (){
            $this->getDb()->createCommand()
                ->update('users', ['email'=>'email@email.ru'],['id'=>1])
                ->execute();

            $this->getDb()->createCommand()
                ->update('users', ['email'=>'email2@email.ru'],['id'=>2])
                ->execute();
        });
    }
}