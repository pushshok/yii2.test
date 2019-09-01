<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 18.08.19
 * Time: 21:18
 * var $day \app\models\Day
 */

namespace app\models\rules;
use app\models\Day;

use yii\validators\Validator;

class CheckWeekend extends Validator
{
    public function validateAttribute($day, $attribute) {
        if (($day->today === "Sun") || ($day->attribute === "Sat")) {
            $day->weekend = true;
        } else {
            $day->weekend = false;
        }
    }
}