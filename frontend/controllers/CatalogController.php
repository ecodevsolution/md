<?php

namespace frontend\controllers;

use frontend\models\MainCategory;
use frontend\models\SubCategory;
use frontend\models\Brand;
use frontend\models\DetailCategory;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class CatalogController extends \yii\web\Controller
{
	
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }
	
	// -------------------------------------------------------------------------------- BEGIN NAVIGASI------------------------------------------------//
    public function actionCategory($route)
    {
        /** @var Category $category */
        //$category = null;
		$replace_route = str_replace('_',' ',$route);
		$findID = MainCategory::find()
				->where(['main_category_name'=>$replace_route])
				->One();
		$route = $findID->idmain;

        $categories = MainCategory::find()->indexBy('idmain')->orderBy('idmain')->all();

        $productsQuery = Product::find();
        if ($route !== null && isset($categories[$route])) {
            $category = $categories[$route];
            $productsQuery->where(['idmain' => $this->getCategoryIds($categories, $route)]);
        }

        $productsDataProvider = new ActiveDataProvider([
				'query' => $productsQuery,
				'pagination' => [
				'pageSize' => 10,
            ],
        ]);

        return $this->render('list', [
            'category' => $category,
            'menuItems' => $this->getMenuItems($categories, isset($category->idmain) ? $category->idmain : null),
            'productsDataProvider' => $productsDataProvider,
			'categories'=>$categories,
        ]);
    }
	
	public function actionSubCategory($route, $routes)
    {
        /** @var Category $category */
        //$category = null;
		$replace_route = str_replace('_',' ',$route);
		$findID = MainCategory::find()
				->where(['main_category_name'=>$replace_route])
				->One();
				
		$replace_routes = str_replace('_',' ',$routes);
		$findIDs = SubCategory::find()
				->where(['sub_category_name'=>$replace_routes])
				->One();
		
		$route = $findID->idmain;
		$routes = $findIDs->idsubcategory;
		
        $categories = MainCategory::find()->indexBy('idmain')->orderBy('idmain')->all();
		$subcategories = SubCategory::find()->indexBy('idsubcategory')->orderBy('idsubcategory')->all();

        $productsQuery = Product::find();
        if ($route !== null && isset($categories[$route]) || $routes !== null && isset($subcategories[$routes])) {
            $category = $categories[$route];
			$subcategory = $subcategories[$routes];
            $productsQuery->where(['idmain' => $this->getCategoryIds($categories, $route)])
						->AndWhere(['idsub'=> $this->getSubCategoryIds($subcategories, $routes)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('list_sub', [
            'category' => $category,
			'subcategory' => $subcategory,
            'submenuItems' => $this->getSubMenuItems($subcategories, isset($subcategory->idsub) ? $subcategory->idsub : null),
            'productsDataProvider' => $productsDataProvider,
        ]);
    }
	
	
	public function actionDetCategory($route, $routes, $router)
    {
        /** @var Category $category */
        //$category = null;
		$replace_route = str_replace('_',' ',$route);
		$findID = MainCategory::find()
				->where(['main_category_name'=>$replace_route])
				->One();
				
		$replace_routes = str_replace('_',' ',$routes);
		$findIDs = SubCategory::find()
				->where(['sub_category_name'=>$replace_routes])
				->One();
		
		$replace_router = str_replace('_',' ',$router);
		$findIDr = DetailCategory::find()
				->where(['detail_name'=>$replace_router])
				->One();
		
		$route = $findID->idmain;
		$routes = $findIDs->idsubcategory;
		$router = $findIDr->iddetail;
		
		
        $categories = MainCategory::find()->indexBy('idmain')->orderBy('idmain')->all();
		$subcategories = SubCategory::find()->indexBy('idsubcategory')->orderBy('idsubcategory')->all();
		$detcategories = DetailCategory::find()->indexBy('iddetail')->orderBy('iddetail')->all();

        $productsQuery = Product::find();
        if ($route !== null && isset($categories[$route]) || $routes !== null && isset($subcategories[$routes]) || $router !== null && isset($detcategories[$router])) {
            $category = $categories[$route];
			$subcategory = $subcategories[$routes];
			$detcategory = $detcategories[$router];
            $productsQuery->where(['idmain' => $this->getCategoryIds($categories, $route)])
						->AndWhere(['idsub'=> $this->getSubCategoryIds($subcategories, $routes)])
						->AndWhere(['iddetail'=> $this->getDetCategoryIds($detcategories, $router)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('list_detail', [
            'category' => $category,
			'subcategory' => $subcategory,
			'detcategory' => $detcategory,
            'detmenuItems' => $this->getDetMenuItems($detcategories, 
														isset($category->idmain) ? $category->idmain : null, 
														isset($subcategory->idsubcategory) ? $subcategory->idsubcategory : null, 
														isset($detcategory->iddetail) ? $detcategory->iddetail : null
													),
            'productsDataProvider' => $productsDataProvider,
        ]);
    }

	
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $cat) {

            if ($cat->idmain === $activeId) {
                $menuItems[$cat->idmain] = [
                    'active' => $activeId === $cat->idmain,
                    'label' => $cat->main_category_name,
                    'url' => ['catalog/category', 'route' => $cat->idmain],                    
                ];
            }
        }
        return $menuItems;
    }
	
	private function getSubMenuItems($subcategories, $subactiveId = null, $subparent = null)
    {
        $SubmenuItems = [];
        foreach ($subcategories as $subcategory) {
            if ($subcategory->idsubcategory === $subparent) {
                $SubmenuItems[$subcategory->idsubcategory] = [
                    'active' => $subactiveId === $subcategory->idsubcategory,
                    'label' => $subcategory->title,
                    'url' => ['catalog/subcategory', 'routes' => $subcategory->idsubcategory],
                    'items' => $this->getMenuItems($subcategories, $subactiveId, $subcategory->id),
                ];
            }
        }
        return $SubmenuItems;
    }
	
	private function getDetMenuItems($detcategories, $parent = null, $sub = null, $activeId = null)
    {
        $detmenuItems = [];
        foreach ($detcategories as $det) {
			if ($det->iddetail === $activeId) {
				$detmenuItems[$det->iddetail] = [					
					'active' => $activeId === $det->iddetail,
					'label' => $det->detail_name,
					'url' => ['catalog/det-category', 'route'=>$parent, 'routes' => $sub, 'router' => $activeId],      
				];
			}
        }
        return $detmenuItems;
    }

    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param Category[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
	
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->idmain == $categoryId) {
                $categoryIds[] = $category->idmain;
            }
            elseif ($category->idmain == $categoryId){
                $this->getCategoryIds($categories, $category->idmain, $categoryIds);
            }
        }
        return $categoryIds;
    }
	
	private function getSubCategoryIds($subcategories, $subcategoryId, &$subcategoryIds = [])
    {
        foreach ($subcategories as $subcategory) {
            if ($subcategory->idsubcategory == $subcategoryId) {
                $subcategoryIds[] = $subcategory->idsubcategory;
            }
            elseif ($subcategory->idsubcategory == $subcategoryId){
                $this->getCategoryIds($subcategories, $subcategory->idsubcategory, $subcategoryIds);
            }
        }
        return $subcategoryIds;
    }
	
	private function getDetCategoryIds($detcategories, $detcategoryId, &$detcategoryIds = [])
    {
        foreach ($detcategories as $dets) {
            if ($dets->iddetail == $detcategoryId) {
                $detcategoryIds[] = $dets->iddetail;
            }
            elseif ($dets->iddetail == $detcategoryId){
                $this->getCategoryIds($subcategories, $dets->iddetail, $detcategoryIds);
            }
        }
        return $detcategoryIds;
    }
	
	
	// -------------------------------------------------------------------------------- END NAVIGASI------------------------------------------------//
	
	
	
	// -------------------------------------------------------------------------------- BEGIN BRAND ------------------------------------------------//
	
	
	
	public function actionBrand($brand, $filter)
    {
        /** @var Category $category */
        //$category = null;
		$replace_route = str_replace('_',' ',$filter);
		$findID = MainCategory::find()
				->where(['main_category_name'=>$replace_route])
				->One();
				
		$replace_routes = str_replace('_',' ',$brand);
		$findIDb = Brand::find()
				->where(['brand_name'=>$replace_routes])
				->One();
		
		$route = $findID->idmain;
		$routes = $findIDb->idbrand;
		
        $categories = MainCategory::find()->indexBy('idmain')->orderBy('idmain')->all();
		$brands = Brand::find()->indexBy('idbrand')->orderBy('idbrand')->all();

        $productsQuery = Product::find();
        if ($route !== null && isset($categories[$route]) || $routes !== null && isset($brands[$routes])) {
            $category = $categories[$route];
			$brandy = $brands[$routes];
            $productsQuery->where(['idmain' => $this->getCategoryIds($categories, $route)])
						->AndWhere(['idbrand'=> $this->getBrandIds($brands, $routes)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('brand', [
            'category' => $category,
			'brandy' => $brandy,
            'BrandItems' => $this->getBrandItems($brands, isset($brandy->idbrand) ? $brandy->idbrand : null),
            'productsDataProvider' => $productsDataProvider,
        ]);
    }
	
	public function actionBrands($brands, $filter)
    {
        /** @var Category $category */
        //$category = null;
		$replace_route = str_replace('_',' ',$filter);
		$findID = SubCategory::find()
				->where(['sub_category_name'=>$replace_route])
				->One();
				
		$replace_routes = str_replace('_',' ',$brands);
		$findIDb = Brand::find()
				->where(['brand_name'=>$replace_routes])
				->One();
		
		$route = $findID->idsubcategory;
		$routes = $findIDb->idbrand;
		
        $categories = SubCategory::find()->indexBy('idsubcategory')->orderBy('idsubcategory')->all();
		$brands = Brand::find()->indexBy('idbrand')->orderBy('idbrand')->all();

        $productsQuery = Product::find();
        if ($route !== null && isset($categories[$route]) || $routes !== null && isset($brands[$routes])) {
            $category = $categories[$route];
			$brandy = $brands[$routes];
            $productsQuery->where(['idsub' => $this->getSubCategoryIds($categories, $route)])
						->AndWhere(['idbrand'=> $this->getBrandIds($brands, $routes)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('brand', [
            'category' => $category,
			'brandy' => $brandy,
            'BrandItems' => $this->getBrandItems($brands, isset($brandy->idbrand) ? $brandy->idbrand : null),
            'productsDataProvider' => $productsDataProvider,
        ]);
    }
	

	public function actionBrandd($brandd, $filter)
    {
        /** @var Category $category */
        //$category = null;
		$replace_route = str_replace('_',' ',$filter);
		$findID = DetailCategory::find()
				->where(['detail_name'=>$replace_route])
				->One();
				
		$replace_routes = str_replace('_',' ',$brandd);
		$findIDb = Brand::find()
				->where(['brand_name'=>$replace_routes])
				->One();
		
		$route = $findID->iddetail;
		$routes = $findIDb->idbrand;
		
        $categories = DetailCategory::find()->indexBy('iddetail')->orderBy('iddetail')->all();
		$brands = Brand::find()->indexBy('idbrand')->orderBy('idbrand')->all();

        $productsQuery = Product::find();
        if ($route !== null && isset($categories[$route]) || $routes !== null && isset($brands[$routes])) {
            $category = $categories[$route];
			$brandy = $brands[$routes];
            $productsQuery->where(['iddetail' => $this->getDetCategoryIds($categories, $route)])
						->AndWhere(['idbrand'=> $this->getBrandIds($brands, $routes)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('brand', [
            'category' => $category,
			'brandy' => $brandy,
            'BrandItems' => $this->getBrandItems($brands, isset($brandy->idbrand) ? $brandy->idbrand : null),
            'productsDataProvider' => $productsDataProvider,
        ]);
    }
	
	private function getBrandItems($brands, $brandactiveId = null, $brandparent = null)
    {
        $BrandItems = [];
        foreach ($brands as $brandy) {
            if ($brandy->idbrand === $brandparent) {
                $SubmenuItems[$brandy->idsubcategory] = [
                    'active' => $subactiveId === $brandy->idsubcategory,
                    'label' => $brandy->title,
                    'url' => ['catalog/brand', 'brand' => $brandy->idbrand],
                    'items' => $this->getBrandItems($brands, $brandactiveId, $brandparent->id),
                ];
            }
        }
        return $BrandItems;
    }
	
	private function getBrandIds($brands, $brandyId, &$brandyIds = [])
    {
        foreach ($brands as $brandy) {
            if ($brandy->idbrand == $brandyId) {
                $brandyIds[] = $brandy->idbrand;
            }
            elseif ($brandy->idbrand == $brandyId){
                $this->getCategoryIds($subcategories, $brandy->idbrand, $brandyIds);
            }
        }
        return $brandyIds;
    }
	
	// -------------------------------------------------------------------------------- END BRAND ------------------------------------------------//
	
	// -------------------------------------------------------------------------------- BEGIN PRICE ------------------------------------------------//
	public function actionPrice(){
		if(isset($_GET['p'])){
			$min_price = $_GET['pr_min'];
			$max_price = $_GET['pr_max'];
			$main = $_GET['p'];
			$main = str_replace('_',' ',ucwords($main));
			
			if($_GET['b'] != ""){
				$filter=MainCategory::find()
						->where (["main_category_name"=>ucwords($main)])
						->One();	
						
				$brand = Brand::find()
						->where (["brand_name"=>ucwords($_GET['b'])])
						->One();	
						
				$productsQuery = Product::find()
						->where(['between','final_price',$min_price,$max_price])
						->AndWhere(['idbrand'=>$brand->idbrand])
						->AndWhere(['idmain'=> $filter->idmain]);
	
				$productsDataProvider = new ActiveDataProvider([
					'query' => $productsQuery,
					'pagination' => [
						'pageSize' => 10,
					],
				]);
		
				return $this->render('price', [
					'productsDataProvider' => $productsDataProvider,
				]);
				
			}else{
				$filter=MainCategory::find()
						->where (["main_category_name"=>ucwords($main)])
						->One();	
						
				$productsQuery = Product::find()
						->where(['between','final_price',$min_price,$max_price])
						->AndWhere(['idmain'=> $filter->idmain]);
	
				$productsDataProvider = new ActiveDataProvider([
					'query' => $productsQuery,
					'pagination' => [
						'pageSize' => 10,
					],
				]);
		
				return $this->render('price', [
					'productsDataProvider' => $productsDataProvider,
				]);
			}
		}
		if(isset($_GET['q'])){
			$min_price = $_GET['pr_min'];
			$max_price = $_GET['pr_max'];
			$sub = $_GET['q'];
			$sub = str_replace('_',' ',ucwords($sub));
			
			if($_GET['b'] != ""){
				$filter=SubCategory::find()
						->where (["sub_category_name"=>ucwords($sub)])
						->One();	
						
				$brand = Brand::find()
						->where (["brand_name"=>ucwords($_GET['b'])])
						->One();	
						
				$productsQuery = Product::find()
						->where(['between','final_price',$min_price,$max_price])
						->AndWhere(['idbrand'=>$brand->idbrand])
						->AndWhere(['idsub'=> $filter->idsubcategory]);
	
				$productsDataProvider = new ActiveDataProvider([
					'query' => $productsQuery,
					'pagination' => [
						'pageSize' => 10,
					],
				]);
		
				return $this->render('price', [
					'productsDataProvider' => $productsDataProvider,
				]);
				
			}else{
				$filter=SubCategory::find()
						->where (["sub_category_name"=>ucwords($sub)])
						->One();	
						
				$productsQuery = Product::find()
						->where(['between','final_price',$min_price,$max_price])
						->AndWhere(['idsub'=> $filter->idsubcategory]);
	
				$productsDataProvider = new ActiveDataProvider([
					'query' => $productsQuery,
					'pagination' => [
						'pageSize' => 10,
					],
				]);
		
				return $this->render('price', [
					'productsDataProvider' => $productsDataProvider,
				]);
			}
		}
		if(isset($_GET['r'])){
			$min_price = $_GET['pr_min'];
			$max_price = $_GET['pr_max'];
			$detail = $_GET['r'];
			$detail = str_replace('_',' ',ucwords($detail));
			
			if($_GET['b'] != ""){
				$filter=DetailCategory::find()
						->where (["detail_name"=>ucwords($detail)])
						->One();	
						
				$brand = Brand::find()
						->where (["brand_name"=>ucwords($_GET['b'])])
						->One();	
						
				$productsQuery = Product::find()
						->where(['between','final_price',$min_price,$max_price])
						->AndWhere(['idbrand'=>$brand->idbrand])
						->AndWhere(['iddetail'=> $filter->iddetail]);
	
				$productsDataProvider = new ActiveDataProvider([
					'query' => $productsQuery,
					'pagination' => [
						'pageSize' => 10,
					],
				]);
		
				return $this->render('price', [
					'productsDataProvider' => $productsDataProvider,
				]);
				
			}else{
				$filter=DetailCategory::find()
						->where (["detail_name"=>ucwords($detail)])
						->One();	
				
				//var_dump($detail);
				$productsQuery = Product::find()
						->where(['between','final_price',$min_price,$max_price])
						->AndWhere(['iddetail'=> $filter->iddetail]);
	            
				$productsDataProvider = new ActiveDataProvider([
					'query' => $productsQuery,
					'pagination' => [
						'pageSize' => 10,
					],
				]);
		        
				return $this->render('price', [
					'productsDataProvider' => $productsDataProvider,
				]);
			}
		}
				
	}
}

