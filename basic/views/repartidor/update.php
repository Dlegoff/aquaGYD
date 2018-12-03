<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Repartidor */

$this->title = 'Update Repartidor: ' . $model->idRepartidor;
$this->params['breadcrumbs'][] = ['label' => 'Repartidors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRepartidor, 'url' => ['view', 'id' => $model->idRepartidor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repartidor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
