<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Camion */

$this->title = 'Update Camion: ' . $model->idCamion;
$this->params['breadcrumbs'][] = ['label' => 'Camions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCamion, 'url' => ['view', 'id' => $model->idCamion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="camion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
