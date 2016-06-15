<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerRight */

$this->title = $model->idbaner;
$this->params['breadcrumbs'][] = ['label' => 'Banner Rights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-right-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idbaner], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idbaner], [
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
            'idbaner',
            'baner_ads',
            'tag',
            'flag',
        ],
    ]) ?>

</div>
