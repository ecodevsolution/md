<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Role;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4></div></h5>	

    <?php $form = ActiveForm::begin(); ?>
    
	<?= $form->field($model, 'idrole')->dropDownList
		(ArrayHelper::map (Role::find()->all(),'idrole','rolename'),
		['prompt'=>'- Choose -'])->label('Role');?>


    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => 255])->label('Password') ?>	   
    
	<?= $form->field($model, 'status')->dropDownList(['10'=>'Active', '0'=>'Deactive'])->label('Status'); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
