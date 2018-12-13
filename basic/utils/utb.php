<?php

namespace app\utils;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;

abstract class utb
{
 	/*---------------------------------------------------- FORMATOS DE DATOS -----------------------------------------------------------*/
 	/*----------------------------------------------------------------------------------------------------------------------------------*/
    public static function setCombo( $datos, $campocod='cod', $camponombre='nombre', $ninguno=0 )
    {
		$arreglo = [];
		
		$datos = json_decode(json_encode($datos), True);

		if($ninguno == 1)
			$datos = array_merge([0 => ['cod' => 0, 'nombre' => '<Ninguno>']], $datos);
		else if($ninguno == 2)
			$datos = array_merge([0 => ['cod' => 0, 'nombre' => '<Todos>']], $datos);
		else if($ninguno == 3)
			$datos = array_merge([0 => ['cod' => 0, 'nombre' => '<Seleccionar>']], $datos);

		$arreglo = ArrayHelper::map($datos, $campocod, $camponombre);
		asort($arreglo, SORT_STRING);

		return $arreglo;
    }
	
	public static function setDataProvider( $datos ){
	
		$dpDatos = new ArrayDataProvider([
						'allModels' => $datos,
						'pagination' => false
					]);
					
		return $dpDatos;			
	}
	
	public function cuitGuiones( $cuit ){
	
		$cuit = str_pad($cuit, 11, "0", STR_PAD_LEFT);
		$cuit = substr($cuit, 0, 2) . "-" . substr($cuit, 2, 8) . "-" . substr($cuit, -1);
		return $cuit;
	}

}
 ?>
