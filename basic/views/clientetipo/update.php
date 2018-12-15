<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteTipo */

$this->title = 'Update Cliente Tipo: ' . $model->codctipo;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codctipo, 'url' => ['view', 'id' => $model->codctipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
