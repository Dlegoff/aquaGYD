<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">
<?php $form = ActiveForm::begin(); ?>
<div class="container-fluid">
        <div class="panel panel-default">       
            <div class="panel-body flex-vertical-center">
                <div class="col-sm-6 padding-0 tt-enc-obj">
                   <?=($this->title!='' ? Html::encode($this->title) : 'Nuevo Producto' ) ?>
                </div>
                <div class="col-sm-6 padding-0" align="right">
                    <?=Html::a( 'Volver ',['index'], [ 'class' => 'btn btn-buscar', 'title' => utf8_encode('Volver')] ); ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Nº Producto:</div>
                    <div class="col-sm-10 padding-0">
                      <?= $form->field($model, 'idProd')->textInput()->label(false) ?>
                  </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Tipo:</div>
                    <div class="col-sm-10 padding-0">
                        <?= Html::activeDropDownList( $model, 'tipo', $tipos=['bidon 20 litros'=>'Bidon 20 Litros','bidon 10 litros'=>'Bidon 10 Litros','sifon 1 litro'=>'Sifon 1 Litro'], [
                                'class' => 'form-control',
                                'style' => 'width: 100%'
                            ]);
                        ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Stock:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'stock')->textInput()->label(false) ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Stock Min:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'stockMin')->textInput()->label(false) ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Precio:</div>
                    <div class="col-sm-10 padding-0">
                        <?= $form->field($model, 'precioU')->textInput()->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group" style="text-align:right">
             <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>
