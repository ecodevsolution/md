<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Logo */

$this->title = 'Create Logo';
$this->params['breadcrumbs'][] = ['label' => 'Logos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

