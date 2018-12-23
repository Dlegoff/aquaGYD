<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\utils\utb;

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
        <div class="panel-heading panel-header-gral">
                <h3 class="panel-title"> Datos Generales:</h3>
            </div>
            <div class="panel-body">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Nº Cliente:</div>
                    <div class="col-sm-1 padding-0">
                        <?= Html::activeInput( 'text',$model, 'NroCli',[
                                'class' => 'form-control',
                                'maxlength'=>3,
                                'style' => 'width: 90%',
                                'readonly' => true
                            ]);
                        ?>
                    </div>
                    <div class="col-sm-1 padding-0">Nº Cuenta:</div>
                    <div class="col-sm-1 padding-0">
                         <?= Html::activeInput( 'text',$model, 'idCuenta',[
                                    'class' => 'form-control controles',
                                    'maxlength'=>3,
                                    'style' => 'width: 90%',
                                ]);
                         ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Nombre:</div>
                    <div class="col-sm-4 padding-0">
                        <?= Html::activeInput( 'text',$model, 'nombre',[
                                'class' => 'form-control controles',
                                'maxlength'=>40,
                                'style' => 'width: 90%',
                            ]);
                     ?>
                    </div>
                    <div class="col-sm-1 padding-0">Tipo:</div>
                    <div class="col-sm-2 padding-0">
                    <?= Html::activeDropDownList( $model, 'tipocli',$tipos, [
                                'class' => 'form-control controles',
                                'style' => 'width: 90%',
                                'id' => 'tipocli',
                                'onchange' => 'f_mostrarDivs()'
                            ]);
                        ?>
                    </div>
                    <div class="col-sm-1 padding-0">Estado:</div>
                    <div class="col-sm-2 padding-0">
                    <?= Html::activeDropDownList( $model, 'estado',$estados=['A'=>'Activo','B'=>'Baja'], [
                                'class' => 'form-control controles',
                                'style' => 'width: 100%',
                                'id' => 'est'
                            ]);
                        ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Observaciones:</div>
                    <div class="col-sm-10 padding-0">
                         <?= Html::activeInput( 'text',$model, 'observaciones',[
                                'class' => 'form-control controles',
                                'maxlength'=>100,
                                'style' => 'width: 90%',
                            ]);
                         ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="panel-body hide" id="DivAbonado">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">CUIT:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::Input( 'text','cuit', null,[
                                'class' => 'form-control controles',
                                'maxlength'=>100,
                                'style' => 'width: 90%',
                            ]);
                         ?>
                    </div>
                    
                    <div class="col-sm-2 padding-0">Email:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::Input( 'text','email', null,[
                                'class' => 'form-control controles',
                                'maxlength'=>100,
                                'style' => 'width: 90%',
                            ]);
                         ?>
                    </div>

                    <div class="col-sm-2 padding-0">Cond. IVA:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::Input( 'text','condiva', null,[
                                'class' => 'form-control controles',
                                'maxlength'=>100,
                                'style' => 'width: 100%',
                            ]);
                         ?>
                    </div>

                </div>
            </div>

            <div class="panel-body hide" id="DivRevendedor">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Email:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::Input( 'text','email', null,[
                                'class' => 'form-control controles',
                                'maxlength'=>100,
                                'style' => 'width: 90%',
                            ]);
                         ?>
                    </div>
                    
                </div>
            </div>

            <div class="panel-body hide" id="DivDomestico">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">DNI:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::Input( 'text','dni', null,[
                                'class' => 'form-control controles',
                                'maxlength'=>100,
                                'style' => 'width: 90%',
                            ]);
                         ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading panel-header-gral">
            <h3 class="panel-title"> Datos de Domicilio:</h3>
        </div>
        <div class="panel-body">
            <div class="container-fluid flex-vertical-center">
                <div class="col-sm-2 padding-0">Localidad:</div>
                <div class="col-sm-2 padding-0">
                    <?= Html::activeDropDownList($model, 'localidad', /*$model->getLocalidades()*/ $localidades = ['1' => 'Parana', '2' => 'Oro Verde', '3' => 'San Benito'], [
                        'class' => 'form-control controles',
                        'style' => 'width: 90%'
                    ]);
                    ?>
                </div>
                <div class="col-sm-1 padding-0">Calle:</div>
                <div class="col-sm-1 padding-0">
                    <?= Html::activeInput('text', $model, 'calle_nro', [
                        'class' => 'form-control controles',
                        'maxlength' => 5,
                        'style' => 'width: 90%',
                    ]);
                    ?>
                </div>
                <div class="col-sm-6 padding-0">
                    <?= Html::activeInput('text', $model, 'calle_nom', [
                        'class' => 'form-control controles',
                        'maxlength' => 40,
                        'style' => 'width: 100%',
                    ]);
                    ?>
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

<script>
    function f_mostrarDivs(){

        if($('#tipocli').val() == 1){
            $('#DivAbonado').removeClass('hide');
            $('#DivDomestico').addClass('hide');
            $('#DivRevendedor').addClass('hide');
        }

        if($('#tipocli').val() == 2){
            $('#DivDomestico').removeClass('hide');
            $('#DivAbonado').addClass('hide');
            $('#DivRevendedor').addClass('hide');
        }

        if($('#tipocli').val() == 3){
            $('#DivRevendedor').removeClass('hide');
            $('#DivDomestico').addClass('hide');
            $('#DivAbonado').addClass('hide');
        }
        if($('#tipocli').val() == 0){
            $('#DivRevendedor').addClass('hide');
            $('#DivDomestico').addClass('hide');
            $('#DivAbonado').addClass('hide');
        }

    }
</script>
