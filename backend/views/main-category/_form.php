<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MainCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main_category_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'flag')->dropDownList(['1'=>'active', '0'=>'deactive']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
