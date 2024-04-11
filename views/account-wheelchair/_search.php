<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AccountWheelchairSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="account-wheelchair-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_wc') ?>

    <?= $form->field($model, 'wc_identify') ?>

    <?= $form->field($model, 'number_w') ?>

    <?= $form->field($model, 'd_type') ?>

    <?php // echo $form->field($model, 'tire_mat') ?>

    <?php // echo $form->field($model, 'wc_wdt') ?>

    <?php // echo $form->field($model, 'wc_ht') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
