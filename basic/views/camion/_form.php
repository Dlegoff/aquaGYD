<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Camion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="camion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCamion')->textInput() ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput() ?>

    <?= $form->field($model, 'capCargakg')->textInput() ?>

    <?= $form->field($model, 'Obs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
