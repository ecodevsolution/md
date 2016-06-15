<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idproduk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idproduk], [
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
            'idproduk',
            'iduser',
            'idmain',
            'idsub',
            'iddetail',
            'idbrand',
            'title',
            'sale',
            'condition',
            'tag',
            'sku',
            'stock',
            'minqty',
            'maxqty',
            'weight',
            'short_description:ntext',
            'description:ntext',
            'tax',
            'service',
            'discount',
            'price',
            'final_price',
            'status',
        ],
    ]) ?>

</div>
