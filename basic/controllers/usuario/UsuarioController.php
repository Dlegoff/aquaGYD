<?php

namespace app\controllers;

use Yii;
use app\models\ctacte\Usuario;
use app\utils\db\utb;

use yii\data\ArrayDataProvider;


class UsuarioController extends \yii\web\Controller
{

	public function beforeAction($action) {
		return true;
	}
		
	public function actionIndex()
	{	
		$modelUsuario=new Usuario();
		
		return $this->render('index',['modelUsuario'=>$modelUsuario]);
	}

	
}
		


		
		
