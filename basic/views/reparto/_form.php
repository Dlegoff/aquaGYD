<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reparto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reparto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idReparto')->textInput() ?>

    <?= $form->field($model, 'fechaReparto')->textInput() ?>

    <?= $form->field($model, 'idRepartidor')->textInput() ?>

    <?= $form->field($model, 'cantSalida')->textInput() ?>

    <?= $form->field($model, 'cantTotLLegLL')->textInput() ?>

    <?= $form->field($model, 'CantTotLLV')->textInput() ?>

    <?= $form->field($model, 'idCamion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
