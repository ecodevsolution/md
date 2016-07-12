<?php

namespace backend\controllers;

class OrderHistoryController extends \yii\web\Controller
{
    public function actionIndex()
    {	
		$connection = \Yii::$app->db;
		$sql = $connection->createCommand("SELECT a.idorder,a.status as st,a.grandtotal, a.idshipping,a.bank,a.date, b.*,c.*  FROM `order` a 
										  JOIN `customer_address` b ON a.idinvoice = b.idaddress 
										  join customer c on a.idcustomer = c.idcustomer where a.status in(6,2) order by urutan DESC");
									
		$model = $sql->queryAll();		
        return $this->render('index', [
            'model' => $model,            
        ]);
    }

}
