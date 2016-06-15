<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BannerAdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner Ads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-ads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banner Ads', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'banner',
            'tag',
            'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
