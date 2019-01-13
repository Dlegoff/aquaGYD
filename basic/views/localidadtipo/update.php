<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocalidadTipo */

$this->title = 'Update Localidad Tipo: ' . $model->codltipo;
$this->params['breadcrumbs'][] = ['label' => 'Localidad Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codltipo, 'url' => ['view', 'id' => $model->codltipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localidad-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
