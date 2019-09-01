<?php

//use app\models\Activity;

/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 23:34
 * @var $activity Activity
 */

namespace app\components;

use app\models\Activity;
use app\base\BaseComponent;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends BaseComponent
{
    public $classModel;
    public $item;

    public function getModel(){
        return new $this->classModel();
    }

    public function createActivity(Activity &$activity):bool {

        $items = UploadedFile::getInstances($activity, 'files');
        //$items = UploadedFile::getInstance($activity, 'file');

        $activity->user_id = \Yii::$app->user->getId();
        if (!$activity->user_id) {
            $activity->user_id = 1;
        }


        if (!$activity->validate()) {
            return false;
        }

        foreach ($items as $item) {
            if ($item) {
                $filename = $this->saveUploadedFile($item);
                $activity->file .= $filename.', ';
                $activity->files[] = $filename;
            }
        }

        $activity->save();
        //
        /*
        foreach ($items as $item) {
           $item = $activity->file;
        }
        //Мультизагрузка не работает тут, не понимаю почему не происходит перебор массива
        /*
        $i=0;
        foreach ($item as $activity->file) {

            // Попытался реализовать перебор по числам, ничего не вышло
            if($activity->file){
                $filename=$this->saveUploadedFile($activity->file);
                $activity->file=$filename;
            }
            $i++;
        }
        */
        return true;
    }

    private function saveUploadedFile(UploadedFile $uploadedFile): ?string
    {
        $filename=$this->genFileName($uploadedFile);
        $path=$this->getSavePath();
        if($uploadedFile->saveAs($path.$filename)){
            return  $filename;
        }else{
            return null;
        }
    }

    private function getSavePath():string {
        FileHelper::createDirectory(\Yii::getAlias('@webroot/images'));
        return \Yii::getAlias('@webroot/images/');
    }

    private function genFileName(UploadedFile $uploadedFile): string
    {
        return time().\Yii::$app->security->generateRandomString().'.'.$uploadedFile->extension;
    }

}