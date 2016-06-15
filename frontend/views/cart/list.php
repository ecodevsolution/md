<?php
use \yii\helpers\Html;
use common\models\Image;
use hok00age\RajaOngkir;
use  yii\web\Session;
use yii\web\View;
use frontend\models\Kurir;

$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$this->title = "Shopping Cart";
?>
	<script>
		( function($) {
			$(document).ready(function()
			{
					$('#province').change(function()
				{
					var id=$(this).val();
					var dataString = 'id='+ id;
					$.ajax
					({
						type: 'GET',
						url: 'city-'+id,
						data: dataString,
						cache: false,
						success: function(html)
						{
							$('#city').html(html);
							
						} 
					});
				});
		
			});
			
			$(document).ready(function()
			{
					$('#kurir').change(function()					
				{
					var id=$(this).val();
					var city = $('#cities').val();
					var dataString = 'id='+ id +'&'+'cities'+city;
					$.ajax
					({
						type: 'GET',
						url: 'shipping-'+id+'-'+city ,
						data: dataString,
						cache: false,
						success: function(html)
						{
							$('#package').html(html);
							
						} 
					});
				});
		
			});
			
		} ) ( jQuery );
	</script>


<div class="mobile-nav-overlay close-mobile-nav"></div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">
				<?php
					if($total > 0){
				?>
                <div class="page-title title-buttons">
                    <h1>Shopping Cart</h1>
                    
                </div>
				
                <div class="row">
			
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="cart-table-wrap">
                            <form action="#" method="post">                                
                                <fieldset>									
                                    <table id="shopping-cart-table" class="data-table cart-table">
                                        <thead>
                                            <tr>
                                                <th rowspan="1">&nbsp;</th>
                                                <th rowspan="1">&nbsp;</th>
                                                <th rowspan="1"><span class="nobr">Product Name</span></th>
                                                <th colspan="1"><span class="nobr">Unit Price</span></th>
                                                <th rowspan="1">Qty</th>
												<th rowspan="1">Update Cart</th>
                                                <th class="last" colspan="1">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td colspan="50" class="a-right">													
                                                    <button type="button" title="Continue Shopping" class="button btn-continue" onclick="setLocation('<?= Yii::$app->homeUrl; ?>')"><span><span>Continue Shopping</span></span></button>                                                    
                                                    <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout" onclick="window.location='checkout';"><span><span>Proceed to Checkout</span></span></button>
                                                </td>
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
                                                <td class="action-td"><a href="cart-remove-<?= $product->getId() ?>" title="Remove item" class="btn-remove btn-remove2"></a></td>
                                                <td class="pr-img-td"><a href="#" title="<?= Html::encode($product->title) ?>" class="product-image"><img src="img/cart/<?= $model->image_name; ?>" style="width:80px;height:80px; alt="<?= Html::encode($product->title) ?>" /></a></td>
                                                <td class="product-name-td">
                                                    <h2 class="product-name">
                                                        <a href="#"><?= Html::encode($product->title) ?></a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <span class="cart-price">
                                                    <span class="price">Rp <?= $product->price ?></span>                
                                                    </span>
                                                </td>
                                                <td>
                                                    
													<?= $quantity = $product->getQuantity()?>													                                                        
                                                    
                                                </td>
												<td>
                                                    <div class="qty-holder">														
														<?= Html::a('-', ['./cart-update-'.$product->getId(), 'quantity' => $quantity - 1], ['class' => 'table_qty_dec', 'disabled' => ($quantity - 1) < 1])?>                                                        
															<input name="qty" value="1" size="4" title="Qty" class="input-text qty" maxlength="12" />
														<?= Html::a('+', ['./cart-update-'.$product->getId(), 'quantity' => $quantity + 1], ['class' => 'table_qty_inc'])?>														                                                        
                                                    </div>
                                                </td>
                                                <td class="td-total">
                                                    <span class="cart-price">
                                                    <span class="price">Rp <?= $product->getCost() ?></span>                            
                                                    </span>
                                                </td>
                                            </tr>
											<?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">decorateTable('shopping-cart-table')</script>
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        jQuery(function($){
                                            $(".cart .discount h2,.cart .shipping h2").click(function(){
                                                if ($(this).hasClass('opened')) {
                                                    $(this).removeClass('opened');
                                                    $(this).next().slideUp();
                                                } else {
                                                    $(this).addClass('opened');
                                                    $(this).next().slideDown();
                                                }
                                            });
                                        })
                                        //]]>
                                    </script>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="cart-collaterals">
                            <form id="discount-coupon-form" action="#" method="post">
                                <div class="discount">
                                    <h2>Discount Codes</h2>
                                    <div class="discount-form">
                                        <input type="hidden" name="remove" id="remove-coupone" value="0" />
                                        <div class="input-box">
                                            <label for="coupon_code">Enter your coupon code if you have one.</label>
                                            <input class="input-text" id="coupon_code" name="coupon_code" value="" />
                                        </div>
                                        <div class="buttons-set">
                                            <button type="button" title="Apply Coupon" class="button" onclick="discountForm.submit(false)" value="Apply Coupon"><span><span>Apply Coupon</span></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                                //<![CDATA[
                                var discountForm = new VarienForm('discount-coupon-form');
                                discountForm.submit = function (isRemove) {
                                    if (isRemove) {
                                        $('coupon_code').removeClassName('required-entry');
                                        $('remove-coupone').value = "1";
                                    } else {
                                        $('coupon_code').addClassName('required-entry');
                                        $('remove-coupone').value = "0";
                                    }
                                    return VarienForm.prototype.submit.bind(discountForm)();
                                }
                                //]]>
                            </script>
                            <div class="shipping">
                                <h2 class="opened">Estimate Shipping</h2>
                                <div class="shipping-form" style="display: block;">
                                    <form action="cart-list" method="post" id="shipping-zip-form">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <ul class="form-list">
                                            <li>
                                                <label for="region_id">* State/Province</label>
                                                <div class="input-box">
													<select name="province" id="province"  class="validate-select" title="Province/State" >
													<?php
														$provinces = $client->getProvince(); 																					
	
														$json =  $provinces->raw_body;
														$data = json_decode($json, true);
																
														foreach ($data['rajaongkir']['results'] as $field => $value):
													?>
														<option value='<?= $data['rajaongkir']['results'][$field]['province_id'].';'.$data['rajaongkir']['results'][$field]['province'];?>'><?= $data['rajaongkir']['results'][$field]['province']; ?></option>
														
													<?php	
														endforeach;
													?>
													</select>
                                                    <!--<select name="country_id" id="country" class="validate-select" title="Country" >
                                                        <option value="" > </option>
                                                        <option value="AF" >Afghanistan</option>
                                                    
                                                    </select>-->
                                                </div>
                                            </li>
                                            <li>                                               
                                                <div class="input-box" id="city">
												 
                                                </div>
                                            </li>
											<li>
                                                <label for="postcode">Courier</label>
                                                <div class="input-box">
                                                    <select class="validate-select" style="width:40%;" id="kurir" name="kurir">
														<option value="0">- Choose -</option>
														<?php
															$kurir = Kurir::find()
																	->all();
															foreach($kurir as $kurirs):
														?>
														<option value="<?= $kurirs->idkurir ?>"><?= $kurirs->name ?></option> 
														<?php endforeach; ?>
													</select>
													<div id="package" style="float:right;margin-top:-39px; !important">
										
													</div>
                                                </div>
                                            </li>
                                            <li>
                                                <label for="postcode">Zip/Postal Code</label>
                                                <div class="input-box">
                                                    <input class="input-text validate-postcode" type="text" id="postcode" name="estimate_postcode" value="" />
                                                </div>
                                            </li>
                                        </ul>
										
                                        <div class="buttons-set">
											<input type="submit" value="Add Shipping" class="btn btn-primary form-control" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="totals">
                                <h2>Cart Totals</h2>
                                <div>
                                    <table id="shopping-cart-totals-table">
                                        <col />
                                        <col width="1" />
                                        <tfoot>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    <strong>Grand Total</strong>
                                                </td>
                                                <td style="" class="a-right">
													<?php
														if(isset($session['shipping']['service_price'])){
															$grndtotal = $total + $session['shipping']['service_price'];
														}else{
															$grndtotal = $total;
														}
													?>
                                                    <strong><span class="price">Rp <?= $grndtotal; ?></span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    Subtotal    
                                                </td>
												
                                                <td style="" class="a-right">
                                                    <span class="price">Rp <?= $total; ?></span>    
                                                </td>
                                            </tr>
											<?php
												if(isset($session['shipping']['service_price'])){
											?>
											<tr>
                                                <td style="" class="a-right" colspan="1">
                                                    Shipping    
                                                </td>
												
                                                <td style="" class="a-right">
                                                    <span class="price">Rp <?= $session['shipping']['service_price']; ?></span>    
                                                </td>
                                            </tr>
											<?php } ?>
                                        </tbody>
                                    </table>
                                    <ul class="checkout-types">
                                        <li>    <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout" onclick="window.location='checkout';"><span><span>Proceed to Checkout</span></span></button></li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                </div>
                <div class="crosssell">
                    <h2>Based on your selection, you may be interested in the following items:</h2>
                    <ul id="crosssell-products-list" class="row">
                        <li class="item col-sm-6 col-md-3">
                            <a class="product-image" href="../../samsung-galaxy-5.html" title="Samsung Galaxy 5"><img src="../../img/checkout/small_product.png" width="84" height="84" alt="Samsung Galaxy 5" /></a>
                            <div class="product-details">
                                <h3 class="product-name"><a href="../../samsung-galaxy-5.html">Samsung Galaxy 5</a></h3>
                                <div class="price-box">
                                    <span class="regular-price" id="product-price-60">
                                    <span class="price">$320.00</span>                                    </span>
                                </div>
                                <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation('#')"><span><span>Add to Cart</span></span></button>
                                <ul class="add-to-links">
                                    <li><a href="../../wishlist/index/add/product/60/form_key/QsXTNa4hQTccXjwJ/index.html" class="link-wishlist">Add to Wishlist</a></li>
                                    <li><span class="separator">|</span> <a href="../../catalog/product_compare/add/product/60/uenc/aHR0cDovL25ld3NtYXJ0d2F2ZS5uZXQvbWFnZW50by9wb3J/form_key/QsXTNa4hQTccXjwJ/index.html" class="link-compare">Add to Compare</a></li>
                                </ul>
                            </div>
                        </li>                       
                    </ul>
                    <script type="text/javascript">decorateList('crosssell-products-list', 'none-recursive')</script>
                </div>
				<?php }else{
					echo"
						<div class='page-title title-buttons'>
							<h1>Shopping Cart Empty</h1>                    
						</div>
				";} ?>
            </div>
        </div>
    </div>
</div>