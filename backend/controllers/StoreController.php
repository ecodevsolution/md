<?php

namespace backend\controllers;
use backend\models\UserForm;

class StoreController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = UserForm::find()
				->where(['idrole'=>1])
				->One();
        return $this->render('index',[
			'model' => $model,		
		]);
    }

}
