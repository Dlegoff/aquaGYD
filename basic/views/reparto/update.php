<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reparto */

$this->title = 'Update Reparto: ' . $model->idReparto;
$this->params['breadcrumbs'][] = ['label' => 'Repartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idReparto, 'url' => ['view', 'id' => $model->idReparto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reparto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
