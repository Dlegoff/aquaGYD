<?php

namespace app\controllers\usuario;

use Yii;
use app\models\usuario\Usuario;
use app\models\Cliente;

class UsuarioController extends \yii\web\Controller
{

	public function beforeAction($action) {
		return true;
	}
		
	public function actionIndex()
	{	
		$modelUsuario=new Usuario();
		$modelCliente=new Cliente();
		$datos=$modelUsuario->getClientes();
		
		return $this->render('//usuario/alta/index',['model'=>$modelUsuario,'datos'=>$datos]);
		/*,['modelUsuario'=>$modelUsuario]);*/
	}
	
}