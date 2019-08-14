<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 23:34
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;

class ActivityComponent extends Component
{
    public $classModel;

    public function getModel(){
        return new $this->classModel();
    }
    public function createActivity(Activity &$activity):bool {
        if ($activity->validate()) {
            return true;
        }

        return false;
    }
}