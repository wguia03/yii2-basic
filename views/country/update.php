<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\icons\Icon;
use kartik\icons\FontAwesomeAsset;

FontAwesomeAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\Country $model */

$this->title = 'Update Country: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'code' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php

$attributes = [
    [
        'columns' => [
            [
                'attribute'=>'code',
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'name',
                'valueColOptions'=>['style'=>'width:30%']
            ]
        ],
    ],
    [
        'attribute'=>'population',
        'valueColOptions'=>['style'=>'width:30%']
    ],
];
?>

<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'fadeDelay'=>false,
        'panel' => [
            'type' => 'primary',
            'heading' => 'Countries',
            'footer' => '<div class="text-center text-muted">This is a sample footer message for the detail view.</div>'
        ],
        'deleteOptions'=>[ // your ajax delete parameters
//        'params' => ['custom_param' => true, 'id' => $model->code],

            'url' => ['delete', 'code' => $model->code],

            'data' => [

                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),

                'method' => 'post',

            ],

        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]); ?>
</div>
