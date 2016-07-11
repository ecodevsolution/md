<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'idrole',
            'idcity',
            'idprovince',
            'courier',
            'province',
            'city',
            'firstname',
            'lastname',
            'email:email',
            'nama_toko',
            'paket',
            'domain',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'balanced',
            'address',
            'phone',
            'work_hour',
            'description:ntext',
            'logo',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
