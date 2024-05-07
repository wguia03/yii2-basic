<?php

use app\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\CountrySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">
    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'code','label' => 'Code'],
            ['attribute'=>'name','label' => 'Name'],
            ['attribute'=>'population','label' => 'Population'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>"{view} {update} {delete}",
                'urlCreator' => function ($action, Country $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'code' => $model->code]);
                },
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,
        'panel' => [
            'before'=> Html::a('<i class="glyphicon glyphicon-repeat"></i>Create New Row', ['create'], ['class' => 'btn btn-success']),
            'heading' => '<h4 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h4>',
            'type' => 'info',
            'showFooter' => false,
        ],
    ]); Pjax::end(); ?>
</div>
