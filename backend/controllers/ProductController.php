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
use backend\models\Images;
use common\models\Model;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
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
    public function actionIndex()
    {
         $model = Product::find()
				->joinWith('mainCategory')
				->joinWith('brand')
				->joinWith('images')
				->all();
			
		return $this->render('index', [                       
            'model' => $model,					
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
		$modelsImage = [new Images];
		 
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
			
			
			$modelsImage = Model::createMultiple(Images::classname());
			Model::loadMultiple($modelsImage, Yii::$app->request->post());
			
			foreach ($modelsImage as $key => $modelImage) {
				
				
				$modelImage->image_name=UploadedFile::getInstance($modelImage,'['.$key.']image_name');
				$imageName = md5(uniqid($modelImage->image_name));
				
			
				$modelImage->image_name->saveAs('../../img/cart/'.$imageName. '.'.$modelImage->image_name->extension );
				
				$modelImage->image_name= $imageName. '.'.$modelImage->image_name->extension;
				$modelImage->product_id = $model->idproduk;
				
				Image::frame('../../img/cart/'.$modelImage->image_name.'', 0, '225', 0)
						->rotate(0)
						->resize(new Box(300,400))
						->save('../../img/cart/300x/'.$modelImage->image_name.'', ['quality' => 100]);
				
				Image::frame('../../img/cart/'.$modelImage->image_name.'', 0, '225', 0)
						->rotate(0)
						->resize(new Box(600,800))
						->save('../../img/cart/600x/'.$modelImage->image_name.'', ['quality' => 100]);
						
				unlink('../../img/cart/' . $modelImage->image_name);
					
				$modelImage->save();
				//var_dump($modelImage);
            }
			 return $this->redirect(['view', 'id' => $model->idproduk]);
        }else {
			return $this->render('create', [
				'model' => $model,
				'modelsImage' => (empty($modelsImage)) ? [new Image] : $modelsImage
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
        $model = $this->findModel($id);		
		$modelsImage = [new Images];
		
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
			
			
			$modelsImage = Model::createMultiple(Images::classname());
			Model::loadMultiple($modelsImage, Yii::$app->request->post());				
			
            foreach ($modelsImage as $key => $modelImage) {						
				
				$modelImage->image_name=UploadedFile::getInstance($modelImage,'['.$key.']image_name');
				$imageName = md5(uniqid($modelImage->image_name));
				
				if(empty($modelImage->image_name)){
					$model->save();
					return $this->redirect(['view', 'id' => $id]);					
				}else{					
					$modelImage->image_name->saveAs('../../img/cart/'.$imageName. '.'.$modelImage->image_name->extension );
					
					$modelImage->image_name= $imageName. '.'.$modelImage->image_name->extension;
					$modelImage->product_id = $id;
					
					Image::frame('../../img/cart/'.$modelImage->image_name.'', 0, '225', 0)
						->rotate(0)
						->resize(new Box(300,400))
						->save('../../img/cart/300x/'.$modelImage->image_name.'', ['quality' => 100]);
				
					Image::frame('../../img/cart/'.$modelImage->image_name.'', 0, '225', 0)
						->rotate(0)
						->resize(new Box(600,800))
						->save('../../img/cart/600x/'.$modelImage->image_name.'', ['quality' => 100]);
						
		
					unlink('../../img/cart/' . $modelImage->image_name);
				
					$modelImage->save(); 																	
				}				
            }
			return Yii::$app->getResponse()->redirect(Yii::$app->homeUrl.'?r=product/update&id='.$model->idproduct);
        } else {
            return $this->render('update', [
                'model' => $model,				
				'modelsImage' => (empty($modelsImage)) ? [new Image] : $modelsImage
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
	public function actionDel($id){				
		$look = Images::findOne($id);
		$image ='../../img/cart/300x/'.$look->image_name;		
		$images ='../../img/cart/600x/'.$look->image_name;		
		if (unlink($image) && unlink($images)) {
			$look->delete();
		}
		return Yii::$app->getResponse()->redirect(Yii::$app->homeUrl.'?r=product/update&id='.$look->product_id);
	}
    public function actionDelete($id)
    {
       $product = Product::findOne($id);					
		$look = Images::find()
			->where(['product_id'=>$id])
			->all();
		foreach($look as $looks):
			$image ='../../img/cart/300x/'.$looks->image_name;
			$images ='../../img/cart/600x/'.$looks->image_name;
			unlink($image);			
			unlink($images);	
			$looks->delete();
		endforeach;
		$model = $this->findModel($id)->delete();        
        
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
