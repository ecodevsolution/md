<?php
	use yii\web\View;
	use yii\helpers\Html;
?>   
<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
    <ul class="side-menu-list">	        
        <li class="blue-dirty with-sub ">
           <a href="<?= Yii::$app->homeUrl; ?>">
                <i class="font-icon font-icon-dashboard"></i>
                <span class="lbl">Dashboard</span>
            </a>            
        </li>
		
        <li class="red with-sub">
            <span>
                <i class="glyphicon glyphicon-list"></i>
                <span class="lbl">Catalog</span>
            </span>
            <ul>
                <li><a href="?r=product/index"><span class="lbl">Add Product</span></a></li>
				<li><a href="?r=brand/index"><span class="lbl">Brand</span></a></li>                    
                <li><a href="?r=main-category/index"><span class="lbl">Category Product</span></a></li>
            </ul>
        </li>
		
		<li class="brown with-sub">
            <span>
                <i class="glyphicon glyphicon-cog"></i>
                <span class="lbl">Settings</span>
            </span>
            <ul>               
				<li><a href="?r=slider/index"><span class="lbl">Slider</span></a></li>
				<li><a href="?r=banner-ads/index"><span class="lbl">Ads Banner</span></a></li>
				<li><a href="?r=banner-sale/index"><span class="lbl">Sale Banner</span></a></li>
            </ul>
        </li>
		
		<li class="blue with-sub">
            <span>
                <i class="glyphicon glyphicon-home"></i>
                <span class="lbl">Store Setup</span>
            </span>
            <ul>               							
				<li><a href="?r=seo/seo&id=1"><span class="lbl">SEO</span></a></li>	
				<li><a href="?r=store/index"><span class="lbl">Information Store</span></a></li>	
            </ul>
        </li>
		
		<li class="gold with-sub">
            <span>
                <i class="glyphicon glyphicon-wrench"></i>
                <span class="lbl">User Setup</span>
            </span>
            <ul>               
				<li><a href="?r=role/index"><span class="lbl">Role</span></a></li>
				<li><a href="?r=privillage-user/index"><span class="lbl">Privillage User</span></a></li>
				<li><a href="?r=user-form/index"><span class="lbl">User</span></a></li>
            </ul>
        </li>
		
		<li class="green with-sub ">
           <a href="?r=customer/index">
                <i class="glyphicon glyphicon-user"></i>
                <span class="lbl">Customer</span>
            </a>            
        </li>
		
		<li class="purple with-sub">
            <span>
                <i class="font-icon font-icon-cart"></i>
                <span class="lbl">Orders</span>
            </span>
            <ul>
                <li><a href="?r=order/index"><span class="lbl">Orders</span></a></li>
				<li><a href="?r=order-history/index"><span class="lbl">Orders History</span></a></li>
            </ul>
        </li>
    </ul>
</nav><!--.side-menu-->