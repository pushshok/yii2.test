<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 15:46
 */

namespace app\controllers;

use app\controllers\actions\ActivityCreateAction;
//use yii\web\Controller;
use app\base\BaseController;
use app\controllers\actions\DayInfoAction;


class ActivityController extends BaseController {
    public function actions () {
        return [
            'create' => ['class' => ActivityCreateAction::class, 'name' => 'События сегодняшнего дня']
        ];
    }
}