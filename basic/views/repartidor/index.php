<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepartidorBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repartidors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repartidor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repartidor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idRepartidor',
            'NyA',
            'TelRep',
            'nomcalle',
            'numcalle',
            //'idLoc',
            //'piso',
            //'depto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
