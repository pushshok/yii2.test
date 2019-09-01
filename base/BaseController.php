<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 15:34
 */


namespace app\base;
use \yii\web\Controller;
use yii\web\HttpException;

class BaseController extends Controller {

        public function beforeAction($action)
        {

            if (\Yii::$app->user->isGuest) {
                throw new HttpException(401, 'Need authorize!');
            }
            return parent::beforeAction($action);
        }
}