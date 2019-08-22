<?php

/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 21.08.19
 * Time: 23:00
 */

/* @var $this \yii\web\View */
/* @var $users array */
?>

<div class="row">
    <div class="col-md-6">
        <pre>
            <? print_r($users); ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <? print_r($activityUser); ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <? print_r($acity); ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?=$count; ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php foreach ($reader as $value): ?>
            <?php print_r($value); ?>
            <?php endforeach; ?>
        </pre>
    </div>
</div>

