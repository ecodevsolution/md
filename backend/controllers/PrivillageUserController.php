<?php

namespace backend\controllers;

use backend\models\Role;
use backend\models\MenuUser;
use backend\models\DtlMenuUser;
use backend\models\PrivillageUser;

class PrivillageUserController extends \yii\web\Controller
{
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

    public function actionIndex()
    {
    	$model = Role::find()
    			->All();
    	$akses = MenuUser::find()
    			->All();
        return $this->render('index',[
        		'model'=>$model,
        		'akses'=>$akses,
        	]);
    }

    public function actionView($id){
    		//$_POST['id'];
    		//$_POST['detail'];
    }
    public function actionPost(){
    	
    	$delete = PrivillageUser::find()
	    		->where(['idrole'=>$_POST['role']])
	    		->All();
	    foreach ($delete as $del):
		    if(isset($del->idrole)){
		    	$del->delete();
		    	
		    }
		endforeach;
	   

		$model = MenuUser::find()
				->all();
		foreach ($model as $menus):
			$access = new PrivillageUser();

			$access->idrole = $_POST['role'];
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

			$access->idrole = $_POST['role'];
			$access->idmenu = $dtls->id_menu;
			$access->name = $dtls->menu_detail_name;
			$access->iddtlmenu = $dtls->id_dtl_menu;
			$access->status = 'DETAIL';
			$access->flag = 0;
			$access->save();
		endforeach;


	   
		 
    	foreach($_POST['idmenu'] as $key => $menus):

    		$idmenu =$_POST['idmenu'][$key];
    		$head = PrivillageUser::find()
		    		->where(['idrole'=>$_POST['role']])
		    		->AndWhere(['idmenu'=>$_POST['idmenu'][$key]])
		    		->AndWhere(['status'=>'HEAD'])
		    		->All();
		    foreach ($head as $heads):
		    	$heads->flag = 1;
		    	$heads->save();
		    endforeach;
   			
   			foreach($_POST['detail'] as $i => $detl):


	    		$detail = PrivillageUser::find()
			    		->where(['idrole'=>$_POST['role']])
			    		->AndWhere(['iddtlmenu'=>$_POST['detail'][$i]])
			    		->AndWhere(['idmenu'=>$menus])
			    		->AndWhere(['status'=>'DETAIL'])
			    		->All();
			    foreach ($detail as $details):
			    	$details->flag = 1;
			    	$details->save();
			    endforeach;
			    //var_dump($_POST['idmenu'][$key]);

	    	endforeach;

    	endforeach;
		return $this->redirect(['index', 'id' => $_POST['role']]);
    }

    

}
