<?php

namespace backend\controllers;

use Yii;
use backend\models\Order;
use backend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\OrderStatus;
use backend\models\OrderItem;


/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {	
		$connection = \Yii::$app->db;
		$sql = $connection->createCommand("SELECT a.idorder,a.status as st,a.grandtotal, a.idshipping,a.bank,a.date, b.*,c.*  FROM `order` a 
										  JOIN `customer_address` b ON a.idinvoice = b.idaddress 
										  join customer c on a.idcustomer = c.idcustomer where a.status in (1,3,4,5) order by urutan DESC");
									
		$model = $sql->queryAll();		
        return $this->render('index', [
            'model' => $model,            
        ]);
    }
	
    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idorder]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$status = OrderStatus::find()
				->where(['idorder'=>$id])
				->orderBy(['idstatus'=>SORT_DESC])
				->Limit(3)
				->all();
		$item = OrderItem::find()				
				->joinWith('product')
				->where(['order_id'=>$id])
				->all();
		$customer = Order::find()
				->joinWith('customer')
				->where(['idorder'=>$id])
				->all();
				
		$connection = \Yii::$app->db;
		$sql = $connection->createCommand("select month(date) as date, count(*) as jml 
										   from `order` where idcustomer = '".$model->idcustomer."' 
										   and year(date) = year(now()) group by month(date)");
									
		$graph = $sql->queryAll();
		
		if(isset($_POST['status'])){
			$add = new OrderStatus();
			$add->idorder = $id;
			$add->status = $_POST['status'];
			$add->date = date('Y-m-d');
			$add->updateby = Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname;
			$add->save();
			
			$model->status = $_POST['status'];
			$model->save();
			
			$status = OrderStatus::find()
				->where(['idorder'=>$id])
				->orderBy(['idstatus'=>SORT_DESC])
				->Limit(3)
				->all();
		}
        if ($model->load(Yii::$app->request->post())){
			
			$model->save();
            return $this->redirect(['view', 'id' => $model->idorder]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'status' => $status,
				'item'=>$item,
				'customer'=>$customer,
				'graph' => $graph,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
