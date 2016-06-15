<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\InfoBox */

$this->title = 'Create Info Box';
$this->params['breadcrumbs'][] = ['label' => 'Info Boxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-box-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
