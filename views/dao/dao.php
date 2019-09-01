<?php

/**
 * Created by PhpStorm.
 * User: anysam
 * Date: 21.08.19
 * Time: 23:00
 */

/* @var $this \yii\web\View */
/* @var $users array */

use app\widgets\UserViewerWidget\UserViewerWidget; ?>

<div class="row">
    <div class="col-md-6">
        <?php echo UserViewerWidget::widget(['users' => $users]); ?>
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
            <?php echo UserViewerWidget::widget(['users' => $count]); ?>
    </div>
    <div class="col-md-6">
        <pre>
            <?php foreach ($reader as $value): ?>
            <?php print_r($value); ?>
            <?php endforeach; ?>
        </pre>
    </div>
</div>

