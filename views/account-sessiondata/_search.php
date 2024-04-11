<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AccountSessiondataSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="account-sessiondata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'st') ?>

    <?= $form->field($model, 'et') ?>

    <?= $form->field($model, 'sbt') ?>

    <?php // echo $form->field($model, 'wcId') ?>

    <?php // echo $form->field($model, 'sq1') ?>

    <?php // echo $form->field($model, 'sq2') ?>

    <?php // echo $form->field($model, 'sq3') ?>

    <?php // echo $form->field($model, 'eq1') ?>

    <?php // echo $form->field($model, 'eq2') ?>

    <?php // echo $form->field($model, 'v') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
