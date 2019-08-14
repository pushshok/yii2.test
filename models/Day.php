<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 10.08.19
 * Time: 21:46
 */

namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $today;
    public $weekend;
    public $event;

    public function rules()
    {
        return [
            ['today', 'string'],
            ['event', 'string'],
            ['weekend', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'today'=>'Дата',
            'event'=>'События',
            'weekend'=>'Выходной'
        ];
    }
}