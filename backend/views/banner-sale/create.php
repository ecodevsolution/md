<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BannerSale */

$this->title = 'Create Banner Sale';
$this->params['breadcrumbs'][] = ['label' => 'Banner Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
