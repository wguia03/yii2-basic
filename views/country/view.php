<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Country $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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

    <p>
        <?= Html::a('Update', ['update', 'code' => $model->code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'code' => $model->code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


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
    'params' => ['id' => 1000, 'kvdelete'=>true],
    ],
    'container' => ['id'=>'kv-demo'],
    'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]); ?>
</div>
