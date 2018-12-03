<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Camion */

$this->title = 'Create Camion';
$this->params['breadcrumbs'][] = ['label' => 'Camions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
