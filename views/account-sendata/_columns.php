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
        'attribute' => 'time_stamp',
        'vAlign' => 'middle',
    ],

    [
        'attribute' => 'e',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'ax',
        'vAlign' => 'middle',
    ],

    [
        'attribute' => 'ay',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'az',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'gx',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'gy',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'gz',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'mx',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'my',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'mz',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'lat',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'lng',
        'vAlign' => 'middle',
    ],
//    [
//        'attribute' => 'p',
//        'vAlign' => 'middle',
//    ],
//    [
//        'attribute' => 's',
//        'vAlign' => 'middle',
//    ],
];
?>
