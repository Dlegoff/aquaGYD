<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoTipoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producto Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producto Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codptipo',
            'nombre',
            'fechamod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
