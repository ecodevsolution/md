<?php

namespace backend\controllers;

use Yii;
use backend\models\Slider;
use backend\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Slider::find()
				->joinWith(['mainCategory'])
				->all();

        return $this->render('index', [
            'model' => $model,           
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

        if ($model->load(Yii::$app->request->post())){
			
			$model->slider_img=UploadedFile::getInstance($model,'slider_img');
			$imageName = md5(uniqid($model->slider_img));
			$model->slider_img->saveAs('../../img/temp/'.$imageName. '.'.$model->slider_img->extension );
			$model->slider_img= $imageName. '.'.$model->slider_img->extension;
			
			Image::frame('../../img/temp/'.$model->slider_img, 0, 'FFF', 0)
					->rotate(0)
					->resize(new Box(850,372))
					->save('../../img/slider/'.$model->slider_img.'', ['quality' => 100]);
		
			unlink('../../img/temp/' . $model->slider_img);
											
			$model->save();
            return $this->redirect(['view', 'id' => $model->idslider]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$look = Slider::findOne($id);
		
        if ($model->load(Yii::$app->request->post())){
			
			$model->slider_img=UploadedFile::getInstance($model,'slider_img');
			$imageName = md5(uniqid($model->slider_img));	
				
			if(empty($model->slider_img)){					
				$model->slider_img = $look->slider_img;
				$model->save();
			}else if(isset($model->slider_img)){
				$models = $this->findModel($id);
				unlink('../../img/slider/' . $models->slider_img);	
			
				$model->slider_img->saveAs('../../img/temp/'.$imageName. '.'.$model->slider_img->extension );
				$model->slider_img= $imageName. '.'.$model->slider_img->extension;
				
				Image::frame('../../img/temp/'.$model->slider_img, 0, 'FFF', 0)
				->rotate(0)
				->resize(new Box(850,372))
				->save('../../img/slider/'.$model->slider_img.'', ['quality' => 100]);
		
				unlink('../../img/temp/' . $model->slider_img);		
				$model->save();
			}
				
            return $this->redirect(['view', 'id' => $model->idslider]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $look = Slider::findOne($id);
		$image ='../../img/slider/'.$look->slider_img;
		//var_dump($image);
		if (unlink($image)) {
			$model = $this->findModel($id)->delete();
		}
        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
