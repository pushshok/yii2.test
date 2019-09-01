<?php



/* @var $this \yii\web\View */
use yii\bootstrap\ActiveForm;
/* @var $model \app\models\Users */
?>
<div class="row">
    <div class="col-md-6">
        <?php $form=ActiveForm::begin(); ?>
        <?=$form->field($model, 'email'); ?>
        <?=$form->field($model, 'password'); ?>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Регистрация</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
