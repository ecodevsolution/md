<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use frontend\models\Image;
	use frontend\models\Product;
	use frontend\models\Brand;

	include "inc/format_rupiah.php";
	$title = str_replace('_',' ',ucwords($_GET['name']));		
	$this->params['breadcrumbs'][] = ucwords($title);	
	$this->title = $title;
?>            
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9">
                <div id="loading-mask">
                    <div class="background-overlay"></div>
                    <p id="loading_mask_loader" class="loader">
                        <i class="ajax-loader large animate-spin"></i>
                    </p>
                </div>

                <div class="product-view ">
                    <div class="product-essential">
                        <?php $form = ActiveForm::begin([
							'action'=>'cart'
						]); ?>
                            <div class="row">
                                <div class="product-img-box col-sm-5 ">
                                    <ul id="etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk" class="etalage" style="display: block; width: 337px; height: 447px;">
										
										<?php
											$image = Image::find()
												->where(['product_id'=>$model->idproduk])
												->orderBy(['is_cover'=>SORT_ASC])
												->all();
												$x = 0;
												
											foreach($image as $images):
												$x++;
												$count = count($images->image_name);
												if($x > 1){
													if($x == 1){
														$class = "etalage_thumb thumb_1 etalage_thumb_active";
													}else{
														$class = "etalage_thumb thumb_".$x."";
													}
												}else{
													$class="etalage_thumb thumb_1 etalage_thumb_active";
												}
										?>
                                        <li class="<?= $class ?>" style="display: list-item; opacity: 1; position: absolute; overflow: hidden; background-image: none;">
                                            <a rel="gallery" class="fancy-images fancy-images_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk" href="img/cart/600x/<?= $images->image_name; ?>"><span class="glyphicon glyphicon-search"></span></a>
                                            <img class="etalage_thumb_image" src="img/cart/600x/<?= $images->image_name; ?>" alt="" style="display: inline; width: 329px; height: auto; opacity: 1;">
                                            <img class="etalage_source_image" src="img/cart/300x/<?= $images->image_name; ?>" alt=""><img src="img/cart/600x/<?= $images->image_name; ?>" class="zoomImg" style="position: absolute; top: -50.7982px; left: -143.987px; opacity: 0; width: 600px; height: 800px; border: none; max-width: none; max-height: none;">
                                        </li>
										<?php endforeach; ?>										                                                                       
                                    </ul>
                                    <div class="etalage-control">
                                        <a href="javascript:void(0)" class="etalage-prev"><i class="icon-angle-left"></i></a>
                                        <a href="javascript:void(0)" class="etalage-next"><i class="icon-angle-right"></i></a>
                                    </div>
                                    <div class="product-view-zoom-area"></div>
                                    <script type="text/javascript">
										var zoom_enabled = false;
										var zoom_type = 0;
										jQuery(document).ready(function() {
											reloadEtalage();
											jQuery(".product-img-box .etalage li.etalage_thumb").zoom({
												touch: false
											});
											zoom_enabled = true;
											setTimeout(function() {
												reloadEtalage();
											}, 500);
											jQuery(window).resize(function(e) {
												reloadEtalage();
												var width = jQuery(this).width();
											});
											jQuery('.etalage-prev').on('click', function() {
												etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk_previous();
											});
											jQuery('.etalage-next').on('click', function() {
												etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk_next();
											});
											jQuery("a.fancy-images_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk").fancybox();
										
											function reloadEtalage() {
												var src_img_width = 600;
												var src_img_height = "auto";
												var ratio_width = 600;
												var ratio_height = 600;
												var width, height, thumb_position, small_thumb_count;
												small_thumb_count = 4;
												width = jQuery(".product-view .product-img-box").width() - 8;
												height = "auto";
												thumb_position = "bottom";
												jQuery('#etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk').etalage({
													thumb_image_width: width,
													thumb_image_height: height,
													source_image_width: src_img_width,
													source_image_height: src_img_height,
													zoom_area_width: width,
													zoom_area_height: height,
													zoom_enable: false,
													small_thumbs: small_thumb_count,
													smallthumb_hide_single: false,
													smallthumbs_position: thumb_position,
													small_thumbs_width_offset: 0,
													show_icon: false,
													autoplay: false
												});
												if (jQuery(window).width() < 768) {
													var first_img = jQuery("#etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk img.etalage_thumb_image").first();
													var tmp_img = jQuery('<img src="" alt=""/>');
													tmp_img.attr("src", first_img.attr("src"));
													tmp_img.unbind("load");
													tmp_img.bind("load", function() {
														jQuery("#etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk").height(Math.round(width * this.naturalHeight / this.naturalWidth + 8) + "px");
													});
													jQuery('#etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk').removeClass("vertical");
													jQuery(".product-view .product-img-box li.etalage_thumb").css({
														left: 0
													});
												}
												var first_img = jQuery("#etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk img.etalage_thumb_image").first();
												var tmp_img = jQuery('<img src="" alt=""/>');
												tmp_img.attr("src", first_img.attr("src"));
												tmp_img.unbind("load");
												tmp_img.bind("load", function() {
													jQuery("#etalage_NzA1NjJmOWI0YWEwN2MwZjE5OGI5YTI3OGM0NzM5Njk").height(Math.round(width * this.naturalHeight / this.naturalWidth + 8) + "px");
												});
											}
										});
                                    </script> 
                                    <div class="clear"></div>
                                </div>
								
								
                                <div class="product-shop col-sm-7">
                                    <div class="prev-next-products">
										<?php
											$next = Product::find()
													->where(['>','idproduk',$model->idproduk])
													->AndWhere(['idmain'=>$model->idmain])
													->One();
											if($next){
												$nextImg = Image::find()
												->where(['product_id'=>$next->idproduk])
												->andWhere(['is_cover'=>1])
												->One();
										?>
                                        <div class="product-nav product-next">
                                            <a class="product-next" href="catalog-<?= $next->sku.'-'.strtolower(str_replace(' ','_',$next->title)) ?>" title="Next Product"><i class="icon-right-open"></i></a>
                                            <div class="product-pop theme-border-color">
                                                <img class="product-image" src="img/cart/300x/<?= $nextImg->image_name; ?>" alt="<?= $next->title; ?>" style="width:100px">
                                                <h3 class="product-name"><?= $next->title; ?></h3>
                                            </div>
                                        </div>
										<?php } ?>
                                    </div>
                                    <div class="product-name">
                                        <h1><?= $model->title; ?></h1>
                                    </div>
                                    <p class="no-rating"><a href="<?= Yii::$app->homeUrl; ?>#review-form">Be the first to review this product</a></p>
                                    <div class="short-description">
                                        <h2>Quick Overview</h2>
                                        <div class="std"><?= $model->short_description; ?></div>
                                    </div>
                                    <div class="product-info">
                                        <div>
                                            <div class="price-box">
												<?php
													if($model->discount > 0){
													?>
												<p class="old-price">
													<span class="price-label">Regular Price:</span>
													<span class="price" id="old-price-53">
													Rp <?= format_rupiah($model->price) ?>                
													</span>
												</p>
												<?php } ?>
												<p class="special-price">
													<span class="price-label">Special Price</span>
													<span class="price" id="product-price-53">
													Rp <?= format_rupiah($model->final_price) ?>                
													</span>
												</p>											                                              
                                            </div>
											<?php 
												if($model->stock < 10){
											?>
                                            <p class="availability in-stock">Availability: <span><?= $model->stock; ?></span></p>
											<?php }else{ ?>
											<p class="availability in-stock">Availability: <span class="btn btn-success">in stock</span></p>
											<?php } ?>
                                        </div>
                                        <script type="text/javascript">var dailydealTimeCounters=new Array();var i=0;</script>                                         
                                    </div>
                                    <div class="clearer"></div>
									
										<input type="hidden" name="sku" value="<?= $model->sku ?>" />
										<input type="hidden" name="title" value="<?= $model->title ?>" />
										<input type="hidden" name="id" value="<?= $model->idproduk ?>" />
										<div class="add-to-box">
											<div class="add-to-cart">
												<label for="qty">Qty:</label>
												<div class="qty-holder">													
													<?= Html::activeTextInput($order, 'qty', ['class' => 'input-text qty', 'value'=>1]); ?>													
													<div class="qty-changer">
														<a href="javascript:void(0)" class="qty_inc"><i class="icon-up-dir"></i></a>
														<a href="javascript:void(0)" class="qty_dec"><i class="icon-down-dir"></i></a>
													</div>
												</div>
												
												<?= Html::submitButton(' Add to Cart ', ['class' => 'icon-cart btn btn-primary']) ?>
											</div>                                     
										</div>
									
									
                                    <div class="clearer"></div>
									<span class="text-danger"> <?= Yii::$app->session->getFlash('error'); ?></span>
									
									
									<!----------------------------- SHARE ---------------------------------------->
                                    <script type="text/javascript">var addthis_product='mag-sp-2.0.0';var addthis_config={pubid:'xa-525fbbd6215b4f1a'}</script> 
                                    <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                        <a class="addthis_button_facebook addthis_button_preferred_1 at300b" title="Facebook" href="#">
                                            <span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px; background-color: rgb(59, 89, 152);">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Facebook" alt="Facebook" class="at-icon at-icon-facebook" style="width: 32px; height: 32px;">
                                                    <g>
                                                        <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="addthis_button_twitter addthis_button_preferred_2 at300b" title="Tweet" href="#">
                                            <span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px; background-color: rgb(29, 161, 242);">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Twitter" alt="Twitter" class="at-icon at-icon-twitter" style="width: 32px; height: 32px;">
                                                    <g>
                                                        <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
										
                                        <a class="addthis_button_print addthis_button_preferred_3 at300b" title="Print" href="#">
                                            <span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px; background-color: rgb(115, 138, 141);">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Print" alt="Print" class="at-icon at-icon-print" style="width: 32px; height: 32px;">
                                                    <g>
                                                        <path d="M24.67 10.62h-2.86V7.49H10.82v3.12H7.95c-.5 0-.9.4-.9.9v7.66h3.77v1.31L15 24.66h6.81v-5.44h3.77v-7.7c-.01-.5-.41-.9-.91-.9zM11.88 8.56h8.86v2.06h-8.86V8.56zm10.98 9.18h-1.05v-2.1h-1.06v7.96H16.4c-1.58 0-.82-3.74-.82-3.74s-3.65.89-3.69-.78v-3.43h-1.06v2.06H9.77v-3.58h13.09v3.61zm.75-4.91c-.4 0-.72-.32-.72-.72s.32-.72.72-.72c.4 0 .72.32.72.72s-.32.72-.72.72zm-4.12 2.96h-6.1v1.06h6.1v-1.06zm-6.11 3.15h6.1v-1.06h-6.1v1.06z"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="addthis_button_email addthis_button_preferred_4 at300b" target="_blank" title="Email" href="#">
                                            <span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px; background-color: rgb(132, 132, 132);">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Email" alt="Email" class="at-icon at-icon-email" style="width: 32px; height: 32px;">
                                                    <g>
                                                        <g fill-rule="evenodd"></g>
                                                        <path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path>
                                                        <path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="addthis_button_compact at300m" href="#">
                                            <span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px; background-color: rgb(255, 101, 80);">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="More" alt="More" class="at-icon at-icon-addthis" style="width: 32px; height: 32px;">
                                                    <g>
                                                        <path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="addthis_counter addthis_bubble_style" href="#" style="display: inline-block;"><a class="addthis_button_expanded" target="_blank" title="View more services" href="#">5</a><a class="atc_s addthis_button_compact"><span></span></a></a>
                                        <div class="atclear"></div>
                                    </div>
                                    <script>var ats_widget=function(){if(typeof addthis_conf=='undefined'){var at_script=document.createElement('script');at_script.src='//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-525fbbd6215b4f1a';document.getElementsByTagName('head')[0].appendChild(at_script);var addthis_product='mag-sp-2.1.0';}};if(window.addEventListener)
                                        window.addEventListener('load',ats_widget);else
                                        window.attachEvent('onload',ats_widget);
                                    </script> 
                                    <style>#at3win #at3winheader
                                        h3{text-align:left !important}
                                    </style>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
						
						<script type="text/javascript">
							productAddToCartForm.submitLight = function(button, url) {
								if (this.validator) {
									var nv = Validation.methods;
									delete Validation.methods['required-entry'];
									delete Validation.methods['validate-one-required'];
									delete Validation.methods['validate-one-required-by-name'];
									for (var methodName in Validation.methods) {
										if (methodName.match(/^validate-datetime-.*/i)) {
											delete Validation.methods[methodName];
										}
									}
									if (this.validator.validate()) {
										if (url) {
											this.form.action = url;
										}
										this.form.submit();
									}
									Object.extend(Validation.methods, nv);
								} else {
									if (jQuery('#product-options-wrapper'))
										jQuery('#product-options-wrapper').scrollToMe();
								}
							}.bind(productAddToCartForm);
                        </script> 
                    </div>
                    <div class="product-collateral">
                        <div class="product-tabs horizontal">
                            <ul>
                                <li id="tab_description_tabbed" class=" active first"><a href="javascript:void(0)">Description</a></li>
                                <li id="tab_review_tabbed" class=""><a href="javascript:void(0)">Reviews</a></li>
                            
                            </ul>
                            <div class="clearer"></div>
                            <div class="tab-content" id="tab_description_tabbed_contents">
                                <h2>Details</h2>
                                <div class="std">
                                    <?= $model->description; ?>
                                </div>
                            </div>

                            <div class="tab-content" id="tab_review_tabbed_contents" style="display: none;">
                                <div class="collateral-box" id="product-customer-reviews">
                                    <ol>
                                        <li>Be the first to review this product</li>
                                    </ol>
                                </div>
								<?php
									if(isset(Yii::$app->user->identity->idcustomer)){
								?>
                                <div class="add-review">
                                    <div class="form-add">
                                        <h3>Write Your Own Review</h3>
                                        <div class="block-content">
                                            <form action="http://newsmartwave.net/magento/porto/index.php/demo6_en/review/product/post/id/2/" method="post" id="review-form">
                                                <input name="form_key" type="hidden" value="lYrH2Wwbcrimruvo">
                                                <fieldset>
                                                    <h4>How do you rate this product? <em class="required">*</em></h4>
                                                    <span id="input-message-box"></span>
                                                    <table class="data-table ratings-table" id="product-review-table">
                                                        <thead>
                                                            <tr class="first last">
                                                                <th class="a-center">&nbsp;</th>
                                                                <th class="a-center"><span class="nobr">1 star</span></th>
                                                                <th class="a-center"><span class="nobr">2 stars</span></th>
                                                                <th class="a-center"><span class="nobr">3 stars</span></th>
                                                                <th class="a-center"><span class="nobr">4 stars</span></th>
                                                                <th class="a-center"><span class="nobr">5 stars</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="first odd">
                                                                <th>Rating</th>
                                                                <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio"></td>
                                                                <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio"></td>
                                                                <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio"></td>
                                                                <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio"></td>
                                                                <td class="value a-center last"><input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" name="validate_rating" class="validate-rating" value=""> <script type="text/javascript">decorateTable('product-review-table')</script> 
                                                    <ul class="form-list">
                                                        <li>
                                                            <label for="nickname_field" class="required"><em>*</em>Nickname</label>
                                                            <div class="input-box">
                                                                <input type="text" name="nickname" id="nickname_field" class="input-text required-entry" value="">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="summary_field" class="required"><em>*</em>Summary of Your Review</label>
                                                            <div class="input-box">
                                                                <input type="text" name="title" id="summary_field" class="input-text required-entry" value="">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="review_field" class="required"><em>*</em>Review</label>
                                                            <div class="input-box"><textarea name="detail" id="review_field" cols="5" rows="3" class="required-entry"></textarea></div>
                                                        </li>
                                                    </ul>
                                                </fieldset>
                                                <div class="buttons-set">
                                                    <button type="submit" title="Submit Review" class="button"><span><span>Submit Review</span></span></button>
                                                </div>
                                            </form>
                                            <script type="text/javascript">
												var dataForm = new VarienForm('review-form');
												Validation.addAllThese([
													['validate-rating', 'Please select one of each of the ratings above', function(v) {
														var trs = $('product-review-table').select('tr');
														var inputs;
														var error = 1;
														for (var j = 0; j < trs.length; j++) {
															var tr = trs[j];
															if (j > 0) {
																inputs = tr.select('input');
																for (i in inputs) {
																	if (inputs[i].checked == true) {
																		error = 0;
																	}
																}
																if (error == 1) {
																	return false;
																} else {
																	error = 1;
																}
															}
														}
														return true;
													}]
												]);
                                            </script> 
                                        </div>
                                    </div>
                                </div>
								<?php } ?>
                            </div>
                           
                            <script type="text/javascript">new Varien.Tabs('.product-tabs > ul');</script> 
                            <div class="clearer"></div>
                        </div>
                    </div>
                    <div class="box-collateral box-up-sell category-products">
                        <h2><span>Also Purchased</span></h2>
                        <ul class="products-grid columns4">
							<?php
								$modelz = Product::find()
										->where(['idmain'=>$model->idmain])
										->AndWhere(['<>','idproduk',$model->idproduk])
										->orderBy(['idproduk'=>SORT_DESC])
										->Limit(4)
										->all();
								$i = 0;
								foreach($modelz as $models):
								$i++;
								if($i == 1){
									$li = "item nth-child-2np1 nth-child-3np1 nth-child-4np1";
								}else if($i == 2){
									$li ="item nth-child-2n";
								}else if($i == 3){
									$li ="item nth-child-2np1 nth-child-3n";
								}else if($i == 4){
									$li ="item nth-child-2n nth-child-3np1 nth-child-4n";
								}
										
							?>
                            <li class="<?= $li; ?>">
                               <div class="item-area">
									<div class="product-image-area">
										<div class="loader-container">
											<div class="loader">
												<i class="ajax-loader medium animate-spin"></i>
											</div>
										</div>
										<a href="catalog-<?= strtolower(str_replace(' ','_',$models->sku)); ?>-<?= strtolower(str_replace(' ','_',$models->title)); ?>" title="<?= $models->title; ?>" class="product-image">												
										<?php
											$imgProduc = Image::find()
												->where(['product_id'=>$models->idproduk])
												->orderBy(['is_cover'=>SORT_DESC])
												->all();
												$x = 0;
												foreach($imgProduc as $imgProducts):
												$x++;
												$count = count($imgProducts->image_name);
												if($x > 1){
													if($x == 1){
														$class = "defaultImage";
													}else{
														$class = "hoverImage";
													}
												}else{
													$class="";
												}
											?>
										<img class="<?= $class; ?>" src="img/cart/300x/<?= $imgProducts->image_name ?>" alt="<?= $models->title ?>"/>
										<?php endforeach; ?>													
										</a>
										<div class="product-label" style="right: 10px;">
											<?php
												if($models->discount > 0){
												?>
											<span class="sale-product-icon"><?= $models->discount; ?>%</span>
											<?php }?>
										</div>
									</div>
									<div class="details-area">
										<h2 class="product-name">												
											<a href="catalog-<?= strtolower(str_replace(' ','_',$models->sku)); ?>-<?= strtolower(str_replace(' ','_',$models->title)); ?>" title="<?= $models->title; ?>"><?= $models->title; ?></a>
										</h2>
										<div class="price-box">
											<?php
												if($models->discount > 0){
												?>
											<p class="old-price">
												<span class="price-label">Regular Price:</span>
												<span class="price" id="old-price-53">
												Rp <?= format_rupiah($models->price) ?>                
												</span>
											</p>
											<?php } ?>
											<p class="special-price">
												<span class="price-label">Special Price</span>
												<span class="price" id="product-price-53">
												Rp <?= format_rupiah($models->final_price) ?>                
												</span>
											</p>
										</div>
										<div class="actions">
											<?= Html::a('Add to cart', ['./cart-add-'.$models->idproduk], ['class' => 'icon-cart addtocart'])?>
																						
											<div class="clearer"></div>
										</div>
									</div>
								</div>
                            </li> 
							<?php endforeach; ?>
                        </ul>
                        <script type="text/javascript">jQuery('.col-main .products-grid li:nth-child(2n)').addClass('nth-child-2n');jQuery('.col-main .products-grid li:nth-child(2n+1)').addClass('nth-child-2np1');jQuery('.col-main .products-grid li:nth-child(3n)').addClass('nth-child-3n');jQuery('.col-main .products-grid li:nth-child(3n+1)').addClass('nth-child-3np1');jQuery('.col-main .products-grid li:nth-child(4n)').addClass('nth-child-4n');jQuery('.col-main .products-grid li:nth-child(4n+1)').addClass('nth-child-4np1');</script> 
                    </div>
                </div>
                <script type="text/javascript">jQuery(function($){$("body.quickview-index-view .no-rating a, body.quickview-index-view .ratings a").off('click').on("click",function(e){window.parent.location.href=$(this).attr("href");window.parent.jQuery.fancybox.close();});});</script> <script type="text/javascript">var lifetime=3600;var expireAt=Mage.Cookies.expires;if(lifetime>0){expireAt=new Date();expireAt.setTime(expireAt.getTime()+lifetime*1000);}
                    Mage.Cookies.set('external_no_cache',1,expireAt);
                </script> 
            </div>
            <div class="col-right sidebar col-sm-3">
                <div class="custom-block custom-block-1">
                    <div>
                        <i class="icon-truck"></i>
                        <h3>FREE RETURN</h3>
                        <p>Free return on all orders.</p>
                    </div>
                    <div>
                        <i class="icon-dollar"></i>
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>100% money back guarantee.</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <h3>ONLINE SUPPORT</h3>
                        <p>Please email us.</p>
                    </div>
                </div>
				<?php
					$brand = Brand::findOne($model->idbrand);
				?>
				<h3>BRAND</h3>
				<p><?= $model->title ?> Brands.</p>
                <div class="custom-block">
                    <div id="custom-owl-slider-product" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper" style="width: 1064px; left: 0px; display: block;">
                                <div class="owl-item" style="width: 266px;">
                                    <div class="item"><img class="lazyOwl" src="img/brand/<?= $brand->brand_logo; ?>" alt="<?= $brand->brand_name; ?>" style="display: block !important;"></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">jQuery(function($){$("#custom-owl-slider-product").owlCarousel({lazyLoad:true,slideSpeed:300,paginationSpeed:400,singleItem:true,responsiveRefreshRate:50,slideSpeed:200,paginationSpeed:500,stopOnHover:true,rewindNav:true,rewindSpeed:600,navigation:false});});</script> 
                </div>
            </div>
        </div>
    </div>
</div>
