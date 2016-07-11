<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idrole',
            'idcity',
            'idprovince',
            'courier',
            // 'province',
            // 'city',
            // 'firstname',
            // 'lastname',
            // 'email:email',
            // 'nama_toko',
            // 'paket',
            // 'domain',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'balanced',
            // 'address',
            // 'phone',
            // 'work_hour',
            // 'description:ntext',
            // 'logo',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
