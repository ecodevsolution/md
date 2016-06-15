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
					<?= ListView::widget([
						'dataProvider' => $productsDataProvider,
						'itemView' => '_product',
					]) ?>
				</div>
				
				<div class="row" style="margin:0 -10px;">
					<?php 
						include "left_sub.php";
					?>
				</div>
			</div>
		</div>
	</div>