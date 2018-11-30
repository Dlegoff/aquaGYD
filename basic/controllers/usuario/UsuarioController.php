<?php

namespace app\controllers\usuario;

use Yii;
use app\models\usuario\Usuario;
//use app\utils\utb;
//use \yii\web\Controller;
use yii\data\ArrayDataProvider;


class UsuarioController extends \yii\web\Controller
{

	public function beforeAction($action) {
		return true;
	}
		
	public function actionIndex()
	{	
		$modelUsuario=new Usuario();
		
		return $this->render('//usuario/alta/index',['modelUsuario'=>$modelUsuario]);
	}
	
}
		


		
		
