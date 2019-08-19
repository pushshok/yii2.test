<?php
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 23:34
 */

namespace app\components;


use app\base\BaseComponent;
use app\models\Activity;
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

        $item = UploadedFile::getInstances($activity, 'file');

        if (!$activity->validate()) {
            return false;
        }


        //Мультизагрузка не работает тут, не понимаю почему не происходит перебор массива
        $i=0;
        foreach ($item as $activity->file) {

            // Попытался реализовать перебор по числам, ничего не вышло
            if($activity->file){
                $filename=$this->saveUploadedFile($activity->file);
                $activity->files=$filename;
            }
            $i++;
        }
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
        return time().'.'.$uploadedFile->extension;
    }

}