<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idproduk') ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'idmain') ?>

    <?= $form->field($model, 'idsub') ?>

    <?= $form->field($model, 'iddetail') ?>

    <?php // echo $form->field($model, 'idbrand') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'sku') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'minqty') ?>

    <?php // echo $form->field($model, 'maxqty') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'short_description') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <?php // echo $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'final_price') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
