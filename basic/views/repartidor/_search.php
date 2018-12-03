<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepartidorBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repartidor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idRepartidor') ?>

    <?= $form->field($model, 'NyA') ?>

    <?= $form->field($model, 'nomcalle') ?>

    <?= $form->field($model, 'numcalle') ?>

    <?= $form->field($model, 'idLoc') ?>

    <?php // echo $form->field($model, 'TelRep') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
