<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;

$this->params['breadcrumbs'][] = 'Store Information';
?>
<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border">
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-info-sign"></i> Store Information </h4>
		</div>
	</h5>
	
    <?php 
		$form = ActiveForm::begin([
		'options'=>[
				'enctype'=>'multipart/form-data'
				]								
			]); 
	?>

    <?= $form->field($model, 'nama_toko')->textInput(['maxlength' => 50])->label('Store Name') ?>
	
    <?= $form->field($model, 'paket')->dropDownList(['Premium'=>1,'Free'=>0],
			['prompt'=>'- Choose -'])->label('Package')?>	 
			
    <?= $form->field($model, 'idprovince')->dropDownList(['prompt'=>'- Choose -'])->label('Province')?>	   
	
	<?= $form->field($model, 'idcity')->dropDownList(['prompt'=>'- Choose -'])->label('City')?>	   			  	
	
	<?= $form->field($model, 'address')->widget(TinyMce::className(), [
			'options' => ['rows' => 6],
			'language' => 'en_GB',
			'clientOptions' => [
				'plugins' => [
					"advlist autolink lists link charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
				'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			]
		]);
	?>
	
	<?= $form->field($model, 'phone')->textInput(['maxlength' => 50])->label('Phone') ?>
	
	<?= $form->field($model, 'work_hour')->textInput(['maxlength' => 50])->label('Work Hours') ?>  			  	
	
	<?= $form->field($model, 'logo')->fileInput()->label('Logo')?>	   			  	
	
	
	<?= $form->field($model, 'description')->widget(TinyMce::className(), [
			'options' => ['rows' => 6],
			'language' => 'en_GB',
			'clientOptions' => [
				'plugins' => [
					"advlist autolink lists link charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
				'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			]
		]);
	?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<?php 
		$this->registerJs("
		(function($) {
					$('#tags').tagEditor();
			})(jQuery);
		");
				
	?>	

</div>