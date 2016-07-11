<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MainCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\SubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border">
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4>
		</div>
	</h5>	

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idmaincategory')->dropDownList
										(ArrayHelper::map (MainCategory::find()->all(),'idmain','main_category_name'),
										['prompt'=>'- Choose -'])->label('Category');?>

    <?= $form->field($model, 'sub_category_name')->textInput(['maxlength' => 50])->label('Sub Name') ?>

    <?= $form->field($model, 'flag')->dropDownList(['1'=>'active', '0'=>'deactive'])->label('Status'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
