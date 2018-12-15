<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClienteTipo */

$this->title = 'Create Cliente Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Cliente Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
