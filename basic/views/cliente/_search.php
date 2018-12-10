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
        'id' => 'formClientes'
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-fluid flex-vertical-center">
                <div class="col-sm-1 padding-0">Nº Cliente:</div>
                <div class="col-sm-2 padding-0">
                    <?= Html::activeInput( 'text',$model, 'NroCli',[
                                'class' => 'form-control controles',
                                'onkeypress' => 'return justNumbers( $(this).val())',
                                'maxlength'=>4,
                                'style' => 'width: 90%',
                                'id'=>'NroCli',
                                'onchange' => 'f_buscar()'
                            ]);
                     ?>
                </div>
                <div class="col-sm-1 padding-0">Nombre:</div>
                <div class="col-sm-4 padding-0">
                     <?= Html::activeInput( 'text',$model, 'nombre',[
                                'class' => 'form-control controles',
                                'maxlength'=>40,
                                'style' => 'width: 90%',
                                'id'=>'nombre'
                            ]);
                     ?>
                </div>
                <div class="col-sm-1 padding-0">Nº Cuenta:</div>
                <div class="col-sm-2 padding-0">
                     <?= Html::activeInput( 'text',$model, 'idCuenta',[
                                'class' => 'form-control controles',
                                'onkeypress' => 'return justNumbers( $(this).val())',
                                'maxlength'=>4,
                                'style' => 'width: 90%',
                                'id'=>'idCuenta'
                            ]);
                     ?>
                </div>
            </div>
            
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>
</div>

<script>
 function f_buscar(){
    $('#formClientes').submit();
 }
</script>
