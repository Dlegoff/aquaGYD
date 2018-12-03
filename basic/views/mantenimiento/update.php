<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */

$this->title = 'Update Mantenimiento: ' . $model->idMant;
$this->params['breadcrumbs'][] = ['label' => 'Mantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMant, 'url' => ['view', 'id' => $model->idMant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mantenimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
