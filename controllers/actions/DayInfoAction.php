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

class DayInfoAction extends BaseAction
{
    public $name;

    public function run()
    {
        $model = new Day();
        $model->setAttributes(['today' => '11-08-2019', 'event' => 'День Ялты', 'weekend' => 'true']);
        return $this->controller->render('day', ['name' => $this->name, 'model' => $model]);
    }
}