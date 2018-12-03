<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Revendedor */

$this->title = $model->NroCli;
$this->params['breadcrumbs'][] = ['label' => 'Revendedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revendedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->NroCli], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->NroCli], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NroCli',
            'email:email',
        ],
    ]) ?>

</div>
