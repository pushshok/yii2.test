<?php


namespace app\widgets\UserViewerWidget;


use yii\base\Widget;

class UserViewerWidget extends Widget
{
    public $users;

    public function init()
    {
        parent::init();

        if (!$this->users) {
            throw new \Exception('Need users params!');
        }
    }

    public function run()
    {
        return $this->render('index', ['users'=>$this->users]);

    }

}