<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MainCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border">
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4>
		</div>
	</h5>	

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main_category_name')->textInput(['maxlength' => 50])->label('Category Name') ?>

    <?= $form->field($model, 'flag')->dropDownList(['1'=>'active', '0'=>'deactive'])->label('Status'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
