<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AccountUser $model */

$this->title = Yii::t('app', 'Create Account User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Account Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
