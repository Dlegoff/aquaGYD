<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <div class="container-fluid">
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-8 padding-0 tt-enc-obj">
                    <?= Html::encode($this->title) ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <div class="col-sm-4 padding-0" align='right'>
                        <?php 
                            echo Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']);

                            echo Html::a( 'Volver ',['index'], [ 'class' => 'btn btn-buscar', 'title' => utf8_encode('Volver')] );
                        ?>
                    </div>
             </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-header-gral">
                <h3 class="panel-title"> Datos Generales:</h3>
            </div>
            <div class="panel-body">
                <div class="container-fluid" style="margin-top:10px;">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'headerRowOptions' => ['class' => 'grilla'],
                        'summaryOptions' => ['class' => 'hidden'],
                        'rowOptions' => ['class' => 'grilla'],
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'NroCli', 'label' => 'Nº Cliente','contentOptions' => [ 'style' => 'text-align:center'] ],
                            ['attribute' => 'nombre', 'label' => 'Nombre','contentOptions' => [ 'style' => 'text-align:center'] ],
                            ['attribute' => 'observaciones', 'label' => 'Observaciones','contentOptions' => [ 'style' => 'text-align:center'] ],
                            ['attribute' => 'idCuenta', 'label' => 'Nº Cuenta','contentOptions' => [ 'style' => 'text-align:center'] ],
                            ['attribute' => 'idLoc', 'label' => 'Cod. Localidad','contentOptions' => [ 'style' => 'text-align:center'] ],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
