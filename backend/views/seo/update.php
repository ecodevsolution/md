<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Seo */

$this->title = 'Update Seo: ' . ' ' . $model->idseo;
$this->params['breadcrumbs'][] = ['label' => 'Seos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idseo, 'url' => ['view', 'id' => $model->idseo]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


