<?php

use kartik\grid\GridView;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'contentOptions' => ['class' => 'kartik-sheet-style'],
        'width' => '36px',
        //'pageSummary' => 'Total',
        //'pageSummaryOptions' => ['colspan' => 6],
        'header' => '',
        'headerOptions' => ['class' => 'kartik-sheet-style']
    ],
    [
        'attribute' => 'username',
        'value' => 'user.name',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'type_wc',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'wc_identify',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'number_w',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'd_type',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'tire_mat',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'wc_wdt',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'wc_ht',
        'vAlign' => 'middle',
    ],
];
?>
