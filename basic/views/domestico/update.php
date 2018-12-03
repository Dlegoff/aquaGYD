<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Domestico */

$this->title = 'Update Domestico: ' . $model->NroCli;
$this->params['breadcrumbs'][] = ['label' => 'Domesticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NroCli, 'url' => ['view', 'id' => $model->NroCli]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="domestico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
