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

<div class="row">
    <div class="col-md-6">
        <h2><?=$name ?>:</h2>
        <p class="lead">Создание активности</p>
        <?php $form=\yii\bootstrap\ActiveForm::begin(); ?>
        <?=$form->field($model, 'title')->textInput(['id' => 'title' ]); ?>
        <?=$form->field($model, 'description')->textarea(); ?>
        <?=$form->field($model, 'duration')->textInput(['maxWidth' => 10 ]); ?>
        <?=$form->field($model, 'dateStart')->input('date'); ?>
        <?=$form->field($model, 'dateEnd')->input('date'); ?>
        <?=$form->field($model, 'repeatDate')->input('date'); ?>
        <?=$form->field($model, 'isBlocked')->checkbox(); ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
        <?php $form=\yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>
