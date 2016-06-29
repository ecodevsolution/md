<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Update Product: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->idproduk]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>