<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-create">


    <?= $this->render('_form', [
        'model' => $model,
        'tipos' => $tipos,
        'localidades' => $localidades,
        'scenario' => 'insert'
    ]) ?>

</div>
