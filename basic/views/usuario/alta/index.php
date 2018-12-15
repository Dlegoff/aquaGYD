<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\BaseUrl;
use yii\jui\DatePicker;
use \yii\widgets\Pjax;
use yii\widgets\MaskedInput;
use app\utils\utb;


//$form = ActiveForm::begin('id'=>'formUsuarios' ]);
?>

<div class="container-fluid">
	<div class="panel panel-default">		
		<div class="panel-body flex-vertical-center">
			<div class="col-sm-10 padding-0 tt-enc-obj">
				<?php 
					print_r("Altas:");
				?>
			</div>	
				<div class="col-sm-2 padding-0" align='right'>
					<?php 
						echo Html::a( 'Volver ',['index'], [ 'class' => 'btn btn-buscar', 'title' => utf8_encode('Volver')] ); 	
					?>
				</div>
				
		</div>	
	</div>
	<div class="panel panel-default">
		<div class="panel-heading panel-header-gral">
			<h3 class="panel-title"> Secciones:</h3>
		</div>
		
		<div class="panel-body">
			<div class="container-fluid flex-vertical-center">
				<div class="col-sm-4">
					<?=Html::a( 'Clientes ',['//cliente/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Clientes')] ); ?>
				</div>

				<div class="col-sm-4">
					<?=Html::a( 'Productos ',['//producto/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Productos')] ); ?>
				</div>

				<div class="col-sm-4">
					<?=Html::a( 'Camiones ',['//camion/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>

			</div>
			<div class="container-fluid flex-vertical-center">
				<div class="col-sm-4">
					<?=Html::a( 'Dispenser ',['//dispenser/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>

				<div class="col-sm-4">
					<?=Html::a( 'Mantenimientos ',['//mantenimiento/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>
				<div class="col-sm-4">
					<?=Html::a( 'Localidades ',['//localidad/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>


			</div>
			<div class="container-fluid flex-vertical-center">
				<div class="col-sm-4">
					<?=Html::a( 'Empleados ',['//repartidor/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>
				<div class="col-sm-4">
					<?=Html::a( 'Repartos ',['//reparto/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>
				<div class="col-sm-4">
					<?=Html::a( 'Revendedores ',['//revendedor/index'], [ 'class' => 'btn boton-personalizado btn-block', 'title' => utf8_encode('Volver')] ); ?>
				</div>

			</div>
		</div>
	</div>
</div>

<?php
//ActiveForm::end();
echo Html::errorSummary([], ['style' => 'margin-top:10px;','id'=>'error', 'class' => "alert alert-danger text-left" ] );

?>
<script>

function f_Grabar(){

}





</script>
