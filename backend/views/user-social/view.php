<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSocial */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idsocial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idsocial], [
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
            'idsocial',
            'icon',
            'name',
            'link',
        ],
    ]) ?>

</div>
