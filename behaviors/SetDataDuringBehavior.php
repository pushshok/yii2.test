<?php


namespace app\behaviors;

use yii\base\Behavior;

class SetDataDuringBehavior extends Behavior
{
    public $startDate;
    public $endDate;

    public function countDate(): ?string
    {
        $owner = $this->owner;
        $start = strtotime(\Yii::$app->formatter->asDate($owner->{$this->startDate}, 'php:d.m.Y'));
        $end = strtotime(\Yii::$app->formatter->asDate($owner->{$this->endDate}, 'php:d.m.Y'));

        if (empty($end)) {
            $end = $start;
        }
        $during = round(($end - $start) / (3600 * 24)) + 1;
        //$during = strtotime($start);
        //$during = $start;
        return $during;
    }

}