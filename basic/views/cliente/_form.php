<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="container-fluid">
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-6 padding-0 tt-enc-obj">
                   <?=($this->title!='' ? Html::encode($this->title) : 'Nuevo Cliente' ) ?>
                </div>
                <div class="col-sm-6 padding-0" align="right">
                    <?=Html::a( 'Volver ',['index'], [ 'class' => 'btn btn-buscar', 'title' => utf8_encode('Volver')] ); ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Nº Cliente:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'NroCli')->textInput()->label(false) ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Nombre:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Observaciones:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Nº Cuenta:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'idCuenta')->textInput()->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group" style="text-align:right">
                <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
