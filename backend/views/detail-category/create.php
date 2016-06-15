<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DetailCategory */

$this->title = 'Create Detail Category';
$this->params['breadcrumbs'][] = ['label' => 'Detail Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
