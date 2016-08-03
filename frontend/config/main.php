<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'components' => [
		'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
			'rules'=>[
				//BASIC LINK
				'login' => 'site/login',
				'create-account' => 'site/signup',
				'about-us' => 'site/about-us',
				'contact-us' => 'site/contact-us',
				'order-tracking' => 'site/order-tracking',
				'not-found' => 'site/error',
				'logout' => 'site/logout',					
				
				//CATALOG AND PRODUCT LINK
				'category-<route>' => 'catalog/category',
				'product-<route>-<routes>' => 'catalog/sub-category',
				'product_detail-<route>-<routes>-<router>' => 'catalog/det-category',
				'brand-<brand>-<filter>' => 'catalog/brand',
				'brands-<brands>-<filter>' => 'catalog/brands',
				'brandd-<brandd>-<filter>' => 'catalog/brandd',
				'finish-order' => 'cart/finish-order',
				'price' => 'catalog/price',
				'catalog-<sku>-<name>' => 'product/detail-product',
				'address-check-<id>' => 'cart/address-check',

				//PRODUCT CART LINK
				'cart-add-<id>' => 'cart/add',	
				'cart' => 'cart/add-cart',
				'cart-price-<id>' => 'cart/price',
				'shipping-<id>-<cities>' => 'cart/price',
				'city-<id>' => 'cart/list-city',
				'cart-orderpayment' => 'cart/orderpayment',
				'cart-list' => 'cart/list',
				'remove-shipping' => 'cart/remove-shipping',
				'change-shipping' => 'cart/change-shipping',
				'cart-update-<id>' => 'cart/update',
				'cart-remove-<id>' => 'cart/remove',
				'check-<id>-<a>' => 'cart/address-check',
				'shipping' => 'cart/shipping',
				'checkout' => 'cart/checkout',
				'remove-item-<id>' => 'cart/remove-item',				
				
				
				//CUSTOMER ACCOUNT
				'success' => 'customer/success',
				'failed' => 'customer/failed',
				'myaccount' => 'customer/myaccount',
				'my-order-<count>' => 'customer/list-order',
				'my-review-<count>' => 'customer/list-review',			
				'account-information' => 'customer/accountinformation',
				'address-book' => 'customer/addressbook',
				'my-order' => 'customer/myorder',
				'product-preview' => 'customer/myorderpreview',			
				'address-new' => 'customer/address-new',				
			],
        ],
        'user' => [
            'identityClass' => 'common\models\Customer',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
        ],
    ],
    'params' => $params,
];
