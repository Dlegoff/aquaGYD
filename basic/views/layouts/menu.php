<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\bootstrap\Collapse;
NavBar::begin(['brandLabel' => '', 'options' => ['class' => 'navbar menu-principal']]);
  echo Collapse::widget([
          'id' => 'navigation',
          'encodeLabels' => true,
          'options' => ['class' => 'list-group'],
            'items' => [
                [
                    'id' => 'menuObjeto',
                    'label' => 'Primer Menu',
                    'content' =>
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'usuario/usuario/index"> Usuarios</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'cliente/index">Clientes</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'producto/index">Productos</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'camion/index">Camiones</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'dispenser/index">Dispenser</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'domestico/index">Domesticos</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'localidad/index">Localidades</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'mantenimiento/index">Mantenimientos</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'repartidor/index">Empleados</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'reparto/index">Repartos</a></li>'.
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'revendedor/index">Revendedores</a></li>'.
                      '<a class="list-group-item" href="#">sexto menu</a></li>',
                      'contentOptions' => ['class' => 'in']
                ],
                [
                    'id' => 'menuAccesoClave',
                    'label' => 'Segundo Menu(clave)',
                    'options' => [ 'style' => 'display:' . (!Yii::$app->user->isGuest ? 'block' : 'none') ],
                    'content' =>
                      '<a class="list-group-item" href="' .Yii::$app->param->urlaqua. 'descuento/index">Descuentos</a></li>'.
                      '<a class="list-group-item" id="segundo_menu" href="#">segundo menu</a></li>'.
                      '<a class="list-group-item" id="tercer_menu" href="#">tercer menu</a></li>',
                      'contentOptions' => ['class' => 'in']
                ],
                [
                  'id' => 'menuConsultas',
                    'label' => 'Consultas',
                    'content' =>
                      '<a class="list-group-item" href="#"> primer menu</a></li>'.
                      '<a class="list-group-item" href="#"> segundo menu</a></li>'.
                      '<a class="list-group-item" href="#"> tercer menu</a></li>'.
                      '<a class="list-group-item" href="#"> cuarto menu</a></li>',
                      'contentOptions' => ['class' => 'in']
                ],
                [
                 'id' => 'menuContacto',
                 'label' => 'Contacto',
                 'content' => 
                   '<a class="list-group-item" href="#">Reclamos</a></li>'.
                   '<a class="list-group-item" href="#">Consultas/Sugerencias</a></li>',
                   'contentOptions' => ['class' => 'in']
                ]
          ]
      ]);
  NavBar::end();
?>

<script>
  
$('#navigation').on('show.bs.collapse', function () {
  
  $("#navigation .panel-collapse").each(function(){ 
    $(this).addClass("in");
    $(this).attr("aria-expanded", true);
    $(this).attr("style", "");      
  });
  e.preventDefault();
})
  
</script>

