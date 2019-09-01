<?php


namespace app\controllers;


use app\models\Users;
use yii\web\Controller;

class FuckController extends Controller
{
    public function actionSignUp() {
        $model = new Users();

        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->fuck->signup($model)){
                $this->redirect(['fuck/sign-in']);
            }
        }

        return $this->render('signup', ['model'=>$model]);
    }

    public function actionSignIn() {
        $model = new Users();

        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->fuck->signin($model)){
                $this->redirect(['activity/create']);
            }
        }

        return $this->render('signin', ['model'=>$model]);
    }
}