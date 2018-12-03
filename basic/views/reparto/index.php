<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepartoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repartos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reparto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reparto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idReparto',
            'fechaReparto',
            'idRepartidor',
            'cantSalida',
            'cantTotLLegLL',
            //'CantTotLLV',
            //'idCamion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
