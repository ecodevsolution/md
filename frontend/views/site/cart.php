<?php
use \yii\helpers\Html;
use frontend\models\Product;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="6">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="#" class="btn btn-upper btn-primary outer-left-xs" onclick="location.href='home.html';">Continue Shopping</a>
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($products as $product): ?>
				<tr>
					<td class="remove-item"><a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="assets/images/products/shopping_cart_01.jpg" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.html"><?= Html::encode($product->title) ?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
								<div class="reviews">
									$<?= $product->price ?>
								</div>
							</div>
						</div><!-- /.row -->
						<div class="cart-product-info">
							<span class="product-imel">IMEL:<span>084628312</span></span><br>
							<span class="product-color">COLOR:<span>White</span></span>
						</div>
					</td>
					
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <?= $quantity = $product->getQuantity()?>
								<?= Html::a('-', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity - 1], ['class' => 'btn btn-danger', 'disabled' => ($quantity - 1) < 1])?>
								<?= Html::a('+', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity + 1], ['class' => 'btn btn-success'])?>
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">$<?= $product->getCost() ?></span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">$539.88</span></td>
				</tr>
				<?php endforeach; ?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->				<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Estimate shipping and tax</span>
					<p>Enter your destination to get shipping and tax.</p>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						
						<div class="form-group">
							<label class="info-title control-label">State/Province <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>TamilNadu</option>
								<option>Kerala</option>
								<option>Andhra Pradesh</option>
								<option>Karnataka</option>
								<option>Madhya Pradesh</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">Zip/Postal Code</label>
							<input type="text" class="form-control unicase-form-control text-input" placeholder="">
						</div>
						<!-- <div class="form-group">
							<label class="info-title control-label">Address</label>
							<textarea name="" class="form-control unicase-form-control text-input" placeholder=""></textarea>
						</div> -->
						<div class="pull-right">
							<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
						</div>
					</td>
				</tr>
		</tbody>
	</table>
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$Total: $<?= $total ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							 <?= Html::a('Order', ['cart/order'], ['class' => 'btn btn-success'])?>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

    <h3 class="section-title">Our Brands</h3>
    <div class="logo-slider-inner"> 
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        <div class="item m-t-15">
          <a href="#" class="image">
            <img data-echo="assets/images/brands1.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item m-t-10">
          <a href="#" class="image">
            <img data-echo="assets/images/brands2.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands3.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands4.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands5.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands6.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands5.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands2.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands1.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="assets/images/brands3.jpg" src="assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->
  
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->