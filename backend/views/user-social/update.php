<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSocial */

$this->title = 'Update User Social: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idsocial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
