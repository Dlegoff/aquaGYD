<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepartoBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reparto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idReparto') ?>

    <?= $form->field($model, 'fechaReparto') ?>

    <?= $form->field($model, 'idRepartidor') ?>

    <?= $form->field($model, 'cantSalida') ?>

    <?= $form->field($model, 'cantTotLLegLL') ?>

    <?php // echo $form->field($model, 'CantTotLLV') ?>

    <?php // echo $form->field($model, 'idCamion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
