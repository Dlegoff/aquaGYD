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
					print_r("Consultas:");
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
			<h3 class="panel-title"> Datos Generales:</h3>
		</div>
		
		<div class="panel-body">
			<div class="container-fluid flex-vertical-center">
				<div class="col-sm-1 padding-0">CUIT:</div>
				<div class="col-sm-2 padding-0" id="cuit"><b></b></div>
				
				<div class="col-sm-1 padding-0">Nombre:</div>
				<div class="col-sm-1 padding-0" id="ag_id" style="font-weight: bold;"><b></b></div>


				<div class="col-sm-2 padding-right-0">Apellido:</div>
				<div class="col-sm-4 padding-0" id="ag_nom" style="font-weight: bold;"></div>
				
			</div>
				<?= GridView::widget([
                                'id'    => 'grillaclientes',
                                'dataProvider' => utb::setDataProvider($datos),
                                //'filterModel' => $searchModel,
                                'headerRowOptions' => ['class' => 'grilla'],
                                'summaryOptions' => ['class' => 'hidden'],
                                'rowOptions' => ['class' => 'grilla'],
                                'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
                                'columns' => [
                                    //['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'NroCli', 'label' => 'Nº Cliente','contentOptions' => [ 'style' => 'text-align:center;width:7%;'] ],
                                    ['attribute' => 'nombre', 'label' => 'Nombre','contentOptions' => [ 'style' => 'text-align:left;width:20%'] ],
                                    ['attribute' => 'observaciones', 'label' => 'Observaciones','contentOptions' => [ 'style' => 'text-align:left;width:20%'] ],
                                    ['attribute' => 'idCuenta', 'label' => 'Nº Cuenta','contentOptions' => [ 'style' => 'text-align:center;width:7%'] ],
                                    ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:5%;']],
                                ],
                                  
                                   //'options' => ['style' => 'max-width:20%;'], 
                             ]); 
                            ?>
				
			<div class="container-fluid flex-vertical-center">
				<div class="col-sm-12 padding-0" align="right">
					<?php		
						echo Html::button( utf8_encode('Grabar'), [ 'class' => 'btn btn-buscar','id'=>'btnGrabar', 'title' => utf8_encode('Grabar'), 'onclick' => "f_Grabar()" ] ); 			
					?>
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
