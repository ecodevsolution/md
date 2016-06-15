<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailCategory */

$this->title = $model->iddetail;
$this->params['breadcrumbs'][] = ['label' => 'Detail Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddetail], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddetail], [
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
            'iddetail',
            'idsubcategory',
            'detail_name',
            'flag',
        ],
    ]) ?>

</div>
