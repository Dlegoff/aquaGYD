<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dispenser */

$this->title = 'Update Dispenser: ' . $model->idDisp;
$this->params['breadcrumbs'][] = ['label' => 'Dispensers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDisp, 'url' => ['view', 'id' => $model->idDisp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dispenser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
