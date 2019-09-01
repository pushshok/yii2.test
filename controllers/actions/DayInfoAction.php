<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 11.08.19
 * Time: 1:19
 */

namespace app\controllers\actions;

use app\models\Day;
use app\base\BaseAction;
use phpDocumentor\Reflection\Types\String_;
use app\controllers\actions\ActivityCreateAction;

class DayInfoAction extends BaseAction
{
    public $name;
    public $model;

    static public function isWeekend($dat) {
        $day = new Day();
        if (($dat === "Sun") || ($dat === "Sat")) {
            $day->weekend = true;
        } else {
            $day->weekend = false;
        }
    }

    public function run()
    {
        $model = \Yii::$app->activity->getModel();
        $day = new Day();
        $data = date('y-m-d-D');
        $dat = strtotime(date('D'));
        $day->setAttributes(['today' => $data, 'event' => 'День Ялты', 'weekend' => self::isWeekend($dat)]);
        return $this->controller->render('day', ['name' => $this->name, 'day' => $day, 'model' => $model]);
    }



}