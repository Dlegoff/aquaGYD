<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */

$this->title = 'Create Mantenimiento';
$this->params['breadcrumbs'][] = ['label' => 'Mantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
