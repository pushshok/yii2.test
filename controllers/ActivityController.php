<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 15:46
 */

namespace app\controllers;

use app\controllers\actions\ActivityCreateAction;
//use yii\web\Controller;
use app\base\BaseController;
use app\controllers\actions\DayInfoAction;
use app\models\Activity;
use app\components\RbacComponent;
use yii\web\HttpException;


class ActivityController extends BaseController {
    public function actions () {
        return [
            'create' => ['class' => ActivityCreateAction::class, 'name' => 'События сегодняшнего дня']
        ];
    }

    public function actionDay($id){
        $model= Activity::find()->andWhere(['id'=>$id])->one();

        if(!\Yii::$app->rbac->canViewEditActivity($model)) {
            throw new HttpException('403', 'Forbiden!');
        }

        return $this->render('day', ['model'=>$model]);
    }
}