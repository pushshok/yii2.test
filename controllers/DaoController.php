<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 21.08.19
 * Time: 18:17
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;

class DaoController extends BaseController
{
    public function actionTest() {
        /** @var DaoComponent $dao */

        $dao = \Yii::$app->dao;

        $dao->inserts();
        $dao->insertNew();
        $users = $dao->getUsers();
        $activityUsers = $dao->getActivityUser(\Yii::$app->request->get('user'));
        $acity = $dao->getActivityAny();
        $count = $dao->getCountActivity();
        $reader = $dao->getReader();
        return $this->render('dao', ['users'=>$users, 'activityUser'=>$activityUsers, 'acity'=>$acity, 'count'=>$count, 'reader'=>$reader]);
    }
}