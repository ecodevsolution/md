<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-sale-form">

     <?php $form = ActiveForm::begin([ 
		'options' => ['enctype'=>'multipart/form-data']
	]); ?>
	
	<?= $form->field($model, 'sale_slider')->fileInput()->label('Banner Ads left') ?>
	
    <?= $form->field($model, 'tag')->textInput(['maxlength' => 50])->label('Alt Image') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
