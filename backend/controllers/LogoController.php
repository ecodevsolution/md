<?php

namespace backend\controllers;

use Yii;
use backend\models\Logo;
use backend\models\LogoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;

/**
 * LogoController implements the CRUD actions for Logo model.
 */
class LogoController extends Controller
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
     * Lists all Logo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Logo::find()
				->all();

        return $this->render('index', [
            'model'=>$model,            
        ]);
    }

    /**
     * Displays a single Logo model.
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
     * Creates a new Logo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Logo();
       

        if ($model->load(Yii::$app->request->post())){ 
			$model->logo = Uploadedfile::getInstance($model,'logo');
			$namaimage = md5(uniqid($model->logo));
			$model->logo->saveAs('../../img/logo/' .$namaimage . '.' .$model->logo->extension);
			$model->logo= $namaimage. '.' .$model->logo->extension;		
			$model->save();
            return $this->redirect(['view', 'id' => $model->idlogo]);
        } else {
            return $this->render('create', [
                'model' => $model,
				
            ]);
        }
    }

    /**
     * Updates an existing Logo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
			$model = Logo::findOne($id);
        
			if ($model->load(Yii::$app->request->post())){ 
			$model->logo = Uploadedfile::getInstance($model,'logo');
			$namaimage = md5(uniqid($model->logo));
			$model->logo->saveAs('../../img/logo/' .$namaimage . '.' .$model->logo->extension);
			$model->logo= $namaimage. '.' .$model->logo->extension;			
			$model->save();
            return $this->redirect(['view', 'id' => $model->idlogo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Logo model.
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
     * Finds the Logo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Logo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Logo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
