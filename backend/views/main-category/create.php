<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MainCategory */

$this->title = 'Create Main Category';
$this->params['breadcrumbs'][] = ['label' => 'Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
