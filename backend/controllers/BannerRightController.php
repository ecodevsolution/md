<?php

namespace backend\controllers;

use Yii;
use backend\models\BannerRight;
use backend\models\BannerRightSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;

/**
 * BannerRightController implements the CRUD actions for BannerRight model.
 */
class BannerRightController extends Controller
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
     * Lists all BannerRight models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerRightSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BannerRight model.
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
     * Creates a new BannerRight model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BannerRight();
		
        if ($model->load(Yii::$app->request->post())){
			
			$model->baner_ads = Uploadedfile::getInstance($model,'baner_ads');
			$namaimage = md5(uniqid($model->baner_ads));
			$model->baner_ads->saveAs('../../image/banner/' .$namaimage . '.' .$model->baner_ads->extension);
			$model->baner_ads= $namaimage. '.' .$model->baner_ads->extension;
			
			$model->save();
            return $this->redirect(['view', 'id' => $model->idbaner]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BannerRight model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$look = BannerRight::findOne($id);
		
        if ($model->load(Yii::$app->request->post())){
			
			$model->baner_ads=UploadedFile::getInstance($model,'baner_ads');
			$imageName = md5(uniqid($model->baner_ads));
			//
			if(empty($model->baner_ads)){
				
				$model->baner_ads = $look->baner_ads;
				$model->save();
			}else if(isset($model->baner_ads)){
				$model->baner_ads->saveAs('../../image/banner/'.$imageName. '.'.$model->baner_ads->extension );
				$model->baner_ads= $imageName. '.'.$model->baner_ads->extension;

				$model->save();
			}
			
            return $this->redirect(['view', 'id' => $model->idbaner]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BannerRight model.
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
     * Finds the BannerRight model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BannerRight the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BannerRight::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
