<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <?= $form->field($model, 'idmain')->textInput() ?>

    <?= $form->field($model, 'idsub')->textInput() ?>

    <?= $form->field($model, 'iddetail')->textInput() ?>

    <?= $form->field($model, 'idbrand')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'condition')->textInput() ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'sku')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'minqty')->textInput() ?>

    <?= $form->field($model, 'maxqty')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tax')->textInput() ?>

    <?= $form->field($model, 'service')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 19]) ?>

    <?= $form->field($model, 'final_price')->textInput(['maxlength' => 19]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
