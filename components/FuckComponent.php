<?php


namespace app\components;


use app\models\Users;
use yii\base\Component;

class FuckComponent extends Component
{
    public function signin(Users &$model):bool {

        $model->scenarioSignin();
        if (!$model->validate(['email', 'password'])) {
            return false;
        }

        $user=$this->getUserByEmail($model->email);
        if(!$this->validationPassword($model->password, $user->pass)) {
            $model->addError('password', 'Wrong password!');
            return false;
        }

        return \Yii::$app->user->login($user, 3600);
    }

    private function validationPassword($password, $pass_hash):bool {
        return \Yii::$app->security->validatePassword($password, $pass_hash);
    }

    private function getUserByEmail(string $email):?Users {
        return Users::find()->andWhere(['email'=>$email])->one();
    }

    public function signup(Users &$user):bool {
        $user->scenarioSignup();
        if(!$user->validate(['email', 'password'])) {
            return false;
        }

        $user->pass = $this->genHashPassword($user->password);

        if(!$user->save()){
            return false;
        }

        return true;
    }

    private function genHashPassword($password):string {
        return \Yii::$app->security->generatePasswordHash($password);
    }
}