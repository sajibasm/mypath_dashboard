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
        'attribute' => 'wheelchairType',
        'value' => 'wheelChair.type_wc',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'st',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'et',
        'vAlign' => 'middle',
    ],
    [
        'attribute'=> 'totalDuration',
        'vAlign' => 'middle',
    ],
//    [
//        'attribute' => 'sbt',
//        'vAlign' => 'middle',
//    ],

    [
        'attribute' => 'sq1',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'sq2',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'sq3',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'eq1',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'eq2',
        'vAlign' => 'middle',
    ],
//    [
//        'attribute' => 'v',
//        'vAlign' => 'middle',
//    ],
];
?>
