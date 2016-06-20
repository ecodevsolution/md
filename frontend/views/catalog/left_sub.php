<?php
	use frontend\models\MainCategory;
	use frontend\models\SubCategory;
	use frontend\models\DetailCategory;
	use frontend\models\Product;
	
	if(isset($_GET['route']) && !isset($_GET['routes']) && !isset($_GET['router'])){
		$title = str_replace('_',' ',ucwords($_GET['route']));
		$this->title =  ucwords($title);
		$this->params['breadcrumbs'][] =$title;
		$varbrand = "brand";

	}
	if(isset($_GET['route']) && isset($_GET['routes']) && !isset($_GET['router'])){
		$title1 = str_replace('_',' ',ucwords($_GET['route']));
		$title2 = str_replace('_',' ',ucwords($_GET['routes']));
		$this->params['breadcrumbs'][] = ['label' => $title1, 'url' => ['./category-'.$_GET['route']]];
		$this->params['breadcrumbs'][] = ucwords($title2);
		$varbrand = "brands";
	}
	if(isset($_GET['route']) && isset($_GET['routes']) && isset($_GET['router'])){
		$title1 = str_replace('_',' ',ucwords($_GET['route']));
		$title2 = str_replace('_',' ',ucwords($_GET['routes']));
		$title3 = str_replace('_',' ',ucwords($_GET['router']));
		$this->params['breadcrumbs'][] = ['label' => $title1, 'url' => ['./category-'.$_GET['route']]];
		$this->params['breadcrumbs'][] = ['label' => $title2, 'url' => ['./product-'.$_GET['route'].'-'.$_GET['routes']]];
		$this->params['breadcrumbs'][] = ucwords($title3);
		$varbrand = "brandd";
	}
	
			


?>

<div class="col-left sidebar f-left col-sm-3">

	<?php
		if(isset($_GET['route'])){
			$title = str_replace('_',' ',$_GET['route']);
			$modelmain=MainCategory::find()
				->where (["main_category_name"=>$title])
				->One();
			$brand = Product::find()
				->joinWith(['brand'])
				->where(['idmain'=>$modelmain->idmain])
				->groupBy(['idbrand', 'idbrand'])
				->all();
			$link = str_replace(' ','_',$title);
		}
		if(isset($_GET['routes']) || isset($_GET['router'])){
			$modelsubs=SubCategory::find()
				->where (["sub_category_name"=>$title2])
				->One();
					
			if(isset($_GET['route']) && isset($_GET['routes']) && !isset($_GET['router'])){				
				$brand = Product::find()
					->joinWith(['brand'])
					->where(['idsub'=>$modelsubs->idsubcategory])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = str_replace(' ','_','1-'.$title2);
			}
			
			if(isset($_GET['route']) && isset($_GET['routes']) && isset($_GET['router'])){
				$modeldetail=DetailCategory::find()
					->where (["detail_name"=>$title3])
					->One();
					
				$brand = Product::find()
					->joinWith(['brand'])
					->where(['iddetail'=>$modeldetail->iddetail])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = str_replace(' ','_','1-'.$title3);
			}
					
	
		$detailCount=DetailCategory::find()
			->where (["idsubcategory"=>$modelsubs->idsubcategory])
			->count();
		if($detailCount > 0){
	?>
	<div class="block block-category-nav">
		<div class="block-title">
			<strong><span><?= strtoupper($title2); ?></span></strong>
		</div>
		<div class="block-content" style="display: block;">
			<ul class="category-list">
				<?php 
					$modeldets=DetailCategory::find()
						->where (["idsubcategory"=>$modelsubs->idsubcategory])
						->all();
					foreach ($modeldets as $modeldet): 
				?>
					<li class="menu-item ">
						<a class="level2" href="product_detail-<?= strtolower(str_replace(' ','_',$_GET['route'])); ?>-<?= strtolower(str_replace(' ','_',$modelsubs->sub_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modeldet->detail_name)); ?>">
						<span><?= $modeldet->detail_name ?></span>
						</a>
					</li>
				<?php
					endforeach;
				?>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(function($){
				$(".block.block-category-nav .block-title").click(function(){
					if($(this).hasClass("closed")){
						$(".block.block-category-nav .block-content").slideDown();
						$(this).removeClass("closed");
					} else {
						$(".block.block-category-nav .block-content").slideUp();
						$(this).addClass("closed");
					}
				});
				$(".block.block-category-nav .category-list a.plus").click(function(){
					if($(this).parent().hasClass("opened")){
						$(this).parent().children("ul").slideUp();
						$(this).parent().removeClass("opened");
						$(this).children("i.icon-minus-squared").removeClass("icon-minus-squared").addClass("icon-plus-squared");
					} else {
						$(this).parent().children("ul").slideDown();
						$(this).parent().addClass("opened");
						$(this).children("i.icon-plus-squared").removeClass("icon-plus-squared").addClass("icon-minus-squared");
					}
				});
			});
		</script>

	</div>
	<?php }}
		$title2 = str_replace('_',' ',isset($_GET['filter']));
		if(isset($_GET['brand']) && isset($_GET['filter'])){
				$filter=MainCategory::find()
					->where (["main_category_name"=>ucwords($_GET['filter'])])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['idmain'=>$filter->idmain])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = str_replace(' ','_',$_GET['filter']);
				$varbrand = "brand";
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
								<a style="margin-left:5px;" href="<?= $varbrand; ?>-<?= strtolower($brands->brand->brand_name); ?>-<?= $link;  ?>"><?= $brands->brand->brand_name; ?></a>
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
                    </ol>
                </dd>
            </dl>
          
        </div>
    </div>
	
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
	
    <h2 class="sidebar-title" style="margin-bottom:10px">PROMO</h2>
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
												<span class="price">€71.44</span>
											</span>
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
