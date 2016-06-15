<?php
/* @var $this yii\web\View */
$this->title = 'Newsletter';
?>
<div class="main-container col2-left-layout">
               <div class="main container">
                  <div class="row">
                     <div class="col-main col-sm-9 f-right">
                        <div class="my-account">
                           <div class="page-title">
                              <h1>Newsletter Subscription</h1>
                           </div>
                           <form action="http://newsmartwave.net/magento/porto/index.php/demo6_en/newsletter/manage/save/" method="post" id="form-validate">
                              <div class="fieldset">
                                 <input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
                                 <h2 class="legend">Newsletter Subscription</h2>
                                 <ul class="form-list">
                                    <li class="control"><input type="checkbox" name="is_subscribed" id="subscription" value="1" title="General Subscription" class="checkbox" /><label for="subscription">General Subscription</label></li>
                                 </ul>
                              </div>
                              <div class="buttons-set">
                                 <p class="back-link"><a href="myaccount"><small>&laquo; </small>Back</a></p>
                                 <button type="submit" title="Save" class="button"><span><span>Save</span></span></button>
                              </div>
                           </form>
                           <script type="text/javascript">
                              //<![CDATA[
                                  var dataForm = new VarienForm('form-validate', true);
                              //]]>
                           </script>
                        </div>
                     </div>
                     <div class="col-left sidebar f-left col-sm-3">
                        <div class="block block-account">
                           <div class="block-title">
                              <strong><span>My Account</span></strong>
                           </div>
                           <div class="block-content">
                              <?php include "left_account.php"; ?>
                           </div>
                        </div>
                        <div class="block block-reorder">
                           <div class="block-title">
                              <strong><span>My Orders</span></strong>
                           </div>
                           <form method="post" action="http://newsmartwave.net/magento/porto/index.php/demo6_en/checkout/cart/addgroup/" id="reorder-validate-detail">
                              <input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
                              <div class="block-content">
                                 <p class="block-subtitle">Last Ordered Items</p>
                                 <ol id="cart-sidebar-reorder">
                                    <li class="item">
                                       <input type="checkbox" name="order_items[]" id="reorder-item-1590" value="1590" title="Add to Cart" class="checkbox validate-one-required-by-name" />
                                       <script type="text/javascript">
                                          //<![CDATA[
                                              $('reorder-item-1590').advaiceContainer = 'cart-sidebar-reorder-advice-container';
                                          //]]>
                                       </script>
                                       <p class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/women-fashion.html">Women Fashion</a></p>
                                    </li>
                                 </ol>
                                 <script type="text/javascript">decorateList('cart-sidebar-reorder')</script>
                                 <div id="cart-sidebar-reorder-advice-container"></div>
                                 <div class="actions">
                                    <button type="submit" title="Add to Cart" class="button btn-cart"><span><span>Add to Cart</span></span></button>
                                    <a href="my_order.html">View All</a>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <script type="text/javascript">
                           //<![CDATA[
                               var reorderFormDetail = new VarienForm('reorder-validate-detail');
                           //]]>
                        </script>
                     </div>
                  </div>
               </div>
            </div>