<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BannerSale */

$this->title = 'Create Banner Sale';
$this->params['breadcrumbs'][] = ['label' => 'Banner Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
