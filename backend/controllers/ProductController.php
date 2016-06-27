<?php

namespace backend\controllers;

use common\models\Category;
use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use backend\models\SubCategory;
use backend\models\DetailCategory;
use common\models\Image;
use common\models\Model;

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
	
	public function actionLists($id)
	{
		 $countSubmain = SubCategory::find()
		 ->where(['idmaincategory' => $id])
		 ->count();
		 
		 $Submain = SubCategory::find()
		 ->where(['idmaincategory' => $id])
		 ->all();
	 
		 if($countSubmain > 0){
				 echo "<option>Choose</option>";
				 foreach($Submain as $SubmainCat){
				 echo "<option value='".$SubmainCat->idsubcategory."'>".$SubmainCat->sub_category_name."</option>";
			}
		 }
		else{
			echo "<option>-</option>";
		}
	}
	
	public function actionDetail($id)
	{
		 $countDetail = DetailCategory::find()
		 ->where(['idsubcategory' => $id])
		 ->count();
		 
		 $Detail = DetailCategory::find()
		 ->where(['idsubcategory' => $id])
		 ->all();
	 
		 if($countDetail > 0){
				 echo "<option>Choose</option>";
				 foreach($Detail as $DetailCat){
				 echo "<option value='".$DetailCat->iddetail."'>".$DetailCat->detail_name."</option>";
			}
		 }
		else{
			echo "<option>-</option>";
		}
	}
    public function actionCreate()
    {
		
        $model = new Product();
		$img =  [new Image];
		
        if ($model->load(Yii::$app->request->post())){
			
			if ($model->price < 100000){
				$price = $model->price + 1000;
				$model->service = 1000;
			}else{
				$priceservice = ($model->price / 100);
				$model->service = $priceservice;
				$price = $model->price + $priceservice;
			}
			$discount = $model->discount;
			$discount_price = $price * ($discount / 100);
			$finalprice = $price - $discount_price;

			
			
			$model->final_price = $finalprice;
			$model->save();
			
			$img = Model::createMultiple(Image::classname());
			Model::loadMultiple($img, Yii::$app->request->post());
			
			foreach ($img as $key => $imgs) {
				
				
				$imgs->image_name=UploadedFile::getInstance($imgs,'['.$key.']image_name');
				$imageName = md5(uniqid($imgs->image_name));
				
			
				$imgs->image_name->saveAs('../../img/cart/'.$imageName. '.'.$imgs->image_name->extension );
				
				$imgs->image_name= $imageName. '.'.$imgs->image_name->extension;
				$imgs->product_id = $model->idproduk;
					
				$imgs->save(); 
			
				
            }
			
            return $this->redirect(['view', 'id' => $model->idproduk]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'img' => (empty($img)) ? [new Image] : $img
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $categories = Category::find()->all();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
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
