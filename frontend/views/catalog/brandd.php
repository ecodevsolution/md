<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;
use frontend\models\Theme;
use frontend\widgets\Alert;
use frontend\models\Header;
use frontend\models\Footer;
use frontend\models\NavBarForm;
use frontend\models\Color;
use frontend\models\Logo;
use frontend\models\MainCategory;
use frontend\models\SubCategory;
use frontend\models\DetailCategory;
/* @var $this yii\web\View */

$this->title = 'Product';
?>
	<div class="main-container col2-left-layout">
        <div class="main container">
            <div class="row">
				<div class="col-main col-sm-9 f-right">
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
							<?= ListView::widget([
								'dataProvider' => $productsDataProvider,
								'itemView' => '_product',
								'emptyText' => '<div class="category-products"><p class="note-msg">There are no products matching the selection.</div>'
							]) ?>
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
				</div>
				
				<div class="row" style="margin:0 -10px;">
					<?php 
						include "left_brandd.php";
					?>
				</div>
			</div>
		</div>
	</div>