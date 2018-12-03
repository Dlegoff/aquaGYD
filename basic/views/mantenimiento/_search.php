<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idMant') ?>

    <?= $form->field($model, 'comentario') ?>

    <?= $form->field($model, 'costo') ?>

    <?= $form->field($model, 'fechamant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
