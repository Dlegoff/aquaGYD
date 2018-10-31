
<?php 

function AbrirDB() 
{ 
   $dbconn = mysqli_connect("host=localhost dbname=usuarios user=root password=''")
		or die('No se ha podido conectar: ' . mysqli_report());
	
	return $dbconn;
} 

function CerrarDB($dbconn) 
{ 
   mysql_close($dbconn);
} 

function sqlCampo( $sql ){
	
	$link = AbrirDB(); 
	$result = mysql_query($sql);
	
	if ( !$result ) {
		CerrarDB($link);
		return '';
	}	

	$valor = pg_fetch_result($result, 0, 0);
	/*if ( is_bool($valor)==false ) {
		CerrarDB($link);
		return $valor;
	}*/

	CerrarDB($link);

	return $valor;
}

function sqlEstructura( $sql ){
	$link = AbrirDB(); 
	$result = mysql_query($sql);
	CerrarDB($link);
	if ( !$result ) return false;

	$rows=pg_fetch_assoc($result);
	if ( !$rows ) return false;
	
	return $rows;
}

function sqlArray( $sql ){
	$link = AbrirDB(); 		
	$result = mysql_query($sql);
	CerrarDB($link);

	if ( !$result ) return [];

	$salida = [];
	
	while($rows=mysqli_fetch($result)){ 
		$salida[] = $rows;
	} 

	return $salida; 
}

function sqlArrayException( $sql ){
	$link = AbrirDB(); 		
	
	$result = mysql_query($link,$sql);

	if(!$result){
		throw new Exception(pg_last_error($link));
	}
	CerrarDB($link);
	$salida = [];
	
	while($rows=mysqli_fetch($result)){ 
		$salida[] = $rows;
	} 

	return $salida; 

}

function sqlEstructuraException( $sql ){
	$link = AbrirDB(); 
	$result = mysql_query($sql);
	if ( !$result ) throw new Exception(pg_last_error($link));
	CerrarDB($link);

	$rows=pg_fetch_assoc($result);
	if ( !$rows ) return false;
	
	return $rows;
}

function sqlCampoException( $sql ){
	
	$link = AbrirDB(); 
	$result = mysql_query($link,$sql);
	
	if ( !$result ) {
		throw new Exception(pg_last_error($link));
	}	
	CerrarDB($link);

	$valor = pg_fetch_result($result, 0, 0);
	if ( !$valor ) {
		CerrarDB($link);
		return $valor;
	}

	return $valor;
}

function sqlCampoExceptionTrans( $sql,$link ){
	$result = mysql_query($link,$sql);
	
	if ( !$result ) {
		throw new Exception(getMensaje(pg_last_error($link)));
	}
	$valor = pg_fetch_result($result, 0, 0);
	if ( !$valor ) {
		return $valor;
	}
	return $valor;
}

function getMensaje( $excepcion )
{
		$pos = strpos($excepcion, 'CONTEXT:');
		$quitarStr = substr($excepcion, $pos);
		if ( intVal($pos) > 0 ){
			$error = str_replace($quitarStr, '', $excepcion);
		}
		return utf8_decode($error);
}
?>