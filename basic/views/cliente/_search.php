<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">
<div class="container-fluid">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-fluid flex-vertical-center">
                <div class="col-sm-2 padding-0">Nº Cliente:</div>
                <div class="col-sm-1 padding-0">
                    <?= $form->field($model, 'NroCli')->label(false) ?>
                </div>
                <div class="col-sm-2 padding-0">Nombre:</div>
                <div class="col-sm-1 padding-0">
                    <?= $form->field($model, 'nombre')->label(false) ?>
                </div>
                <div class="col-sm-2 padding-0">Nº Cuenta:</div>
                <div class="col-sm-1 padding-0">
                    <?= $form->field($model, 'idCuenta')->label(false) ?>
                </div>
                <div class="col-sm-3 padding-0" align="right">
                    <?= Html::submitButton('Buscar', ['class' => 'btn btn-buscar']) ?>
                    <?= Html::resetButton('Borrar', ['class' => 'btn btn-default']) ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
