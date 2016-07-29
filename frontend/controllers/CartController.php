<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\OrderItem;
use common\models\Product;
use yz\shoppingcart\ShoppingCart;
use frontend\models\CustomerAddress;
use frontend\models\Customer;
use frontend\models\UserForm;
use hok00age\RajaOngkir;
use  yii\web\Session;


class CartController extends \yii\web\Controller
{
    public function actionAdd($id)
    {		
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->put($product, 1);
			$cart = \Yii::$app->cart;
			$products = $cart->getPositions();
			$total = $cart->getCost();
            return $this->render('list', [
				'products' => $products,
				'total' => $total,
			]);
        }
    }
	public function actionAddCart()
    {		
		$order = new OrderItem();
        if ($order->load(Yii::$app->request->post())){			
			if ($order->validate()) {
				$id = $_POST['id'];
				$product = Product::findOne($id);
				if ($product) {
					\Yii::$app->cart->put($product, $order->qty);
					$cart = \Yii::$app->cart;
					$products = $cart->getPositions();
					$total = $cart->getCost();
					return $this->render('list', [
						'products' => $products,
						'total' => $total,
					]);
					var_dump($product);
				}				
			} else {
				Yii::$app->session->setFlash('error', 'quantity not valid !');
				return Yii::$app->getResponse()->redirect(Yii::$app->homeUrl.''.$_POST['sku'].'-'.str_replace(' ','_',strtolower($_POST['title'])));
			}
		}									
    }
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	public function actionCities(){
		$session = Yii::$app->session;
		
		if(isset($session['city'])){			
			unset($session['city']);				
		}else{
			$city = explode(';',$_GET['id']);
			$session['city'] = [
				'kodec' => $city[0],
				'namec' => $city[1],
			];
			echo $session['city']['kodec'];
		}
	}
    public function actionList()
    {
		if(isset($_POST['kurir'])){
			
			$session = Yii::$app->session;
			$service = explode(';',$_POST['service']);
			
			$session['shipping'] = [
					'zip' => $_POST['estimate_postcode'],
					'kode_city' => $session['city']['kodec'],
					'city_name' => $session['city']['namec'],
					'kode_prov' => $session['province']['kodep'],
					'name_prov' => $session['province']['namep'],
					'courier' => $_POST['kurir'],
					'service_price' => $service[0],
					'service_name' => $service[1],
				];
								
			$cart = \Yii::$app->cart;
	
			$products = $cart->getPositions();
			$total = $cart->getCost();
			
			return $this->render('list', [
				'products' => $products,
				'total' => $total,
			]);
		}else{
			/* @var $cart ShoppingCart */
			$cart = \Yii::$app->cart;
	
			$products = $cart->getPositions();
			$total = $cart->getCost();
	
			return $this->render('list', [
			'products' => $products,
			'total' => $total,
			]);
		}
    }

    public function actionRemove($id)
    {
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->remove($product);
            $this->redirect(['cart/list']);
        }
    }

    public function actionUpdate($id, $quantity)
    {
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->update($product, $quantity);
            $this->redirect(['cart/list']);
        }
    }

	public function actionCheckout()
	{	
		$cart = \Yii::$app->cart;
        $products = $cart->getPositions();
		$model = new Customer();
		$order = new Order();		
		$modelAddress = new CustomerAddress();
		
		 if ($model->load(Yii::$app->request->post()) && $order->load(Yii::$app->request->post()) && $modelAddress->load(Yii::$app->request->post())){
			 
			 $session = Yii::$app->session;
			 
			 $model->password_hash = Yii::$app->security->generatePasswordHash("-");
			 $model->created_at = date("dmy");
			 $model->is_guest = 1;
			 $model->generateAuthKey();
			 $model->status = 0;
			 $model->titles = $_POST['titles'];
			 $model->save(); 
			 
			 
			 $modelAddress->idcustomer = $model->idcustomer;
			 $modelAddress->alias = 'My Address';
			 $modelAddress->zip = $session['shipping']['zip'];
			 $modelAddress->city = $session['shipping']['city_name'];
			 $modelAddress->province = $session['shipping']['name_prov'];
			 $modelAddress->save(); 
			// var_dump($modelAddress);
			
			
			
			 $cart = \Yii::$app->cart;
		 
			 /* @var $products Product[] */
			 $products = $cart->getPositions();
			 $total = $cart->getCost() + $session['shipping']['service_price'];
			 
			 $idorder = rand(1111111111,9999999999);
			 $order->idorder = $idorder;
			 $order->idcustomer = $model->idcustomer;
			 $order->idaddress = $modelAddress->idaddress;
			 $order->idinvoice  = $modelAddress->idaddress;
			 $order->idshipping = $session['shipping']['courier'];
			 $order->sub_total = $cart->getCost();
			 $order->shipping = $session['shipping']['service_price'];
			 $order->tax = 0;
			 $order->grandtotal = $total;
			 $order->status = 1;
			 $order->date = date("Y-m-d H:i:s");			 
			 $order->save();
			 
			 foreach($products as $product) {
				$orderItem = new OrderItem();
				$orderItem->order_id = $order->idorder;
				$orderItem->discount = $product->discount;
				$orderItem->price = $product->getPrice();
				$orderItem->product_id = $product->id;
				$orderItem->qty = $product->getQuantity();
				$orderItem->save(false);
			}
			 \Yii::$app->cart->removeAll();
			 $session->remove('shipping');
			 $session->remove('city');
			 $session->remove('province');
			return $this->render('orderfinal',[
				'idorder'=>$idorder
				]);
		}else{
			return $this->render('checkout',[
				'products'=>$products,
				'model'=>$model,
				'order'=>$order,
				'modelAddress' => $modelAddress,
			]);
			
		}
	}

	public function actionListCity(){	
		
		$id = explode(';',$_GET['id']);
		$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
		$cities = $client->getCity($id[0],null);																			
		$json =  $cities->raw_body;
		$data = json_decode($json, true);
			echo"<label id='labelcity' class='required'><em>*</em>City</label>";
			echo"<select name='city' id='cities' class='cities'>";
				foreach ($data['rajaongkir']['results'] as $field => $value):
					echo "<option value='"?><?= $data['rajaongkir']['results'][$field]['city_id'].';'.$data['rajaongkir']['results'][$field]['city_name'];?><?php echo "'> ";?><?= $data['rajaongkir']['results'][$field]['city_name']; ?></option><?php echo"";
				endforeach;
			echo"</select>";
			
		$session = Yii::$app->session;
		$session['province'] = [
				'kodep' => $id[0],
				'namep' => $id[1],
				];
		
			//<option>-</option>";
			
		//echo $id[1];
	
	}
	
	public function actionPrice(){	
		$session = Yii::$app->session;

		$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
		$user = UserForm::find()
				->limit(1)
				->orderBy(['id'=>SORT_DESC])
				->One();
		$city = explode(';',$_GET['cities']);
		$session['city'] = [
			'kodec' => $city[0],
			'namec' => $city[1],
		];

		$cost = $client->getCost($user->idcity, $session['city']['kodec'], 1000, $_GET['id']);
		$json =  $cost->raw_body;
		$data = json_decode($json, true);
		if($_GET['id'] == "tiki"){
			$class = "width:127px;height:34px;float:right;margin-top:39px;";			
		}else{
			$class = "width:127px;height:34px;float:right;margin-top:39px;";			
		}
		echo"<select name='service' style='$class;' class='form-control' id='service'>";
			echo"<option>- Choose - </option>";
		foreach ($data['rajaongkir']['results'] as $field => $value):		
				foreach($value['costs'] as $costs):					
						foreach($costs['cost'] as $cost):
							if($costs['service'] == 'CTCOKE'){
								$service = 'OKE';
							}else if($costs['service'] == 'CTCYES'){
								$service = 'YES';
							}else if($costs['service'] == 'CTC'){
								$service = 'REG';
							}else if($costs['service'] == 'CTCSPS'){
								$service = 'SPS';
							}else{
								$service = $costs['service'];
							}
							echo "<option value=". $cost['value'] .';'.$service.">" .$service.' - '. $cost['value']. "</option>";									
						endforeach;				
				endforeach;
			endforeach;			
		echo"</select>";
		
	}
	
	
	public function actionReviewOrder(){
		$cart = \Yii::$app->cart;
        $products = $cart->getPositions();
		$total = $cart->getCost();

		if(isset($_POST['bank'])){
			$session = Yii::$app->session;
			$session['payments'] = [
					'service' => $_POST['service'],
					'kurir' => $_POST['kurir'],
					'bank' => $_POST['bank'],
					'accountname' => $_POST['accountname'],
				];
		//var_dump($session['payment']['']);	
		return $this->render('orderreview',[
				'products'=>$products,
				'total'=>$total,
			]);
		}else{
			return $this->render('orderreview',[
				'products'=>$products,
				'total'=>$total,
			]);
			
		}

	}
	
	public function actionOrderFinal()
    {
        $order = new Order();
        $orderpaymment = new Order();
		$customer = new Customer();
		$modelAddress = new CustomerAddress();
		$session = Yii::$app->session;
		
		$customer->titles = $session['guest']['titles'];
		$customer->firstname = $session['guest']['firstname'];
		$customer->lastname = $session['guest']['lastname'];
		$customer->email = $session['guest']['email'];
		$customer->password_hash = Yii::$app->security->generatePasswordHash("-");
		$customer->created_at = date("dmy");
		$customer->is_guest = $session['guest']['is_guest'];
		$customer->generateAuthKey();
		$customer->status = 0;
		$customer->save();
		
		$loopcustomer = Customer::find()
					  ->limit(1)
					  ->orderBy(['idcustomer'=>SORT_DESC])
					  ->One();
		$modelAddress->idcustomer = $loopcustomer->idcustomer;
		$modelAddress->address = $session['guest']['address'];
		$modelAddress->alias = $session['guest']['alias'];
		$modelAddress->zip = $session['guest']['zip'];
		$modelAddress->city = $session['city'];
		$modelAddress->province = $session['province'];
		$modelAddress->phone = $session['guest']['phone'];
		
		$loopaddress = CustomerAddress::find()
					  ->limit(1)
					  ->orderBy(['idaddress'=>SORT_DESC])
					  ->One();
		
		
		$modelAddress->save();
		
		
		//var_dump($modelAddress);
        $cart = \Yii::$app->cart;
    
        /* @var $products Product[] */
        $products = $cart->getPositions();
        $total = $session['grandtotal'];
		
		$idorder = rand(1111111111,9999999999);
		$order->idorder = $idorder;
		$order->idcustomer = $loopcustomer->idcustomer;
		$order->idaddress = $loopaddress->idaddress;
		if(isset($_POST['invoice'])){
			$order->idinvoice = $_POST['invoice'];
		}
		$order->idinvoice  = $loopaddress->idaddress;
		$order->idshipping = $session['payments']['kurir'];
		$order->bank = $session['payments']['bank'];
		$order->account_name = $session['payments']['accountname'];
		$order->sub_total = $cart->getCost();
		$order->shipping = $session['payments']['service'];
		$order->tax = ($cart->getCost() / 100) * 10;
		$order->grandtotal = $session['grandtotal'];
		$order->status = 1;
		$order->date = date("Y-m-d H:i:s");
		
		$order->save();
		
		foreach($products as $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $idorder;
            $orderItem->discount = $product->discount;
            $orderItem->price = $product->getPrice();
            $orderItem->product_id = $product->id;
            $orderItem->qty = $product->getQuantity();
			$orderItem->save(false);
        }

        \Yii::$app->cart->removeAll();
		$session->remove('payments');
		$session->remove('guest');
		$session->remove('city');
		$session->remove('province');

		
        //\Yii::$app->session->addFlash('success', '<h2>Terima Kasih Telah Berbelanja di Maridagang</font></h2> <h3>Nomor Order Anda adalah</h3> <button class="btn btn-warning"><h4><b>'.$idorder.'</h4></b></button>');
		
		return Yii::$app->getResponse()->redirect("?r=cart/finish&order=".$idorder."");

    }
	public function actionFinish($order){
		
		return $this->render('orderfinal');
	}
    public function actionOrder()
    {
        $order = new Order();
        $orderpaymment = new Order();
		$modelAddress = new CustomerAddress();
		$model = new Customer();
		
        $cart = \Yii::$app->cart;

        /* @var $products Product[] */
        $products = $cart->getPositions();
        $total = $cart->getCost();

        if ($order->load(\Yii::$app->request->post()) ) {
            $transaction = $order->getDb()->beginTransaction();
            $order->save(false);

            foreach($products as $product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->title = $product->title;
                $orderItem->price = $product->getPrice();
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $product->getQuantity();
                if (!$orderItem->save(false)) {
                    $transaction->rollBack();
                    \Yii::$app->session->addFlash('error', 'Cannot place your order. Please contact us.');
                    return $this->redirect('catalog-list');
                }
            }

            $transaction->commit();
            \Yii::$app->cart->removeAll();

            \Yii::$app->session->addFlash('success', 'Thanks for your order. We\'ll contact you soon.');
            $order->sendEmail();

            return $this->redirect('catalog-list');
        }

        return $this->render('order', [
            'order' => $order,
            'model' => $model,
			'modelAddress'=>$modelAddress,
            'products' => $products,
            'total' => $total,
		
        ]);
    }
}
