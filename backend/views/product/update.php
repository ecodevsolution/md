<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Update Product: ' . $model->idproduct;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproduct, 'url' => ['view', 'id' => $model->idproduct]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsImage' => (empty($modelsImage)) ? [new Image] : $modelsImage,
    ]) ?>
