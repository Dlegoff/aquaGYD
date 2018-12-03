<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dispenser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispenser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDisp')->textInput() ?>

    <?= $form->field($model, 'tipodisp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
