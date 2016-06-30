<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubCategory */

$this->title = 'Update Sub Category: ' . ' ' . $model->idsubcategory;
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsubcategory, 'url' => ['view', 'id' => $model->idsubcategory]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
