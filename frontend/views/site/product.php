
<?php
use frontend\models\MainCategory;
use frontend\models\SubCategory;
use frontend\models\DetailCategory;
use frontend\models\Theme;
use frontend\widgets\Alert;
use frontend\models\Header;
use frontend\models\Footer;
use frontend\models\Color;
use frontend\models\Logo;
use frontend\models\Brand;
use frontend\models\Product;
use frontend\models\Image;
use yii\helpers\Html;

	$models = Theme::find()
		->where(["user_name"=>"junot"])
		->one();
	
	$head = Header::find()
		->where(["idheader"=>$models->idheader])
		->one();
	
	$foot = Footer::find()
		->where(["idfooter"=>$models->idfooter])
		->one();
		
	$logo = Logo::find()
		->where(["idlogo"=>$models->idlogo])
		->one();
		
	function format_rupiah($angka){
		$rupiah = number_format($angka,0,',','.');
		return $rupiah;
		
	}
		
		$this->registerCss ('
		.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li.active a {
			background: red;
		}
		.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li.active a:after {
			border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) red;
		}
		.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track .slider-handle {
			border: 5px solid red;
		}
		.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .list li a:hover,
		.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .list li a:focus {
			color: red;
		}
		.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .compare-report span {
			color: red;
		}
		.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination .owl-page.active span {
			background: red;
		}
		.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination .owl-page:hover span {
			background: red;
		}
		.single-product .gallery-holder .gallery-thumbs .owl-item .item:hover {
			border: 1px solid red;
		}
		.single-product .product-info .rating-reviews .reviews .lnk:hover,
		.single-product .product-info .rating-reviews .reviews .lnk:focus {
			color: red;
		}
		.single-product .product-info .price-container .price-box .price {
			color: red;
		}
		.single-product .product-info .quantity-container .cart-quantity .arrows .arrow:hover,
		.single-product .product-info .quantity-container .cart-quantity .arrows .arrow:focus {
			color: red;
		}
		.single-product .product-info .product-social-link .social-icons ul li a:hover,
		.single-product .product-info .product-social-link .social-icons ul li a:focus {
			background: red;
		}
		.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:hover,
		.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:focus {
			background: red;
		}
		.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:hover:after,
		.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:focus:after {
			border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) red;
		}
		#owl-single-product-thumbnails .owl-controls .owl-pagination .owl-page.active span {
			background: red !important;
		}
		');
	?>


	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="#">Home</a></li>
					<li><a href="#">Woman</a></li>
					<li class='active'>Samsung Galaxy S4 32GB White</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
	
	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row single-product outer-bottom-sm '>
			
				<div class='col-md-3 sidebar'>
					<!-- ================================== TOP NAVIGATION : END ================================== -->
					<div class="sidebar-module-container">
						<h3 class="section-title">Shop by</h3>
						<div class="sidebar-filter">		

						
							<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
							<div class="nav-side-menu">
								<div class="brand">CATEGORY</div>
								<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
								<div class="menu-list">
									<?php 	
										$models=MainCategory::find()
											->all();
										foreach ($models as $model):
									?>
									<ul id="menu-content" class="menu-content collapse in">
										<li  data-toggle="collapse" data-target="#<?= $model->idmain ?>" class="collapsed">
											<a href="?r=catalog/category&route=<?= $model->idmain ?>"> <?= $model->main_category_name ?></a> <span class="arrow"></span>
										</li>
										<?php $modelsubs=SubCategory::find()
											->where (["idmaincategory"=>$model->idmain])
											->all();
											foreach ($modelsubs as $modelsub):
										?>
										<ul class="sub-menu collapse" id="<?= $model->idmain ?>">
											<li data-toggle="collapse" data-target="#abc<?= $modelsub->idsubcategory ?>">
												<a href="?r=catalog/sub-category&route=<?= $model->idmain ?>&routes=<?= $modelsub->idsubcategory ?>"></i><?= $modelsub->sub_category_name ?></a><span class="arrow"></span>
											</li>
											<?php 
												$modeldets=DetailCategory::find()
													->where (["idsubcategory"=>$modelsub->idsubcategory])
													->all();
												foreach ($modeldets as $modeldet):
											?>
											<ul class="sub-menu collapse" id="abc<?= $modelsub->idsubcategory ?>">
												<li><a href="?r=catalog/category&route=<?= $model->idmain ?>&routes=<?= $modelsub->idsubcategory ?>&router=<?= $modeldet->iddetail ?>"><?= $modeldet->detail_name ?> </a></li>
											</ul>
											<?php endforeach; ?>
										</ul>
										<?php endforeach; ?>
									</ul>
									<?php endforeach; ?>
								</div>
							</div>
							<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->
						
						
							<!-- ============================================== PRICE SILDER============================================== -->
							<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
								<div class="widget-header" style="background-color:#<?= $head-> color; ?>;">
									<h4 class="widget-title" style="color:#<?= $head-> color_font; ?>; <?= $head-> font; ?>;">Price Slider</h4>
								</div>
								<?php
									$this->registerJs ('
										// jQuery UI - style slider controls
										$(".slider-select").each(function() {
											$(this).find(".slider-range").slider({
												range: true,
												min: 0,
												max: 999,
												values: [ 400, 600 ],
												slide: function( event, ui ) {
													$(this).parent().children( ".amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
												}
											});
										$( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) +
											" - $" + $( ".slider-range" ).slider( "values", 1 ) );
										});
									');
								?>
								<div class="sidebar-widget-body m-t-20">
									<div class='slider-select'>
											<label for='amount01'>
											Price Range
											</label>
											<input id="amount01" class='amount' type='text'>
											<div class='slider-range'></div>
											<i class='low'>
											Low
											</i>
											<i class='high'>
											High
											</i>
										</div>
									<a href="#" class="lnk btn btn-primary">Show Now</a>
								</div><!-- /.sidebar-widget-body -->
							</div><!-- /.sidebar-widget -->
							<!-- ============================================== PRICE SILDER : END ============================================== -->
						
						
						
							<!-- ============================================== Brand ============================================== -->
							<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
								<div class="widget-header" style="background-color:#<?= $head-> color; ?>; color:#<?= $head-> color_font; ?>;<?= $head-> font; ?>;">
									<h4 class="widget-title">Brands</h4>
								</div>
								<div class="sidebar-widget-body m-t-10">
									<ul class="list">
										<?php
											foreach($brand as $brands):
										?>
										<li><a href="#" ><?= $brands->brand->brand_name; ?></a></li>	
										<?php
											endforeach;
										?>
									</ul>
									<!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
								</div><!-- /.sidebar-widget-body -->
							</div><!-- /.sidebar-widget -->
							<!-- ============================================== BRANDS: END ============================================== -->
		            	

						
							<!-- ============================================== PRODUCT TAGS ============================================== -->
							<div class="sidebar-widget product-tag wow fadeInUp">
								<h3 class="section-title">Product tags</h3>
								<div class="sidebar-widget-body outer-top-xs">
									<div class="tag-list">				
										<?php
											foreach($tag as $tags):
										?>
										<a class="item" title="Smartphone" href="?r=catalog/category&route=<?= $tags->mainCategory->main_category_name?>" ><?= $tags->mainCategory->main_category_name?></a>
										<?php
											endforeach;
										?>
									</div><!-- /.tag-list -->
								</div><!-- /.sidebar-widget-body -->
							</div><!-- /.sidebar-widget -->
							<!-- ============================================== PRODUCT TAGS : END ============================================== -->		

						
							<!-- ============================================== SALE ============================================== -->
							<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
								<div id="advertisement" class="advertisement">
									<?php
										foreach($sale as $sales):
									?>
									<div class="item" style="background-image: url(../../image/banner/<?= $sales->sale_slider; ?>);"></div><!-- /.item -->
									<?php
										endforeach;
									?>
								</div><!-- /.owl-carousel -->
							</div>
							<!-- ============================================== COLOR: END ============================================== -->
						</div><!-- /.sidebar-filter -->
					</div><!-- /.sidebar-module-container -->
				</div><!-- /.sidebar -->
				<!-- ============================================== SIDEBAR : END ============================================== -->
			
				
				<div class='col-md-9'>
					<div class="row  wow fadeInUp">
					   <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">
									<div class="single-product-gallery-item" id="slide1">
										<a data-lightbox="image-1" data-title="Gallery" href="../../image/cart/<?= $product->image->image_name; ?>">
											<img class="img-responsive" alt="" src="../../image/cart/<?= $product->image->image_name; ?>" data-echo="../../image/cart/<?= $product->image->image_name;?>" />
										</a>
									</div><!-- /.single-product-gallery-item -->
								</div><!-- /.single-product-slider -->
								
								<div class="single-product-gallery-thumbs gallery-thumbs">
									<div id="owl-single-product-thumbnails">	
										<?php
											$mod = Image::find()
												->where(['product_id'=>$product->idproduk])
												->AndWhere(['is_cover'=>0])
												->all();
											$x=0;
											foreach($mod as $mode):
											$x++;
										?>
										<div class="item">						
											<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?= $x ?>" href="#slide<?= $x ?>">
												<img class="img-responsive" width="85" alt="" src="../../image/cart/<?= $mode->image_name; ?>" data-echo="../../image/cart/<?= $mode->image_name; ?>" />
											</a>
										</div>
										<?php endforeach; ?>
									</div><!-- /#owl-single-product-thumbnails -->         
								</div><!-- /.gallery-thumbs -->
								
							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->        
						
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?= $product->title; ?></h1>							
								
								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-5">
											<div class="stock-box">
												<?php
													if($product->stock != 0){
														$stock = "In Stock";
														$class= "text-success";
													}else{
														$stock = "Out of Stock";
														$class= "text-danger";
													}
												?>
												<span class="value"><div class="<?= $class; ?>"><?= $stock; ?></div></span>
											</div>	
										</div>
									
									</div><!-- /.row -->	
								</div><!-- /.stock-container -->

								<div class="description-container m-t-20">
									<?= $product->short_description; ?>
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">
										<div class="col-sm-12">
											<div class="price-box">
												<?php
													if($product->discount > 0){
														$beforeDiscount = $product->price + $product->service;															
														echo"<span class='price'>Rp ";?><?= format_rupiah($product->final_price); ?></span><?php
														echo"<span class='price-strike'>Rp ";?><?= format_rupiah($beforeDiscount) ?></span><?php
													}else{
														echo"<span class='price'>Rp ";?><?= format_rupiah($product->final_price); ?></span><?php
													}
												?>
											</div>
										</div>

										<div class="col-sm-6">										
										</div>
									</div><!-- /.row -->
								</div><!-- /.price-container -->

								<div class="quantity-container info-container">
									<div class="row">
								
										<div class="col-sm-12">
											<div class="col-sm-1">
												<span class="label">Qty :</span>
											</div>
											<div class="col-sm-3">
												<select name="qty" class="form-control">
													<?php
														if($product->maxqty <= $product->stock){
															for($i = $product->minqty ; $i<= $product->maxqty; $i++){
																?>
																	<option value="<?= $i ?>"><?= $i ?></option>
																<?php 
															} 
														}else{ 
															for($i = $product->minqty ; $i<= $product->stock; $i++){
																?>
																	<option value="<?= $i ?>"><?= $i ?></option>
																<?php 
															} 
														}
													?>
												</select>
											</div>
											<div class="col-sm-4">
												
												<li class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
														<i class="fa fa-shopping-cart"></i>													
													</button>
													<?= Html::a('Add to cart', ['cart/add', 'id' => $product->idproduk], ['class' => 'btn btn-primary'])?>					
												</li>
														
											</div>
										</div>								
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->
							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->

				
					<div class="product-tabs inner-bottom-xs  wow fadeInUp">
						<div class="row">
							<div class="col-sm-3">
								<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
									<li class="active" ><a data-toggle="tab" href="#description" >DESCRIPTION</a></li>
									<li><a data-toggle="tab" href="#review" >REVIEW</a></li>
								</ul><!-- /.nav-tabs #product-tabs -->
							</div>
							
							<div class="col-sm-9">
								<div class="tab-content">								
									<div id="description" class="tab-pane in active">
										<div class="product-tab">
											<p class="text"><?= $product->description; ?></p>
										</div>	
									</div><!-- /.tab-pane -->

									
									<div id="review" class="tab-pane">
										<div class="product-tab">																			
											<div class="product-reviews">
												<h4 class="title">Customer Reviews</h4>

												<div class="reviews">
													<div class="review">
														<div class="review-title"><span class="summary">Best Product For me :)</span><span class="date"><i class="fa fa-calendar"></i><span>20 minutes ago</span></span></div>
														<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit nisl in adipiscin"</div>
														<div class="author m-t-15"><i class="fa fa-pencil-square-o"></i> <span class="name">Michael Lee</span></div>													</div>
												
												</div><!-- /.reviews -->
											</div><!-- /.product-reviews -->
										

										
											<div class="product-add-review">
												<h4 class="title">Write your own review</h4>
												<div class="review-table">
													<div class="table-responsive">
														<table class="table table-bordered">	
															<thead>
																<tr>
																	<th class="cell-label">&nbsp;</th>
																	<th>1 star</th>
																	<th>2 stars</th>
																	<th>3 stars</th>
																	<th>4 stars</th>
																	<th>5 stars</th>
																</tr>
															</thead>	
															<tbody>
																<tr>
																	<td class="cell-label">Quality</td>
																	<td><input type="radio" name="quality" class="radio" value="1"></td>
																	<td><input type="radio" name="quality" class="radio" value="2"></td>
																	<td><input type="radio" name="quality" class="radio" value="3"></td>
																	<td><input type="radio" name="quality" class="radio" value="4"></td>
																	<td><input type="radio" name="quality" class="radio" value="5"></td>
																</tr>
															</tbody>
														</table><!-- /.table .table-bordered -->
													</div><!-- /.table-responsive -->
												</div><!-- /.review-table -->
												
												<div class="review-form">
													<div class="form-container">
														<form role="form" class="cnt-form">
															
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																		<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																	</div><!-- /.form-group -->
																	<div class="form-group">
																		<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																		<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																	</div><!-- /.form-group -->
																</div>
	
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputReview">Review <span class="astk">*</span></label>
																		<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																	</div><!-- /.form-group -->
																</div>
															</div><!-- /.row -->
															
															<div class="action text-right">
																<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
															</div><!-- /.action -->
	
														</form><!-- /.cnt-form -->
													</div><!-- /.form-container -->
												</div><!-- /.review-form -->
	
											</div><!-- /.product-add-review -->										
										
										</div><!-- /.product-tab -->
									</div><!-- /.tab-pane -->
								</div><!-- /.tab-content -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.product-tabs -->
					<!-- ============================================== UPSELL PRODUCTS ============================================== -->
					
					<section class="section featured-product wow fadeInUp">
						<h3 class="section-title">SELL products</h3>
						<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">	   
							<?php 
								$products = Product::find()
									->JoinWith('image')
									->OrderBy(['idproduk'=>SORT_DESC])									
									->where(['sale'=>1])
									->all();
								foreach($products as $productss):								
							?>
							<div class="item item-carousel">
								<div class="products">				
									<div class="product">		
										<div class="product-image">
											<div class="image">
												<a href="?r=site/product&id=<?= $productss->idproduk ?>"><img  src="../../image/cart/<?= $productss->image->image_name?>" data-echo="../../image/cart/<?= $productss->image->image_name?>" style="width:195px" alt="<?= $productss->image->title?>"></a>
											</div><!-- /.image -->			
								
											<div class="tag sale"><span>sale</span></div>                        		   
										</div><!-- /.product-image -->
			
		
										<div class="product-info text-left">
											<h3 class="name"><?= Html::a($productss->title, ['site/product', 'id' => $productss->idproduk])?></h3>													
											<div class="rating rateit-small"></div>
											<div class="description"></div>
								
											<div class="product-price">	
											<?php
												if($productss->discount > 0){
													$beforeDiscount = $productss->price + $productss->service;															
													echo"<span class='price'>Rp $productss->final_price; </span>";
													echo"<span class='price-before-discount'>Rp $beforeDiscount </span>";
												}else{
													echo"<span class='price'>Rp $productss->final_price </span>";
												}
											?>
												
																	
											</div><!-- /.product-price -->													
										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>													
														</button>
														<?= Html::a('Add to cart', ['cart/add', 'id' => $productss->idproduk], ['class' => 'btn btn-primary'])?>					
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->
      
								</div><!-- /.products -->
							</div><!-- /.item -->
								<?php endforeach; ?>
						</div><!-- /.home-owl-carousel -->
					</section><!-- /.section -->
					<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->			
				</div><!-- /.col -->
			<div class="clearfix"></div>
			</div><!-- /.row -->
		
			<!-- ============================================== BRANDS CAROUSEL ============================================== -->
			<div id="brands-carousel" class="logo-slider wow fadeInUp">
				<h3 class="section-title">Our Brands</h3>
				<div class="logo-slider-inner"> 
					<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
					<?php
						foreach($brand as $brandLogo):
					?>
					<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="../../image/brand/<?= $brandLogo->brand->brand_logo?>" src="../../image/<?= $brandLogo->brand->brand_logo?>" style="width:70%;" width="20%" alt="<?= $brandLogo->brand->brand_name?>">
					</a>  
					</div><!--/.item-->
					<?php endforeach; ?>
					</div><!-- /.owl-carousel #logo-slider -->
				</div><!-- /.logo-slider-inner -->
				
			</div><!-- /.logo-slider -->
			<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
			
		</div><!-- /.container -->
	</div><!-- /.body-content -->