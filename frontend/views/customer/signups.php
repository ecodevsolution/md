<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Customer;
use frontend\assets\AppAsset;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('
		.form{
			width: 20%;
			height: 34px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			
		}
');
$this->registerCss('.btn{
					background:#000;
}');


?>



	<div class="body-content outer-top-bd">
		<div class="container">
			<div class="sign-in-page inner-bottom-sm">
				<div class="row">
					<!-- create a new account -->
					<div class="col-md-6 col-sm-6 create-new-account">
						<h4 class="checkout-subtitle">Create an account</h4>
						<p class="text title-tag-line">Your personal information.</p>
							<form action="?r=customer/daftar" method="POST">
								<div class="form-group">
									<label for="titles">Titles</label>
									<select name="titles" class="form-control">
										<option value="0">Mr. </option>
										<option value="1">Mrs. </option>
									</select>
								</div>
								
								<div class="form-group">
									<label for="firstname">First Name</label>
									<input type="text" name="firstname" class="form-control" required/>
								</div>
								
								<div class="form-group">
									<label for="lastname">Last Name</label>
									<input type="text" name="lastname" class="form-control" required/>
								</div>
								
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" value="<?= $_POST['email']; ?>" readonly />
								</div>
								<div class="form-group">
									<label for="email">Password</label>
									<input type="password" name="password" class="form-control" required/>
								</div>
								<div class="form-group">
									<label>Date of Birth</label>
									<br/>
										<select id="days" name="days" class="form">
											<option value="0">- Day -</option>
											<?php 
											for($i = 1 ; $i < 32 ; $i++){
												echo"<option value='$i'>$i&nbsp;&nbsp;</option>";
											}
											?>
										</select>
										
										<select id="months" name="months" class="form">
											<option value="0">- Months -</option>
											<option value="1">January&nbsp;</option>
											<option value="2">February&nbsp;</option>
											<option value="3">March&nbsp;</option>
											<option value="4">April&nbsp;</option>
											<option value="5">May&nbsp;</option>
											<option value="6">June&nbsp;</option>
											<option value="7">July&nbsp;</option>
											<option value="8">August&nbsp;</option>
											<option value="9">September&nbsp;</option>
											<option value="10">October&nbsp;</option>
											<option value="11">November&nbsp;</option>
											<option value="12">December&nbsp;</option>
										</select>
									
										
										<select id="years" name="years" class="form">
											<option value="0">- Years - </option>
											<?php 
											for($i = 1950 ; $i < 2050 ; $i++){
												echo"<option value='$i'>$i&nbsp;&nbsp;</option>";
											}
											?>
										</select>
								
								</div>
								
								<div class="submit clearfix">	
									<button type="submit" name="submitAccount" id="submitAccount" class="btn btn-default button button-medium">
										<span>Register <i class="fa fa-chevron-right right"></i></span>
									</button>
								</div>
							</form>
						
					</div>	
				</div><!-- /.row -->
			</div><!-- /.sigin-in-->
		</div><!-- /.logo-slider -->
	</div><!-- /.container -->