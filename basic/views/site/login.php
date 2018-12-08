<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-sm-3\">{input}</div>\n<div class=\"col-sm-3\">{error}</div>",
        'labelOptions' => ['class' => 'col-sm-1 control-label'],
    ],
]); ?>
<div class="container-fluid">
    <div class="panel panel-titulo-login">
        <div class="panel-group tt-enc-login"> Iniciar Sesión </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-fluid">
                <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-4" align="center">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuario') ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-4" align="center">
                        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-group">
                    <div class="col-sm-12" align="center">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-buscar', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
         <div class="alert alert-info tt-enc-12">
                <span class="glyphicon glyphicon-info-sign"></span><b> Al loguearse se podran consultar las siguientes secciones:</b>
                <ul>
                    <li><b>Listado de Usuarios:</b> Consultar los Datos de los Usuarios que tienen acceso al Sistema.</li>
                    <li><b>Listado de Descuentos:</b> Consultar los Datos de los Descuentos disponibles.</li>
                    <li><b>Para modificar usuario y cotraseña ir a:</b> <code>app\models\User::$users</code>.</li>
                </ul>
            </div>  
        </div>
    </div>
</div>
<?php 

echo Html::errorSummary( $model, ['id' => 'login-form','style' => 'margin-top: 10px']);
ActiveForm::end(); ?>



