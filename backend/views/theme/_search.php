<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ThemeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtheme') ?>

    <?= $form->field($model, 'theme_name') ?>

    <?= $form->field($model, 'idheader') ?>

    <?= $form->field($model, 'idfont_paragraph') ?>

    <?= $form->field($model, 'idfont_title') ?>

    <?php // echo $form->field($model, 'idfooter') ?>

    <?php // echo $form->field($model, 'idnavbar') ?>

    <?php // echo $form->field($model, 'idlogo') ?>

    <?php // echo $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
