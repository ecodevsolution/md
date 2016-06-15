<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ThemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Themes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Theme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtheme',
            'theme_name',
            'idheader',
            'idfont_paragraph',
            'idfont_title',
            // 'idfooter',
            // 'idnavbar',
            // 'idlogo',
            // 'user_name',
            // 'width',
            // 'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
