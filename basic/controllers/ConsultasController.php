<?php

namespace app\controllers;

use Yii;
use app\models\Consultas;
use app\models\Cliente;

class ConsultasController extends \yii\web\Controller
{

	public function beforeAction($action) {
		return true;
	}
		
	public function actionIndex()
	{	
		$model=new Consultas();
	
		
		return $this->render('//usuario/alta/index',['model'=>$model]);
		/*,['modelUsuario'=>$modelUsuario]);*/
	}
	
}