<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubCategory */

$this->title = 'Update Sub Category: ' . ' ' . $model->idsubcategory;
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsubcategory, 'url' => ['view', 'id' => $model->idsubcategory]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
