<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Revendedor */

$this->title = 'Update Revendedor: ' . $model->NroCli;
$this->params['breadcrumbs'][] = ['label' => 'Revendedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NroCli, 'url' => ['view', 'id' => $model->NroCli]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revendedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
