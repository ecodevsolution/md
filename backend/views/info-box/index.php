<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InfoBoxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Info Boxes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-box-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Info Box', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'logo',
            'tag_info',
            'tag_desc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
