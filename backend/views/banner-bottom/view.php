<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerBottom */

$this->title = $model->idbanner;
$this->params['breadcrumbs'][] = ['label' => 'Banner Bottoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-bottom-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idbanner], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idbanner], [
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
            'idbanner',
            'ads',
            'tag',
            'flag',
        ],
    ]) ?>

</div>
