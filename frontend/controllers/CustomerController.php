<?php

namespace frontend\controllers;

use Yii;
use  yii\web\Session;
use frontend\models\Customer;
use frontend\models\Order;
use common\models\ChangePassword;
use frontend\models\CustomerAddress;
use frontend\models\ProductReview;



class CustomerController extends \yii\web\Controller
{
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
	   
    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionSignups()
	{
		return $this->render('signups');
	}
	public function actionSuccess(){
		
		return $this->render('success');
	}
	public function actionFailed(){
		
		return $this->render('failed');
	}
	public function actionDaftar()
    {
        $model = new Customer();
		$session = Yii::$app->session;
        if (isset($_POST['firstname'])){
			$titles = $_POST['titles'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$days = $_POST['days'];
			$months = $_POST['months'];
			$years = $_POST['years'];
			
			$model->is_guest = 0;
			$model->titles = $titles;
			$model->firstname = $firstname;
			$model->lastname = $lastname;
			$model->email = $email;
			$model->password_hash = Yii::$app->security->generatePasswordHash($password);
			$model->generateAuthKey();
			$model->bod = $years.'-'.$months.'-'.$days;
			$model->created_at = date("dmy");
			
			
			if($model->save()){
				$session['registration'] = 'You have successfully registered';
			}
			  return Yii::$app->getResponse()->redirect("?r=site/signin");
			//return $this->render('//site/signin');
        } else {
            return Yii::$app->getResponse()->redirect(Yii::$app->homeUrl);
        }
    }
	public function actionCreateAccount()
    {
		//var_dump($_POST['email']);
		
        return $this->render('signups');
       
    }
    public function actionMyaccount()
    {
		
		if (!Yii::$app->user->isGuest) {
			$model = Customer::findOne(Yii::$app->user->identity->idcustomer);
			
			$order = Customer::find()
					->joinWith(['order'])
					->joinWith(['customerAddress'])
					->orderBy(['order.idorder'=>SORT_DESC])
					->where(['customer.idcustomer'=>Yii::$app->user->identity->idcustomer])
					->limit(3)
					->All();
			$address = CustomerAddress::Find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->All();
			return $this->render('myaccount',[
				'model'=>$model,
				'order'=>$order,
				'address'=>$address,
			]);
		}
		else{
			return Yii::$app->getResponse()->redirect('error');
		}
    }
	
	public function actionAccountinformation()
    {
		if (!Yii::$app->user->isGuest) {
			$model = Customer::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->One();
			$password = new ChangePassword();
			
			if ($model->load(Yii::$app->request->post()) && $password->load(Yii::$app->request->post())){
				if(isset($_POST['change_password']) AND $_POST['change_password'] == 1){

					if ($password->validate() && $model->validate()) {
						$model->password_hash = Yii::$app->security->generatePasswordHash($password->newpass);
						$model->save();
						$success = "Your information has been updated !";
						
						return $this->render('accountinformation',[
							'model'=>$model,
							'success'=>$success,
							'password'=>$password,
						]);
					}					
				}else{
					if($model->validate()) {
						$model->save();
						$success = "Your information has been updated !";
						
						return $this->render('accountinformation',[
							'model'=>$model,
							'password'=>$password,
							'success'=>$success,
						]);
					}
				}
			}
			return $this->render('accountinformation',[
				'model'=>$model,
				'password'=>$password,
			]);
		}
		else{
			return Yii::$app->getResponse()->redirect('error');
		}
    }
	public function actionAddressbook()
    {
		if (!Yii::$app->user->isGuest) {
			$address = CustomerAddress::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->count();		
			if($address > 0){
				$findAddress = CustomerAddress::find()
							->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
							->All();
				
				return $this->render('addressbook',[
					'findAddress'=>$findAddress,
				]);
			}else{
				$modelAddress = new CustomerAddress();
				if(isset($_POST['street1']) && 
				$modelAddress->load(Yii::$app->request->post()) &&
				isset($_POST['province']) && 
				isset($_POST['city']) && 
				isset($_POST['postcode']) && 
				isset($_POST['telephone'])){
					
					$street2 = isset($_POST['street2']) ? $_POST['street2']:"";
					
					$city = explode(';',$_POST['city']);
					$province = explode(';',$_POST['province']);
					
					$modelAddress->idcustomer = Yii::$app->user->identity->idcustomer;
					$modelAddress->address = $_POST['street1'].' '.$street2;
					$modelAddress->city = $city[1];
					$modelAddress->idcity = $city[0];
					$modelAddress->province = $province[1];
					$modelAddress->idprovince = $province[0];
					$modelAddress->phone = $_POST['telephone'];
					$modelAddress->zip = $_POST['postcode'];
					
					$modelAddress->save();
					return Yii::$app->getResponse()->redirect('address-book');
				}
				
				return $this->render('address_new',[
					'modelAddress'=>$modelAddress,
				]);
			}
		}else{
			return Yii::$app->getResponse()->redirect('error');
		}
        
    }
	public function actionListOrder($count){
		
		if (!Yii::$app->user->isGuest) {
			$countOrder = Order::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->count();
					
			$order = Order::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->orderBy(['date'=>SORT_DESC])	
					->Limit($count)
					->all();
			return $this->render('myorder',[
				'order'=>$order,
				'countOrder'=>$countOrder,
			]);
		}else{
			return Yii::$app->getResponse()->redirect('error');
		}
	}
	
	public function actionMyorder()
    {
		if (!Yii::$app->user->isGuest) {
			$countOrder = Order::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->count();
					
			$order = Order::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->orderBy(['date'=>SORT_DESC])	
					->Limit(5)
					->all();
			
			return $this->render('myorder',[
				'order'=>$order,
				'countOrder'=>$countOrder,
			]);
		}else{
			return Yii::$app->getResponse()->redirect('error');
		}
    }
	
	public function actionListReview($count){
		
		if (!Yii::$app->user->isGuest) {
			$countReview = ProductReview::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->count();
					
			$review = ProductReview::find()
					->joinWith(['product'])
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->orderBy(['date'=>SORT_DESC])	
					->Limit($count)
					->all();
			return $this->render('myorderpreview',[
				'countReview'=>$countReview,
				'review'=>$review,
			]);
		}else{
			return Yii::$app->getResponse()->redirect('error');
		}
	}
	
	public function actionMyorderpreview()
    {
		if (!Yii::$app->user->isGuest) {
			
			$countReview = ProductReview::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->count();
					
			$review = ProductReview::find()
					->joinWith(['product'])
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->orderBy(['date'=>SORT_DESC])	
					->Limit(5)
					->all();
			return $this->render('myorderpreview',[
				'countReview'=>$countReview,
				'review'=>$review,
			]);
		}else{
			return Yii::$app->getResponse()->redirect('error');
		}
    }
	public function actionAddressNew()
    {
		if (!Yii::$app->user->isGuest) {
			$modelAddress = new CustomerAddress();
			
			if(isset($_POST['street1']) && 
			$modelAddress->load(Yii::$app->request->post()) &&
			isset($_POST['province']) && 
			isset($_POST['city']) && 
			isset($_POST['postcode']) && 
			isset($_POST['telephone'])){
				
				$street2 = isset($_POST['street2']) ? $_POST['street2']:"";
				
				$city = explode(';',$_POST['city']);
				$province = explode(';',$_POST['province']);
				
				$modelAddress->idcustomer = Yii::$app->user->identity->idcustomer;
				$modelAddress->address = $_POST['street1'].' '.$street2;
				$modelAddress->city = $city[1];
				$modelAddress->idcity = $city[0];
				$modelAddress->province = $province[1];
				$modelAddress->idprovince = $province[0];
				$modelAddress->phone = $_POST['telephone'];
				$modelAddress->zip = $_POST['postcode'];
				
				$modelAddress->save();
				return Yii::$app->getResponse()->redirect('address-book');
			}else{
				return $this->render('address_new',[
					'modelAddress'=>$modelAddress,
				]);
			}
		}else{
			return Yii::$app->getResponse()->redirect('error');
		}
    }
}
