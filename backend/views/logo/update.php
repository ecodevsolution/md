<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Logo */

$this->title = 'Update Logo: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Logos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->idlogo]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
