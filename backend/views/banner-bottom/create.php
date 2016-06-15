<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BannerBottom */

$this->title = 'Create Banner Bottom';
$this->params['breadcrumbs'][] = ['label' => 'Banner Bottoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-bottom-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
