<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalidadTipoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Localidad Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localidad-tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Localidad Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codltipo',
            'nombre',
            'fechamod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
