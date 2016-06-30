<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DetailCategory */

$this->title = 'Create Detail Category';
$this->params['breadcrumbs'][] = ['label' => 'Detail Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

