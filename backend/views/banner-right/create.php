<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BannerRight */

$this->title = 'Create Banner Right';
$this->params['breadcrumbs'][] = ['label' => 'Banner Rights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-right-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
