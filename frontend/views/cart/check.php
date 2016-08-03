<?php
	use frontend\models\Kurir;
	use \yii\helpers\Html;
	use \yii\bootstrap\ActiveForm;
	use yii\helpers\ArrayHelper;
	use frontend\models\CustomerAddress;
	use frontend\models\Bank;
	
	$cart = \Yii::$app->cart;
	$session = Yii::$app->session;
	$this->title = "Checkout";		

?>
<script>
	( function($) {	

		function loading_show(){
			$('#loading').html("<img src='img/ajax_loader.gif'/>").fadeIn('fast');
		}
		function loading_hide(){
			$('#loading').fadeOut('fast');
		} 
		$(document).ready(function()
		{
			
				$('#kurir').change(function()					
			{
				var id=$(this).val();		
				var addr = $('#billing-address').val();
				var dataString = 'id='+ id +'&'+'a'+addr;
				loading_show();     
				$.ajax
				({
					type: 'GET',
					url: 'check-'+id+'-'+addr,
					data: dataString,
					cache: false,
					success: function(html)
					{
						loading_hide();
						$('#package').html(html);
						
						
					} 
				});
			});
	
		});
		
		$(document).ready(function()
		{
				$('#billing-address').change(function()					
			{
				var id=$(this).val();		
				var addr = $('#kurir').val();
				var dataString = 'id='+ addr +'&'+'a'+id;
				loading_show(); 
				$.ajax
				({
					type: 'GET',
					url: 'check-'+addr+'-'+id,
					data: dataString,
					cache: false,
					success: function(html)
					{
						$('#package').html(html);
						loading_hide();
						
					} 
				});
			});
	
		});		
		
	} ) ( jQuery );
</script>


