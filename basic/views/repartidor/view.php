<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Repartidor */

$this->title = $model->idRepartidor;
$this->params['breadcrumbs'][] = ['label' => 'Repartidors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repartidor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idRepartidor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idRepartidor], [
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
            'idRepartidor',
            'NyA',
            'nomcalle',
            'numcalle',
            'idLoc',
            'TelRep',
        ],
    ]) ?>

</div>
