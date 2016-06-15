<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use frontend\models\CustomerAddress;
use frontend\models\Order;
use frontend\models\Product;
use common\models\Image;
use hok00age\RajaOngkir;
$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$session = Yii::$app->session;
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
					<li class="complete">
						<div class="step"><span class="fa fa-check"></span></div>
						<div class="caption hidden-xs hidden-sm">Step 2</div>
					</li>
					<li class="complete">
						<div class="step"><span class="fa fa-check"></span></div>
						<div class="caption hidden-xs hidden-sm">Step 3</div>
					</li>
					<li class="incomplete">
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
					<div class="col-md-12">
						<div class="panel-group checkout-steps" id="accordion">
							<!-- checkout-step-01  -->
							<div class="panel panel-default checkout-step-01">

								<!-- panel-heading -->
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">
										<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
										<span>4</span> Preview
										</a>
									</h4>
								</div>
								<!-- panel-heading -->

								<div id="collapseOne" class="panel-collapse collapse in">
									<!-- panel-body  -->
									<div class="panel-body">
										<div class="row">		
											<div class="shopping-cart">
												<div class="col-md-6 col-sm-6 shopping-cart-table ">
													<div class="panel panel-default">         
														<div class="panel-heading"><h5>Shipping Address</h5></div>
														<div class="panel-body">
															<p>
																<?php if($session['guest']['titles'] == 0){
																		echo "Mr. ". $session['guest']['firstname'] .' '. $session['guest']['lastname'];
																	}else{
																		echo "Mrs. ".$session['guest']['firstname'] .' '. $session['guest']['lastname'];
																	}
																?>
															</p>
															<p><?= $session['guest']['address']; ?></p>		
															<p><?= $session['province']; ?></p>		
															<p><?= $session['city']; ?></p>
															<p><?= $session['guest']['zip']; ?></p>
															<p><?= $session['guest']['phone']; ?></p>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-sm-6 shopping-cart-table ">
													<div class="panel panel-default">         
														<div class="panel-heading"><h5>Payment Method Transfered</h5></div>
														<div class="panel-body">   
													
															<p>Bank Name    : <?= $session['payments']['bank']; ?></p>
															<p>Account Name : <?= $session['payments']['accountname']; ?></p>															
														</div>
													</div>
												</div>

												<div class="col-md-12 col-sm-12 shopping-cart-table ">
													<div class="table-responsive">
													
														<table class="table table-bordered" >
															<thead>
																<tr>
																	<th class="cart-product-name item">Product Name</th>
																	<th class="cart-description item">Image</th>
																	<th class="cart-qty item">Quantity</th>
																	<th class="cart-sub-total item">Unit Price</th>
																	<th class="cart-total last-item">Total</th>
																</tr>
																
															</thead><!-- /thead -->
															<tfoot>
															
																<tr class="cart_total_price">
																	<td rowspan="3" colspan="2" id="cart_voucher" class="cart_voucher"></td>
																	<td colspan="2" class="text-right">Total products</td>
																	<?php
																		$grndTotal = $total + $session['payments']['service'];
																		$session['grandtotal'] = $grndTotal;
																	?>
																	<td class="price" id="total_product">RP <?= $total; ?></td>
																</tr>
																<tr class="cart_total_delivery">
																	<td colspan="2" class="text-right">Total shipping</td>
																	<td class="price" id="total_shipping" >RP <?= $session['payments']['service']; ?></td>
																</tr>
																<tr class="cart_total_price">
																	<td colspan="2" class="total_price_container text-right"><span>Grand Total</span></td>
																	<td  class="price" id="total_price_container"><span id="total_price">RP <?= $session['grandtotal']; ?></span></td>
																</tr>
															
															</tfoot>
															
															<tbody>
															<?php foreach ($products as $product):?>
																<?php
																	$model = Image::find()
																			->where(['product_id'=>$product->idproduk])
																			->AndWhere(['is_cover'=>1])
																			->One();
																?>
																<tr>
																	
																	<td width="15%"><img src="../../image/cart/<?= $model->image_name; ?>" style="width:100%" width="100%" alt=""></td>
																	<td class="cart_description">
																		<p class="product-name"><a href="#"><?= Html::encode($product->title) ?></a></p>
																		<small class="cart_ref">SKU : <?= $product->sku; ?></small>		
																		
																	</td>
									
																	<td class="cart-product-quantity">
																		<div class="quant-input">
																			<?= $quantity = $product->getQuantity()?>	
																		</div>
																	</td>
																	
																	<td>Rp <?= $product->price ?></td>
																	<td>Rp <?= $product->getCost() ?></td>
																</tr>	
																	
																<?php endforeach; ?>
																
															</tbody><!-- /tbody -->
														</table>
													</div>
												</div>
												
											</div><!-- /.shopping-cart -->	
											
										</div><!-- /.checkout-steps -->
										<p class="cart_navigation clearfix">
											<?= Html::a('Finishing Payment &raquo;', ['cart/order-final'], ['class' => 'button btn btn-primary standard-checkout button-medium','title'=>'Finishing'])?>
										</p>
									</div>
								</div>
							</div><!-- /.row -->
						</div><!-- /.checkout-box -->
					</div>
				</div> 
			</div>
		</div>
	</div>