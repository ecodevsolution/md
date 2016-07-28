<?php

namespace backend\controllers;

use Yii;
use backend\models\Role;
use backend\models\RoleSearch;
use backend\models\MenuUser;
use backend\models\DtlMenuUser;
use backend\models\PrivillageUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Role models.
     * @return mixed
     */
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
    public function actionIndex()
    {
        $model = Role::find()
				->all();

        return $this->render('index', [
            'model' => $model,            
        ]);
    }

    /**
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Role();

        if ($model->load(Yii::$app->request->post())){
			
			$model->save();
			
			$menu = MenuUser::find()
				->all();
			foreach ($menu as $menus):
				$access = new PrivillageUser();
	
				$access->idrole = $model->idrole;
				$access->idmenu = $menus->idmenu;
				$access->name = $menus->menu_name;
				$access->iddtlmenu = 0;
				$access->status = 'HEAD';
				$access->flag = 0;
				$access->save();
			endforeach;
			
			$dtl = DtlMenuUser::find()
				->all();
			foreach ($dtl as $dtls):
				$access = new PrivillageUser();
	
				$access->idrole = $model->idrole;
				$access->idmenu = $dtls->id_menu;
				$access->name = $dtls->menu_detail_name;
				$access->iddtlmenu = $dtls->id_dtl_menu;
				$access->status = 'DETAIL';
				$access->flag = 0;
				$access->save();
			endforeach;
		
            return $this->redirect(['view', 'id' => $model->idrole]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idrole]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->delete();        
		
		$delete = PrivillageUser::find()
	    		->where(['idrole'=>$model->idrole])
	    		->All();
	    foreach ($delete as $del):
		    if(isset($del->idrole)){
		    	$del->delete();
		    	
		    }
		endforeach;
		
        return $this->redirect(['index']);
    }

    /**
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
