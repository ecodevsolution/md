<?php

namespace backend\controllers;

use Yii;
use backend\models\BannerSale;
use backend\models\BannerSaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;

/**
 * BannerSaleController implements the CRUD actions for BannerSale model.
 */
class BannerSaleController extends Controller
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
     * Lists all BannerSale models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerSaleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BannerSale model.
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
     * Creates a new BannerSale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BannerSale();

        if ($model->load(Yii::$app->request->post())){
			
			$model->sale_slider = Uploadedfile::getInstance($model,'sale_slider');
			$namaimage = md5(uniqid($model->sale_slider));
			$model->sale_slider->saveAs('../../image/banner/' .$namaimage . '.' .$model->sale_slider->extension);
			$model->sale_slider= $namaimage. '.' .$model->sale_slider->extension;
			
			
			$model->save();
            return $this->redirect(['view', 'id' => $model->idbanner]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BannerSale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$look = BannerSale::findOne($id);
		
        if ($model->load(Yii::$app->request->post())){

			
			$model->sale_slider=UploadedFile::getInstance($model,'sale_slider');
			$imageName = md5(uniqid($model->sale_slider));
			//
			if(empty($model->sale_slider)){
				
				$model->sale_slider = $look->sale_slider;
				$model->save();
			}else if(isset($model->sale_slider)){
				$model->sale_slider->saveAs('../../image/banner/'.$imageName. '.'.$model->sale_slider->extension );
				$model->sale_slider= $imageName. '.'.$model->sale_slider->extension;

				$model->save();
			}
            return $this->redirect(['view', 'id' => $model->idbanner]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BannerSale model.
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
     * Finds the BannerSale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BannerSale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BannerSale::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
