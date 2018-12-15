<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->NroCli;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">
    <div class="container-fluid">
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-8 padding-0 tt-enc-obj">
                    Cliente Nº <?= Html::encode($this->title) ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <div class="col-sm-4 padding-0" align='right'>
                     <?=Html::a( 'Volver ',['index'], [ 'class' => 'btn btn-buscar', 'title' => utf8_encode('Volver')] );?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-header-gral">
                <h3 class="panel-title"> Datos:</h3>
            </div>
            <div class="panel-body">
                <div class="container-fluid" style="margin-top:10px;">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    ['attribute' => 'NroCli', 'label' => 'Nº Cliente','contentOptions' => [ 'style' => 'text-align:center;width:7%;'] ],
                                    ['attribute' => 'nombre', 'label' => 'Nombre','contentOptions' => [ 'style' => 'text-align:center;width:20%'] ],
                                    ['attribute' => 'observaciones', 'label' => 'Observaciones','contentOptions' => [ 'style' => 'text-align:center;width:20%'] ],
                                    ['attribute' => 'idCuenta', 'label' => 'Nº Cuenta','contentOptions' => [ 'style' => 'text-align:center;width:7%'] ],
                                    ['attribute' => 'tipocli', 'label' => 'Tipo','contentOptions' => [ 'style' => 'text-align:center;width:7%'] ],
                                ],
                            ]) ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-12 padding-0" align='right'>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->NroCli], ['class' => 'btn btn-buscar']) ?>
                    <?= Html::a('Borrar', ['delete', 'id' => $model->NroCli], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
