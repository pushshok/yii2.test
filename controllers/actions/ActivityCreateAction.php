<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 19:04
 */

namespace app\controllers\actions;

use app\base\BaseAction;
use app\components\ActivityComponent;
use app\models\Activity;

class ActivityCreateAction extends BaseAction {
    public $name;

    public function run() {

        //$model = new Activity();
        $activityComponent = \Yii::createObject(['class'=>ActivityComponent::class, 'classModel' => Activity::class]);
        //$model = \Yii::$app->activity->getModel();
        $model = $activityComponent->getModel();
        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            //$model->title = null;
            if(\Yii::$app->activity->createActivity($model)) {

            } else {
                print_r($model->getErrors());
                exit;
            }
            //$model->setAttributes(['title' => 'Sub']);
            //$model->title = 'Set';
            //print_r($model->getAttributes());
            //exit;
        }
        return $this->controller->render('create', ['name' => $this->name, 'model'=>$model]);
    }
}