<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BannerBottomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner Bottoms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-bottom-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banner Bottom', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ads',
            'tag',
            'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
