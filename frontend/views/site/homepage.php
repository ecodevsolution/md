<?php
	use frontend\models\Theme;
	use frontend\widgets\Alert;
	use frontend\models\Header;
	use frontend\models\Footer;
	use frontend\models\NavBarForm;
	use frontend\models\Color;
	use frontend\models\Logo;
	use frontend\models\MainCategory;
	use frontend\models\SubCategory;
	use frontend\models\DetailCategory;
	use yii\helpers\Html;
	use frontend\models\Product;
	use yii\bootstrap\ActiveForm;
	
	$this->title = 'Home';
?>
	<div class="mobile-nav-overlay close-mobile-nav"></div>
    <div class="main container">
        <div class="col-main">
            <div class="std">
                <div class="homepage-bar" style="border:1px solid #e1e1e1;border-radius:5px;margin:0 0 20px 0;">
                    <div class="row">
					
                        <div class="col-md-4" style="text-align:center;height:70px;padding-top:10px;padding-bottom:10px;">
                           <i class="icon-truck" style="font-size:36px;"></i>
                           <div class="text-area">
								<h3>FREE SHIPPING & RETURN</h3>
								<p>Free shipping on all orders over $99.</p>
                           </div>
                        </div>
						
						<div class="col-md-4" style="text-align:center;height:70px;padding-top:10px;padding-bottom:10px;">
							<i class="icon-dollar"></i>
							<div class="text-area">
								<h3>MONEY BACK GUARANTEE</h3>
								<p>100% money back guarantee.</p>
							</div>
						</div>
						
                        <div class="col-md-4" style="text-align:center;height:70px;padding-top:10px;padding-bottom:10px;">
							<i class="icon-lifebuoy" style="font-size:32px;"></i>
							<div class="text-area">
								<h3>ONLINE SUPPORT 24/7</h3>
								<p>Lorem ipsum dolor sit amet.</p>
							</div>
                        </div>
						
                    </div>
                </div>
				
                <div class="row" style="margin:0 -10px;">
                    <!-- menu side -->
					
					<?php
						include "left-side.php";
					?>
					
					<!-- /menu side -->
                    <div class="col-md-9" style="padding:0 10px;">
                        <div class="owl-bottom-narrow owl-banner-carousel" style="margin-bottom:20px;">
                            <div id="banner-slider-demo-6" class="owl-carousel owl-theme">
							
								<div class="item" style="background:url(img/slider.png) repeat;border-radius:5px;">
									<div style="position:relative">
										<img src="img/slider.png" alt="" />
										<div class="content type1" style="position:absolute;top:30%;left:10%;text-align:right">
											<h2 style="font-weight:600;line-height:1;color:#08c">HUGE <b style="font-weight:800">SALE</b></h2>
											<p style="color:#777;font-weight:300;line-height:1;margin-bottom:15px">Now starting at <span style="color:#535353;font-weight:400">$99</span></p>
											<a href="#" style="font-weight:300;">Shop now &gt;</a>
										</div>
									</div>
								</div>
								
								<div class="item" style="background:url(img/slider.png) center center no-repeat;background-size:cover;border-radius:5px;">
									<div style="position:relative">
										<img src="img/slider.png" alt="" />
									</div>
								</div>
								
								<div class="item" style="background:url(img/slider.png) center center no-repeat;background-size:cover;border-radius:5px;">
									<div style="position:relative">
										<img src="img/slider.png" alt="" />
									</div>
								</div>
                            </div>
                             <script type="text/javascript">
                                jQuery(function($){
                                    $("#banner-slider-demo-6").owlCarousel({autoPlay:true,lazyLoad: true,stopOnHover: true,pagination: true, autoPlay: true,navigation: false,slideSpeed : 500,paginationSpeed : 500,singleItem:true});
                                });
                             </script>
							 
                        </div>
                    </div>
                </div>
				
                <div class="row" style="margin:0 -10px;">
                    <div class="col-md-3" style="padding:0 10px;">
                        <div id="image-slider-demo-6" class="owl-carousel owl-theme" style="text-align:center;">
							<div class="item"><img src="img/sale.png" alt="" /></div>
							<div class="item"><img src="img/sale.png" alt="" /></div>
							<div class="item"><img src="img/sale.png" alt="" /></div>
                        </div>
                        <script type="text/javascript">
							jQuery(function($){
								$("#image-slider-demo-6").owlCarousel({
									lazyLoad: true,
									navigation : false,
									slideSpeed : 300,
									paginationSpeed : 400,
									singleItem:true
								});
							});
                        </script>						
                    </div>
					
                    <div class="col-md-9" style="padding:0 10px;">
                        <div class="single-images">
							<div class="row" style="margin-left:-10px;margin-right:-10px;">
								<div class="col-sm-4" style="padding-left:10px;padding-right:10px;">
									<a class="image-link border-radius" href="#"><img src="img/imageLink.png" alt="" style="width:100%;" /></a>
								</div>
								<div class="col-sm-4" style="padding-left:10px;padding-right:10px;">
									<a class="image-link border-radius" href="#"><img src="img/imageLink.png" alt="" style="width:100%;" /></a>
								</div>
								<div class="col-sm-4" style="padding-left:10px;padding-right:10px;">
									<a class="image-link border-radius" href="#"><img src="img/imageLink.png" alt="" style="width:100%;" /></a>
								</div>
							</div>
                        </div>
						
                        <h2 class="filter-title" style="margin-top: 20px;">
							<span class="content">
								<strong>Featured Fashion Dress</strong>
							</span>
                        </h2>
                        
						<div id="featured_fashion_product" class="owl-top-narrow">
                            <div class="filter-products">
                                <div class="products owl-carousel">
									<div class="item">
										<div class="item-area">
											<div class="product-image-area">
												<div class="loader-container">
													<div class="loader">
														<i class="ajax-loader medium animate-spin"></i>
													</div>
												</div>
                                            
												<a href="detil_fashion.html" title="Ludlow Sheath Dress" class="product-image">
													<img class="defaultImage" src="img/test.png" alt="Ludlow Sheath Dress"/>
													<img class="hoverImage" src="img/test.png" alt="Ludlow Sheath Dress"/>
												</a>
												<div class="product-label" style="right: 10px;">
													<span class="sale-product-icon">-40%</span>
												</div>
											</div>
											
											<div class="details-area">
												<h2 class="product-name">
													<a href="ludlow-sheath-dress.html" title="Ludlow Sheath Dress">Ludlow Sheath Dress</a>
												</h2>	
												<div class="price-box">
													<p class="old-price">
														<span class="price-label">Regular Price:</span>
														<span class="price" id="old-price-53">
														$50.00                
														</span>
													</p>
													<p class="special-price">
														<span class="price-label">Special Price</span>
														<span class="price" id="product-price-53">
														$30.00
														</span>
													</p>
												</div>
												<div class="actions">													
													<a href="checkout/cart/index.html" class="addtocart" title="Add to Cart" >
														<i class="icon-cart"></i>
														<span>&nbsp;Add to Cart</span>
													</a>													
													<div class="clearer"></div>
												</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                        
						<script type="text/javascript">
							jQuery(function($){
								$("#featured_fashion_product .filter-products .owl-carousel").owlCarousel({lazyLoad: true,    itemsCustom: [ [0, 1], [320, 1], [480, 2], [768, 3], [992, 3], [1200, 4] ],    responsiveRefreshRate: 50,    slideSpeed: 200,    paginationSpeed: 500,    scrollPerPage: false,    stopOnHover: true,    rewindNav: true,    rewindSpeed: 600,    pagination: false,    navigation: true,    autoPlay: true,    navigationText:["<i class='icon-left-open'></i>","<i class='icon-right-open'></i>"]});
							});
                        </script>
						
                        <hr style="background-image: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.2), transparent);border: 0;height: 1px;margin: 10px 0 0;"/>
						<div class="row">
							<div class="col-sm-4">
								<h2 class="filter-title" style="background-image:none;margin-top:20px;margin-bottom:5px;">
									<span class="content">
										<strong>New</strong>
									</span>
								</h2>
								
								<div class="filter-products">
									<div class="products small-list">
									
										<div class="item">
											<div class="item-area">
												<div class="product-image-area">
													<a href="detil_fashion.html" title="Jewellery Bracelets" class="product-image">
														<img src="img/testmini.png" alt="Jewellery Bracelets"/>
													</a>
												</div>
												<div class="details-area">
													<h2 class="product-name">
														<a href="jewellery-bracelets-2xl.html" title="Jewellery Bracelets">Jewellery Bracelets</a>
													</h2>
													<div class="ratings">
														<div class="rating-box">
															<div class="rating" style="width:0"></div>
														</div>
													</div>
													<div class="price-box">
														<span class="regular-price" id="product-price-111">
															<span class="price">$189.00</span>                                    
														</span>
													</div>
												</div>
												<div class="clearer"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-sm-4">
								<h2 class="filter-title" style="background-image:none;margin-top:20px;margin-bottom:5px;">
									<span class="content">
										<strong>Hot</strong>
									</span>
								</h2>
								
								<div class="filter-products">
									<div class="products small-list">
										<div class="item">
											<div class="item-area">
												<div class="product-image-area">
													<a href="detil_fashion.html" title="Men Sports Watch" class="product-image">
														<img src="img/testmini.png" alt="Men Sports Watch"/>
													</a>
												</div>
												<div class="details-area">
													<h2 class="product-name">
														<a href="men-sports-watch.html" title="Men Sports Watch">Men Sports Watch</a>
													</h2>
													<div class="ratings">
														<div class="rating-box">
															<div class="rating" style="width:0"></div>
														</div>
													</div>
													<div class="price-box">
														<span class="regular-price" id="product-price-136">
															<span class="price">$320.00</span>                                    
														</span>
													</div>
												</div>
												<div class="clearer"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-sm-4">
								<h2 class="filter-title" style="background-image:none;margin-top:20px;margin-bottom:5px;">
									<span class="content">
										<strong>Sale</strong>
									</span>
								</h2>
								
								<div class="filter-products">
									<div class="products small-list">
										<div class="item">
											<div class="item-area">
												<div class="product-image-area">
													<a href="detil_fashion.html" title="Jewellery Earring K3" class="product-image">
														<img src="img/testmini.png" alt="Jewellery Earring K3"/>
													</a>
												</div>
												
												<div class="details-area">
													<h2 class="product-name">
														<a href="jewellery-earring-k3.html" title="Jewellery Earring K3">Jewellery Earring K3</a>
													</h2>
													<div class="ratings">
														<div class="rating-box">
															<div class="rating" style="width:100%"></div>
														</div>
														<span class="amount">
															<a href="#" onclick="var t = opener ? opener.window : window; t.location.href='review/product/list/id/121/index.html'; return false;">
																<span class="number">1</span>Review(s)
															</a>
														</span>
													</div>
													
													<div class="price-box">
														<p class="old-price">
															<span class="price-label">Regular Price:</span>
															<span class="price" id="old-price-121">
																$180.00
															</span>
														</p>
														<p class="special-price">
															<span class="price-label">Special Price</span>
															<span class="price" id="product-price-121">
																$150.00
															</span>
														</p>
													</div>
												</div>														
												<div class="clearer"></div>
											</div>
										</div>                                         
									</div>
								</div>
							</div>
							
						</div>
					</div>
                </div>
            </div>
        </div>
	</div>
