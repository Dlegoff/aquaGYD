<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoTipo */

$this->title = 'Update Producto Tipo: ' . $model->codptipo;
$this->params['breadcrumbs'][] = ['label' => 'Producto Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codptipo, 'url' => ['view', 'id' => $model->codptipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producto-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
