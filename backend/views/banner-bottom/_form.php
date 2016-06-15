<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerBottom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-bottom-form">

    <?php $form = ActiveForm::begin([ 
		'options' => ['enctype'=>'multipart/form-data']
	]); ?>

    <?= $form->field($model, 'ads')->fileInput()->label('Banner Ads left') ?>
	
    <?= $form->field($model, 'tag')->textInput(['maxlength' => 50])->label('Alt Image') ?>
	
	<?= $form->field($model, 'flag')->dropDownList(['1'=>'Enable','0'=>'Disable'],
			['prompt'=>'- Choose -'])->label('Active');				 
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
