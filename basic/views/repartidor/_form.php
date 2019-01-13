<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Repartidor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repartidor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idRepartidor')->textInput() ?>

    <?= $form->field($model, 'NyA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelRep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomcalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numcalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLoc')->textInput() ?>

    <?= $form->field($model, 'piso')->textInput() ?>

    <?= $form->field($model, 'depto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
