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
			$name = "p";
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
				$link = str_replace(' ','_',strtolower($title2));
				$name = "q";
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
				$link = str_replace(' ','_',strtolower($title3));
				$name = "r";
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
	
		// MAIN---------------------------------//
		if(isset($_GET['brand']) && isset($_GET['filter'])){
				$title2 = str_replace('_',' ',$_GET['filter']);
				$filter=MainCategory::find()
					->where (["main_category_name"=>ucwords($title2)])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['idmain'=>$filter->idmain])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = strtolower(str_replace(' ','_',$_GET['filter']));
				$name = "p";
				$varbrand = "brand";
				
				$b = $_GET['brand'];
			}
			
		// SUB---------------------------------//	
		if(isset($_GET['brands']) && isset($_GET['filter'])){
				$title2 = str_replace('_',' ',$_GET['filter']);
				$filter=SubCategory::find()
					->where (["sub_category_name"=>ucwords($title2)])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['idsub'=>$filter->idsubcategory])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = strtolower(str_replace(' ','_',$_GET['filter']));
				$name = "q";
				$varbrand = "brands";
				
				$b = $_GET['brands'];
			}
			
		// DETAIL---------------------------------//
		if(isset($_GET['brandd']) && isset($_GET['filter'])){
				$title2 = str_replace('_',' ',$_GET['filter']);
				$filter=DetailCategory::find()
					->where (["detail_name"=>ucwords($title2)])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['iddetail'=>$filter->iddetail])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = strtolower(str_replace(' ','_',$_GET['filter']));
				$name = "r";
				$varbrand = "brandd";
				
				$b = $_GET['brandd'];
			}
		
		
		
		
		// MAIN---------------------------------//
		if(isset($_GET['pr_min']) && isset($_GET['pr_max']) && isset($_GET['p'])){
				$title2 = str_replace('_',' ',$_GET['p']);
				$filter=MainCategory::find()
					->where (["main_category_name"=>ucwords($title2)])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['idmain'=>$filter->idmain])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = strtolower(str_replace(' ','_',$_GET['p']));
				$name = "p";
				$varbrand = "brand";				
				$b = $_GET['b'];
			}
			
		// SUB---------------------------------//	
		if(isset($_GET['pr_min']) && isset($_GET['pr_max']) && isset($_GET['q'])){
				$title2 = str_replace('_',' ',$_GET['q']);
				$filter=SubCategory::find()
					->where (["sub_category_name"=>ucwords($title2)])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['idsub'=>$filter->idsubcategory])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = strtolower(str_replace(' ','_',$_GET['q']));
				$name = "q";
				$varbrand = "brands";				
				$b = $_GET['b'];
			}
			
		// DETAIL---------------------------------//
		if(isset($_GET['pr_min']) && isset($_GET['pr_max']) && isset($_GET['r'])){
				$title2 = str_replace('_',' ',$_GET['r']);
				$filter=DetailCategory::find()
					->where (["detail_name"=>ucwords($title2)])
					->One();
					
				
				$brand = Product::find()
					->joinWith(['brand'])	
					->where(['iddetail'=>$filter->iddetail])
					->groupBy(['idbrand', 'idbrand'])
					->all();
				$link = strtolower(str_replace(' ','_',$_GET['r']));
				$name = "r";
				$varbrand = "brandd";				
				$b = $_GET['b'];
			}
			
	?>

    <div class="block block-layered-nav">
        <div class="block-content">
            <dl id="narrow-by-list">
                <dt class="odd">Price</dt>
                <dd class="odd">
					<?php
						$this->registerCss("							
							@media (min-width:320px) and (max-width: 1023px) { 
								.form-small{
									width: 100%;
									border-radius: 4px;
									background-color: #fff;
									background-image: none;
									border: 1px solid #ccc;
									height: 34px;
									margin-left: 15px;
									font-size: 10px;
									text-align: center;
								}
								
								.blok{							
									position: absolute;
									left: 19px;
									margin: 0;
									padding: 7px;
									border-radius: 3px;
									border-left: 1px solid;
									border-top: 1px solid;
									border-bottom: 1px solid;
									border-color: #ccc;
									margin-left: 12px;
								}
								
								.form-smalls{
									max-width: 100%;
									border-radius: 4px;
									background-color: #fff;
									background-image: none;
									border: 1px solid #ccc;
									height: 34px;
									margin-left: 15px;
									font-size: 10px;
									text-align: center;
								}
								
								.alert-gray {
									background-color: #f0f0f0;
									border-color: #eee;
								}
								
								.bloks{							
									position: absolute;
									margin: 0;
									padding: 7px;
									border-radius: 3px;
									border-left: 1px solid;
									border-top: 1px solid;
									border-bottom: 1px solid;
									border-color: #ccc;
									display: block;
								}						
								
							}
							@media (min-width:1024px) { 
								.form-small{
									width: 35%;
									border-radius: 4px;
									background-color: #fff;
									background-image: none;
									border: 1px solid #ccc;
									height: 34px;
									margin-left: 15px;
									font-size: 10px;
									text-align: center;
								}
								
								.blok{							
									position: absolute;
									left: 19px;
									margin: 0;
									padding: 7px;
									border-radius: 3px;
									border-left: 1px solid;
									border-top: 1px solid;
									border-bottom: 1px solid;
									border-color: #ccc;
									margin-left: 12px;
								}
								
								.form-smalls{
									max-width: 39%;
									border-radius: 4px;
									background-color: #fff;
									background-image: none;
									border: 1px solid #ccc;
									height: 34px;
									margin-left: 15px;
									font-size: 10px;
									text-align: center;
								}
								
								.alert-gray {
									background-color: #f0f0f0;
									border-color: #eee;
								}
								
								.bloks{							
									position: absolute;
									margin: 0;
									padding: 7px;
									border-radius: 3px;
									border-left: 1px solid;
									border-top: 1px solid;
									border-bottom: 1px solid;
									border-color: #ccc;
								}
							}
							
							
						");
					?>
                    <div class="price price-filter-slider">
						<form action="price" method="GET">
						<span class="price-range ml-10">
							<label class="muted alert-gray blok" for="">Rp</label>
							<input type="text" name="pr_min" class="form-small" value="" id="pr-min" title="Minimum Price" placeholder="Min" />
							<input type="hidden" value="<?= $link; ?>" name="<?= $name ?>" >
							<input type="hidden" value="<?php if(isset($b)){ echo"$b"; }; ?>" name="b" >
						</span>
						<label for="" class=" connector ml-5 mr-5">To</label>
						<span class="price-range ml-10">
							<label class="muted alert-gray bloks" for="">Rp</label>
							<input type="text" name="pr_max" class="form-small" value="" id="pr-max" title="Maximum Price" placeholder="Max" />
						</span>
						<input type="submit" class="btn btn-primary" style="float:right;margin-top:10px;"value="Filter">
                        <div class="clearer"></div>
                    </div>
                    <style type="text/css">.ui-slider .ui-slider-handle{background:#0088cc;width:13px; height:18px; border: 0; margin-top: -1px; cursor: pointer; border-radius: 5px; }.ui-slider{background:#eeeeee; width:px; height:7px; border:none; border-radius: 0; -moz-border-radius: 0; -webkit-border-radius: 0; cursor: pointer; margin: 5px 5px 20px 8px; }.ui-slider .ui-slider-range{background:#1ab2ff;border:none; cursor: pointer; box-shadow: inset 0px 1px 2px 0px rgba(0,0,0,.38); }#amount{}</style>
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
	<?php
		$countPromo = Product::find()
			->joinWith(['image'])
			->where(['status'=>2])
			->count();
		if($countPromo > 0){
	?>
    <h2 class="sidebar-title" style="margin-bottom:10px">PROMO</h2>
    <div class="sidebar-filterproducts custom-block">
        <div class="filter-products owl-top-narrow">
            <div class="products small-list sidebar-list owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="owl-wrapper" style="width: 1064px; left: 0px; display: block;">
                        <div class="owl-item" style="width: 266px;">
                            <div class="item">
							
								<?php
									$modelPromo = Product::find()
												->joinWith(['image'])
												->where(['status'=>2])
												->All();
									foreach($modelPromo as $modelsPromo):
								?>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="detail-<?= $modelsPromo->idproduk; ?>-<?= $modelsPromo->title; ?>" title="<?= $modelsPromo->title; ?>" class="product-image">
                                        <img src="img/cart/<?= $modelsPromo->image->image_name; ?>" alt="<?= $modelsPromo->image->title; ?>">
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="detail-<?= $modelsPromo->idproduk; ?>-<?= $modelsPromo->title; ?>" title="<?= $modelsPromo->title; ?>"><?= $modelsPromo->title; ?></a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:0"></div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-115">
												<span class="price">Rp <?= $modelsPromo->final_price; ?></span>
											</span>
                                        </div>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
								<?php endforeach; ?>
								
                            </div>
                        </div>
                    </div>
                </div>
	
            </div>
        </div>
    </div>
	<?php } ?>
</div>
