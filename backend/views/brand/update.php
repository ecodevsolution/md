<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Brand */

$this->title = 'Update Brand: ' . ' ' . $model->idbrand;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbrand, 'url' => ['view', 'id' => $model->idbrand]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
