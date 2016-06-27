<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
use common\models\Image;
use frontend\models\MainCategory;
use yii\widgets\ListView;
$this->registerCss("
	.summary{
		display:none;
	}
");
?>

<li class="item">
    <div class="item-area">
        <div class="product-image-area">
            <div class="loader-container">
                <div class="loader">
                    <i class="ajax-loader medium animate-spin"></i>
                </div>
            </div>
			<?php
				$images = $model->images;
				
			?>            
            <a href="detail-<?= $model->id ?>-<?= $model->title ?>" title="<?= $model->title; ?>" class="product-image">
			<?php
				if (isset($images[0])) {
					echo Html::img($images[0]->getUrl(), ['style' => 'width:195px;height:235px','class'=>'defaultImage','alt'=>$model->title,'id'=>'product-collection-image-2']);
				}else if(isset($images[1])) {
					echo Html::img($images[1]->getUrl(), ['style' => 'width:195px;height:235px','class'=>'defaultImage','alt'=>$model->title,'id'=>'product-collection-image-2']);
				}
			?>            
            </a>
            <div class="product-label" style="right: 10px;"><span class="sale-product-icon">-10%</span></div>
            <div class="product-label" style="right: 10px; top: 40px;"><span class="new-product-icon">New</span></div>
        </div>
        <div class="details-area">
            <h2 class="product-name"><?= Html::a($model->title, ['site/product', 'title'=>$model->title ,'id' => $model->id])?>	</h2>
            <div class="ratings">
                <div class="rating-box">
                    <div class="rating" style="width:0"></div>
                </div>
            </div>
            <div class="price-box">
                <p class="old-price">
                    <span class="price-label">Regular Price:</span>
                    <span class="price" id="old-price-2">
                    $99.00                </span>
                </p>
                <p class="special-price">
                    <span class="price-label">Special Price</span>
                    <span class="price" id="product-price-2">
                    $89.00                </span>
                </p>
            </div>
            <div class="actions">
                <a href="javascript:void(0)" onclick="ajaxWishlist(this,'http://newsmartwave.net/magento/porto/index.php/demo6_en/wishlist/index/add/product/2/form_key/53ISVdPWjkpKUoCJ/','2');" class="addtowishlist" title="Add to Wishlist"><i class="icon-wishlist"></i></a>
                <a href="javascript:void(0)" class="addtocart" title="Add to Cart" onclick="setLocationAjax(this,'http://newsmartwave.net/magento/porto/index.php/demo6_en/checkout/cart/add/uenc/aHR0cDovL25ld3NtYXJ0d2F2ZS5uZXQvbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzZfZW4vZmFzaGlvbi5odG1s/product/2/form_key/53ISVdPWjkpKUoCJ/','2')"><i class="icon-cart"></i><span>&nbsp;Add to Cart</span></a>
                <a href="javascript:void(0)" onclick="ajaxCompare(this,'http://newsmartwave.net/magento/porto/index.php/demo6_en/catalog/product_compare/add/product/2/uenc/aHR0cDovL25ld3NtYXJ0d2F2ZS5uZXQvbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzZfZW4vZmFzaGlvbi5odG1s/form_key/53ISVdPWjkpKUoCJ/','2');" class="comparelink" title="Add to Compare"><i class="icon-compare"></i></a>
                <div class="clearer"></div>
            </div>
        </div>
    </div>
</li>

<li class="item">
	<div class="item-area">
        <div class="product-image-area">
			<div class="loader-container">
				<div class="loader">
					<i class="ajax-loader medium animate-spin"></i>
				</div>
			</div>
           
			<a href="detail-<?= strtolower($model->title); ?>" title="Ludlow Sheath Dress" class="product-image">
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
