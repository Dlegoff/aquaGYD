<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteTipoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codctipo',
            'nombre',
            'fechamod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
