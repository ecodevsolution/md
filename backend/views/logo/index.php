<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Logo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idlogo',
            'title',
            'username',
            'logo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
