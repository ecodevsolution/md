<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use frontend\models\CustomerAddress;
use frontend\models\Order;
use frontend\models\Bank;
use frontend\models\Kurir;
use yii\helpers\ArrayHelper;

$session = Yii::$app->session;
$this->title = "Checkout";		
$cart = \Yii::$app->cart;
/* @var $this yii\web\View */
/* @var $products common\models\Product[] */
?>
<div class="mobile-nav-overlay close-mobile-nav"></div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="opc-wrapper-opc design_package_smartwave design_theme_porto">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
                <div class="opc-menu">
                    <p class="left"><a class="login-trigger opc-login-trigger signin-modal theme-bg-color " href="login">LOGIN</a></p>

                </div>
                <div class="clear"></div>
				<?php $form = ActiveForm::begin(); ?>
                <div >
                    <div class="opc-col-left">					                      
                            <div id="co-billing-form">
                                <h3>Name & Address</h3>
                                <ul class="form-list">
                                    <li id="billing-new-address-form">
                                        <fieldset>
                                            <input type="hidden" name="billing[address_id]" value="36403" id="billing:address_id" />
                                            <ul>
                                                <li class="fields">
                                                    <div class="customer-name-middlename">
                                                       
														<div class="field name-firstname">
                                                            <label for="billing:firstname" class="required"><em>*</em>Titles</label>
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
                                                       
														 <div class="field name-lastname">
                                                            <label for="billing:lastname" class="required"><em>*</em>First Name</label>
                                                            <div class="input-box">
																 <?= $form->field($model, 'firstname')->textInput(['title'=>'First Name', 'class'=>'input-text required-entry'])->label(false) ?>                                                                
                                                            </div>
                                                        </div>                                                   
                                                        <div class="field name-lastname">
                                                            <label for="billing:lastname" class="required"><em>*</em>Last Name</label>
                                                            <div class="input-box">
																<?= $form->field($model, 'lastname')->textInput(['title'=>'Last Name', 'class'=>'input-text required-entry'])->label(false) ?>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clear"></div>
                                                <li class="wide">
                                                   
                                                    <div class="input-box ">
                                                        <label for="billing:email" class="required"><em>*</em>Email Address</label>
                                                        <div class="input-box">
															<?= $form->field($model, 'email')->textInput(['title'=>'Email Address', 'class'=>'input-text validate-email required-entry'])->label(false) ?>                                                                                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clear"></div>
                                                <li class="wide">
                                                    <label for="billing:street1" class="required"><em>*</em>Address</label>
                                                    <div class="input-box">
														 <?= $form->field($modelAddress, 'address')->textarea(['rows' => 6, 'cols'=>5])->label(false)?>														
                                                    </div>
                                                </li>
                                                <li class="fields">
													<div class="field">
                                                        <label for="billing:region_id" class="required"><em>*</em>State/Province</label>
                                                        <div class="input-box">
                                                            <input type="text" title="state" value="<?= $session['shipping']['city_name']; ?>" class="input-text  required-entry"  readonly />
                                                        </div>

                                                    </div>
                                                    <div class="field">
                                                        <label for="billing:city" class="required"><em>*</em>City</label>
                                                        <div class="input-box">
                                                            <input type="text" title="city" value="<?= $session['shipping']['name_prov']; ?>" class="input-text  required-entry"  readonly />
                                                        </div>
                                                    </div>                                                    
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="billing:postcode" class="required"><em>*</em>Zip/Postal Code</label>
                                                        <div class="input-box">
                                                            <input type="text" title="zip" value="<?= $session['shipping']['zip']; ?>" class="input-text  required-entry"  readonly />
                                                        </div>
                                                    </div>   
													<div class="field">
                                                        <label for="billing:telephone" class="required"><em>*</em>Telephone</label>
                                                        <div class="input-box">
															<?= $form->field($modelAddress, 'phone')->textInput(['title'=>'Telephone', 'class'=>'input-text required-entry'])->label(false) ?>                                                                
                                                        </div>
                                                    </div>													
                                                </li>                                                
                                            </ul>
                                        </fieldset>
                                    </li>                                    
                                    <div class="clear"></div>          
                                </ul>
                            </div>
                        
                    </div>
                    <div class="opc-col-center">
                        <div class="shipping-block">
                            <h3>Shipping Method</h3>
                            <div id="shipping-block-methods">
								<div id="checkout-shipping-method-load">
									<dl class="sp-methods">										
										<dd>
											<ul>
												<li>													
													<dt id="dt_method_checkmo">
														<input  type="radio"  checked="checked" class="radio" />
														<label for="p_method_checkmo"><?= strtoupper($session['shipping']['courier']); ?></label> 
														<input  type="radio"  checked="checked" class="radio" />
														<label for="p_method_checkmo"><?= strtoupper($session['shipping']['service_name']); ?></label> 
													</dt>
											
												</li>
											</ul>
										</dd>
									</dl>                                        
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="opc-col-right">
                        <div class="payment-block ">
                            <h3>Payment Method</h3>
                            <form action="" id="co-payment-form">
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
                            </form>                           
                        </div>
                        <div class="opc-review-actions" id="checkout-review-submit">
                            <h5 class="grand_total">Grand Total<span class="price">Rp <?= $cart->getCost() + $session['shipping']['service_price']; ?></span></h5>							 
							<input type="submit" title="Place Order Now" style="display: block;border: 0; background: #08c;padding: 0 15px;font-weight: normal;font-size: 14px;text-align: center;white-space: nowrap;color: #fff;line-height: 38px;border-radius: 5px;" value="Place Order Now" />                            
                        </div>
                    </div>
                </div>
				<?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>