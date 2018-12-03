<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Camion */

$this->title = $model->idCamion;
$this->params['breadcrumbs'][] = ['label' => 'Camions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idCamion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idCamion], [
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
            'idCamion',
            'marca',
            'modelo',
            'capCargakg',
            'Obs',
        ],
    ]) ?>

</div>
