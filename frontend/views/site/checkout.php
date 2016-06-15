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
        <li class="incomplete">
          <div class="step">1</div>
          <div class="caption hidden-xs hidden-sm">Step 1</div>
        </li>
        <li class="active">
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
									<span>1</span>Checkout Method
									</a>
								</h4>
							</div>
							<!-- panel-heading -->
						
							<div id="collapseOne" class="panel-collapse collapse in">
						
								<!-- panel-body  -->
								<div class="panel-body">
									<div class="row">		
						
										<!-- guest-login -->			
										<div class="col-md-6 col-sm-6 guest-login">
											<h4 class="checkout-subtitle">Checkout as a Guest or Register Login</h4>
											<p class="text title-tag-line">Register with us for future convenience:</p>
						
											<!-- radio-form  -->
											<form class="register-form" role="form">
												<div class="radio radio-checkout-unicase">  
													<input id="guest" type="radio" name="text" value="guest" checked>  
													<label class="radio-button guest-check" for="guest">Checkout as Guest</label>  
													<br>
													<input id="register" type="radio" name="text" value="register">  
													<label class="radio-button" for="register">Register</label>  
												</div>  
											</form>
											<!-- radio-form  -->
						
											<h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
											<p class="text title-tag-line ">Register with us for future convenience:</p>
											
											<ul class="text instruction inner-bottom-30">
												<li class="save-time-reg">- Fast and easy check out</li>
												<li>- Easy access to your order history and status</li>
											</ul>
						
											<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue "  onclick="location.href='sign-in.html';">Continue</button><!------------LOOPING---------->
										</div>
										<!-- guest-login -->
						
										<!-- already-registered-login -->
										<div class="col-md-6 col-sm-6 already-registered-login">
											<h4 class="checkout-subtitle">Already registered?</h4>
											<p class="text title-tag-line">Please log in below:</p>
											<form class="register-form" role="form">
												<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
												<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="admin@gadgets.com">
											</div>
											<div class="form-group">
												<label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
												<input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Password">
												<a href="#" class="forgot-password">Forgot your Password?</a>
											</div>
												</form>
												<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue "  onclick="location.href='?r=site/checkaddress';">Login</button><!------------LOOPING---------->
										</div>	
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
									</div>
								</div>
							</div>
						</div> 
						<!-- checkout-progress-sidebar -->		
					</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div>
</div>	