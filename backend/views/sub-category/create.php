<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubCategory */

$this->title = 'Create Sub Category';
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
