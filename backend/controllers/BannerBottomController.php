<?php

namespace backend\controllers;

use Yii;
use backend\models\BannerBottom;
use backend\models\BannerBottomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;

/**
 * BannerBottomController implements the CRUD actions for BannerBottom model.
 */
class BannerBottomController extends Controller
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
     * Lists all BannerBottom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerBottomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BannerBottom model.
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
     * Creates a new BannerBottom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BannerBottom();

        if ($model->load(Yii::$app->request->post())){
			
			$model->ads = Uploadedfile::getInstance($model,'ads');
			$namaimage = md5(uniqid($model->ads));
			$model->ads->saveAs('../../image/banner/' .$namaimage . '.' .$model->ads->extension);
			$model->ads= $namaimage. '.' .$model->ads->extension;
			
			$model->save();
            return $this->redirect(['view', 'id' => $model->idbanner]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BannerBottom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$look = BannerBottom::findOne($id);
		
        if ($model->load(Yii::$app->request->post())){
			
			$model->ads=UploadedFile::getInstance($model,'ads');
			$imageName = md5(uniqid($model->ads));
			//
			if(empty($model->ads)){
				
				$model->ads = $look->ads;
				$model->save();
			}else if(isset($model->ads)){
				$model->ads->saveAs('../../image/banner/'.$imageName. '.'.$model->ads->extension );
				$model->ads= $imageName. '.'.$model->ads->extension;

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
     * Deletes an existing BannerBottom model.
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
     * Finds the BannerBottom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BannerBottom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BannerBottom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
