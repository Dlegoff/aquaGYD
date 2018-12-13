<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">
<div class="container-fluid">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-fluid flex-vertical-center">
                <div class="col-sm-1 padding-0">Nº Producto:</div>
                <div class="col-sm-2 padding-0">
                   <?= Html::activeInput( 'text',$model, 'idProd',[
                                'class' => 'form-control controles',
                                'onkeypress' => 'return justNumbers( $(this).val())',
                                'maxlength'=>4,
                                'style' => 'width: 90%',
                            ]);
                     ?>
                </div>
                <div class="col-sm-1 padding-0">Tipo:</div>
                <div class="col-sm-2 padding-0">
                   <?= Html::activeDropDownList( $model, 'tipo', $tipos=['bidon 20 litros'=>'Bidon 20 Litros','bidon 10 litros'=>'Bidon 10 Litros','sifon 1 litro'=>'Sifon 1 Litro'], [
                                'class' => 'form-control controles',
                                'style' => 'width: 100%'
                            ]);
                        ?>
                </div>
                <div class="col-sm-1 padding-0">Stock:</div>
                <div class="col-sm-2 padding-0">
                     <?= Html::activeInput( 'text',$model, 'stock',[
                                'class' => 'form-control controles',
                                'onkeypress' => 'return justNumbers( $(this).val())',
                                'maxlength'=>4,
                                'style' => 'width: 90%',
                            ]);
                     ?>
                </div>
                <div class="col-sm-1 padding-0">Stock Min.:</div>
                <div class="col-sm-2 padding-0">
                     <?= Html::activeInput( 'text',$model, 'stockMin',[
                                'class' => 'form-control controles',
                                'onkeypress' => 'return justNumbers( $(this).val())',
                                'maxlength'=>4,
                                'style' => 'width: 90%',
                            ]);
                     ?>
                </div>
            </div>
            <div class="container-fluid flex-vertical-center">
                <div class="col-sm-1 padding-0">Precio:</div>
                <div class="col-sm-2 padding-0">
                     <?= Html::activeInput( 'text',$model, 'precioU',[
                                'class' => 'form-control controles',
                                'onkeypress' => 'return justNumbers( $(this).val())',
                                'maxlength'=>4,
                                'style' => 'width: 90%',
                            ]);
                     ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
