<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 19:04
 * @var $day \app\models\Day
 */

namespace app\controllers\actions;

use app\base\BaseAction;
use app\components\ActivityComponent;
use app\controllers\CalendarController;
use app\models\Activity;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\Day;

class ActivityCreateAction extends BaseAction {
    public $name;
    public $event;

    public function run() {

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

                //Данные для наполнения модели положил здесь, наверное нужно их разместить где-то в другом месте
                $day = new Day();
                $data = date('y-m-d');
                $dayNumber = date("D");
                $dat = DayInfoAction::isWeekend(strtotime($dayNumber));
                $this->event .= $model->title."\n";
                $day->setAttributes(['today' => $data, 'weekend' => $dat, 'event' => $this->event]);

                return $this->controller->render('day', ['name' => $this->name, 'day' => $day, 'model' => $model]);

                //return Yii::$app->response->redirect(['DayInfoAction', 'model' => $model]);
                //return Html::a('Link', [
                //    'calendar/day'.$model->title
                //]);
                //return $this->controller->render('view', ['model'=>$model]);
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