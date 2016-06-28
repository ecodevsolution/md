<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	
	$this->title = 'Login';
	$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
		'options'=>[
				'class'=>'sign-box'
			]
		]); ?>
    <div class="sign-avatar">
        <img src="img/avatar-sign.png" alt="">
    </div>
    <header class="sign-title">Sign In</header>
    <div class="form-group">
		<?= $form
			->field($model, 'email')
			->label(false)
			->textInput(['placeholder' => $model->getAttributeLabel('email')]) 
		?>      
    </div>
    <div class="form-group">
       <?= $form
			->field($model, 'password')
			->label(false)
			->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) 
		?>
    </div>
    <div class="form-group">
        <div class="float-right reset">
             <?= Html::a(' Forgot Password',['site/password-reset'],['class'=>'fa fa-unlock']); ?>	
        </div>
    </div>
    <button type="submit" class="btn btn-rounded">Sign in</button>    
<?php ActiveForm::end(); ?>