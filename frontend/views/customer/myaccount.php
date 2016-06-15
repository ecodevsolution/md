<?php
    /* @var $this yii\web\View */
	use frontend\models\Order;
	use frontend\models\CustomerAddress;
    $this->title = 'My Account';
?>

    
    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong><br />
                    You must have JavaScript enabled in your browser to utilize the functionality of this website.                
                </p>
            </div>
        </div>
    </noscript>
    <div class="page">
    </div>
    <div class="mobile-nav-overlay close-mobile-nav"></div>
    <div class="col2-left-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-9 f-right">
                    <div class="my-account">
                        <div class="dashboard">
                            <div class="page-title">
                                <h1>My Dashboard</h1>
                            </div>
                            <div class="welcome-msg">
                                <p class="hello"><strong>Hello, <?= $model->firstname.' '.$model->lastname; ?>!</strong></p>
                                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                            </div>
							<?php
								$count = Order::Find()
										->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
										->count();
								if($count > 0){
							?>
                            <div class="box-account box-recent">
                                <div class="box-head">
                                    <h2>Recent Orders</h2>
                                    <a href="order-all">View All</a>    
                                </div>
                                <table class="data-table" id="my-orders-table">
                                    <col width="1" />
                                    <col width="1" />
                                    <col />
                                    <col width="1" />
                                    <col width="1" />
                                    <col width="1" />
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Ship To</th>
                                            <th><span class="nobr">Order Total</span></th>
                                            <th>Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											foreach($order as $orders):
											
										?>
                                        <tr>
                                            <td><?php try{echo $orders->order->idorder; } catch(Exception $e){echo"-";};?></td>
                                            <td><span class="nobr"><?php try{echo $orders->order->date;} catch(Exception $e){echo "-";};?></span></td>
                                            <td><?php try{echo $orders->customerAddress->address;} catch(Exception $e){echo "-";};?></td>
                                            <td><span class="price"><?php try{echo $orders->customerAddress->address;} catch(Exception $e){echo "-";};?></span></td>
                                            <td><em><?php 
												try{
													if($orders->order->status == 1){
														echo"Unpaid";
														}
													else if($orders->order->status == 2){
														echo"Confirmation Process";
													}else if($orders->order->status == 3){
														echo"Payment Success";
													}else if($orders->order->status == 4){
														echo"Payment Failed";
													}else if($orders->order->status == 5){
														echo"Package Sent";
													}else if($orders->order->status == 6){
														echo"Package Delivered";
													}
												} catch(Exception $e){echo"-";};?></em></td>
                                            <td class="a-center">
                                                <span class="nobr">
                                                <a href="order-detail-<?php try{echo $orders->order->idorder; } catch(Exception $e){echo"-";};?>">View Order</a>
                                                </span>
                                            </td>
                                        </tr>
										<?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
							<?php }else{echo"";}?>
                            <div class="box-account box-info">
                                <div class="box-head">
                                    <h2>Account Information</h2>
                                </div>
                                <div class="col2-set">
                                    <div class="col-1">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>Contact Information</h3>
                                                <a href="edit-account">Edit</a>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                    <?= Yii::$app->user->identity->firstname ." ". Yii::$app->user->identity->lastname ?><br />
                                                    <?= Yii::$app->user->identity->email; ?><br />
                                                    <a href="edit-password">Change Password</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2-set">
								
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Address Book</h3>
                                            <a href="manage-address">Manage Addresses</a>
                                        </div>
										<?php
											$countA = CustomerAddress::find()
													->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
													->count();
											if($countA > 0){
										?>
                                        <div class="box-content">
											<?php
												$x = 0;
												foreach($address as $addrs):
												$x++;
											?>
                                            <div class="col-<?= $x ?>">
                                                <h4><?= $addrs->alias; ?></h4>
                                                <address>
                                                   <?= $addrs->address ?>,  <?= $addrs->city ?>, <?= $addrs->zip ?><br/>
                                                    <?= $addrs->province ?><br/>
                                                    <?php echo "T: ".$addrs->phone ?>
                                                    <br />
                                                    <a href="edit-address">Edit Address</a>
                                                </address>
                                            </div>
                                           <?php endforeach; ?>
                                        </div>
										<?php }else{?>
										<div class="box">
											<div class="box-content">
												<div class="col-1">
													<h4>Default Address</h4>
													<address>
														You have not set a default billing address.<br />
														<a href="edit-address">Edit Address</a>
													</address>
												</div>
											</div>
										</div>
										<?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-left sidebar f-left col-sm-3">
                    <div class="block block-account">
                        <div class="block-title">
                            <strong><span>My Account</span></strong>
                        </div>
                        <div class="block-content">
                            <ul>
                                <?php include"left_account.php"; ?>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>