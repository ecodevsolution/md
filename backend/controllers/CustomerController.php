<?php

namespace backend\controllers;

use Yii;
use backend\models\Customer;
use backend\models\City;
use backend\models\Province;
use backend\models\CustomerAddress;
use backend\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
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
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
	public function actionProvince($id)
	{
		 $countprovince = Province::find()
		 ->where(['idcity' => $id])
		 ->count();
		 
		 $province = Province::find()
		 ->where(['idcity' => $id])
		 ->all();
	 
		 if($countcity > 0){
				 echo "<option>Choose</option>";
				 foreach($province as $provinces){
				 echo "<option value='".$provinces->idprovince."'>".$provinces->province_name."</option>";
			}
		 }
		else{
			echo "<option>-Choose-</option>";
		}
	}
    public function actionCreate()
    {
        $model = new Customer();
		$address =  [new CustomerAddress];
		
        if ($model->load(Yii::$app->request->post())){
			$model->created_at = date('Ymd');
			$model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
			$model->generateAuthKey();
			$model->updated_at = 0;
			$model->save();
			
			$address = Model::createMultiple(CustomerAddress::classname());
			Model::loadMultiple($address, Yii::$app->request->post());
			foreach ($address as $key => $addresss) {

				$addresss->idcustomer = $model->idcustomer;				
				$addresss->save(); 
			}
			
            return $this->redirect(['view', 'id' => $model->idcustomer]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'address' => (empty($address)) ? [new CustomerAddress] : $address,
            ]);
        }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idcustomer]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
