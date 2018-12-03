<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idMant')->textInput() ?>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'fechamant')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
