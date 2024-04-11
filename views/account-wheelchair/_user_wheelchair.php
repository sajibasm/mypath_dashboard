<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AccountWheelchair $model */
/** @var app\models\AccountWheelchairSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
//$this->title = $model->name;
?>
<div class="account-user-view">

    <h5><?= Html::encode('WheelChair') ?></h5>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'time_stamp',
            'type_wc',
            'wc_identify',
            'number_w',
            'd_type',
            'tire_mat',
            'wc_wdt',
            'wc_ht'
        ],
    ]); ?>


</div>
