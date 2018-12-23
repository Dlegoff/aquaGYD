<?php

namespace app\utils;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\data\SqlDataProvider;
use yii\db\Exception;
use yii\web\JsExpression;

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

	public static function getFormatoModif($usrmod, $fchmod, $retornarNull = 0)
	{
		$modif = '';
		$usrmod_nom = utb::getCampo('sam.sis_usuario', 'usr_id=' . ($usrmod == '' ? 0 : $usrmod));
		$fecha = date_format(date_create($fchmod), 'd/m/Y');

		if ($usrmod_nom == '') {
			if (!$retornarNull)
				$modif = $fecha;
		} else {
			$modif = $usrmod_nom . ' - ' . $fecha;
		}

		return $modif;
	}

	/**
	 * Recupera el valor de un campo de una tabla
	 * @param string nombre de la tabla
	 * @param string condicion de busqueda
	 * @param string nombre del campo a buscar
	 *
	 */
	public static function getCampo($tabla, $cond, $camponombre = 'nombre')
	{

		$sql = 'Select ' . $camponombre . ' From ' . $tabla;

		if ($cond != '')
			$sql .= ' Where ' . $cond;

		$nombre = Yii::$app->db->createCommand($sql)->queryScalar();

		return $nombre;
	}

	/**
	 *
	 */
	public static function getVariosCampos($tabla, $cond = '', $campos = 'nombre')
	{

		$sql = "Select $campos From $tabla" . (!empty($cond) ? " Where $cond" : "");

		return Yii::$app->db->createCommand($sql)->queryOne();
	}

	/**
	 * Función que se utiliza para verificar la existencia de un elemento en la BD.
	 * @param string $tabla Tabla para la consulta en la BD.
	 * @param string $cond Condición para la consulta.
	 */
	public static function verificarExistencia($tabla, $cond)
	{
		$sql = "SELECT EXISTS (Select 1 From " . $tabla . " Where " . $cond . ")";

		return Yii::$app->db->createCommand($sql)->queryScalar();
	}

	/**
	 * Función que recupera los datos de una tabla
	 * @param string $tabla Tabla de la que se extraeran los datos
	 * @param string $cond Condicion por la cual se filtrara la busqueda.
	 * @param string $campos Campos que devuelven la consulta, separados por coma (,)
	 * @param integer $cantmostrar Cantidad de elementos para paginacion
	 *
	 * @return dataProvider Con los datos de la tabla
	 */
	public static function DataProviderGeneral($tabla, $cond = '', $campos, $cantmostrar = 15)
	{
		$sql = 'Select count(*) From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');
		$count = Yii::$app->db->createCommand($sql)->queryScalar();

		$sql = 'Select ' . $campos . ' From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');

		$dataProvider = new SqlDataProvider([
			'sql' => $sql,
			'totalCount' => (int)$count,
			'pagination' => [
				'pageSize' => $cantmostrar,
			],
		]);

		return $dataProvider;

	}

	/**
	 * Funcion que convierte un array en dataprovider
	 * @param array $datos array a convertir
	 *
	 * @return dataprovider del array
	 */
	public static function arrayToDataProvider($array, $key = '', $pagesize = '')
	{

		$arrayDP = ['allModels' => $array];
		if ($key != '')
			$arrayDP['key'] = $key;

		if ($pagesize != '')
			$arrayDP['pagination'] = ['pagesize' => $pagesize];
		else
			$arrayDP['pagination'] = false;

		$dataProvider = new ArrayDataProvider($arrayDP);


		return $dataProvider;
	}

	/**
	 * Función que recupera los datos de una consulta
	 * @param string $sql condición
	 * @param integer $cantmostrar Cantidad de elementos para paginacion
	 *
	 * @return dataProvider Con los datos de la tabla
	 */
	public static function DataProviderGeneralCons($sql, $cantmostrar = 15, $key = '')
	{

		$count = Yii::$app->db->createCommand($sql)->queryAll();

		$dataProvider = new SqlDataProvider([
			'sql' => $sql,
			'totalCount' => count($count),
			'pagination' => [
				'pageSize' => $cantmostrar,
			],
			'key' => ($key != '' ? $key : null)
		]);

		return $dataProvider;

	}

	/**
	 * Función que recupera los datos de una consulta
	 * @param string $sql condición
	 * @return array Con los datos de la consulta
	 */
	public static function ArrayGeneralCons($sql)
	{

		$array = Yii::$app->db->createCommand($sql)->queryAll();

		return $array;

	}

	/********************************************	OBJETO	********************************************************/
	/**
	 * Recupera el nombre de un objeto
	 * @param string codigo de objeto
	 * @param boolean $tieneComillas Si el codigo de objeto ya contiene las comillas simples, false si hay que concatenarselas al principio y final
	 */
	/*public static function getNombObj($obj_id, $tieneComillas = true)
	{
		$nombre = '';
		if ($obj_id !== '') {

			if (!$tieneComillas) $obj_id = "'$obj_id'";
			$sql = "Select nombre from objeto where obj_id=" . $obj_id;
			$nombre = Yii::$app->db->createCommand($sql)->queryScalar();
		}
		return $nombre;
	}

	/**
	 * Recupera el codigo completo de un objeto
	 * @param integer codigo de tipo objeto
	 * @param integer numero de objeto
	 */
	/*public static function getObjeto($tobj, $obj_id)
	{
		$obj_id = preg_replace('/[^0-9]+/', '', $obj_id);

		$sql = 'Select Letra From objeto_tipo Where Cod=' . $tobj;
		$letra = Yii::$app->db->createCommand($sql)->queryScalar();

		$objeto = $letra . str_pad($obj_id, 7, "0", STR_PAD_LEFT);

		return $objeto;
	}

	/**
	 * Recupera el tipo de objeto
	 * @param string codigo de objeto
	 */
	/*public static function getTObj($obj_id)
	{
		$sql = "Select TObj From objeto Where obj_id='" . $obj_id . "'";
		$tobj = Yii::$app->db->createCommand($sql)->queryScalar();

		return $tobj;
	}

	/**
	 * Recupera el nombre de tipo de objeto
	 * @param string codigo de objeto
	 */
	/*public static function getTObjNom($obj_id)
	{
		$tobj = utb::getTObj($obj_id);
		$sql = "Select nombre From objeto_tipo Where cod=" . ($tobj == '' ? 0 : $tobj);
		$tobjnom = Yii::$app->db->createCommand($sql)->queryScalar();

		return $tobjnom;
	}

	/**
	 * Recupera el obj_dato de objeto
	 * @param string codigo de objeto
	 */
	/*public static function getObjDato($obj_id)
	{
		$sql = "Select obj_dato From objeto Where obj_id='" . $obj_id . "'";
		$obj_dato = Yii::$app->db->createCommand($sql)->queryScalar();

		return $obj_dato;
	}


	/**
	 * Devuelve un arreglo con los elementos que se validan como computados
	 */
	/*public static function getComputados()
	{
		$sql = "SELECT cc.campo FROM objeto_computa c inner join objeto_computa_campo cc on c.computa_id = cc.computa_id where c.tobj=1";
		$compu = Yii::$app->db->createCommand($sql)->queryAll();
		return $compu;
	}*/


	public static function ValidarCUIT($cuit)
	{
		if (strlen($cuit) < 11) return 0;
		$base = "54327654321";
		$total = 0;
		for ($i = 0; $i <= 10; $i++) {
			$total = $total + substr($cuit, $i, 1) * substr($base, $i, 1);
		}
		if ($total % 11 == 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public static function validaCuit($cuit)
	{

		$sql = "select * from sam.uf_cuit_valida('$cuit')";

		$resul = Yii::$app->db->createCommand($sql)->queryScalar();

		return $resul;
	}

	public static function ValidarCBU($cbu)
	{
		$sql = "select * from sam.uf_banco_cbu_valida('$cbu')";
		$resp = Yii::$app->db->createCommand($sql)->queryScalar();
		return $resp;
	}

	public static function InmArmarNC($s1, $s2, $s3, $manz, $parc)
	{
		$sql = "select sam.uf_inm_armar_nc ('" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $manz . "','" . $parc . "')";
		$nc = Yii::$app->db->createCommand($sql)->queryScalar();
		return $nc;
	}


	public static function InmArmarNCGuiones($s1, $s2, $s3, $manz, $parc)
	{
		$sql = "select sam.uf_inm_armar_nc_guiones ('" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $manz . "','" . $parc . "')";
		$nc = Yii::$app->db->createCommand($sql)->queryScalar();
		return $nc;
	}

	public static function CemArmarNC($tipo, $cuadro, $cuerpo, $nume)
	{
		$sql = "select sam.uf_cem_armar_nc ('" . $tipo . "','" . $cuadro . "','" . $cuerpo . "'," . $nume . ")";
		$nc = Yii::$app->db->createCommand($sql)->queryScalar();
		return $nc;
	}


	public static function CemArmarNCGuiones($tipo, $cuadro, $cuerpo, $nume)
	{
		$sql = "select sam.uf_cem_armar_nc_guiones ('" . $tipo . "','" . $cuadro . "','" . $cuerpo . "'," . $nume . ")";
		$nc = Yii::$app->db->createCommand($sql)->queryScalar();
		return $nc;
	}

	/**
	 * Función que se utiliza para verificar la existencia de un objeto en la BD
	 * @param integer $cod Código identificador del tipo de objeto.
	 * @param string $obj_id Id de objeto para consultar.
	 */
	public static function verificarExistenciaObjeto($tobj, $obj_id)
	{

		$sql = "SELECT EXISTS (SELECT 1 FROM objeto WHERE tobj = " . $tobj . " AND obj_id = " . $obj_id . ")";

		return Yii::$app->db->createCommand($sql)->queryScalar();
	}


	/********************************************	TRIBUTO	********************************************************/
	/**
	 * Recupera el nombre de un tributo
	 * @param integer codigo de tributo
	 */
	public static function getNombTrib($trib_id)
	{
		$nombre = '';

		if ($trib_id > 0) {
			$sql = 'Select nombre from trib where trib_id=' . $trib_id;
			$nombre = Yii::$app->db->createCommand($sql)->queryScalar();
		}
		return $nombre;
	}

	/**
	 * Recupera el tipo de un tributo
	 * @param integer codigo de tributo
	 */
	public static function getTTrib($trib_id)
	{
		$tipo = 0;

		if ($trib_id > 0) {
			$sql = 'Select tipo from trib where trib_id=' . $trib_id;
			$tipo = Yii::$app->db->createCommand($sql)->queryScalar();
		}

		return $tipo;
	}

	/**
	 * Recupera el tipo de objeto según tributo
	 * @param integer codigo de tributo
	 */
	public static function getTObjTrib($trib_id)
	{
		$sql = 'Select TObj From trib Where trib_id=' . $trib_id;
		$tobj = Yii::$app->db->createCommand($sql)->queryScalar();

		return $tobj;
	}

	/**
	 * Recupera el nombre del tipo de objeto seg�n tributo
	 * @param integer codigo de tributo
	 */
	public static function getTObjNomTrib($trib_id)
	{
		$sql = 'Select TObj From trib Where trib_id=' . $trib_id;
		$tobj = Yii::$app->db->createCommand($sql)->queryScalar();

		$sql = "Select nombre From objeto_tipo Where cod=" . ($tobj == '' ? 0 : $tobj);
		$tobjnom = Yii::$app->db->createCommand($sql)->queryScalar();

		return $tobjnom;
	}

	/**
	 * Recupera el código de objeto según obj_id y tributo.
	 * @param integer $trib_id Identificador de tributo.
	 * @param string $obj_id Identificador de objeto.
	 */
	public static function getObjSegunTribAndObj_id($trib_id, $obj_id)
	{

		$tobj = utb::getTObjTrib($trib_id);

		return utb::getObjeto($tobj, $obj_id);
	}

	/**
	 * Recupera los años de prescripcion del tributo
	 */
	public static function getTribPrescrip($trib_id)
	{
		$sql = 'Select prescrip From trib Where trib_id=' . $trib_id;
		$prescrip = Yii::$app->db->createCommand($sql)->queryScalar();


		return $prescrip;
	}

	/**
	 * Recupera lista de tributos especiales
	 */
	public static function getTribEsp()
	{
		return '(1,2,4,6,7,8,10)';
	}

	/**
	 * Tributos de Tipo Interno
	 */
	public static function getTribInt()
	{
		$arrayTribInt = [
			"plan" => 1,
			"facilida" => 2,
			"contmej" => 3,
			"fiscaliza" => 4,
			"gastjudi" => 5,
			"cajaext" => 6,
			"cemevent" => 7,
			"cemalq" => 8,
			"juzgado" => 9,
			"carnet" => 10,
			"pubempre" => 11,
			"recibo" => 12
		];

		return $arrayTribInt;
	}


	/**
	 * Permite obtener el periodo actual de un tributo
	 * @param int trib_id Codigo de Tributo
	 *
	 * @return int periodo (anio [4] + cuota [3]
	 */
	public static function PerActual($trib_id)
	{
		$sql = 'Select r.cant_anio From resol r Where r.trib_id=' . $trib_id . ' and ' . (date('Y') * 1000 + date('m')) . ' between r.perdesde and r.perhasta';

		$CantAnio = Yii::$app->db->createCommand($sql)->queryScalar();

		if ($CantAnio > 0) {
			$PerActual = intval(date('m') / (12 / $CantAnio));
			$PerActual = date('Y') * 1000 + $PerActual;

			return $PerActual;
		} else {
			return 0;
		}
	}

	public static function PerActualFch($trib_id, $fch)
	{
		$fecha = explode('-', $fch);
		$per = $fecha[0] * 1000 + 1;

		$sql = 'Select r.cant_anio From resol r Where r.trib_id=' . $trib_id . ' and ' . $per . ' between r.perdesde and r.perhasta';
		$CantAnio = Yii::$app->db->createCommand($sql)->queryScalar();

		if ($CantAnio > 0) {
			$PerActual = intval($fecha[1] / (12 / $CantAnio));
			$PerActual = $fecha[0] * 1000 + $PerActual;

			return $PerActual;
		} else {
			return 0;
		}
	}


	/**
	 * Permite obtener el periodo segun tributo y mes indicado
	 * @param int trib_id Codigo de Tributo
	 * @param int mes Numero de mes
	 *
	 * @return int periodo (anio [4] + cuota [3]
	 */
	public static function PerxMes($trib_id, $anio, $mes)
	{
		$per = $anio . '001';
		$sql = 'Select r.cant_anio From resol r Where r.trib_id=' . $trib_id . ' and ' . $per . ' between r.perdesde and r.perhasta';
		$CantAnio = Yii::$app->db->createCommand($sql)->queryScalar();

		if ($CantAnio > 0) {
			if ($anio == 0) $anio = date('Y');
			$PerxMes = intval($mes / (12 / $CantAnio));
			$PerxMes = intval($anio * 1000 + $PerxMes);

			return $PerxMes;
		} else {
			return 0;
		}
	}


	/********************************************	AUXILIARES	********************************************************/

	/**
	 * Función que recupera los datos de una tabla auxiliar
	 * @param string $tabla Tabla de la que se extraeran los datos
	 * @param string $cond Condicion por la cual se filtrara la busqueda.
	 * @param string $campocod Campo clave
	 * @param string $camponombre Campo con la descricion o nombre
	 * @param integer $cantmostrar Cantidad de elementos para paginacion
	 *
	 * @return dataProvider Con los datos de la tabla
	 */
	public static function DataProviderAux($tabla, $cond = '', $campocod = 'cod', $camponombre = 'nombre', $cantmostrar = 15, $order = '')
	{
		$sql = 'Select count(*) From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');
		$count = Yii::$app->db->createCommand($sql)->queryScalar();

		$sql = 'Select ' . $campocod . ' as cod,' . $camponombre . ' as nombre From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');
		if ($order !== '') $sql .= " order by " . $order;

		$dataProvider = new SqlDataProvider([
			'sql' => $sql,
			'key' => 'cod',
			'totalCount' => (int)$count,
			'pagination' => [
				'pageSize' => $cantmostrar,
			],
		]);

		return $dataProvider;

	}

	/**
	 * Función que recupera los datos de una tabla auxiliar
	 * @param string $tabla Tabla de la que se extraeran los datos
	 * @param string $cond Condicion por la cual se filtrara la busqueda.
	 * @param string $campocod Campo clave
	 * @param string $camponombre Campo con la descricion o nombre
	 * @param string $camposExtra Campos extra
	 * @param integer $cantmostrar Cantidad de elementos para paginacion
	 *
	 * @return dataProvider Con los datos de la tabla
	 */
	public static function DataProviderAuxConExtras($tabla, $cond = '', $campocod = 'cod', $camponombre = 'nombre', $camposExtra, $cantmostrar = 15, $order = '')
	{
		$sql = 'Select count(*) From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');
		$count = Yii::$app->db->createCommand($sql)->queryScalar();

		$sql = 'Select ' . $campocod . ' as cod,' . $camponombre . ' as nombre' . ($camposExtra != '' ? ',' . $camposExtra : '') . ' From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');
		if ($order !== '') $sql .= " order by " . $order;

		$dataProvider = new SqlDataProvider([
			'sql' => $sql,
			'key' => 'cod',
			'totalCount' => (int)$count,
			'pagination' => [
				'pageSize' => $cantmostrar,
			],
		]);

		return $dataProvider;

	}


	/**
	 * Obtiene un arreglo con arreglos asociativos de las tuplas de la tabla solicitada, donde cada arreglo contiene el $campocod y su $camponombre
	 *
	 * @param string $tabla - Tabla de donde buscar los datos.
	 * @param string $campocod = 'cod' - Nombre de la columna de codigo.
	 * @param string $camponombre = 'nombre' - Nombre de la columna del dato que se desea.
	 * @param int $ninguno = 0 - Si el valor es 1, al principio del arreglo se agrega ['0' => '<ninguno>'].
	 * @param string $cond = '' - Condicion para seleccionar los datos.
	 * @param string $orden = '' - Critero de orden de la consulta.
	 * @param boolean $concatenar = false - Si es true, $camponombre se retornara como '$campocod - $camponombre'.
	 * @param string $extraSql = '' - Añade el sql antes de la clausula order by
	 *
	 * @return Array - Array asociativo con los datos de la consulta. Un arreglo vacio significa que la consulta no arrojo ningun resultado o fallo
	 */
	public static function getAux($tabla, $campocod = 'cod', $camponombre = 'nombre', $ninguno = 0, $cond = '', $orden = '', $concatenar = false, $extraSql = '')
	{
		$arreglo = [];

		if ($orden == '')
			$orden = $camponombre;

		if ($concatenar)
			$camponombre = '(' . $campocod . " || ' - ' || " . $camponombre . ')';

		$sql = 'Select ' . $campocod . ' as cod, ' . $camponombre . ' as nombre ';
		$sql .= 'From ' . $tabla . ($cond !== '' ? ' Where ' . $cond : '');

		if (!empty($extraSql)) $sql .= ' ' . $extraSql . ' ';

		$sql .= ' Order By ' . $orden;

		try {
			$cmd = Yii::$app->db->createCommand($sql);
			$res = $cmd->queryAll();

			if ($ninguno == 1)
				$res = array_merge([0 => ['cod' => 0, 'nombre' => '<Ninguno>']], $res);
			else if ($ninguno == 2)
				$res = array_merge([0 => ['cod' => 0, 'nombre' => '<Todos>']], $res);
			else if ($ninguno == 3)
				$res = array_merge([0 => ['cod' => 0, 'nombre' => '<Seleccionar>']], $res);
			else if ($ninguno != '')
				$res = array_merge([0 => ['cod' => 0, 'nombre' => "<$ninguno>"]], $res);

			$arreglo = ArrayHelper::map($res, 'cod', 'nombre');
			asort($arreglo, SORT_STRING);
		} catch (Exception $e) {
			$arreglo = [];
		}

		return $arreglo;
	}


	/**
	 * TODO utiulizar el campo $ninguno como en getAux y extraSql
	 */
	public static function getAuxVarios($tablas = [], $campos = ['cod', 'nombre'], $alias = [], $ninguno = 0, $cond = '', $orden = '', $extrasSql = '')
	{

		$ret = [];

		if (count($tablas) > 0 && count($campos) > 0) {

			if (!is_array($alias)) $alias = [];

			$sql = "Select";

    		//se agregan las columnas a buscar con sus respectivos alias
			$actual = 1;
			foreach ($campos as $c) {

				$sql .= " $c";

	    		//alias
				if (array_key_exists($c, $alias)) $sql .= ' As ' . $alias[$c];

	    		//coma despues de cada columna excepto en la ultima
				if ($actual < count($campos)) $sql .= ',';

				$actual++;
			}

			$sql .= " From";

			$actual = 1;
    		//se agregan las tablas en el from
			foreach ($tablas as $t) {
				$sql .= " $t";

				if ($actual < count($tablas)) $sql .= ',';

				$actual++;
			}

			//se agrega la condicion
			if (!empty($cond)) $sql .= " Where $cond";

			if (!empty($orden)) $sql .= " Order By $orden";

			try {
				$ret = Yii::$app->db->createCommand($sql)->queryAll();
			} catch (Exception $e) {
				var_dump($e->errorInfo);
				$ret = [];
			}
		}
		//var_dump($ret);
		return $ret;
	}

	/********************************************	FORMATOS	********************************************************/
	public function ComillasSimples($str)
	{
		return str_replace("'", "''", $str);
	}

	public function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT)
	{
		$diff = strlen($input) - mb_strlen($input, 'UTF-8');
		return str_pad($input, $pad_length + $diff, $pad_string, $pad_type);
	}

	public function limpiarString($cadena)
	{
		$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ*º°';
		$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyyby   ';
		$cadena = utf8_decode($cadena);
		$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
		return utf8_encode($cadena);
	}

	public function limpiarStringUpper($cadena)
	{
		return strtoupper(utb::limpiarString($cadena));
	}

	public function NumeroALetra($num)
	{
		$nombre = "";
		$num = str_replace(",", ".", $num);
		$posPto = strpos($num, ".");
		if ($posPto === false) {
			$entero = $num;
			$dec = "00";
		} else {
			$entero = substr($num, 0, $posPto);
			$dec = substr($num, $posPto + 1);
		}

		$numnom = [
			'1' => 'uno', '2' => 'dos', '3' => 'tres', '4' => 'cuatros', '5' => 'cinco', '6' => 'seis', '7' => 'siete', '8' => 'ocho', '9' => 'nueve',
			'10' => 'diez', '11' => 'once', '12' => 'doce', '13' => 'trece', '14' => 'catorce', '15' => 'quince',
			'20' => 'veinte', '30' => 'treita', '40' => 'cuarenta', '50' => 'cincuenta', '60' => 'sesenta', '70' => 'setenta', '80' => 'ochenta', '90' => 'noventa',
			'100' => 'cien', '500' => 'quinientos', '700' => 'seteciento', '900' => 'novecientos'
		];

		if ($entero <= 15 or (strlen($entero) == 2 and $entero[1] == 0))
			$nombre .= $numnom[$entero];
		else {
			for ($i = 0; $i < strlen($entero); $i++) {
				if ($entero[$i] != 0) {
					$largo = strlen($entero) - $i;
					$multiplicar = str_pad("1", $largo, "0");

					if ($largo >= 3 and !in_array($entero[$i] * $multiplicar, [100, 500, 700, 900])) {
						if ($largo == 3)
							$nombre .= " " . $numnom[$entero[$i]] . "cientos";
						if ($largo == 4) {
							if (strlen($entero) == $largo)
								$nombre .= $entero[$i] == 1 ? " mil " : $numnom[$entero[$i]] . " mil ";
							elseif (!in_array($entero[$i + 1], [0, 1, 2, 3, 4, 5]))
								$nombre .= " y " . $numnom[$entero[$i]] . " mil ";
						}
						if ($largo == 5)
							if (strlen($entero) == $largo)
							$nombre .= " " . $numnom[$entero[$i] * 10];
						elseif (in_array($entero[$i + 1], [0, 1, 2, 3, 4, 5]))
							$nombre .= " " . $numnom[$entero[$i] . $entero[$i + 1]] . " mil ";
						if ($largo == 6)
							$nombre .= $numnom[$entero[$i] * 100];
					} else
						$nombre .= ($multiplicar == 1 && $numnom[$entero[$i] * $multiplicar] != "" ? " y " : " ") . $numnom[$entero[$i] * $multiplicar];
				}
			}
		}

		return $nombre;
	}

	public function getNombreMes()
	{
		return [
			'1' => 'Enero',
			'2' => 'Febrero',
			'3' => 'Marzo',
			'4' => 'Abril',
			'5' => 'Mayo',
			'6' => 'Junio',
			'7' => 'Julio',
			'8' => 'Agosto',
			'9' => 'Septiembre',
			'10' => 'Octubre',
			'11' => 'Noviembre',
			'12' => 'Diciembre',
		];
	}

	public function periodoFormat($periodo, $separador = '/')
	{

		$periodo = str_pad($periodo, 7, "0", STR_PAD_LEFT);
		$periodo = substr($periodo, 0, 4) . $separador . substr($periodo, -3);
		return $periodo;
	}

	public function LimpiarVariablesReporte()
	{

		unset(Yii::$app->session['proceso_asig']);
		unset(Yii::$app->session['sql']);
		unset(Yii::$app->session['titulo']);
		unset(Yii::$app->session['condicion']);
		unset(Yii::$app->session['columns']);

	}

	/*
	 * Funcion que asigna clases de solo-lectura, disabled y resalta los requeridos a los controles de un formulario.
	 * recibe: modelo, nombre del model y si se exceptua la habiltiacion de controles para ciertos escenarios.
	 * devuelve: un código javascript que realiza los cambios
	 */
	public function clasesCamposForm($model, $nombreModelo, $exceptoScenario = ["default"])
	{

		$scenarioActual = $model->scenario; // escenario actual
		$attrScenarioActual = $model->scenarios()[$scenarioActual]; // atributos del escenario actula
		$attrModelo = $model->attributes; // todos los atributos del modelo

		$script = "";
		
		// recorro los atributos del modelo
		foreach ($attrModelo as $kM => $vM) {
			// armo el nombre: debe ser del formato nombredemodelo-nombredelatributo
			$id = "$nombreModelo-$kM";
			$script .= "$('#$id').addClass('solo-lectura');"; // agrego clase solo lectura a todos los controles
			$script .= "$('#$id').addClass('disabled');"; // agrego clase disabled a todos los controles

			// les quito las clases solo-lectura y disabled a los controles que se editan en el escenario actual.
			// esto se realiza siempre que el escenario actual no se indique como excepto de habilitacion ($exceptoScenario)
			if (!in_array($scenarioActual, $exceptoScenario) and in_array($kM, $attrScenarioActual)) {
				$script .= "$('#$id').removeClass('solo-lectura');";
				$script .= "$('#$id').removeClass('disabled');";
			}
		}

		// obtento los datos que son requeridos para el escenario actual
		$controlesRequeridos = [];
		foreach ($model->rules() as $key => $value) {

			if (count($value) > 0) {
				foreach ($value as $kV => $vV) {
					if ($vV == 'required' or (isset($value['on']) and in_array($scenarioActual, $value['on']))) {
						$controlesRequeridos[] = $value[0];
					}
				}
			}
		}

		// marco los datos requeridos
		if (count($controlesRequeridos) > 0 and !in_array($scenarioActual, $exceptoScenario)) {
			foreach ($controlesRequeridos[0] as $kR => $vR) {
				$script .= "$('#$nombreModelo-$vR').css('border-color','#a94442');";
			}
		}

		$script = "<script>$script</script>";
		echo new JsExpression($script);
	}
}
?>
