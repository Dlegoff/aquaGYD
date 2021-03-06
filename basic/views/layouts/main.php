    
<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Collapse;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/sitep/images/icon.png" type="image/x-icon"/>
    
    <title><?php echo "Agua del Valle" ?></title>
    
    <?php $this->head() ?>
</head>
<body>

<?php 
$this->beginBody(); 
$base = Yii::$app->request->baseUrl.'/index.php?r=';
?>

    <div class="container-fluid">
        <div class="container align-bottom" style="background: #ffffff;border-bottom: 5px solid rgb(18, 31, 129);padding: 10px;">
            <span> <?= Html::a('<img src="/aquaGYD/basic/images/logo.jpg">', ['/site/index']);?> </span>
            <div class="col-sm-4 hidden-xs">
                <small style="color: #11abe1;">
                  <h1><b style="padding: 0px">aquaGYD</b></h1>
                </small>    
            </div>
            
            <div class="col-sm-4" style="padding-left: 0px"> 
                <?= Html::a( '<h1> <small class="tt-inherit"></small> </h1>', ['/site/index'], [ 'style' => 'text-decoration:none' ]);?> 
            </div>
            <div class="col-sm-6 hidden-xs" align="right">
                <?php
                    echo Html::a('<i class="glyphicon glyphicon-home"></i>', ['/site/index'], [ 'class' => 'btn btn-accesos tt-enc-13', 'title' => 'Ir al Home' ]);
                    echo Html::a('<i class="glyphicon glyphicon-info-sign"></i>', ['/site/about'], [ 'class' => 'btn btn-accesos tt-enc-13', 'title' => 'Info' ]);
                    if (Yii::$app->user->isGuest){
                    	echo Html::a('Iniciar Sesión', ['/site/login'], [ 'class' => 'btn btn-accesos tt-enc-13', 'title' => 'Iniciar Sesión' ]);
                    }else{
                    	echo Html::a('<i class="glyphicon glyphicon-wrench"></i>', ['/site/index'], [ 'class' => 'btn btn-accesos tt-enc-13', 'title' => 'Cambiar Contraseña' ]);
                    	echo Html::a('Cerrar Sesión', ['/site/logout'], [ 'class' => 'btn btn-accesos tt-enc-13', 'title' => 'Cerrar Sesión' ]);
                    }
                ?>
            </div>
        </div>  
    </div>
    <!-- header -->

    <div class="container-fluid" style="margin: 2px 0px;">
        <div class="container body-principal">             
            <div class="col-sm-2" style="padding: 0px;overflow: hidden;"> 
		    	<?php include('C:\xampp\htdocs\aquaGYD\basic\views\layouts\menu.php'); ?> 
            </div>
            <div class="col-sm-10 padding-right-0" style="overflow: hidden;"> <?= $content ?> </div>
        </div> <!-- end columnas -->  
    </div> <!-- end container -->

    
    <div class="container-fluid">

        <div class="container" style="background-color:#3696e8;border-top: 5px solid rgb(18, 31, 129); padding: 10px;">
            <!--Footer Links-->
            <div class="container-fluid">
                <div class="row">
                </div>
            </div>
            <!--/.Footer Links-->

              <!--Copyright-->
            <div class="footer-copyright" style="color: rgb(18, 31, 129);">
                <div class="row flex-vertical-center">
                    <div class="col-sm-6">
                        <b style="margin-left: 1%">© Todos los derechos reservados</b>
                    </div>
                    <div class="col-sm-4 text-center">  
                       <?php if ( !Yii::$app->user->isGuest ) { ?>
                        <span style="margin-left: 2%">Usuario: <b> <?= Yii::$app->user->identity->nombre; ?>  </b>  </span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-2 text-right">   
                        <span style="margin-left: 2%">Fecha: <b><?= date("d/m/Y") ?></b></span>
                    </div>
                </div>
            </div>
              <!--Copyright-->
        </div>    

    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>