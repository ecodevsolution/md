<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\MainCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

   <?php 
		$form = ActiveForm::begin([
		'options'=>[
				'enctype'=>'multipart/form-data'
				]								
			]); 
	?>
    
	<?= $form->field($model, 'category')->dropDownList(
			ArrayHelper::map(MainCategory::find()->all(),'idmain', 'main_category_name'),
			['prompt'=>'- Choose Category-']
		)->label(false)
	?>	
    <?= $form->field($model, 'slider_img')->fileInput() ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tag_highligt')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
