<?php
	use frontend\models\MainCategory;
	use frontend\models\SubCategory;
	use frontend\models\DetailCategory;
	use frontend\models\Product;
	
	if(isset($_GET['brand']) && isset($_GET['filter'])){
		$title1 = str_replace('_',' ',$_GET['brand']);
		$title2 = str_replace('_',' ',$_GET['filter']);
		$this->params['breadcrumbs'][] = ['label' => $title1, 'url' => ['./category-'.$_GET['brand']]];
		$this->params['breadcrumbs'][] = $title2;		
	}

?>

<div class="col-left sidebar f-left col-sm-3">

	<?php

			if(isset($_GET['brand']) && isset($_GET['filter'])){
				$filter=MainCategory::find()
					->where (["main_category_name"=>$title2])
					->One();
					
					
				$brand = Product::find()
					->joinWith(['brand'])
					->where(['idmain'=>$filter->idmain])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = str_replace(' ','_',$title2);
			}			
	?>

    <div class="block block-layered-nav">
        <div class="block-content">
            <dl id="narrow-by-list">
                <dt class="odd">Price</dt>
                <dd class="odd">
                    <div class="price price-filter-slider">
                        <div>
                            <div class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
                            </div>
                            <div class="text-box">
                                <span>from</span> <input type="text" name="min" id="minPrice" class="priceTextBox minPrice" value="30" style="border:solid 1px #eee; color: #a3a2a2; padding: 2px 5px; font-size: 14px; margin: 0 2px; width: 50px;"> 
                                <span>to</span> <input type="text" name="max" id="maxPrice" class="priceTextBox maxPrice" value="230" style="border:solid 1px #eee; color: #a3a2a2; padding: 2px 5px; font-size: 14px; margin: 0 2px; width: 50px;">
                                <input type="button" value="FILTER" name="go" class="go" style="">
                                <input type="hidden" id="amount" class="price-amount" style="background:none; border:none;" value="$30 - $230">
                            </div>
                        </div>
                        <div class="clearer"></div>
                    </div>
                    <script type="text/javascript">
                        jQuery(function($) {
                        	var newMinPrice, newMaxPrice, url, temp;
                        	var categoryMinPrice = 30;
                        	var categoryMaxPrice = 230;
                                        
                        	function isNumber(n) {
                        	  return !isNaN(parseFloat(n)) && isFinite(n);
                        	}
                        	
                        	$(".priceTextBox").focus(function(){
                        		temp = $(this).val();	
                        	});
                        	
                        	$(".priceTextBox").keyup(function(){
                        		var value = $(this).val();
                        		if(value!="" && !isNumber(value)){
                        			$(this).val(temp);	
                        		}
                        	});
                        	
                        	$(".priceTextBox").keypress(function(e){
                        		if(e.keyCode == 13){
                        			var value = $(this).val();
                        			if(value < categoryMinPrice || value > categoryMaxPrice){
                        				$(this).val(temp);	
                        			}
                        			url = getUrl($(".minPrice").val(), $(".maxPrice").val());
                        			sliderAjax(url);	
                        		}	
                        	});
                        	
                        	$(".priceTextBox").blur(function(){
                        		var value = $(this).val();
                        		if(value < categoryMinPrice || value > categoryMaxPrice){
                        			$(this).val(temp);	
                        		}
                        		
                        	});
                        	
                        	$(".go").click(function(){
                        		url = getUrl($(".minPrice").val(), $(".maxPrice").val());
                        		sliderAjax(url);	
                        	});					
                        	$( ".slider-range" ).slider({
                        		range: true,
                        		min: categoryMinPrice,
                        		max: categoryMaxPrice,
                        		values: [ 30, 230 ],
                        		slide: function( event, ui ) {
                        			newMinPrice = ui.values[0];
                        			newMaxPrice = ui.values[1];
                        			
                        			$( ".price-amount" ).val( "$" + newMinPrice + " - $" + newMaxPrice );
                        			
                        			
                        			// Update TextBox Price
                        			$(".minPrice").val(newMinPrice); 
                        			$(".maxPrice").val(newMaxPrice);
                        			
                        		},stop: function( event, ui ) {
                        			
                        			// Current Min and Max Price
                        			var newMinPrice = ui.values[0];
                        			var newMaxPrice = ui.values[1];
                        			
                        			// Update Text Price
                        			$( ".price-amount" ).val( "$"+newMinPrice+" - $"+newMaxPrice );
                        			
                        			
                        			// Update TextBox Price
                        			$(".minPrice").val(newMinPrice); 
                        			$(".maxPrice").val(newMaxPrice);
                        			
                        			url = getUrl(newMinPrice,newMaxPrice);
                        			if(newMinPrice != 30 && newMaxPrice != 230){
                        				clearTimeout(timer);
                        				//window.location= url;
                        				
                        			}else{
                        					timer = setTimeout(function(){
                        						sliderAjax(url);
                        					}, 0);     
                        				}
                        		}
                        	});
                        	
                        	function getUrl(newMinPrice, newMaxPrice){
                        		return "http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html"+"?min="+newMinPrice+"&max="+newMaxPrice+"";
                        	}
                        });
                    </script>
                    <style type="text/css">.ui-slider .ui-slider-handle{background:#0088cc;width:13px; height:18px; border: 0; margin-top: -1px; cursor: pointer; border-radius: 5px; }.ui-slider{background:#eeeeee; width:px; height:7px; border:none; border-radius: 0; -moz-border-radius: 0; -webkit-border-radius: 0; cursor: pointer; margin: 5px 5px 20px 8px; }.ui-slider .ui-slider-range{background:#1ab2ff;border:none; cursor: pointer; box-shadow: inset 0px 1px 2px 0px rgba(0,0,0,.38); }#amount{}</style>
                </dd>
                <dt class="even">Size</dt>
                <dd class="even">
                    <ol class="configurable-swatch-list no-count">
                        <li>
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?size=8" class="swatch-link" style="line-height: 30px;">
                            <span class="swatch-label" style="height:28px; min-width:28px; line-height: 30px;">
                            S                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?size=7" class="swatch-link" style="line-height: 30px;">
                            <span class="swatch-label" style="height:28px; min-width:28px; line-height: 30px;">
                            M                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?size=6" class="swatch-link" style="line-height: 30px;">
                            <span class="swatch-label" style="height:28px; min-width:28px; line-height: 30px;">
                            L                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?size=5" class="swatch-link" style="line-height: 30px;">
                            <span class="swatch-label" style="height:28px; min-width:28px; line-height: 30px;">
                            XL                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?size=4" class="swatch-link" style="line-height: 30px;">
                            <span class="swatch-label" style="height:28px; min-width:28px; line-height: 30px;">
                            2XL                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?size=3" class="swatch-link" style="line-height: 30px;">
                            <span class="swatch-label" style="height:28px; min-width:28px; line-height: 30px;">
                            3XL                                    </span>
                            </a>
                        </li>
                    </ol>
                </dd>
                <dt class="odd">Brand</dt>
                <dd class="odd">
                    <ol>
						<li>
							<?php foreach($brand as $brands): ?>                       
								<a style="margin-left:5px;" href="brand-<?= strtolower($brands->brand->brand_name); ?>-<?= $link;  ?>"><?= $brands->brand->brand_name; ?></a>
							<?php endforeach; ?>
						</li>
                    </ol>
                </dd>
                <dt class="last even">Color</dt>
                <dd class="last even">
                    <ol class="configurable-swatch-list no-count">
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=27" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/black.png" alt="Black" title="Black" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=26" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/blue.png" alt="Blue" title="Blue" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=24" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/charcoal.png" alt="Charcoal" title="Charcoal" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=23" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/green.png" alt="Green" title="Green" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=22" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/grey.png" alt="Grey" title="Grey" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=21" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/indigo.png" alt="Indigo" title="Indigo" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=20" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/ivory.png" alt="Ivory" title="Ivory" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=19" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/khaki.png" alt="Khaki" title="Khaki" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=18" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/oatmeal.png" alt="Oatmeal" title="Oatmeal" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=17" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/orange.png" alt="Orange" title="Orange" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=16" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/pink.png" alt="Pink" title="Pink" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=15" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/purple.png" alt="Purple" title="Purple" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=14" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/red.png" alt="Red" title="Red" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=13" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/royal-blue.png" alt="Royal Blue" title="Royal Blue" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=12" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/silver.png" alt="Silver" title="Silver" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=11" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/taupe.png" alt="Taupe" title="Taupe" width="26" height="26">
                            </span>
                            </a>
                        </li>
                        <li style="line-height: 30px;">
                            <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/fashion/women/tops-blouses.html?color=10" class="swatch-link has-image">
                            <span class="swatch-label" style="height:28px; width:28px; line-height: 30px;">
                            <img src="http://newsmartwave.net/magento/porto/media/catalog/swatches/11/26x26/media/white.png" alt="White" title="White" width="26" height="26">
                            </span>
                            </a>
                        </li>
                    </ol>
                </dd>
            </dl>
            <script type="text/javascript">decorateDataList('narrow-by-list')</script>
            <script type="text/javascript">
                jQuery(function($){
                    $(".block-layered-nav dt").click(function(){
                        if($(this).next("dd").css("display") == "none"){
                            $(this).next("dd").slideDown(200);
                            $(this).removeClass("closed");
                        } else {
                            $(this).next("dd").slideUp(200);
                            $(this).addClass("closed");
                        }
                    });
                });
            </script>
        </div>
    </div>
    <h2 class="sidebar-title" style="margin-bottom:10px">Featured</h2>
    <div class="sidebar-filterproducts custom-block">
        <div class="filter-products owl-top-narrow">
            <div class="products small-list sidebar-list owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="owl-wrapper" style="width: 1064px; left: 0px; display: block;">
                        <div class="owl-item" style="width: 266px;">
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/diamond-rings-l.html" title="Diamond Rings-L" class="product-image">
                                        <img src="http://newsmartwave.net/magento/porto/media/catalog/product/cache/11/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/1/3/13_2_2.jpg" alt="Diamond Rings-L">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/diamond-rings-l.html" title="Diamond Rings-L">Diamond Rings-L</a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-115">
                                            <span class="price">€71.44</span>                                    </span>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/jewellery-bracelets-2xl.html" title="Jewellery Bracelets" class="product-image">
                                        <img src="http://newsmartwave.net/magento/porto/media/catalog/product/cache/11/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/4/_/4_1_2.jpg" alt="Jewellery Bracelets">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/jewellery-bracelets-2xl.html" title="Jewellery Bracelets">Jewellery Bracelets</a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-111">
                                            <span class="price">€151.71</span>                                    </span>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/jewellery-bracelets-xl.html" title="Jewellery Bracelets-M" class="product-image">
                                        <img src="http://newsmartwave.net/magento/porto/media/catalog/product/cache/11/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/5/_/5_1_1.jpg" alt="Jewellery Bracelets-M">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/jewellery-bracelets-xl.html" title="Jewellery Bracelets-M">Jewellery Bracelets-M</a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-110">
                                            <span class="price">€312.25</span>                                    </span>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 266px;">
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/diamond-rings-2xl.html" title="Diamond Rings-2XL" class="product-image">
                                        <img src="http://newsmartwave.net/magento/porto/media/catalog/product/cache/11/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/4/_/4_1_3.jpg" alt="Diamond Rings-2XL">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/diamond-rings-2xl.html" title="Diamond Rings-2XL">Diamond Rings-2XL</a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-117">
                                            <span class="price">€120.41</span>                                    </span>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/jewellery-earring-sk.html" title="Jewellery Earring SK" class="product-image">
                                        <img src="http://newsmartwave.net/magento/porto/media/catalog/product/cache/11/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/3/_/3_11.jpg" alt="Jewellery Earring SK">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/jewellery-earring-sk.html" title="Jewellery Earring SK">Jewellery Earring SK</a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <p class="old-price">
                                                <span class="price-label">Regular Price:</span>
                                                <span class="price" id="old-price-120">
                                                €144.49                </span>
                                            </p>
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price" id="product-price-120">
                                                €112.38                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/diamond-rings-xl.html" title="Diamond Rings-XL" class="product-image">
                                        <img src="http://newsmartwave.net/magento/porto/media/catalog/product/cache/11/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/4/_/4_1_4.jpg" alt="Diamond Rings-XL">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/diamond-rings-xl.html" title="Diamond Rings-XL">Diamond Rings-XL</a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-116">
                                            <span class="price">€87.49</span>                                    </span>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-controls clickable">
                    <div class="owl-buttons">
                        <div class="owl-prev"><i class="icon-left-open"></i></div>
                        <div class="owl-next"><i class="icon-right-open"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(function($){
             
                var sidebar_owl = $(".small-list.sidebar-list.owl-carousel");
                sidebar_owl.owlCarousel({
                    lazyLoad: true,
                    singleItem: true,
                    responsiveRefreshRate: 50,
                    slideSpeed: 200,
                    paginationSpeed: 500,
                    scrollPerPage: true,
                    stopOnHover: true,
                    rewindNav: true,
                    rewindSpeed: 600,
                    pagination: false,
                    navigation: true,
                                navigationText:["<i class='icon-left-open'></i>","<i class='icon-right-open'></i>"]
                            });
             
            });
        </script>
    </div>
</div>