<div class="main-container col1-layout">
    <div class="main container">		
        <div class="col-main">
			
            <div id="loading-mask">
                <div class="background-overlay"></div>
                <p id="loading_mask_loader" class="loader">
                    <i class="ajax-loader large animate-spin"></i>
                </p>
            </div>          
            <div class="opc-wrapper-opc design_package_smartwave design_theme_porto">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
				<div class="right review-menu-block">
					<a class="review-total theme-bg-color"><i  class="icon-cart"></i><span class="price"><?= 'Rp. '. number_format($cart->getCost(),0,".",".");?></span></a>
				</div>
                <div class="clear"></div>
                <div>
                    <div class="opc-col-left">                        
                        <div id="co-billing-form">
                            <h3>Name &amp; Address</h3>
                            <ul class="form-list">
                                <li class="wide">
                                    <label for="billing-address-select" class="notice">Select a billing address from your address book or enter a new address.</label>
                                    <div class="input-box">
									<?php 
										if(isset($session['shipping'])){
									?>
                                        <select name="billing_address_id" id="billing-address" class="address-select validation-passed" title="">                                            
											<option value="<?= $session['shipping']['idaddress']; ?>" selected="selected"><?= $session['shipping']['addr'].', '.$session['shipping']['name_prov'].', '.$session['shipping']['city_name'].', '.$session['shipping']['zip'].', '.$session['shipping']['phone']?></option>											                                            
                                        </select>
									<?php }else{?>
										 <select name="billing_address_id" id="billing-address" class="address-select validation-passed" title="">
                                            <?php
												$address = CustomerAddress::find()
														->where(['idcustomer'=> Yii::$app->user->identity->idcustomer])
														->all();
												foreach($address as $addr):
											?>
											<option value="<?= $addr->idaddress.';'.$addr->idprovince.';'.$addr->idcity?>" selected="selected"><?= $addr->address?>, <?= $addr->province?>, <?= $addr->city?>, <?= $addr->zip?>, <?= $addr->phone?></option>
											<?php endforeach; ?>                                                
                                        </select>
									<?php }?>
                                    </div>
                                </li>
				
                            </ul>
                        </div>
                        <input type="checkbox" name="shipping" id="billing:use_for_shipping_yes" value="1" checked="checked" title="Ship to this address" class="checkbox   "><label for="billing:use_for_shipping_yes"> Ship to this address</label>
						<br/>
						<a href="address-new" style="float:right;" class="btn btn-primary">Add New Address</a>                        
                    </div>
					<?php $form = ActiveForm::begin([							
								'action'=>'shipping',
					]); ?>
                    <div class="opc-col-center">
                        <div class="shipping-block">
                            <h3>Shipping Method</h3>
                            <div id="shipping-block-methods">                                
                                <div id="checkout-shipping-method-load">
                                    <dl class="sp-methods">                                            
                                        <dd>
                                            <ul>
                                                <li>      
													<?php
														if(isset($session['shipping']['service_price'])){
													?>
													<label for="postcode">Courier</label>
													<div class="input-box">
														<select class="validate-select" style="width:40%;" id="kurir" name="kurir">
															<option value="<?= $session['shipping']['courier']; ?>"><?= strtoupper($session['shipping']['courier']); ?></option>					
														</select>
														
													<p>Service</p>

													<select class='validate-select' style='width:80%;' id='service' name='service'>
														<option value="<?= $session['shipping']['service_name'].';'.$session['shipping']['service_price'] ?>"><?= $session['shipping']['service_name'].' - '.$session['shipping']['service_price']; ?></option>					
													</select>
													<br/>
													<a href="change-shipping" title='Remove Shipping' class="btn btn-danger" style="margin-top:10px;color:white">Remove Shipping</a>
													</div> 
													<?php } else { ?>
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
														
														<div id="package">
														<div id="loading"></div>
														
														</div>
													</div> 
													<?php } ?>
                                                </li>
												
                                            </ul>
                                        </dd>
                                    </dl>                    
                                </div>                                                                                                     
                            </div>
                        </div>        
                    </div>
					
					<?php ActiveForm::end(); ?>
					
					
					<?php $form = ActiveForm::begin([
						'action'=>'finish-order',
					]); ?>
                    <div class="opc-col-right">
                        <div class="payment-block ">
                            <h3>Payment Method</h3> 
							
                            <fieldset id="checkout-payment-method-load">
                                <dt id="dt_method_ccsave">
                                    <input id="p_method_ccsave" value="ccsave" checked type="radio" name="payment[method]" title="Credit Card (saved)" onclick="payment.switchMethod('ccsave')" class="radio" />
                                    <label for="p_method_ccsave">Bank Transfered</label>
                                </dt>
                                <dd id="dd_method_ccsave">
                                    <ul class="form-list" id="payment_form_ccsave" style="display:block;">
                                        <li>
                                            <label for="ccsave_cc_owner" class="required"><em>*</em>Account Name</label>
                                            <div class="input-box">
												<?= $form->field($order, 'account_name')->textInput(['title'=>'Account Name', 'class'=>'input-text validate-email required-entry'])->label(false) ?>                                                                                                    
                                            </div>
                                        </li>
                                        <li>
                                            <label for="ccsave_cc_type" class="required"><em>*</em>Bank</label>
                                            <div class="input-box">                                                  
                                                <?= $form->field($order, 'bank')->dropDownList(
														ArrayHelper::map(Bank::find()->all(),'idbank', 'bank_name'),
														['prompt'=>'- Choose -'])->label(false);				 
												?>
                                            </div>
                                        </li>                                           
                                    </ul>
                                </dd>
                            </fieldset>                              
                        </div>
						
                        <div class="opc-review-actions" id="checkout-review-submit">													
                            <h5 class="grand_total">Grand Total<span class="price">Rp <?= number_format($cart->getCost() + $session['shipping']['service_price'],0,".","."); ?></span></h5>							 
							<input type="submit" title="Place Order Now" style="display: block;border: 0; background: #08c;padding: 0 15px;font-weight: normal;font-size: 14px;text-align: center;white-space: nowrap;color: #fff;line-height: 38px;border-radius: 5px;" value="Place Order Now" />                            
                        </div>
                    </div>
					<?php ActiveForm::end(); ?>
                </div>				
            </div>         
        </div>
    </div>
</div>