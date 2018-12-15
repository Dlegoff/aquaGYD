<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteTipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-tipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codctipo')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechamod')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
