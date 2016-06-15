<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BannerRightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner Rights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-right-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banner Right', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'baner_ads',
            'tag',
            'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
