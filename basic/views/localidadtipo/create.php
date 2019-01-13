<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LocalidadTipo */

$this->title = 'Create Localidad Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Localidad Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localidad-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
