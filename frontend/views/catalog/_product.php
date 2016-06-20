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
