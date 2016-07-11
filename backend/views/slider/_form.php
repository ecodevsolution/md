<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\MainCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border">
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4>
		</div>
	</h5>	
	
   <?php 
		$form = ActiveForm::begin([
		'options'=>[
				'enctype'=>'multipart/form-data'
				]								
			]); 
	?>
    
	<div class="jspContainer" style="width: 517px; height: 236px;">
		<div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 517px;">
			<div class="uploading-container">
                <div class="uploading-container-left">
                    <div class="drop-zone">
                        <i class="font-icon font-icon-cloud-upload-2"></i>
                        <div class="drop-zone-caption">Choose file to upload</div>
                        <span class="btn btn-rounded btn-file">
                            <span>Choose file</span>                            
							<?= Html::activeFileInput($model, 'slider_img') ?>							
                        </span>
                    </div>
                </div><!--.uploading-container-left-->             
            </div>
		</div>
	</div>	
	
	<?= $form->field($model, 'category')->dropDownList(
			ArrayHelper::map(MainCategory::find()->all(),'idmain', 'main_category_name'),
			['prompt'=>'- Choose Category-']
		)->label('Category')
	?>	   

    <?= $form->field($model, 'tag')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tag_highligt')->textInput(['maxlength' => 50])->label('label Highligts') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
