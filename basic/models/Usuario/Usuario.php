<?php

namespace app\models\Usuario;

use Yii;
use app\utils\db\utb;


class Usuario extends \yii\db\ActiveRecord
{
	
	public $nombre;
	public $cuit;


	public function rules()
    {
        return [
         
		];
    }
	

	
}
