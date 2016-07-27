<?php

namespace backend\controllers;

use Yii;
use backend\models\Brand;
use backend\models\BrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    
                ],
            ],
        ];
    }

    /**
     * Lists all Brand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Brand::find()
				->all();

        return $this->render('index', [            
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Brand model.
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
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brand();

        if ($model->load(Yii::$app->request->post())){
			
			$model->brand_logo = Uploadedfile::getInstance($model,'brand_logo');
			$namaimage = md5(uniqid($model->brand_logo));
			$model->brand_logo->saveAs('../../img/temp/' .$namaimage . '.' .$model->brand_logo->extension);
			$model->brand_logo= $namaimage. '.' .$model->brand_logo->extension;
			
			Image::frame('../../img/temp/'.$model->brand_logo.'', 0, '225', 0)
					->rotate(0)
					->resize(new Box(140,29))
					->save('../../img/brand/'.$model->brand_logo.'', ['quality' => 100]);
					
			unlink('../../img/temp/' . $model->brand_logo);				
			$model->save();
            return $this->redirect(['view', 'id' => $model->idbrand]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$look = Brand::findOne($id);
        if ($model->load(Yii::$app->request->post())){
			
			$model->brand_logo = Uploadedfile::getInstance($model,'brand_logo');
			$namaimage = md5(uniqid($model->brand_logo));
				
			if(empty($model->brand_logo)){					
				$model->brand_logo = $look->brand_logo;
				$model->save();
			}else if(isset($model->brand_logo)){
				$models = $this->findModel($id);
				unlink('../../img/brand/' . $models->brand_logo);	
			
				$model->brand_logo->saveAs('../../img/temp/'.$namaimage. '.'.$model->brand_logo->extension );
				$model->brand_logo= $namaimage. '.'.$model->brand_logo->extension;
				
				Image::frame('../../img/temp/'.$model->brand_logo.'', 0, '225', 0)
				->rotate(0)
				->resize(new Box(140,29))
				->save('../../img/brand/'.$model->brand_logo.'', ['quality' => 100]);
		
				unlink('../../img/temp/' . $model->brand_logo);		
				$model->save();
			}
				
            return $this->redirect(['view', 'id' => $model->idbrand]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Brand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $look = Brand::findOne($id);
		$image ='../../img/brand/'.$look->brand_logo;
		//var_dump($image);
		if (unlink($image)) {
			$model = $this->findModel($id)->delete();
		}
        return $this->redirect(['index']);
    }

    /**
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
