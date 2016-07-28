<?php
    use frontend\models\Theme;
    use frontend\widgets\Alert;
    use frontend\models\Header;
    use frontend\models\Footer;
    use frontend\models\Image;
    use frontend\models\NavBarForm;
    use frontend\models\Color;
    use frontend\models\Logo;
    use frontend\models\MainCategory;
    use frontend\models\SubCategory;
    use frontend\models\DetailCategory;
    use yii\helpers\Html;
    use frontend\models\Product;
    use yii\bootstrap\ActiveForm;
    
    include "inc/format_rupiah.php";
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
                        <?php 
                            foreach($slider as $sliders):
                            ?>
                        <div class="item" style="background:url(img/slider/<?= $sliders->slider_img; ?>) repeat;border-radius:5px;">
                            <div style="position:relative">
                                <img src="img/slider/<?= $sliders->slider_img; ?>" alt="" />
                                <div class="content type1" style="position:absolute;top:30%;left:10%;text-align:right">
                                    <h2 style="font-weight:600;line-height:1;color:#08c"><?= $sliders->tag; ?></b></h2>
                                    <p style="color:#777;font-weight:300;line-height:1;margin-bottom:15px"><?= $sliders->tag_highligt; ?></span></p>
                                    <?php 
                                        if($sliders->tag_highligt != '' || $sliders->tag != ''){
                                        ?>
                                    <a href="category-<?= strtolower(str_replace(' ','_',$sliders->mainCategory->main_category_name)); ?>"style="font-weight:300;" class="btn btn-primary">Shop now &raquo;</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                    <?php foreach($sale as $sales): ?>
                    <div class="item"><img src="img/sale/<?= $sales->sale_slider; ?>" alt="<?= $sales->tag; ?>" /></div>
                    <?php endforeach; ?>
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
                        <?php foreach($banner as $banners): ?>
                        <div class="col-sm-4" style="padding-left:10px;padding-right:10px;">
                            <a class="image-link border-radius" href="#"><img src="img/banner/<?= $banners->banner?>" alt="<?= $banners->tag?>"></a>
                        </div>
                        <?php endforeach; ?>								
                    </div>
                </div>
                <h2 class="filter-title" style="margin-top: 20px;">
                    <span class="content">
                    <strong>New Arrivals Product</strong>
                    </span>
                </h2>
                <div id="featured_fashion_product" class="owl-top-narrow">
                    <div class="filter-products">
                        <div class="products owl-carousel">
                            <?php
                                foreach($product as $products):
                                ?>
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="<?= strtolower(str_replace(' ','_',$products->sku)); ?>-<?= strtolower(str_replace(' ','_',$products->title)); ?>" title="<?= $products->title; ?>" class="product-image">												
                                        <?php
                                            $imgProduc = Image::find()
                                            	->where(['product_id'=>$products->idproduk])
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
                                        <img class="<?= $class; ?>" src="img/cart/300x/<?= $imgProducts->image_name ?>" alt="<?= $products->title ?>"/>
                                        <?php endforeach; ?>													
                                        </a>
                                        <div class="product-label" style="right: 10px;">
                                            <?php
                                                if($products->discount > 0){
                                                ?>
                                            <span class="sale-product-icon"><?= $products->discount; ?>%</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name">												
                                            <a href="<?= strtolower(str_replace(' ','_',$products->sku)); ?>-<?= strtolower(str_replace(' ','_',$products->title)); ?>" title="<?= $products->title; ?>"><?= $products->title; ?></a>
                                        </h2>
                                        <div class="price-box">
                                            <?php
                                                if($products->discount > 0){
                                                ?>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price:</span>
                                                <span class="price" id="old-price-53">
                                                Rp <?= format_rupiah($products->price) ?>                
                                                </span>
                                            </p>
                                            <?php } ?>
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price" id="product-price-53">
                                                Rp <?= format_rupiah($products->final_price) ?>                
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
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(function($){
                    	$("#featured_fashion_product .filter-products .owl-carousel").owlCarousel({lazyLoad: true,    itemsCustom: [ [0, 1], [320, 1], [480, 2], [768, 3], [992, 3], [1200, 4] ],    responsiveRefreshRate: 50,    slideSpeed: 200,    paginationSpeed: 500,    scrollPerPage: false,    stopOnHover: true,    rewindNav: true,    rewindSpeed: 600,    pagination: false,    navigation: true,    autoPlay: true,    navigationText:["<i class='icon-left-open'></i>","<i class='icon-right-open'></i>"]});
                    });
                                     
                </script>
                <hr style="background-image: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.2), transparent);border: 0;height: 1px;margin: 10px 0 0;"/>
                <?php
                    $counts = Product::find()
                    		->where(['<>','discount',0])
                    		->count();
                    if($counts > 0){
                    ?>
                <div class="row">
                    <h2 class="filter-title" style="background-image:none;margin-top:20px;margin-bottom:5px;">
                        <span class="content">
                        <strong>PRODUCT SALE </strong>
                        </span>
                    </h2>
                    <?php
                        $model = Product::find()
                        		->joinWith(['mainCategory'])
                        		->joinWith(['subCategory'])
                        		->joinWith(['detailCategory'])
                        		->orderBy(['idproduk'=>SORT_DESC])
                        		->where(['<>','discount',0])
                        		->Limit(5)
                        		->all();
                        		
                        foreach($model as $models):
                        ?>
                    <div class="col-sm-4">
                        <div class="filter-products">
                            <div class="products small-list">
                                <div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area">
                                            <a href="<?= strtolower(str_replace(' ','_',$products->sku)); ?>-<?= strtolower(str_replace(' ','_',$products->title)); ?>" title="<?= $products->title; ?>" class="product-image">	
                                            <?php
                                                $imgs = Image::find()
                                                	->where(['product_id'=>$products->idproduk])
                                                	->where(['is_cover'=>1])
                                                	->One();
                                                
                                                ?>
                                            <img src="img/cart/300x/<?= $imgs->image_name ?>" alt="<?= $models->title ?>"/>
                                            </a>
                                        </div>
                                        <div class="details-area">
                                            <h2 class="product-name">
												<a href="<?= strtolower(str_replace(' ','_',$models->sku)); ?>-<?= strtolower(str_replace(' ','_',$models->title)); ?>" title="<?= $models->title; ?>"><?= $models->title; ?></a>                                                
                                            </h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:0"></div>
                                                </div>
                                            </div>
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
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>														
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>