<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4></div></h5>	

			<?php $form = ActiveForm::begin(); ?>
		
			<?= $form->field($model, 'rolename')->textInput(['maxlength' => true]) ?>
		
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		
			<?php ActiveForm::end(); ?>
</div>
