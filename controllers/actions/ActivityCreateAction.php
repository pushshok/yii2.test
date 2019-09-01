<?php

//use app\models\Activity;

/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 19:04
 * @var $model Activity
 * @var $day \app\models\Day
 */

namespace app\controllers\actions;

use app\base\BaseAction;
use app\components\ActivityComponent;
use app\controllers\CalendarController;
use app\models\Activity;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\HttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\Day;

class ActivityCreateAction extends BaseAction {
    public $name;
    public $event;

    public function run() {

        if(!\Yii::$app->rbac->canCreateActivity()) {
            throw new HttpException('403', 'Forbiden!');
        }

        $activityComponent = \Yii::createObject(['class'=>ActivityComponent::class, 'classModel' => Activity::class]);

        //$model = \Yii::$app->activity->getModel();

        $model = $activityComponent->getModel();
        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if(\Yii::$app->activity->createActivity($model)) {

                return $this->controller->redirect(['activity/day', 'id' => $model->id]);
            } else {
                print_r($model->getErrors());
                exit;
            }
        }
        return $this->controller->render('create', ['name' => $this->name, 'model'=>$model]);
    }
}