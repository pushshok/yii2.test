<?php
$session = Yii::$app->session;
$session['history'] = Yii::$app->request->referrer;
/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 10.08.19
 * Time: 22:20
 * @var $model \app\models\Day
 */
?>
<div class="container">
    <div class="col-md-6">
        <h1><?=$name; ?></h1>
        <h2>Сегодняшнее число: <?=$model->today; ?></h2>
        <h3><?php
        if ($model->weekend != true) {
            echo "- Рабочий день -";
        } else {
            echo "- Выходной день -";
        }
        ?></h3>
        <p>На сегодня назначены следующие события: <?=$model->event; ?></p>
        <i>Предыдущая страница: <?=$session['history']; ?></i>
    </div>
</div>

