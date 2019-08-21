<?php
$session = Yii::$app->session;
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 15:53
 * @var $model \app\models\Activity
 */


?>

<h2><?=$name ?>:</h2>
<strong><?=Yii::getAlias('@webroot');?></strong>
<p class="lead">Создание активности</p>

<div class="row">
    <div class="col-md-6">

        <?php $form=\yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?=$form->field($model, 'author')->textInput(); ?>
        <?=$form->field($model, 'title')->textInput(['id' => 'title' ]); ?>
        <?=$form->field($model, 'description')->textarea(); ?>
        <?=$form->field($model, 'duration')->textInput(); ?>
        <?=$form->field($model, 'dateStart')->input('date'); ?>
        <?=$form->field($model, 'dateEnd')->input('date'); ?>
    </div>

        <div class="col-md-4">
            <?= $form->field($model, 'isRepeated')->checkbox() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'repeatedType')->dropDownList($model::REPEATED_TYPE) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'isBlocked')->checkbox() ?>
        </div>


        <div class="col-md-4">
            <?=$form->field($model,'useNotification')->checkbox()?>
        </div>
        <div class="col-md-4">
            <?=$form->field($model,'email',['enableAjaxValidation'=>true,'enableClientValidation'=>false]);?>
        </div>
        <div class="col-md-4">
            <?=$form->field($model,'emailRepeat',['enableAjaxValidation'=>true,'enableClientValidation'=>false]);?>
        </div>

        <div class="col-md-4">
            <?=$form->field($model,'file')->fileInput(['multiple' => true, 'accept' => 'image/*'])?>
        </div>
        <div class="col-md-12">
            <button class="btn btn-default" type="submit">Создать</button>
        </div>
        <?php $form=\yii\bootstrap\ActiveForm::end(); ?>

</div>
