<?php

namespace app\utils;

use Yii;
use yii\kartik\mpdf\Pdf;
//use app\utils\db\utb;

class pdfextends extends Pdf
{
	function __construct(){
		$pdfheader = array (
		  'odd' => array (
			'L' => array (
			  'content' => '<table style="font-family:calibri;font-size:8px;"><tr><td>
							<img src="'.Yii::$app->param->logo.'"/></td>
							</td></tr></table>'
			),
		   
			'R' => array (
			  'content' => '<p>Fecha de Impresi&oacute;n:'.date('d/m/Y').'</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>',
			  'font-size' => '8px',
			  'font-family' => 'calibri',
			  'color'=>'#000000'
			),
			'line' => 1
		  )
		);
		$pdffooter = array (
		  'odd' => array (
			'L' => array (
			  'content' => '',
			  'font-size' => '7px',
			  'font-style' => 'B',
			  'font-family' => 'calibri',
			  'color'=>'#000000'
			),
			'C' => array (
			  'content' => 'aquaGYD',
			  'font-size' => '7px',
			  'font-style' => 'B',
			  'font-family' => 'calibri',
			  'color'=>'#000000'
			),
			'R' => array (
			  'content' => '{PAGENO}',
			  'font-size' => '7px',
			  'font-family' => 'calibri',
			  'color'=>'#000000'
			),
			'line' => 1,
			)
		);
		
		//$this->class = $this->classname();
		$this->cssInline = '.GrillaHeard th{ color:#337ab7; border-bottom: 1px solid;} 
                          .GrillaHeard{ font-family:calibri; padding-top:50px }
                          .GrillaHeard td{padding:3px 15px}
                          .GrillaHeard2 th{background:#ccc;padding:3px 5px} 
                          .GrillaHeard2{font-family:calibri;font-size:9px;}
                          .GrillaHeard2 td{padding:3px 15px}
						  .GrillaHeard4 th{background:#ccc;padding:3px 5px} 
                          .GrillaHeard4{font-family:calibri;font-size:9px;}
                          .GrillaHeard4 td{padding:1px 15px}                      
                          .GrillaHeard3 th{padding:3px 5px;border-bottom: 1px solid;} 
                          .GrillaHeard3{font-family:calibri;font-size:9px;padding-top:50px}
                          .GrillaHeard3 td{padding:3px 15px}
                          .tt{ font-family:calibri; font-size:24px; font-weight:bold; text-align:center; text-decoration:underline;}
                          .tt18{ font-family:calibri; font-size:18px;}
                          .tt14{ font-family:calibri; font-size:14px;}
                          .cond12{ font-family:calibri; font-size:12px}
                          .cond{ font-family:calibri; font-size:11px}
                          .desc{ font-family:calibri; font-size:9px}
						  .desc table{ font-family:calibri; font-size:9px}
                          .desc8{ font-family:calibri; font-size:8px}
                          .desc10{ font-family:calibri; font-size:10px}
                          .codbarra{ font-family:PF Barcode 128; font-size:26px}
                          .body{padding-top:20px }
                          .divredon{border-radius: 5px;border:1px solid #000}
                          tr.border_top td {border-top:1pt solid black;}
                          tr.border_bottom td {border-bottom:1pt solid black;}
                          td.border_bottom {border-bottom:1pt solid black;}
                          td.border_right {border-right:1pt solid black;}
                          td.border_right_bottom {border-right:1pt solid black;border-bottom:1pt solid black;}
                          td.border_top {border-top:1pt dashed black;}
                          td.border_top_solid {border-top:1pt solid black;}
                          tr.border td {border:1pt solid black;}';
		$this->methods["SetHeader"] = [$pdfheader];
		$this->methods["SetFooter"] = [$pdffooter];
	}
}
 ?>
