<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Descuento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descuento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDesc')->textInput() ?>

    <?= $form->field($model, 'porcentaje')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
