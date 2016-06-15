<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BannerSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-sale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banner Sale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sale_slider',
            'tag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
