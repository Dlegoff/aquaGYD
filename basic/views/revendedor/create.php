<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Revendedor */

$this->title = 'Create Revendedor';
$this->params['breadcrumbs'][] = ['label' => 'Revendedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revendedor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
