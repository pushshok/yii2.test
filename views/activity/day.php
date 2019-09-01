<?php
$session = Yii::$app->session;
$session['history'] = Yii::$app->request->referrer;
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 10.08.19
 * Time: 22:20
 * @var $model \app\models\Activity
 * @var $day \app\models\Day
 */

/*
<h1><?=$name; ?></h1>
<h2>Сегодняшнее число: <?=$day->today; ?></h2>
<h3>Выходной ли? <?=$day->weekend ?> </h3>
<h3><?php
if ($day->weekend != true) {
    echo "- Рабочий день -";
} else {
    echo "- Выходной день -";
}
?></h3>

*/
?>
<div class="container">
    <div class="col-md-6">


        <p>На сегодня назначены следующие события:</p>
        <ul>
            <?php if($model->title): ?>
            <li><?=$model->title; ?></li>
            <?php endif; ?>

            <?php if($model->author): ?>
                <li><?=$model->author; ?></li>
            <?php endif; ?>

            <?php if($model->description): ?>
            <li><?=$model->description; ?></li>
            <?php endif; ?>

            <?php if($model->dateStart): ?>
            <li><?=$model->dateStart; ?></li>
            <?php endif; ?>

            <?php if($model->dateEnd): ?>
            <li><?=$model->dateEnd; ?></li>
            <?php endif; ?>

            <?php if($model->email): ?>
            <li><?=$model->email; ?></li>
            <?php endif; ?>


        </ul>

        <br>
        <h3>Фото с места событий:</h3>
        <div class="col-md-12">
            <?php if($model->files):?>
                <?php foreach ($model->files as $file): ?>
                <?=\yii\helpers\Html::img('/images/'.$file,['width'=>250,'id'=>'id_image']); ?>
                <br><br>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <?php if(($model->file) and (!$model->files)):?>
            <?php $files = explode(', ', $model->file); ?>
                <?php foreach ($files as $file): ?>
                    <?=\yii\helpers\Html::img('/images/'.$file,['width'=>250,'id'=>'id_image']); ?>
                    <br><br>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <br><br>

        <i><a href="<?=$session['history']; ?>">Предыдущая страница</a></i>
    </div>
</div>

