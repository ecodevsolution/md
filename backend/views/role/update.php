<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = 'Update Role: ' . ' ' . $model->idrole;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrole, 'url' => ['view', 'id' => $model->idrole]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

