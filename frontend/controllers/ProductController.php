<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Product;
use frontend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Slider;

use frontend\models\InfoBox;
use frontend\models\BannerAds;
use frontend\models\BannerBottom;
use frontend\models\BannerRight;
use frontend\models\BannerSale;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idproduk]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	public function actionDetailProduct($id)
	{
		$model = Product::findOne($id);
		$brand = Product::find()
				->joinWith('brand')
				->select('brand.idbrand')
				->distinct()
				->all();
		$tag = Product::find()
				  ->JoinWith('mainCategory')
				  ->select('main_category.idmain')
				  ->distinct()
				  ->all();
		$sale = BannerSale::find()
					->all();
			
		$adsleft = BannerAds::find()
				->where(['flag'=>1])
				->all();
				
		$adsright = BannerRight::find()
				->where(['flag'=>1])
				->all();
		
		$bottom = BannerBottom::find()
				->where(['flag'=>1])
				->all();
		
		$brand = Product::find()
				->joinWith('brand')
				->select('brand.idbrand')
				->distinct()
				->all();
		
		$icon = InfoBox::find()
				->all();
		
		$slider = Slider::find()
					->all();	
		$product = Product::find()
					->JoinWith('image')
					->where(['idproduk'=>$id])
					->One();
		return $this->render('detail',[
			'model'=>$model,
			'sale'=>$sale,
			'adsleft'=>$adsleft,
			'adsright'=>$adsright,
			'bottom'=>$bottom,
			'brand'=>$brand,
			'icon'=>$icon,
			'slider'=>$slider,
			'tag'=>$tag,
			'product'=>$product,
		]);
	}
    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idproduk]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
