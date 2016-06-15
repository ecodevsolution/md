<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */
?>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <br />
      <br />
      <br />
      <ol class="list-inline text-center step-indicator">
        <li class="complete">
          <div class="step"><span class="fa fa-check"></span></div>
          <div class="caption hidden-xs hidden-sm">Step 1</div>
        </li>
        <li class="incomplete">
          <div class="step">2</div>
          <div class="caption hidden-xs hidden-sm">Step 2</div>
        </li>
        <li class="active">
          <div class="step">3</div>
          <div class="caption hidden-xs hidden-sm">Step 3</div>
        </li>
        <li class="active">
          <div class="step">4</div>
          <div class="caption hidden-xs hidden-sm">Step 4</div>
        </li>
      </ol>
    </div>
  </div>
</div>
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>2</span>Shipping Address
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-12 col-sm-6 guest-login">
					<h4 class="checkout-subtitle">Checkout as a Guest or Register Login</h4>
					<p class="text title-tag-line">Register with us for future convenience:</p>

					<!-- radio-form  -->
					<form class="register-form" role="form">
					    <div class="radio radio-checkout-unicase">  
					        <input id="guest" type="radio" name="cars" value="guest" checked>  
					        <label class="radio-button guest-check" for="guest">Checkout as Guest</label>  
					          <br>
							 <input type="radio" name="cars" value="threeCarDiv" />
					        <label class="radio-button" for="register">Alamat Baru</label>  
							<div id="threeCarDiv" class="desc">
			
								<div class="panel-body">
									<div class="form-group">
					    <div>
					 <?php
            /* @var $form ActiveForm */
            $form = ActiveForm::begin([
                'id' => 'order-form',
            ]) ?>

            <?= $form->field($order, 'phone') ?>
            <?= $form->field($order, 'email') ?>
            <?= $form->field($order, 'notes')->textarea() ?>
				</div>
			</div>	
								</div>
							</div>
					    </div>  
					</form>
			<?= Html::submitButton('Order', ['class' => 'btn btn-primary']) ?>				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-product-name-info">Product</th>			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price</th>
				</tr>
			</thead><!-- /thead -->	
					<tbody>
					<tr>
						<td class="cart-product-name-info">
							<div class="cart-product-info">
								<span class="product-imel">IMEL:<span>084628312</span></span><br>
								<span class="product-color">COLOR:<span>White</span></span>
							</div>
						</td>
						<td>   
							2
						</td>
						<td>   
							15.000.000
						</td>
						</tr>
					</tbody>
					
			</table>
			</div>
			<div class="col-md-12">
			<div class="pull-right" style="font-size:17px;">
					
						<span class="text"><b>Sub Total</b> :</span><span class='price'><b>$600.00</b></span>
						
			</div>
			</div>
			<hr/>
			<div class="col-md-12">
			<div class="pull-right" style="font-size:20px;">
				
					<span class="text"><b>Total</b> :</span><span class='price'><b>$600.00</b></span>
					
			</div>
			</div>
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
