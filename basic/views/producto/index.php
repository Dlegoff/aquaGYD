<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">
    <div class="container-fluid">
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-8 padding-0 tt-enc-obj">
                    <?= Html::encode($this->title) ?>
                </div>
                <div class="col-sm-4 padding-0" align='right'>
                    <?php 
                        echo Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']);

                        echo Html::a( 'Volver ',['//site/index'], [ 'class' => 'btn btn-buscar', 'title' => utf8_encode('Volver')] );
                    ?>
                </div>
             </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-header-gral">
                <h3 class="panel-title"> Listado de Productos:</h3>
            </div>
            <div class="panel-body">
                <div class="container-fluid" style="margin-top:10px;">
                            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                    <div class="panel-body flex-vertical-center">
                         <div class="col-sm-12">
                            <?= GridView::widget([
                                'id'    => 'grillaproductos',
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'headerRowOptions' => ['class' => 'grilla'],
                                'summaryOptions' => ['class' => 'hidden'],
                                'rowOptions' => ['class' => 'grilla'],
                                'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
                                'columns' => [
                                    ['attribute' => 'idProd', 'label' => 'Nº Producto','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                                    ['attribute' => 'tipo', 'label' => 'Tipo','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                                    ['attribute' => 'stock', 'label' => 'Stock','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                                    ['attribute' => 'stockMin', 'label' => 'Stock Min.','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                                    ['attribute' => 'precioU', 'label' => 'Precio','contentOptions' => [ 'style' => 'text-align:center;width:2%;'] ],
                                    ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:7.5%;']],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
