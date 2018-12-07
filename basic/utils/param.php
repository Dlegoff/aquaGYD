<?php

namespace app\utils;

use Yii;
use yii\base\Component;
use yii\helpers\BaseUrl;
use SoapClient;
use SoapFault;

class param extends Component
{
	public $name;
	public $urlaqua;
	public $logo;
	public $logo_grande;
	public $logo_talon;
    public $adminemail;
	public $sis_id;
	public $sis_name;
	public $sis_file;
	public $version;

	function __construct(){
		//$this->dns = "https://172.16.61.168/";
		
		$this->name = "Agua del Valle";
		$this->urlaqua = "/aquaGYD/basic/web/index.php?r=";
		$this->logo = '/aquaGYD/basics/images/logo.png';
		$this->adminemail = 'sistemas@aqua.com.ar';
		$this->sis_id = 7;
		$this->sis_name = "Agua del Valle";
		$this->sis_file = "aquaGYD";
		$this->version = 1;
		
	}
	
	
}
 ?>
