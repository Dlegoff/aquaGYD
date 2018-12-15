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
                <h3 class="panel-title"> Listado de Clientes:</h3>
            </div>
            <div class="panel-body">
                <div class="container-fluid" style="margin-top:10px;">
                    <?php  echo $this->render('_search', ['model' => $searchModel,'tipos'=>$tipos]); ?>
                    <div class="panel-body flex-vertical-center">
                         <div class="col-sm-12">
                            <?= GridView::widget([
                                'id'    => 'grillaclientes',
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'headerRowOptions' => ['class' => 'grilla'],
                                'summaryOptions' => ['class' => 'hidden'],
                                'rowOptions' => ['class' => 'grilla'],
                                'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
                                'columns' => [
                                    //['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'NroCli', 'label' => 'Nº Cliente','contentOptions' => [ 'style' => 'text-align:center;width:7%;'] ],
                                    ['attribute' => 'nombre', 'label' => 'Nombre','contentOptions' => [ 'style' => 'text-align:left;width:20%'] ],
                                    ['attribute' => 'observaciones', 'label' => 'Observaciones','contentOptions' => [ 'style' => 'text-align:left;width:20%'] ],
                                    ['attribute' => 'idCuenta', 'label' => 'Nº Cuenta','contentOptions' => [ 'style' => 'text-align:center;width:7%'] ],
                                    ['attribute' => 'tipocli', 'label' => 'Tipo','contentOptions' => [ 'style' => 'text-align:center;width:7%'] ],
                                    ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:5%;']],
                                ],
                                  
                                   //'options' => ['style' => 'max-width:20%;'], 
                             ]); 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
