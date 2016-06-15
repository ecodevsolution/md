<?php

use yii\web\View;
use yii\helpers\Html;
?>           
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= Yii::$app->homeUrl; ?>" class="site_title"><i class="fa fa-shopping-cart"></i> <span>Panel Admin</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= Yii::$app->user->identity->username; ?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= Yii::$app->homeUrl; ?>"><i class="fa fa-home"></i> Home </a>
                    </li>
					<li><a href="#"><i class="fa fa-star-o"></i> Go to your Website </a></li>
                    <li><a><i class="fa fa-file-text-o"></i> Catalog <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><?= Html::a('Product', ['/product/index']) ?></li>
							<li><?= Html::a('Brand', ['/brand/index']) ?> </li>
                            <li><a><i class="fa fa-file-text-o"></i> Categories <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="form.html">Reference</a></li>
									<li><?= Html::a('Categories', ['/main-category/index']) ?></li>
								</ul>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shopping-cart"></i> Orders <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><?= Html::a('Orders', ['/order/index']) ?></li>
                            <li><a href="?r=order/index">Invoice</a>
                            </li>
                            <li><a href="typography.html">Product Returns</a>
                            </li>
                            <li><a href="icons.html">Status</a>
                            </li>
                            <li><a href="glyphicons.html">Confirmation Orders</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-group"></i> Customers <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
							<li><?= Html::a('Customers', ['/customer/index']) ?></li>
                        </ul>
                    </li>
					<li><a><i class="fa fa-truck"></i> Shipping <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><?= Html::a('Courrier', ['/courrier/index']) ?></li>                                
                        </ul>
                    </li>
					<li><a><i class="fa fa-paint-brush"></i> Preference <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="chartjs.html">Theme Settings</a></li>
							<li><a href="?r=theme/form">Form Element</a></li>
							<li><?= Html::a('Info Box', ['/info-box/index']) ?></li>
							<li><?= Html::a('Banner Sale', ['/banner-sale/index']) ?></li>
							<li><?= Html::a('Banner Ads Left', ['/banner-ads/index']) ?></li>    
							<li><?= Html::a('Banner Ads Right', ['/banner-right/index']) ?></li>    										
							<li><?= Html::a('Banner Bottom', ['/banner-bottom/index']) ?></li>  
							<li><?= Html::a('About us', ['/aboutus/index']) ?></li> 
							<li><?= Html::a('Sliders ', ['/slider/index']) ?></li> 
							<li><a href="?r=logo/index">Logo</a> </li>
							<li><a href="chartjs.html">Header</a></li>
							<li><a href="chartjs.html">Footer</a></li>
							<li><a href="chartjs.html">Navigation</a></li>
							<li><a href="chartjs.html">Update</a></li>                                      
                        </ul>
                    </li>
                </ul>
            </div>
		</div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>