<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	$this->title ="Create Account";
?>
<div class="mobile-nav-overlay close-mobile-nav"></div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="account-create">
                <div class="page-title">
                    <h1>Create an Account</h1>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                    <div class="fieldset">
                        <input type="hidden" name="success_url" value="" />
                        <input type="hidden" name="error_url" value="" />
                        <h2 class="legend">Personal Information</h2>
                        <ul class="form-list">
							 <li class="fields">
                                <div class="customer-name-middlename">
                                    <div class="field name-firstname">
                                        <label for="firstname" class="required"><em>*</em>Titles</label>
                                        <div class="input-box">
											<select name="titles">
												<option value="1">Mr. </option>
												<option value="2">Mrs. </option>
											</select>     
                                        </div>
                                    </div>                                    
                                </div>
                            </li>
                            <li class="fields">
                                <div class="customer-name-middlename">
                                    <div class="field name-firstname">
                                        <label for="firstname" class="required"><em>*</em>First Name</label>
                                        <div class="input-box">
											<?= $form->field($model, 'firstname')->textInput(['class'=>'input-text required-entry'])->label(false); ?>                                           
                                        </div>
                                    </div>
									<div class="field name-firstname">
                                        
                                        
                                    </div>
                                    <div class="field name-lastname">
                                        <label for="lastname" class="required"><em>*</em>Last Name</label>
                                        <div class="input-box">
                                            <?= $form->field($model, 'lastname')->textInput(['class'=>'input-text required-entry'])->label(false); ?>                                           
                                        </div>
                                    </div>
                                </div>
                            </li>
                    
                        </ul>
                    </div>
                    <div class="fieldset">
                        <h2 class="legend">Login Information</h2>
                        <ul class="form-list">
                            <li class="fields">
								 <div class="field">
                                    <label for="confirmation" class="required"><em>*</em>Email</label>
                                    <div class="input-box">
                                       <?= $form->field($model, 'email')->textInput(['class'=>'input-text validate-email required-entry'])->label(false); ?>  
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="password" class="required"><em>*</em>Password</label>
                                    <div class="input-box">
                                        <?= $form->field($model, 'password_hash')->passwordInput(['class'=>'input-text required-entry validate-password'])->label(false); ?> 										
                                    </div>
                                </div>
                               
                            </li>
                        </ul>                       
                    </div>
                    <div class="buttons-set">
                        <p class="required">* Required Fields</p>
                        <p class="back-link"><a href="<?= Yii::$app->homeUrl; ?>" class="back-link"><small>&laquo; </small>Back</a></p>
						<?= Html::submitButton('Create Account', ['class' => 'btn btn-primary']) ?>
                    </div>                
				<?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
