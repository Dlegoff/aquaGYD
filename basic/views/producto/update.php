<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Actualizar Producto Nº ' . $model->idProd;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProd, 'url' => ['view', 'id' => $model->idProd]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producto-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
