<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aboutus */

$this->title = 'Update Aboutus: ' . ' ' . $model->idabout;
$this->params['breadcrumbs'][] = ['label' => 'Aboutuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idabout, 'url' => ['view', 'id' => $model->idabout]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aboutus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
