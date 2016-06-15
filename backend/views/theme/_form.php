<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Theme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'theme_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'idheader')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'idfont_paragraph')->textInput() ?>

    <?= $form->field($model, 'idfont_title')->textInput() ?>

    <?= $form->field($model, 'idfooter')->textInput() ?>

    <?= $form->field($model, 'idnavbar')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
