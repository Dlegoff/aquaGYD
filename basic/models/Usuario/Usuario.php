<?php

namespace app\models\usuario;

use Yii;
//use app\utils\db\utb;


class Usuario extends \yii\db\ActiveRecord
{
	
	public $nombre;
	public $cuit;


	/*public function rules()
    {
        return [
         
		];
    }*/

    public function getClientes(){
  		$result=[];
    	$sql="select * from cliente";
    	$result=Yii::$app->db->createCommand( $sql )->queryAll();
    	return $result;
    }
}