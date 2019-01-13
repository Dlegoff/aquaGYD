<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\utils\utb;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

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
                    <?= Html::activeDropDownList( $model, 'estado',$estados=['A'=>'Activo','I'=>'Inactivo'], [
                                'class' => 'form-control controles',
                                'style' => 'width: 100%',
                                'id' => 'est'
                            ]);
                        ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Saldo:</div>
                    <div class="col-sm-2 padding-0"><b>Actual</b><br>
                        <?= Html::activeInput('text', $model, 'saldoAct', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 90%',
                        ]);
                        ?>
                        </div>
                        <div class="col-sm-2 padding-0">
                        <b>Limite</b><br>
                        <?= Html::activeInput('text', $model, 'saldoLim', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 80%',
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
                                'style' => 'width: 100%',
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
                         <?= Html::activeInput('text', $model, 'cuit', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 90%',
                        ]);
                        ?>
                    </div>
                    
                    <div class="col-sm-2 padding-0">Email:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::activeInput('text', $model, 'email', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 90%',
                        ]);
                        ?>
                    </div>

                    <div class="col-sm-2 padding-0">Cond. IVA:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::activeInput('text', $model, 'condiva', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 100%',
                        ]);
                        ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Monto:</div>
                    <div class="col-sm-2 padding-0">
                        <?= Html::activeInput('text', $model, 'monto', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 90%',
                        ]);
                        ?>
                    </div>

                    <div class="col-sm-2 padding-0">Cantidad:</div>
                    <div class="col-sm-2 padding-0">
                        <?= Html::activeInput('text', $model, 'cantidad', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 90%'
                        ]);
                        ?>
                    </div>

                    <div class="col-sm-2 padding-0">T. Bidon:</div>
                    <div class="col-sm-2 padding-0">
                        <?= Html::activeDropDownList($model, 'tbidon', utb::getAux("producto_tipo", 'codptipo'), [
                            'class' => 'form-control controles',
                            'style' => 'width: 100%'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Fecha Alq:</div>
                    <div class="col-sm-2 padding-0">
                        <?= DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'fchalq',
                            'dateFormat' => 'dd/MM/yyyy',
                            'options' => [
                                'class' => 'form-control controles',
                                'style' => 'text-align: center;width:90%;'
                            ],
                        ]);
                        ?>
                    </div>

                    <div class="col-sm-2 padding-0">Fecha Ini.:</div>
                    <div class="col-sm-2 padding-0">
                        <?= DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'fchini',
                            'dateFormat' => 'dd/MM/yyyy',
                            'options' => [
                                'class' => 'form-control controles',
                                'style' => 'text-align: center;width:90%;'
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="panel-body hide" id="DivRevendedor">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">Email:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::activeInput('text', $model, 'email', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 100%'
                        ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="panel-body hide" id="DivDomestico">
                <div class="container-fluid flex-vertical-center">
                    <div class="col-sm-2 padding-0">DNI:</div>
                    <div class="col-sm-2 padding-0">
                         <?= Html::activeInput('text', $model, 'dni', [
                            'class' => 'form-control controles',
                            'maxlength' => 100,
                            'style' => 'width: 100%'
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
                    <?= Html::activeDropDownList($model, 'localidad',$localidades, [
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
                        'style' => 'width: 90%'
                    ]);
                    ?>
                </div>
                <div class="col-sm-3 padding-0">
                    <?= Html::activeInput('text', $model, 'calle_nom', [
                        'class' => 'form-control controles',
                        'maxlength' => 40,
                        'style' => 'width: 90%'
                    ]);
                    ?>
                </div>
                <div class="col-sm-1 padding-0">Fecha:</div>
                <div class="col-sm-2 padding-0">
                    <?= DatePicker::widget([
                        'model' => $model,
                        'attribute' => 'fchloc',
                        'dateFormat' => 'dd/MM/yyyy',
                        'options' => [
                            'class' => 'form-control controles',
                            'style' => 'text-align: center;width:100%;'
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="container-fluid flex-vertical-center">
                <div class="col-sm-4 padding-0"></div>
                <div class="col-sm-1 padding-0">Piso:</div>
                    <div class="col-sm-1 padding-0">
                        <?= Html::activeInput('text', $model, 'piso', [
                            'class' => 'form-control controles',
                            'maxlength' => 5,
                            'style' => 'width: 90%'
                        ]);
                        ?>
                    </div>
                    <div class="col-sm-1 padding-0">Dpto:</div>
                    <div class="col-sm-1 padding-0">
                        <?= Html::activeInput('text', $model, 'dpto', [
                            'class' => 'form-control controles',
                            'maxlength' => 5,
                            'style' => 'width: 90%'
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
		<div class="panel-heading panel-header-gral flex-vertical-center">
			<div class="col-sm-6 padding-0">
				<h3 class="panel-title"> Datos de Contacto:</h3>
			</div>
			<div class="col-sm-6 padding-0" align="right">
				<?= Html::button(utf8_encode('Agregar'), ['class' => 'btn btn-buscar', 'title' => utf8_encode('Agregar'), 'onclick' => "f_agregar()"]); ?>
			</div>
		</div>
		<div class="panel-body" id="divControlesContacto">
		<?php if (count($model->contacto) > 0) { ?>
			<?php foreach ($model->contacto as $key => $value) { ?>
				<div class="form-group flex-vertical-center" id="orden<?= $value['orden'] ?>">
					<div class="col-sm-1 padding-0">Detalle:</div>
					<div class="col-sm-3 padding-0">
						<?= Html::Input('text', "Cliente[contacto][" . $value['orden'] . "][det]", $value['det'], [
                            'class' => 'form-control controles',
                            'maxlength' => 20,
                            'style' => 'width:95%'
                        ]);
                        ?>
					</div>
					<div class="col-sm-1 padding-0">Telefono:</div>
					<div class="col-sm-2 padding-0"><b>
						<?= Html::Input('text', "Cliente[contacto][" . $value['orden'] . "][tel]", $value['tel'], [
                            'class' => 'form-control controles',
                            'onkeypress' => 'return justNumbers( $(this).val())',
                            'maxlength' => 15,
                            'style' => 'width:80%'
                        ]);
                        ?>
					</b></div>
					<div class="col-sm-1 padding-right-0">
	    					<?= Html::Button('Borrar', ['class' => 'btn btn-danger', 'onclick' => 'f_borrar(' . $value['orden'] . ')']) ?>
	    			</div>
				</div>
			<?php 
    } ?>
	<?php 
    } ?>	
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

    function f_agregar(){
		var cant=$('#divControlesContacto > div.form-group').length+1;
		$('#divControlesContacto').append( 
			"<div class='form-group flex-vertical-center' id='orden"+cant+"'>"+
				"<div class='col-sm-1 padding-0'>Detalle:</div>"+
				"<div class='col-sm-3 padding-0'>"+
					"<input type=text name='Persona[contacto]["+cant+"][det]' class='form-control controles' style='width:95%' maxlength=20>"+
				"</div>"+
				"<div class='col-sm-1 padding-0'>Telefono:</div>"+
				"<div class='col-sm-2 padding-0'><b>"+
					"<input type=text name='Persona[contacto]["+cant+"][tel]' class='form-control controles' style='width:80%' onkeypress ='return justNumbers( $(this).val())' maxlength=15>"+
				"</b></div>"+
				"<div class='col-sm-1 padding-right-0'>"+
					"<button type=button class='btn btn-danger' onclick=f_borrar("+cant+")>Borrar</button>"+
				"</div>"+
			"</div>"
				);
	}

	function f_borrar(cant){
		$( "#orden" + cant ).remove();
	}
</script>
