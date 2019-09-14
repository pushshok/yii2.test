<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 19:32
 */

namespace app\models;

use app\behaviors\SetDataDuringBehavior;
use app\models\rules\StopListRules;
use yii\base\Model;

/**
 * Class Activity
 * @package app\models
 * @mixin SetDataDuringBehavior
 */
class Activity extends ActivityBase
{
//    public $author;
//    public $title;
//    public $description;
//    public $duration;
//    public $dateEnd;
//    public $dateStart;
//    public $isBlocked;

    public $isRepeated;
//    public $repeatedType;

    public const REPEATED_TYPE = [
        1 => 'Каждый день',
        2 => 'Каждый месяц заданного числа',
        3 => 'Каждую неделю'
    ];

//    public $useNotification;
//    public $email;
    public $emailRepeat;

//    public $file;
    public $files;

    public function behaviors()
    {
        return [
            ['class' => SetDataDuringBehavior::class, 'startDate' => 'dateStart', 'endDate' => 'dateEnd'],
        ];
    }

    /**/

    public function rules()
    {
        return [
            ['title', 'trim'],
            [['title'], 'required'],
            ['author', 'string'],
            ['dateStart', 'required', 'message' => 'Дата старта события обязательно'],
            ['description', 'string', 'min' => 5, 'max' => 150],
//            ['inn','string','length'=>10],
            ['dateStart', 'date', 'format' => 'php:Y-m-d'],
            ['dateStart', 'date', 'format' => 'php:Y-m-d'],
            ['file', 'file', 'extensions' => ['jpg', 'png'], 'maxFiles' => 10],
            ['files', 'safe'],
            ['repeatedType', 'in', 'range' => array_keys(self::REPEATED_TYPE)],
            ['dateEnd', 'string'],
            ['email', 'email'],
//            ['title','titleStopRule'],
            ['duration', 'integer'],
            ['title', StopListRules::class, 'stopList' => ['шаурма', 'бордюр']],
//            ['email','match','pattern' =>'//'],
            [['email', 'emailRepeat'], 'required', 'when' => function ($model) {
                return $model->useNotification ? true : false;
            }],
            ['emailRepeat', 'compare', 'compareAttribute' => 'email'],
            [['isBlocked', 'isRepeated', 'useNotification'], 'boolean'],
        ];
    }

    public function titleStopRule($attr)
    {
        $arr = ['шаурма', 'бордюр'];
        if (in_array($this->title, $arr)) {
            $this->addError('title', 'Значение заголовка находится в стоп-листе');
        }
    }


    public function attributeLabels()
    {
        return [
            'author' => 'Автор записи',
            'title' => 'Название события',
            'description' => 'Описание',
            'duration' => 'Длительность',
            'dateStart' => 'Дата начала',
            'dateEnd' => 'Дата окончания',
            'isRepeated' => 'Дата повтора',
            'repeatedType' => 'Событие повторяется',
            'isBlocked' => 'Занимает весь день'
        ];
    }
}