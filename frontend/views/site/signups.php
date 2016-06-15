<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Customer;
use frontend\assets\AppAsset;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */


?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Sign Up</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">create a new account</h4>
	<p class="text title-tag-line">Create your own Unicase account.</p>
	<?php 
	$form = ActiveForm::begin(['id' => 'form-signup']); 
	$model = new Customer();?>
	
				<?= $form->field($model, 'firstname')->textInput(['maxlength' => 100,'placeholder'=>'Nama Depan...'])->label(false); ?>
                <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100, 'placeholder'=>'Nama Belakang...'])->label(false); ?>
                <?= $form->field($model, 'password_hash')->passwordInput(['placeholder'=>'Enter password...'])->label(false); ?>
                <?= $form->field($model, 'email') ?>
				
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					
                </div>
            <?php ActiveForm::end(); ?>
	</form>
	<span class="checkout-subtitle outer-top-xs">Sign Up Today And You'll Be Able To :  </span>
	<div class="checkbox">
	  	<label class="checkbox">
		   Speed your way through the checkout.
		</label>
		<label class="checkbox">
		  	 Track your orders easily.
		</label>
		<label class="checkbox">
		  	 Keep a record of all your purchases.
		</label>
	</div>
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->