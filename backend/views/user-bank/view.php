<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBank */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iduserbank], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iduserbank], [
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
            'iduserbank',
            'bank',
            'name',
            'rekening',
        ],
    ]) ?>

</div>
