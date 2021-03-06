<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalidadBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idLoc') ?>

    <?= $form->field($model, 'provincia') ?>

    <?= $form->field($model, 'codPost') ?>

    <?= $form->field($model, 'cantHab') ?>

    <?= $form->field($model, 'tipoloc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
