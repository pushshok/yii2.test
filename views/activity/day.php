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
$i = 0;
?>
<div class="container">
    <div class="col-md-6">
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
        <? //Выводит название файла ?>
        <?php print_r($model->files); ?>
        <br>
        <div class="col-md-12">
            <?php if($model->files):?>
                <?=\yii\helpers\Html::img('/images/'.$model->files,['width'=>250,'id'=>'id_'.$i])?>
            <?php endif; ?>
        </div>

        <br>

        <? //Эта конструкция не работает, говорит, что переменная должна быть массивом ?>
        <?php  /*$n = count($model->files); ?>
        <?php while($model->file):?>
        <div class="col-md-12">
            <?php if($i <= $n):?>
                <?=\yii\helpers\Html::img('/images/'.$model->file[$i],['width'=>250,'id'=>'id_'.$i])?>
            <?php endif; ?>
        </div>
            <?php $i++; ?>
        <?php endwhile; */?>
        <i><a href="<?=$session['history']; ?>">Предыдущая страница</a></i>
    </div>
</div>

