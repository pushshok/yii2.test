<?php
$session = Yii::$app->session;
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 09.08.19
 * Time: 15:53
 * @var $model \app\models\Activity
 */


use kartik\datetime\DateTimePicker;
use app\widgets\HelloWidget;

?>

<h2><?=$name ?>:</h2>

<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?=$form->field($model, 'author')->textInput(); ?>
        <?=$form->field($model, 'title')->textInput(['id' => 'title' ]); ?>
        <?=$form->field($model, 'description')->textarea(); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <?= $form->field($model, 'dateStart')->widget(DateTimePicker::class, [
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'dd.MM.yyyy hh:i',
                    'autoclose'=>true,
                    'weekStart'=>1, //неделя начинается с понедельника
                    'startDate' => '01.08.2019 00:00', //самая ранняя возможная дата
                    'todayBtn'=>true, //снизу кнопка "сегодня"
                    'todayHighlight' => true
                ]
            ]) ?>
            <?=$form->field($model, 'duration')->textInput(); ?>
    </div>
    <div class="col-md-6">
            <?= $form->field($model, 'dateEnd')->widget(DateTimePicker::class, [
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'dd.MM.yyyy hh:i',
                    'autoclose'=>true,
                    'weekStart'=>1, //неделя начинается с понедельника
                    'startDate' => '01.08.2019 00:00', //самая ранняя возможная дата
                    'todayBtn'=>true, //снизу кнопка "сегодня"
                    'todayHighlight' => true
                ]
            ]) ?>
    </div>
</div>
<div class="row">
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
<pre><?= HelloWidget::widget(['message' => Yii::getAlias('@webroot')]) ?></pre>
