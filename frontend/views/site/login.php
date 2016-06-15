	<?php
		$this->title = "Login";
		use yii\helpers\Html;
		use yii\widgets\ActiveForm;
	?>	
	<div class="main-container col1-layout">
		<div class="main container">
			<div class="col-main">
				<div class="account-login">
					<div class="page-title">
						<h1>Login or Create an Account</h1>
					</div>
					<?php $form = ActiveForm::begin(); ?>
						<input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
						<div class="col2-set">
							<div class="col-1 new-users">
								<div class="content">
									<h2>New Customers</h2>
									<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
								</div>
							</div>
							<div class="col-2 registered-users">
								<div class="content">
									<h2>Registered Customers</h2>
									<p>If you have an account with us, please log in.</p>
									<ul class="form-list">
									<li>
										<label for="email" class="required"><em>*</em>Email Address</label>
										<div class="input-box">
											<?= $form->field($model, 'email')->textInput(['class'=>'input-text required-entry validate-email'])->label(false) ?>											
										</div>
									</li>
									<li>
										<label for="pass" class="required"><em>*</em>Password</label>
										<div class="input-box">
											<?= $form->field($model, 'password')->passwordInput(['class'=>'input-text required-entry validate-password'])->label(false) ?>																						
										</div>
									</li>
									</ul>								
									<p class="required">* Required Fields</p>
								</div>
							</div>
						</div>
						<div class="col2-set">
							<div class="col-1 new-users">
								<div class="buttons-set">
									<button type="button" title="Create an Account" class="button" onclick="window.location='create-account';"><span><span>Create an Account</span></span></button>
								</div>
							</div>
							<div class="col-2 registered-users">
								<div class="buttons-set">
									<a href="forgot-password" class="f-left">Forgot Your Password?</a>
									<?= Html::submitButton('Login', ['class' =>'btn btn-primary']) ?>
								</div>
							</div>
						</div>
					 <?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>