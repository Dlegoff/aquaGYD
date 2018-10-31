<?php

namespace app\models\usuario;

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
