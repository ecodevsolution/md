<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
use common\models\Image;
use yii\widgets\ListView;
$this->registerCss("
	.summary{
		display:none;
	}
");
?>
<?php /** @var $model \common\models\Product */ ?>

	<div class="page-title category-title">
       <h1>Fashion</h1>
    </div>
                       
    <script type="text/javascript">
       jQuery(function($) {
        
         $("#owl_women_category").owlCarousel({
               lazyLoad: true,
               slideSpeed : 300,
               paginationSpeed : 400,
               responsiveRefreshRate: 50,
               slideSpeed: 200,
               paginationSpeed: 500,
               stopOnHover: true,
               rewindNav: true,
               rewindSpeed: 600,
               singleItem : true
         });
        
       });
    </script>    
	<script type="text/javascript">
       var dailydealTimeCountersCategory = new Array();
		var i = 0;
    </script>
    
	<div class="category-products">
        <div class="toolbar">
            <div class="sorter">
                <div class="sort-by">
					<label>Sort By:</label>
                    <select onchange="setLocation(this.value)">
						<option value="#" selected="selected">
							Position                
						</option>
						<option value="fashion79f7.html?dir=asc&amp;order=name">
							Name                
						</option>
						<option value="fashion6973.html?dir=asc&amp;order=price">
							Price                
						</option>
                    </select>
                </div>

            </div>
        </div>
        
		<ul class="products-grid  columns4" >
            <li class="item">
				<div class="item-area">
                    <div class="product-image-area">
						<div class="loader-container">
							<div class="loader">
								<i class="ajax-loader medium animate-spin"></i>
							</div>
						</div>
                       
						<a href="detil_fashion.html" title="Ludlow Sheath Dress" class="product-image">
							<?php
								$images = $model->images;
								if (isset($images[0])) {
									echo Html::img($images[0]->getUrl(), ['style' => 'width:195px']);
								}
							?>
							<!--<img class="defaultImage" src="img/test.png" alt="Ludlow Sheath Dress"/>
							<img class="hoverImage" src="img/test.png" alt="Ludlow Sheath Dress"/> -->
						</a>
						<?php
							if($model->condition == 1){
								$cond = "new";
							}else{
								$cond = "refurbish";
							}
						?>
						<div class="product-label" style="right: 10px;">
							<span class="sale-product-icon">-40%</span>
						</div>
                    </div>
					
                    <div class="details-area">
						<h2 class="product-name">
							<?= Html::a($model->title, ['site/product', 'title'=>$model->title ,'id' => $model->id])?>							
						</h2>   
						<div class="price-box">
							<p class="old-price">
								<span class="price-label">Regular Price:</span>
								<span class="price" id="old-price-53">
								IDR <?= $model->price ?>
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
							<?= Html::a('Add to cart', ['./cart-add-'.$model->id], ['class' => 'icon-cart addtocart'])?>																																	
							<div class="clearer"></div>
						</div>
                    </div>
				</div>
            </li>           
        </ul>
		
		<script type="text/javascript">decorateList('products-list', 'none-recursive')</script>
        <div class="toolbar-bottom">
			<div class="toolbar">
				<div class="sorter">
					<div class="sort-by">
						<label>Sort By:</label>
						<select onchange="setLocation(this.value)">
						
							<option value="#">Price</option>
						</select>
					</div>
					<!-- BEGIN PAGE -->
					<div class="pager">
						<p class="amount">
							Items 1 to 10 of 117 total                            
						</p>
						<div class="pages">
						
						</div>
					</div>
					<!-- END PAGE -->									
				</div>
			</div>
        </div>
    </div>