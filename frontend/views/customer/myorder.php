<?php
/* @var $this yii\web\View */
$this->title = 'My Order';
?>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 f-right">
				<?php
					if($countOrder > 0 ){
				?>
                <div class="my-account">
                    <div class="page-title">
                        <h1>My Orders</h1>
                    </div>
                    <div class="pager">
                        <p class="amount">
                            <strong><?= $countOrder; ?> Item(s)</strong>
                        </p>
                        <div class="limiter">
                            <label>Show</label>
                            <select onchange="setLocation(this.value)">
								<option value="my-order-10" selected="selected">
                                    -          
                                </option>
                                <option value="my-order-10">
                                    10            
                                </option>
                                <option value="my-order-20">
                                    20            
                                </option>
                                <option value="my-order-30">
                                    50            
                                </option>
                            </select>
                            per page    
                        </div>
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
                                <th><span class="nobr">Order Status</span></th>
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
					
                    <script type="text/javascript">decorateTable('my-orders-table');</script>
                    
                    <div class="buttons-set">
                        <p class="back-link"><a href="myaccount"><small>&laquo; </small>Back</a></p>
                    </div>
                </div>
				<?php
					}else{
						echo"<ul class='messages'><li class='success-msg'><ul><li><span>There are no order, Please make an order first ..</span></li></ul></li></ul>";
					}
				?>
				
            </div>
            <div class="col-left sidebar f-left col-sm-3">
                <div class="block block-account">
                    <div class="block-title">
                        <strong><span>My Account</span></strong>
                    </div>
                    <div class="block-content">
                        <?php include"left_account.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>