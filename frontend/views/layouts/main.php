<?php

/* @var $this \yii\web\View */
/* @var $content string */

	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use frontend\assets\AppAsset;
	use common\widgets\Alert;
	use frontend\models\Metadescription;
	use frontend\models\Metatitle;
	use frontend\models\Author;
	use frontend\models\Keyword;
	use frontend\models\Logo;
	use frontend\models\UserForm;
	use yz\shoppingcart\ShoppingCart;
	use yii\web\View;
	
	AppAsset::register($this);
	
	if (Yii::$app->controller->action->id === 'index') {
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<?php
			$meta_desc = Metadescription::find()
						->orderBy(['idmetadesc'=>SORT_DESC])
						->limit(1)
						->One();
						
			$meta_title = Metatitle::find()
						->orderBy(['idtitle'=>SORT_DESC])
						->limit(1)
						->One();
			
			$meta_keyword = Keyword::find()
						->orderBy(['idkeyword'=>SORT_DESC])
						->limit(1)
						->One();
						
			$meta_author = Author::find()
						->orderBy(['idauthor'=>SORT_DESC])
						->limit(1)
						->One();
		?>
			<meta charset="<?= Yii::$app->charset ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name='keywords' content='<?= $meta_keyword->keyword; ?>' />
			<meta name='author' content='<?= $meta_author->author; ?>' />
			<meta name='description' content='<?= $meta_desc->description; ?>' />
			<?= Html::csrfMetaTags() ?>
			<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<?php
			$root = '@web';			
			$this->registerJsFile($root."/js/my_js.js",
			['depends' => [\yii\web\JqueryAsset::className()],
			'position' => View::POS_HEAD]);
			
			$this->registerCssFile('css/7322e5188218fbdefb9daa9d38c6e561.css', ['media' => 'print']);			
			
			$itemsInCart = Yii::$app->cart->getCount();
			$subtotal = Yii::$app->cart->getCost();
			
			$cart = \Yii::$app->cart;
			$products = $cart->getPositions();
		?>	
		
			<div id="loading-mask">
				<div class ="background-overlay"></div>
				<p id="loading_mask_loader" class="loader">
					<i class="ajax-loader large animate-spin"></i>
				</p>
			</div>
			
			<div id="after-loading-success-message">
				<div class ="background-overlay"></div>
				<div id="success-message-container" class="loader" >
					<div class="msg-box">Product was successfully added to your shopping cart.</div>
					<button type="button" name="finish_and_checkout" id="finish_and_checkout" class="button btn-cart" >
						<span>
						<span>Go to cart page</span>
						</span>
					</button>
					<button type="button" name="continue_shopping" id="continue_shopping" class="button btn-cart" >
						<span>
							<span>Continue</span>
						</span>
					</button>
				</div>
			</div>

			<script type="text/javascript">
				jQuery(function($){
					var scrolled = false;
					$(window).scroll(function(){
						if(140<$(window).scrollTop() && !scrolled){
                            if(!$('.header-container .menu-wrapper .mini-cart').length && !$('.header-container .menu-wrapper .sticky-logo').length){
								$('.header-container').addClass("sticky-header");
								var minicart = $('.header-container .mini-cart').html();
								$('.header-container .menu-wrapper').append('<div class="mini-cart">'+minicart+'</div>');
                                
								$('.header-container .header-wrapper > div').each(function(){
									if($(this).hasClass("container")){
										$(this).addClass("already");
									} else {
										$(this).addClass("container");
									}
								});
								
								scrolled = true;
							}
						}
						
						if(140>=$(window).scrollTop() && scrolled){
							$('.header-container').removeClass("sticky-header");
							$('.header-container .menu-wrapper .mini-cart').remove();
							scrolled = false;
							
							$('.header-container .header-wrapper > div').each(function(){
								if($(this).hasClass("already")){
									$(this).removeClass("already");
								} else {
									$(this).removeClass("container");
								}
							});
						}
					});
				});
			</script>
			
			<script type="text/javascript">
				if (typeof EM == 'undefined') EM = {};
					EM.Quickview = {
						QS_FRM_WIDTH    :"1000",
						QS_FRM_HEIGHT   : "730"
				}; 
			</script> 
			
		<?php
			$this->registerCss("		
				.header-container{
					border-bottom:1px solid #e1e1e1;
				} 
				.recent-posts .item .col-sm-5, .recent-posts .item .col-sm-7{
					width:100%;
				}
			");
		?>		
	</head>
	
	 <body class=" cms-index-index cms-porto-home-6">
		<?php $this->beginBody() ?>

		<div class="wrapper">
			<noscript>
				<div class="global-site-notice noscript">
					<div class="notice-inner">
						<p>
							<strong>JavaScript seems to be disabled in your browser.</strong><br />
							You must have JavaScript enabled in your browser to utilize the functionality of this website.                
						</p>
					</div>
				</div>
			</noscript>
			
			<div class="page">
				<div class="header-container type3">
					<div class="top-links-container">
						<div class="top-links container">
							
							<div class="form-currency top-select">
								<select id="select-currency" name="currency" title="Select Your Currency" onchange="setLocation(this.value)">
									<option>IDR</option>									
									</option>
								</select>
								<script type="text/javascript">
									(function($){
										$("#select-currency").selectbox();
									})(jQuery);
								</script>
							</div>
							<span class="split"></span>
							<div class="form-language top-select">
								<select id="select-language" title="Your Language" onchange="window.location.href=this.value" style="width:auto;">
									<option data-image="img/lang/en.png"   selected="selected">English</option>
								</select>
								<script type="text/javascript">
									(function($){
										$("#select-language").selectbox();
									})(jQuery);
								</script>
							</div>
						
							<div class="top-links-area">                      
								<ul class="links">
									<?php
										if (!Yii::$app->user->isGuest) {
											echo"
											<li class='first'>
												<a href='myaccount' title='My Account'>My Account</a>
											</li>";
											echo"
											<li class='first'>"
												. Html::beginForm(['/site/logout'], 'post')
												. Html::submitButton(
													'Logout (' . Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname. ')',
													['class' => 'btn btn-link','style'=>'color:#fff']
												)
												. Html::endForm()
											. "</li>";
										}else{
											echo"
											<li class='last' style='border-left: 1px solid #ccc'>
												<a href='login' >Log In</a>
											</li>";
										}
									?>									
								</ul>
							</div>                   
							<div class="clearer"></div>
						</div>
					</div>
					
					<div class="header container">
						<h1 class="logo">
							<strong>Maridagang</strong>
							<a href="<?= Yii::$app->homeUrl; ?>" title="Maridagang" class="logo">
								<img src="img/logo_white_plus.png" alt="Maridagang" />
							</a>
						</h1>
						
						<div class="cart-area">
							<div class="custom-block">
								<i class="icon-phone" style="margin-right: 5px;"></i>
								<span>(+62) 877-7668-7488</span>
								<span class="split"></span>
								<a href="contact-us">CONTACT US</a>
							</div>
							
							<div class="mini-cart">
								<a href="javascript:void(0)" class="mybag-link">
									<i class="icon-mini-cart"></i>
									<span class="cart-info">
										<span class="cart-qty"><?= $itemsInCart; ?></span>
										<span>item(s)</span>
									</span>
								</a>
								<?php
									if($itemsInCart == 0){
								?>
								<div class="topCartContent block-content theme-border-color" style="display: none;">
									<div class="inner-wrapper"> 
										<p class="cart-empty"> You have no items in your shopping cart. </p>
									</div>
								</div>
								<?php }else{?>
								<div class="topCartContent block-content theme-border-color">
									<div class="inner-wrapper">
										<ol class="mini-products-list">
											<li class="item">
												<a href="detil_fashion.html" title="Samsung Galaxy - Small" class="product-image">
													<img src="img/bag.png" alt="Samsung Galaxy - Small" />
												</a>
												<div class="product-details">
													<p class="product-name">
														<a href="detil_fashion.html">Samsung Galaxy - Small</a>
													</p>
													<p class="qty-price">1 X <span class="price">$250.00</span></p>
													<a href="dailydeal/index.html" title="Remove This Item" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" class="btn-remove"><i class="icon-cancel"></i></a>
												</div>
												<div class="clearer"></div>
											</li>                                
										</ol>
										
										<div class="totals">
											<span class="label">Total: </span>
											<span class="price-total"><span class="price"><?= $subtotal; ?> IDR</span></span>
										</div>
										
										<div class="actions">
											<a class="btn btn-default" href="cart">
												<i class="icon-basket"></i>
												View Cart
											</a>
											<a class="btn btn-default" href="checkout">
												<i class="icon-right-thin"></i>
												Checkout
											</a>
											<div class="clearer"></div>
										</div>
									</div>
								</div>
								<?php }?>
								<script type="text/javascript">
									jQuery(function($){
										$('.mini-cart').mouseover(function(e){
											$(this).children('.topCartContent').fadeIn(200);
											return false;
										}).mouseleave(function(e){
											$(this).children('.topCartContent').fadeOut(200);
											return false;
										});
									});
								</script>
							</div>
						</div>
						
						<div class="search-area">
							<a href="javascript:void(0);" class="search-icon"><i class="icon-search"></i></a>
							<form id="search_mini_form" action="# method="get">
								<div class="form-search ">
									<label for="search">Search:</label>
									<input id="search" type="text" name="q" class="input-text" placeholder="Search here.."/>								
									<button type="submit" title="Search" class="button"><i class="icon-search"></i></button>
									<div id="search_autocomplete" class="search-autocomplete"></div>
									<div class="clearer"></div>
								</div>
							</form>
						</div>
						<div class="menu-icon">
							<a href="javascript:void(0)" title="Menu">
								<i class="fa fa-bars"></i>
							</a>
						</div>
					</div>
				</div>
				
				<div class="mobile-nav side-block container">
					<div class="menu-all-pages-container">
						<ul class="menu">				
							<li class="menu-item menu-item-has-children menu-parent-item  ">
								<a href="motors.html">Motors</a>
								<ul>
									<li class="menu-item  ">
										<a class="level1" href="motors/cars-and-trucks.html">
										<span>Cars and Trucks</span>
										</a>
									</li>
									<li class="menu-item  ">
										<a class="level1" href="motors/motorcycles.html">
										<span>Motorcycles &amp; Powersports</span>
										</a>
									</li>
									<li class="menu-item menu-item-has-children menu-parent-item  ">
										<a class="level1" href="motors/parts.html"><span>Parts &amp; Accessories</span></a>
										<ul>
											<li class="menu-item "><a class="level2" href="motors/parts/motorcycle-parts.html"><span>Motorcycle Parts</span></a></li>
											<li class="menu-item "><a class="level2" href="motors/parts/atv-parts.html"><span>ATV Parts</span></a></li>
											<li class="menu-item "><a class="level2" href="motors/parts/snowmobile-parts.html"><span>Snowmobile Parts</span></a></li>
											<li class="menu-item "><a class="level2" href="motors/parts/personal-watercraft-parts.html"><span>Personal Watercraft Parts</span></a></li>
											<li class="menu-item "><a class="level2" href="motors/parts/other-vehicle-parts.html"><span>Other Vehicle Parts</span></a></li>
										</ul>
									</li>
									<li class="menu-item  ">
										<a class="level1" href="motors/boats.html">
										<span>Boats</span>
										</a>
									</li>
									<li class="menu-item  ">
										<a class="level1" href="motors/auto-tools-supplies.html">
										<span>Auto Tools &amp; Supplies</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="menu-item">
								<a href="login">Sign in</a>
							</li>							
                        </ul>
					</div>
				</div>
				
				<div class="mobile-nav-overlay close-mobile-nav"></div>
				<div class="main-container col1-layout">
					<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
					<?= Alert::widget() ?>
					
					<?= $content ?>
				</div>
		

				<div class="footer-container ">
					<div class="footer">
						<div class="footer-middle">
							<div class="container">
								<div class="footer-ribbon">
									<span>Support</span>
								</div>
								
								<div class="row">
									<div class="col-sm-3">
										<div class="block">
											<div class="block-title">
												<strong>
													<span>My Account</span>
												</strong>
											</div>
											
											<div class="block-content">
												<ul class="links">
													<li>
														<i class="icon-right-dir theme-color"></i>
														<a href="about-us" title="About us">About us</a>
													</li>
													<li>
														<i class="icon-right-dir theme-color"></i>
														<a href="contact-us" title="Contact us">Contact us</a>
													</li>
													<li>
														<i class="icon-right-dir theme-color"></i>
														<a href="order-tracking" title="Orders history">Order Tracking</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="block">
											<div class="block-title">
												<strong>
													<span>Contact Information</span>
												</strong>
											</div>
											
											<div class="block-content">
												<ul class="contact-info">
													<li>
														<i class="icon-location">&nbsp;</i>
														<p>
															<b>Address:</b>
															<br/>123 Street Name, City, England
														</p>
													</li>
													<li>
														<i class="icon-phone">&nbsp;</i>
														<p>
															<b>Phone:</b>
															<br/>(123) 456-7890
														</p>
													</li>
													<li>
														<i class="icon-mail">&nbsp;</i>
														<p>
															<b>Email:</b>
															<br/>
															<a href="mailto:mail@example.com">mail@example.com</a>
														</p>
													</li>
													<li>
														<i class="icon-clock">&nbsp;</i>
														<p>
															<b>Working Days/Hours:</b>
															<br/>Mon - Sun / 9:00AM - 8:00PM
														</p>
													</li>
												</ul>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="block">
											<div class="block-title">
												<strong>
													<span>Features</span>
												</strong>
											</div>
											
											<div class="block-content">
												<ul class="features">
													<li>
														<i class="icon-ok theme-color"></i>
														<a href="#">Money Back Guarantee</a>
													</li>
													<li>
														<i class="icon-ok  theme-color"></i>
														<a href="#">Free Return</a>
													</li>
													<li>
														<i class="icon-ok  theme-color"></i>
														<a href="#">Online Support</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="block block-subscribe">
											<div class="block-title">
												<strong>
													<span>About</span>
												</strong>
											</div>											
											<div class="block-content">
												<?php 
													$model = UserForm::find()
														   ->where(['idrole'=>1])
														   ->One();
													echo $model->description;	   
												?>
												
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="footer-bottom">
							<div class="container">
								<a href="index.html" class="logo">
									<img src="img/logo_footer.png" alt=""/>
								</a>
								<div class="social-icons">
									<a href="http://www.example.com/" style="background-position:-60px 0; width:30px; height:30px;" class="icon1-class" title="Facebook" target="_blank">&nbsp;</a>
									<a href="http://www.example.com/" style="background-position:0 0; width:30px; height:30px;" class="icon2-class" title="" target="_blank">&nbsp;</a>
									<a href="http://www.example.com/" style="background-position:-300px 0; width:30px; height:30px;" class="icon3-class" title="" target="_blank">&nbsp;</a>
								</div>
								<div class="custom-block">
									<img src="img/payments.png" alt="" style="max-width: 100%;" />
								</div>
								<address>&copy; Copyright <?= date("Y"); ?><a href="http://maridagang.com"> Maridagang </a>. All Rights Reserved.</address>
							</div>
						</div>
					</div>
				</div>
				<a href="#" id="totop"><i class="icon-up-open"></i></a>
			</div>
		</div>		
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>

<?php
	}else {
		echo $this->render(
			'main-nav',
			['content' => $content]
		);
	} 
?>