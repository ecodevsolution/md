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
				'not-found' => 'site/error',
				
				//CATALOG AND PRODUCT LINK
				'category-<route>' => 'catalog/category',
				'product-<route>-<routes>' => 'catalog/sub-category',
				'product_detail-<route>-<routes>-<router>' => 'catalog/det-category',
				'filter?<filter>' => 'catalog/brand',
				'brand-<brand>-<filter>' => 'catalog/brand',
				'search?<search>' => 'catalog/brand',
				'category?<category>' => 'catalog/brand',
				'catalog-list' => 'catalog/list',
				'detail-product-<id>' => 'product/detail-product',

				//PRODUCT CART LINK
				'cart-add-<id>' => 'cart/add',			
				'cart-price-<id>' => 'cart/price',
				'shipping-<id>-<cities>' => 'cart/price',
				'city-<id>' => 'cart/list-city',
				'cart-orderpayment' => 'cart/orderpayment',
				'cart-list' => 'cart/list',
				'cart-update-<id>' => 'cart/update',
				'cart-remove-<id>' => 'cart/remove',
				'checkout' => 'cart/checkout',
				
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
