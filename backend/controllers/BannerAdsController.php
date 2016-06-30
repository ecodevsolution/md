<?php

namespace backend\controllers;

use Yii;
use backend\models\BannerAds;
use backend\models\BannerAdsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;

/**
 * BannerAdsController implements the CRUD actions for BannerAds model.
 */
class BannerAdsController extends Controller
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
     * Lists all BannerAds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = BannerAds::find()
				->all();

        return $this->render('index', [
            'model' => $model,            
        ]);
    }

    /**
     * Displays a single BannerAds model.
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
     * Creates a new BannerAds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BannerAds();

        if ($model->load(Yii::$app->request->post())){
			
			$model->banner = Uploadedfile::getInstance($model,'banner');
			$namaimage = md5(uniqid($model->banner));
			$model->banner->saveAs('../../img/banner/' .$namaimage . '.' .$model->banner->extension);
			$model->banner= $namaimage. '.' .$model->banner->extension;
			$model->save();
				
            return $this->redirect(['view', 'id' => $model->idbannerads]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BannerAds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$look = BannerAds::findOne($id);
		
        if ($model->load(Yii::$app->request->post())) {
			
			$model->banner=UploadedFile::getInstance($model,'banner');
			$imageName = md5(uniqid($model->banner));
			//
			if(empty($model->banner)){
				
				$model->banner = $look->banner;
				$model->save();
			}else if(isset($model->banner)){
				$model->banner->saveAs('../../img/banner/'.$imageName. '.'.$model->banner->extension );
				$model->banner= $imageName. '.'.$model->banner->extension;

				$model->save();
			}
			
            return $this->redirect(['view', 'id' => $model->idbannerads]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BannerAds model.
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
     * Finds the BannerAds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BannerAds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BannerAds::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
