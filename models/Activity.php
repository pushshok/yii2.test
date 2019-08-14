<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 19:32
 */

namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $duration;
    public $dateEnd;
    public $dateStart;
    public $repeatDate;
    public $isBlocked;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'string'],
            ['duration', 'integer'],
            ['dateStart', 'string'],
            ['dateEnd', 'string'],
            ['repeatDate', 'string'],
            ['isBlocked', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название события',
            'description'=>'Описание',
            'duration'=>'Длительность',
            'dateStart'=>'Дата начала',
            'dateEnd'=>'Дата окончания',
            'repeatDate'=>'Дата повтора',
            'isBlocked'=>'Занимает весь день'
        ];
    }
}