<?php

use kartik\grid\GridView;
use kartik\mpdf\Pdf;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AccountUserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Account Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-user-index">
    <?= GridView::widget([
        'id' => 'user',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require(__DIR__ . '/_columns.php'), // check this value by clicking GRID COLUMNS SETUP button at top of the page
        //'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // offset from top
        'floatHeader' => true, // table header floats when you scroll
        'floatPageSummary' => false, // table page summary floats when you scroll
        'floatFooter' => false, // disable floating of table footer
        'pjax' => true, // pjax is set to always false for this demo
        // parameters from the demo form
        'responsive' => false,
        'bordered' => true,
        'striped' => false,
        'condensed' => true,
        'hover' => true,
        'showPageSummary' => true,
        'panel' => [
            //'after' => '<div class="float-right float-end"><button type="button" class="btn btn-primary" onclick="var keys = $("#kv-grid-demo").yiiGridView("getSelectedRows").length; alert(keys > 0 ? "Downloaded " + keys + " selected books to your account." : "No rows selected for download.");"><i class="fas fa-download"></i> Download Selected</button></div><div style="padding-top: 5px;"><em>* The page summary displays SUM for first 3 amount columns and AVG for the last.</em></div><div class="clearfix"></div>',
            'heading' => '<i class="fas fa-user"></i>  Users',
            'type' => 'primary',
            //'before' => '<div style="padding-top: 7px;"><em>* Resize table columns just like a spreadsheet by dragging the column edges.</em></div>',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        // set your toolbar
        'exportConfig' => [
            GridView::PDF => [
                'label' => 'Export Pdf',
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                //'showCaption' => true,
                'filename' => 'User' . date('Y_m_d_H_m_s'),
                'alertMsg' => 'The PDF export file will be generated for download.',
                'options' => ['title' => 'Portable Document Format'],
                'mime' => 'application/pdf',
                'config' => [
                    'mode' => Pdf::MODE_CORE,
                    'defaultFontSize' => 12,
                    'format' => Pdf::FORMAT_A4,
                    'destination' => Pdf::DEST_DOWNLOAD,
                    'orientation' => Pdf::ORIENT_PORTRAIT,
                    'marginTop' => 20,
                    'marginBottom' => 20,
                    'methods' => [
                        'SetTitle' => 'System Generated Report',
                        'SetSubject' => 'Generating PDF files',
                        'SetHeader' => ["|{User}|"],
                        'SetFooter' => ['MyPath Team' . '| Print: ' . Yii::$app->formatter->asDatetime('Now') . '|Page {PAGENO}|'],
                        'SetAuthor' => 'ASM Sajib',
                        'SetCreator' => 'ASM Sajib',
                    ],
                    'options' => [
                        'title' => 'Export Header',
                        'subject' => Yii::t('app', 'PDF export generate'),
                        'keywords' => Yii::t('app', 'report, export, pdf')
                    ],
                    //'contentBefore' => $title?:'System Generated Report',
                    'contentAfter' => '&copy; ' . Yii::$app->name . ' ' . date('Y')
                ]
            ],
            GridView::EXCEL => ['label' => 'Export Excel'],
        ],
        'toolbar' => [
            [
                'content' =>
                    Html::a('<i class="fas fa-redo"></i>', ['#'], [
                        'class' => 'btn btn-outline-secondary',
                        'title' => Yii::t('kvgrid', 'Reset'),
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        //'itemLabelSingle' => 'book',
        //'itemLabelPlural' => 'books'
    ]);
    ?>


</div>
