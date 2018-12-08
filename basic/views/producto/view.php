<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->idProd;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">
<div class="container-fluid">
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-8 padding-0 tt-enc-obj">
                    Producto Nº <?= Html::encode($this->title) ?>
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
                            ['attribute' => 'idProd', 'label' => 'Nº Producto','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                            ['attribute' => 'tipo', 'label' => 'Tipo','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                            ['attribute' => 'stock', 'label' => 'Stock','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                            ['attribute' => 'stockMin', 'label' => 'Stock Min.','contentOptions' => [ 'style' => 'text-align:center;width:20%;'] ],
                            ['attribute' => 'precioU', 'label' => 'Precio','contentOptions' => [ 'style' => 'text-align:center;width:2%;'] ],
                          ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-12 padding-0" align='right'>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->idProd], ['class' => 'btn btn-buscar']) ?>
                    <?= Html::a('Borrar', ['delete', 'id' => $model->idProd], [
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
