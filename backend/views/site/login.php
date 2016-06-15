<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="wrapper">
	<div id="login" class="animate form">
		<section class="login_content">
			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
	
				<h1>Login Form</h1>
				<div>
					<?= $form
							->field($model, 'username')
							->label(false)
							->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
					 
				</div>
				<div>
					 <?= $form
							->field($model, 'password')
							->label(false)
							->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
				</div>
				<div>
					 <?= Html::submitButton('Sign in', ['class' => 'btn btn-lg btn-dark btn-rounded ladda-button', 'name' => 'login-button']) ?>
					 <?= Html::a(' Forgot Password',['site/password-reset'],['class'=>'fa fa-unlock']); ?>	
				</div>
				<div class="clearfix"></div>
				<div class="separator">

					<div class="clearfix"></div>
					<br />
					<div>
						<h1><i class="fa fa-shopping-cart" style="font-size: 26px;"></i> Panel Maridagang</h1>
	
						<p>©<?= date("Y")?> All Rights Reserved. <a href="http://maridagang.com">Maridagang</a></br>Privacy and Terms</p>
					</div>
				</div>
			<?php ActiveForm::end(); ?>
		</section>
		<!-- content -->
	</div>
</div>				