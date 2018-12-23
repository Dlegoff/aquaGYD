<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductoTipo */

$this->title = 'Create Producto Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Producto Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
