<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Actualizar Cliente Nº ' . $model->NroCli;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NroCli, 'url' => ['view', 'id' => $model->NroCli]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
