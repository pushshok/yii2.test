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
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends BaseAction {
    public $name;

    public function run() {

        //$model = new Activity();
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
                return $this->controller->render('view', ['model'=>$model]);
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

//        $arr=['one'=>'val1','two'=>['three'=>'value2']];
//        $db=[['id'=>2,'name'=>'Klaus','lastName'=>'Branbie'],['id'=>4,'name'=>'Родион','lastName'=>'Руденко']];
//        $value=ArrayHelper::getValue($arr,'two.three');
//        print_r($value);
//        $arr=ArrayHelper::map($db,'id',function ($record){
//            return ArrayHelper::getValue($record,'lastName').' '.ArrayHelper::getValue($record,'name');
//        });
//
//        print_r($arr);
//        exit;

}