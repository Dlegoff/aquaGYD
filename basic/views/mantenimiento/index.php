<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MantenimientoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mantenimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mantenimiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMant',
            'comentario',
            'costo',
            'fechamant',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
