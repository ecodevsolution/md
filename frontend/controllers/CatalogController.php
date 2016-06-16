<?php

namespace frontend\controllers;

use frontend\models\MainCategory;
use frontend\models\SubCategory;
use frontend\models\DetailCategory;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

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
	
	public function actionBrand($brand){
		
		$findIDb = Brand::find()
				->where(['brand_name'=>$brand])
				->One();
		$brand = Product::find()
				->where(['idbrand'=>$findIDb])
				->all();
		return $this->render('brand',[
			'brand'=>$brand,
		]);
		
	}
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

    public function actionView()
    {
        return $this->render('view');
    }

    /**
     * @param Category[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
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

}
