<?php

use app\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var app\models\CountrySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Países';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'code',
            'name',
            'population',
            [
                'class' => ActionColumn::className(),
                'template'=>"{view} {delete}",
                'urlCreator' => function ($action, Country $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'code' => $model->code]);
                },
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,
        'panel' => [
            'before'=> Html::a('<i class="glyphicon glyphicon-repeat"></i>Create New Row', ['create'], ['class' => 'btn btn-success']),
            'heading' => '<i class="fas fa-database"></i>  Países',
            'type' => 'info',
            'showFooter' => false,
        ],
        'toolbar' => [
            [
                'content' =>
                    Html::button('<i class="fas fa-plus"></i>', [
                        'class' => 'btn btn-success',
                        'title' => 'Nuevo Pais',
                        'onclick' => 'alert("This should launch the book creation form.\n\nDisabled for this demo!");'
                    ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [
                        'class' => 'btn btn-outline-secondary',
                        'title' => 'Reset Grid',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
    ]);?>
</div>
