<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 10.08.19
 * Time: 21:46
 */

namespace app\models;


use app\models\rules\CheckWeekend;
use yii\base\Model;

class Day extends Model
{
    public $today;
    public $dayNumber;
    public $weekend;
    public $event;

    public function rules()
    {
        return [
            ['today', 'date'],
            ['dayNumber', 'date'],
            ['event', 'string'],
            ['weekend', 'boolean', /* CheckWeekend::class, 'dayNumber' */]
        ];
    }

    //f
    public function isWeekend($attr) {
        //$date->format
        if (($this->dayNumber === "Sun") || ($this->dayNumber === "Sat")) {
            $this->weekend = true;
        } else {
            $this->weekend = false;
        }
    }

    public function attributeLabels()
    {
        return [
            'today'=>'Дата',
            'event'=>'Событие',
            'weekend'=>'Выходной'
        ];
    }
}