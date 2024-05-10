<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\icons\Icon;
use kartik\icons\FontAwesomeAsset;

FontAwesomeAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\Country $model */
/** @var String $mode */

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
                'attribute' => 'code',
                'valueColOptions' => ['style' => 'width:30%']
            ],
            [
                'attribute' => 'name',
                'valueColOptions' => ['style' => 'width:30%']
            ]
        ],
    ],
    [
        'attribute' => 'population',
        'valueColOptions' => ['style' => 'width:30%']
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
        'mode' => $mode,
        'attributes' => $attributes,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'fadeDelay' => false,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="fas fa-database"></i> Países',
            'footer' => '<div class="text-center text-muted">This is a sample footer message for the detail view.</div>'
        ],
        'saveOptions' => ['label' => Icon::show('save') . " Guardar"],
        'updateOptions' => ['label' => Icon::show('edit') . " Editar"],
        'deleteOptions' => [
            'label' => Icon::show('trash') . " Borrar",
            'url' => ['delete', 'code' => $model->code],
            'confirm' => '¿Estás seguro que deseas eliminar este registro?',
        ],
    ]); ?>
</div>
