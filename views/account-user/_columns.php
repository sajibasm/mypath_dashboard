<?php


use kartik\grid\GridView;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'contentOptions' => ['class' => 'kartik-sheet-style'],
        'width' => '36px',
        'header' => '',
        'headerOptions' => ['class' => 'kartik-sheet-style']
    ],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'label'=>'Profile',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        // uncomment below and comment detail if you need to render via ajax
        'detailUrl' => Url::to(['/account-wheelchair/user-wheelchair']),
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true
    ],
    [
        'attribute' => 'name',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'com_num',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'email',
        'vAlign' => 'middle',
    ],
    [
        'label' => 'WheelChair',
        'vAlign' => 'middle',
        'hAlign'=>'center',
        'value'=>function ($model) {
            return count($model->accountWheelchairs);
        }
    ],

    [
        'attribute' => 'last_login',
        'vAlign' => 'middle',
    ],

    [
        'class' => 'kartik\grid\BooleanColumn',
        'attribute' => 'is_active',
        'vAlign' => 'middle'
    ]

];
?>
