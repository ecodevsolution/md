<?php
	use frontend\models\Product;
	
	$this->title = 'My Account';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<div class="body-content outer-top-bd">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

					<div class="side-menu animate-dropdown outer-bottom-xs">
						<div class="head"><i class="icon fa fa-align-justify fa-fw"></i>My Account</div>        
							<nav class="yamm megamenu-horizontal" role="navigation">
								<ul class="nav-side">
									<li class="dropdown menu-item">
										<a href="?r=site/myaccount" ><i class="icon fa fa-dashboard fa-fw"></i>Account Panel </a>
									</li><!-- /.menu-item -->
									<li class="dropdown menu-item">
										<a href="?r=site/editaccount" ><i class="icon fa fa-user fa-fw"></i>Account Information</a>
									</li><!-- /.menu-item -->
									<li class="dropdown menu-item">
										<a href="?r=site/myaddress" ><i class="icon fa fa-map-marker fa-fw"></i>Address </a>
									</li><!-- /.menu-item -->
									<li class="dropdown menu-item">
										<a href="?r=site/myorder" ><i class="icon fa fa-inbox fa-fw"></i>My Order </a>
									</li><!-- /.menu-item -->
									<li class="dropdown menu-item">
										<a href="?r=site/returnorder" ><i class="icon fa fa-retweet fa-fw"></i>Return Order  </a>
									</li><!-- /.menu-item -->
				
								</ul><!-- /.nav --> 
							</nav><!-- /.megamenu-horizontal -->
						</div><!-- /.side-menu -->
						<!-- ================================== TOP NAVIGATION ================================== -->	
					</div>

					<div class="col-xs-12 col-sm-12 col-md-9">
						<h4 class="section-title">account panel</h4>
						<div class="description m-t-20">
							<p class="bold">Welcome, <?= Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname?></p>							
						</div>
						
						<div class="row m-t-20">
							<div class="col-md-6 col-sm-12 col-sm-12">
								<div class="contact-information">
									<div class="table-bordered">
										<div class="head">
											<h5>CONTACT INFROMATION</h5>
										</div>
										<div class="description">
											<p><?= Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname?></p>
											<p><?= Yii::$app->user->identity->email; ?><span></p>
										</div>
									</div>
								</div>
								<p class="text-right"><a href="my-account-edit.html" >Change Profile &raquo;</a></p>
							</div>
						
							<div class="col-md-6 col-sm-12 col-sm-12">
								
							</div>
						</div>
				

				<h4 class="section-title m-t-20">Address Book</h4>
				<div class="row m-t-20">
					<div class="col-md-6 col-sm-12 col-sm-12">
						<div class="payment-address">
							<div class="table-bordered">
								<div class="head">
									<h5>Payment Address</h5>
								</div>
								<div class="description">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui aliquid, at eum provident quia nihil non est itaque dolores molestias.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-sm-12">
						<div class="shipping-address">
							<div class="table-bordered">
								<div class="head">
									<h5>Shipping Address</h5>
								</div>
								<div class="description">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui aliquid, at eum provident quia nihil non est itaque dolores molestias.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="text-right m-t-20"><a href="address-edit.html">Change Address</a></p>
		</div>
	</div>
	<div id="brands-carousel" class="logo-slider wow fadeInUp">
		<h3 class="section-title">Our Brands</h3>
		<div class="logo-slider-inner"> 
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
			<?php
				$brand = Product::find()
						->joinWith('brand')
						->select('brand.idbrand')
						->distinct()
						->all();
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
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->