<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Revendedor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revendedor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NroCli')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
