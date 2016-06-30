<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Seo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'meta_author')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
