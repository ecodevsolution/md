<?php

namespace backend\controllers;

use Yii;
use backend\models\UserForm;
use hok00age\RajaOngkir;
use  yii\web\Session;
use yii\web\Uploadedfile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;



class StoreController extends \yii\web\Controller
{
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
    public function actionIndex()
    {
		$model = UserForm::find()
				->where(['idrole'=>1])
				->One();
		$look = UserForm::findOne($model->id);
		
		if ($model->load(Yii::$app->request->post())){
			
			$model->logo=UploadedFile::getInstance($model,'logo');
			$imageName = md5(uniqid($model->logo));	
			
			if(empty($model->logo)){					
				$model->logo = $look->logo;
				$province = explode(";",$_POST['province']);
				$city = explode(";",$_POST['city']);
				
				$model->idprovince = $province[0];
				$model->province = $province[1];
				$model->idcity = $city[0];
				$model->city = $city[1];
				
				$model->save();
				
			}else if(isset($model->logo)){
				$models = UserForm::findOne($model->id);
				unlink('../../img/logo/' . $models->logo);	
			
				$model->logo->saveAs('../../img/temp/'.$imageName. '.'.$model->logo->extension );
				$model->logo= $imageName. '.'.$model->logo->extension;
				
				Image::frame('../../img/temp/'.$model->logo.'', 0, 'FFF', 0)
				->rotate(0)
				->resize(new Box(111,51))
				->save('../../img/logo/'.$model->logo.'', ['quality' => 100]);
		
				unlink('../../img/temp/' . $model->logo);	
				
				$province = explode(";",$_POST['province']);
				$city = explode(";",$_POST['city']);
				
				$model->idprovince = $province[0];
				$model->province = $province[1];
				$model->idcity = $city[0];
				$model->city = $city[1];
				
				$model->save();
				
			}
			
			
			return $this->render('index',[
				'model' => $model,		
			]);
		}else{
			return $this->render('index',[
				'model' => $model,		
			]);
		}
    }
	
	public function actionListCity(){	
		
		$id = explode(';',$_GET['id']);
		$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
		$cities = $client->getCity($id[0],null);																			
		$json =  $cities->raw_body;
		$data = json_decode($json, true);
			echo"<label id='labelcity' class='required'><em></em>City</label>";
			echo"<select name='city' id='cities' class='form-control'>";
				foreach ($data['rajaongkir']['results'] as $field => $value):
					echo "<option value='"?><?= $data['rajaongkir']['results'][$field]['city_id'].';'.$data['rajaongkir']['results'][$field]['city_name'];?><?php echo "'> ";?><?= $data['rajaongkir']['results'][$field]['city_name']; ?></option><?php echo"";
				endforeach;
			echo"</select>";
			echo"<br/>";
	
	}

}
