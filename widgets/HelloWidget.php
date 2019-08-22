<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 22.08.19
 * Time: 14:58
 */

namespace app\widgets;
//namespace app\components;

    use yii\base\Widget;
    use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::getAlias('@webroot');
        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}
