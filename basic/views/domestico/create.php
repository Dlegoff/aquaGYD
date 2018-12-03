<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Domestico */

$this->title = 'Create Domestico';
$this->params['breadcrumbs'][] = ['label' => 'Domesticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domestico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
