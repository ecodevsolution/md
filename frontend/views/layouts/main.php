<?php

/* @var $this \yii\web\View */
/* @var $content string */

	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use frontend\assets\AppAsset;
	use common\widgets\Alert;	
	use frontend\models\Seo;
	use frontend\models\UserForm;
	use frontend\models\Image;
	use yz\shoppingcart\ShoppingCart;
	use yii\web\View;
	use frontend\models\MainCategory;
	use frontend\models\SubCategory;
	use frontend\models\DetailCategory;
	use frontend\models\UserSocial;
	use frontend\models\UserBank;
	use frontend\models\Bank;
	
	AppAsset::register($this);
	$model = UserForm::find()
		->where(['idrole'=>1])
		->One();
	$cart = \Yii::$app->cart;
	$products = $cart->getPositions();
	
	if (Yii::$app->controller->action->id === 'index') {
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<?php
			$seo = Seo::find()
				->limit(1)
				->one();
				
		?>
			<meta charset="<?= Yii::$app->charset ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name='keywords' content='<?= $seo->meta_keyword ?>' />
			<meta name='author' content='<?= $seo->meta_author ?>' />
			<meta name='description' content='<?= $seo->meta_description ?>' />
			<?= Html::csrfMetaTags() ?>
			<title><?= Html::encode($seo->meta_title) ?></title>
		<?php $this->head() ?>
		<?php
			$root = '@web';			
			$this->registerJsFile($root."/js/my_js.js",
			['depends' => [\yii\web\JqueryAsset::className()],
			'position' => View::POS_HEAD]);
			
			$this->registerCssFile('css/7322e5188218fbdefb9daa9d38c6e561.css', ['media' => 'print']);			
			//$this->registerCssFile('css/32d64625d5d5ecd44a8e834c1f7f8284.css', ['media' => 'all']);			
			
			$itemsInCart = Yii::$app->cart->getCount();
			$subtotal = Yii::$app->cart->getCost();
			
			$cart = \Yii::$app->cart;
			$products = $cart->getPositions();
		?>						
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
									?>
										<li class="first"><a href="myaccount" title="My Account">My Account</a></li>
										<li class="first"><a href="logout"  title="Logout" >Logout</a></li>									
									<?php
									 } else{
									?>
										<li><a href="login" title="Daily deal">Login</a></li>
									<?php }?>									
												
								</ul>
							</div>
							<?php
								if (!Yii::$app->user->isGuest) { 
							?>
								<p class="welcome-msg">Welcome <?= Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname; ?></p>							
							<?php } ?>
							<div class="clearer"></div>
						</div>
					</div>
										
					<div class="header container">
						<h1 class="logo">
							<strong><?= $model->nama_toko; ?></strong>
							<a href="<?= Yii::$app->homeUrl; ?>" title="<?= $model->nama_toko; ?>" class="logo">
								<img src="img/logo/<?= $model->logo; ?>" alt="<?= $model->nama_toko; ?>" />
							</a>
						</h1>
						
						<div class="cart-area">
							<div class="custom-block">
								<i class="icon-phone" style="margin-right: 5px;"></i>
								<span>(+62) <?= $model->phone; ?></span>
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
											<?php
												foreach($products as $product):
												$image = Image::find()
														->where(['product_id'=>$product->idproduk])
														->AndWhere(['is_cover'=>1])
														->One();
											?>
											<li class="item">
												<a href="catalog-<?= strtolower(str_replace(' ','_',$product->sku)); ?>-<?= strtolower(str_replace(' ','_',$product->title)); ?>" title="<?= $product->title; ?>" class="product-image">	
													<img src="img/cart/300x/<?= $image->image_name?>" alt="<?= $product->title?>" style="width:84px;height:89" />
												</a>
												<div class="product-details">
													<p class="product-name">
														<a href="catalog-<?= strtolower(str_replace(' ','_',$product->sku)); ?>-<?= strtolower(str_replace(' ','_',$product->title)); ?>"><?= $product->title?></a>
													</p>
													<p class="qty-price"><?= $product->getQuantity(); ?> X <span class="price">Rp. <?= number_format($product->price,0,".","."); ?></span></p>
													<a href="remove-item-<?= $product->idproduk?>" title="Remove This Item" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" class="btn-remove"><i class="icon-cancel"></i></a>
												</div>
												<div class="clearer"></div>
											</li> 
											<?php endforeach; ?>
										</ol>
										
										<div class="totals">
											<span class="label">Total: </span>
											<span class="price-total"><span class="price">Rp. <?= number_format($subtotal,0,".","."); ?></span></span>
										</div>
										
										<div class="actions">
											<a class="btn btn-default" href="cart-list">
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
							<form id="search_mini_form" action="#" method="get">
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
							<?php 	
								$cat=MainCategory::find()
									->all();
								foreach ($cat as $cats):
								
								$count_submenu = SubCategory::find()
												->where (["idmaincategory"=>$cats->idmain])
												->count();
								if($count_submenu > 0){
							?>
							<li class="menu-item menu-item-has-children menu-parent-item  ">
								<a href="category-<?= strtolower(str_replace(' ','_',$cats->main_category_name)); ?>"><?= $cats->main_category_name?> </a>
								<ul>
									<?php 
									
										$modelsubs=SubCategory::find()
											->where (["idmaincategory"=>$cats->idmain])
											->all();	
										foreach ($modelsubs as $modelsub):
										
										$count_menu = DetailCategory::find()
											->where (["idsubcategory"=>$modelsub->idsubcategory])
											->count();
										
										if($count_menu > 0){
											$class ="menu-item menu-item-has-children menu-parent-item ";
										}else{
											$class ="";
										}
									?>
									
									<li class="<?= $class; ?>">
										<a class="level1" href="product-<?= strtolower(str_replace(' ','_',$cats->main_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modelsub->sub_category_name)); ?>"><span><?= $modelsub->sub_category_name ?></span></a>
										<ul>
											<?php 
												$modeldets=DetailCategory::find()
													->where (["idsubcategory"=>$modelsub->idsubcategory])
													->all();
												foreach ($modeldets as $modeldet): 
											?>
											<li class="menu-item " style="list-style: none;"><a class="level2" href="product_detail-<?= strtolower(str_replace(' ','_',$cats->main_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modelsub->sub_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modeldet->detail_name)); ?>"></span><?= $modeldet->detail_name; ?></a></li>
											<?php endforeach; ?>
										</ul>
									</li>
									<?php endforeach; ?>						
								</ul>
							</li>
								<?php }else{
									echo"<li class=''><a href=".strtolower(str_replace(' ','_',$cats->main_category_name)) .">".$cats->main_category_name."</a></li>";						
								} endforeach; ?>
								
								<?php
									if (!Yii::$app->user->isGuest) { 
								?>
									<li class=""><a href="myaccount" title="My Account">My Account</a></li>
									<li class=""><a href="logout"  title="Logout" >Logout</a></li>									
								<?php
								 } else{
								?>
									<li><a href="login" title="Daily deal">Login</a></li>
								<?php }?>								
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
															<br/><?= $model->address; ?>
														</p>
													</li>
													<li>
														<i class="icon-phone">&nbsp;</i>
														<p>
															<b>Phone:</b>
															<br/><?= $model->phone; ?>
														</p>
													</li>
													<li>
														<i class="icon-mail">&nbsp;</i>
														<p>
															<b>Email:</b>
															<br/>
															<a href="mailto:<?= $model->email; ?>"><?= $model->email; ?></a>
														</p>
													</li>
													<li>
														<i class="icon-clock">&nbsp;</i>
														<p>
															<b>Working Days/Hours:</b>
															<br/><?= $model->work_hour; ?>
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
								<a href="<?= Yii::$app->homeUrl; ?>" class="logo">
									<img src="img/logo/<?= $model->logo; ?>" style="width:68px;height:31px" alt=""/>
								</a>
								<div class="social-icons">
									<?php
										$social = UserSocial::find()
												->joinWith('social')
												->all();
										foreach($social as $socials):
									?>
										<a href="<?= $socials->link ?>" style="<?= $socials->social->position?>" class="<?= $socials->social->class ?>" title="<?= $socials->social->name; ?>" target="_blank">&nbsp;</a>
									<?php endforeach; ?>		
								</div>
								<div class="custom-block">
									<?php
										$bank = UserBank::find()												
												->all();
										foreach($bank as $banks):
										
										$bank_logo = Bank::find()
												->where(['bankid'=>$banks->bank])
												->all();
											foreach($bank_logo as $bank_logos):
									?>
												<img src="img/bank/<?= $bank_logos->logo; ?>" alt="" style="width:49px;height:28px" />
											
											<?php endforeach; ?>											
									<?php endforeach; ?>
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