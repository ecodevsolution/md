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
			<a href="catalog-<?= strtolower(str_replace(' ','_',$model->sku)); ?>-<?= strtolower(str_replace(' ','_',$model->title)); ?>" title="<?= $model->title; ?>" class="product-image">	
			<?php
				$images = $model->images;
				if (isset($images[0])) {
					echo Html::img($images[0]->getUrl());
				}
			?>			
			</a>
			<div class="product-label" style="right: 10px;">
				<?php
					if($model->discount > 0){
					?>
				<span class="sale-product-icon"><?= $model->discount; ?>%</span>
				<?php }?>
			</div>
		</div>
		<div class="details-area">
			<h2 class="product-name">
				<a href="catalog-<?= strtolower(str_replace(' ','_',$model->sku)); ?>-<?= strtolower(str_replace(' ','_',$model->title)); ?>" title="<?= $model->title; ?>"><?= $model->title; ?></a>                                                
			</h2>
			<div class="ratings">
				<div class="rating-box">
					<div class="rating" style="width:0"></div>
				</div>
			</div>
			<div class="price-box">
				<?php
					if($model->discount > 0){
					?>
				<p class="old-price">
					<span class="price-label">Regular Price:</span>
					<span class="price" id="old-price-53">
					Rp <?= number_format($model->price,0,".","."); ?>                
					</span>
				</p>
				<?php } ?>
				<p class="special-price">
					<span class="price-label">Special Price</span>
					<span class="price" id="product-price-53">
					Rp <?= number_format($model->final_price,0,".","."); ?>                
					</span>
				</p>
			</div>
			<div class="clearer"></div>
		</div>
	</div>
</li>
