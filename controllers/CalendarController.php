<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 10.08.19
 * Time: 22:18
 */

namespace app\controllers;
use app\controllers\actions\DayInfoAction;

use app\base\BaseController;

class CalendarController extends BaseController
{
    public function actions()
    {
        return [
            'today' => ['class' => DayInfoAction::class, 'name' => 'Важный день!'],
        ];
    }
}