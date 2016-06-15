<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
    $this->title = 'Account Information';
?>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 f-right">
                <div class="my-account">
                    <div class="page-title">
						<?php
							if(isset($success)){
						?>
						<ul class="messages"><li class="success-msg"><ul><li><span><?= $success; ?></span></li></ul></li></ul>
							<?php }else{echo"";}?>
                        <h1>Edit Account Information</h1>
                    </div>
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="fieldset">
                            <input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
                            <h2 class="legend">Account Information</h2>
                            <ul class="form-list">
                                <li class="fields">
                                    <div class="customer-name-middlename">
                                        <div class="field name-firstname">
                                            <label for="firstname" class="required"><em>*</em>First Name</label>
                                            <div class="input-box">
												 <?= $form->field($model, 'firstname')->textInput(['id'=>'firstname','title'=>'First Name','class'=>'input-text required-entry'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="field name-middlename">
                                           
                                        </div>
                                        <div class="field name-lastname">
                                            <label for="lastname" class="required"><em>*</em>Last Name</label>
                                            <div class="input-box">
												<?= $form->field($model, 'lastname')->textInput(['id'=>'lastname','title'=>'Last Name','class'=>'input-text required-entry'])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label for="email" class="required"><em>*</em>Email Address</label>
                                    <div class="input-box">
										<?= $form->field($model, 'email')->textInput(['id'=>'email','title'=>'Email Address','class'=>'input-text required-entry validate-email'])->label(false); ?>
                                    </div>
                                </li>
                                <li class="control">									
                                    <input type="checkbox" checked name="change_password" id="change_password" value="1" onclick="setPasswordForm(this.checked)" title="Change Password" class="checkbox" /><label for="change_password">Change Password</label>
                                </li>
                            </ul>
                        </div>
                        <div class="fieldset" style="display:block;">                            
                            <ul class="form-list">
                                <li>
                                    <label for="current_password" class="required"><em>*</em>Current Password</label>
                                    <div class="input-box">
                                        <!-- This is a dummy hidden field to trick firefox from auto filling the password -->
                                        <input type="text" class="input-text no-display" name="dummy" id="dummy" />
										
                                        <input type="hidden" id="current_password" />
										<?= $form->field($password, 'oldpass')->passwordInput(['title'=>'Current Password','class'=>'input-text','id'=>'current_password'])->label(false); ?>
                                    </div>
                                </li>
                                <li class="fields">
                                    <div class="field">
                                        <label for="password" class="required"><em>*</em>New Password</label>
                                        <div class="input-box">
											<?= $form->field($password, 'newpass')->passwordInput(['title'=>'New Password','class'=>'input-text validate-password','id'=>'password'])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="confirmation" class="required"><em>*</em>Confirm New Password</label>
                                        <div class="input-box">
											<?= $form->field($password, 'repeatnewpass')->passwordInput(['title'=>'New Password','class'=>'input-text validate-cpassword','id'=>'confirmation'])->label(false); ?>
											<div id="error"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="buttons-set">
                            <p class="required">* Required Fields</p>
                            <p class="back-link"><a href="myaccount"><small>&laquo; </small>Back</a></p>
							 <?= Html::submitButton('Save',['class' => 'btn btn-primary']) ?>
                           <!-- <button type="submit" title="Save" class="button"><span><span>Save</span></span></button>-->
                        </div>
                    <?php ActiveForm::end(); ?>
					
                    <script type="text/javascript">
                            var dataForm = new VarienForm('form-validate', true);
                            function setPasswordForm(arg){
                                if(arg){
                                    $('current_password').up(3).show();
                                    $('current_password').addClassName('required-entry');
                                    $('password').addClassName('required-entry');
                                    $('confirmation').addClassName('required-entry');
                        
                                }else{
                                    $('current_password').up(3).hide();
                                    $('current_password').removeClassName('required-entry');
                                    $('password').removeClassName('required-entry');
                                    $('confirmation').removeClassName('required-entry');
                                }
                            }
                    </script>
                </div>
            </div>
			
            <div class="col-left sidebar f-left col-sm-3">
                <div class="block block-account">
                    <div class="block-title">
                        <strong><span>My Account</span></strong>
                    </div>
                    <div class="block-content">
                        <?php include"left_account.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>