<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SliderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idslider') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'slider_img') ?>

    <?= $form->field($model, 'tag') ?>

    <?= $form->field($model, 'tag_highligt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
