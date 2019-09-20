<?php

use app\models\Activity;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php // echo Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'description:ntext',
                'dateStart',
                //'dateEnd',
                //'duration',
                //'author',
                //'file',
                //'repeatedType',
                //'isBlocked',
                //'useNotification',
                //'email:email',
                'createAt',
                //'isDeleted',
                'user_id',
                [
                    'attribute' => 'duration',
                    'value' => function (app\models\Activity $model) {
                        return $model->countDate();
                    }
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    } catch (Exception $e) {
        echo "Код ошибки: " . $e->getCode() . "<br>";
        echo "Причина: " . $e->getMessage() . "<br>";
        echo "На строке: " . $e->getLine() . "<br>";
    }
    ?>


</div>
