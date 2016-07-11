<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Seo */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border">
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4>
		</div>
	</h5>
	
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => 255,'id'=>'tags']) ?>
    
	<?= $form->field($model, 'meta_author')->textInput(['maxlength' => 50]) ?>
	
	<?= $form->field($model, 'meta_description')->widget(TinyMce::className(), [
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
