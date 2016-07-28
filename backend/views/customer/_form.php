<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\CustomerAddress;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12 card">
    <h5 class="m-t-lg with-border">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4>
        </div>
    </h5>
    <div class="col-md-6 col-xs-12">
		<section class="table-responsive card">
            <header class="card-header">
                Account Information
            </header>
            <div class="card-block">
                <table class="table table-hover">
                    <tr>
						<td>
                            <?php
                                if($customer->is_guest == 1){
                                	echo"<div class='text-center '> <span style='color:#46c35f;' class='fa fa-check'></span></div>";
                                }else{
                                	echo"<div class='text-center '> <span style='color:#c50009;' class='fa fa-times'></span></div>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($customer->titles == 1){
                                	echo"<div class='text-center '> <span style='color:#46c35f;'>Male</span></div>";
                                }else{
                                	echo"<div class='text-center '> <span style='color:#c50009;'>Female</span></div>";
                                }
                                ?>
                        </td>
                        <td><?= ucwords(strtolower($customer->firstname)).' '.ucwords(strtolower($customer->lastname)); ?></td>
                        <td> <?= $customer->bod; ?></td>                        
                        <td class="table-date">
                            <?php
                                if($customer->status == 10){
                                	echo"<div class='text-center '> <span style='color:#46c35f;' class='fa fa-check'></span></div>";
                                }else{
                                	echo"<div class='text-center '> <span style='color:#c50009;' class='fa fa-times'></span></div>";
                                }
                                ?> 
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
    <div class="col-md-6 col-xs-12">
        <section class="widget widget-chart-combo">
            <div class="table-responsive">
                <div class="widget-chart-combo-content">
                    <div class="widget-chart-combo-content-in">
                        <div class="widget-chart-combo-content-title">Order Graphic Customer</div>
                        <div id="chart_div" class="chart">
                            <div style="position: relative;">
                                <div dir="ltr" style="position: relative; width: 400; height: 210px;">
                                    <div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;">
                                        <svg width="433" height="210" aria-label="A chart." style="overflow: hidden;">
                                            <defs id="defs">
                                                <clipPath id="_ABSTRACT_RENDERER_ID_6">
                                                    <rect x="30" y="10" width="433" height="175"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect x="0" y="0" width="400" height="210" stroke="none" stroke-width="0" fill="#ffffff"></rect>
                                            <g>
                                                <rect x="30" y="10" width="433" height="175" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                                                <g clip-path="url()">
													<!-- BEGIN GARIS -->
                                                    <g>
                                                        <rect x="30" y="184" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                        <rect x="30" y="155" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                        <rect x="30" y="126" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                        <rect x="30" y="97" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                        <rect x="30" y="68" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                        <rect x="30" y="39" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                        <rect x="30" y="10" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                    </g>
													<!-- END GARIS -->
													
													<!-- BEGIN BALOK GRAPH -->
													
                                                    <g>
														<?php
															foreach($graph as $graphs):
															
															if($graphs['jml'] == 0){
																$y = 184;
																$h = 0;
															}else if($graphs['jml'] == 1){
																$y = 180;
																$h = 5;
															}else if($graphs['jml'] == 2){
																$y = 174;
																$h = 11;
															}else if($graphs['jml'] == 3){
																$y = 168;
																$h = 17;
															}else if($graphs['jml'] == 4){
																$y = 162;
																$h = 23;
															}else if($graphs['jml'] == 5){
																$y = 156;
																$h = 29;
															}else if($graphs['jml'] == 6){
																$y = 150;
																$h = 35;
															}else if($graphs['jml'] == 7){
																$y = 144;
																$h = 41;
															}else if($graphs['jml'] == 8){
																$y = 138;
																$h = 47;
															}else if($graphs['jml'] == 9){
																$y = 132;
																$h = 53;
															}else if($graphs['jml'] == 10){
																$y = 126;
																$h = 59;
															}else if($graphs['jml'] == 11){
																$y = 122;
																$h = 63;
															}else if($graphs['jml'] == 12){
																$y = 116;
																$h = 69;
															}else if($graphs['jml'] == 13){
																$y = 110;
																$h = 75;
															}else if($graphs['jml'] == 14){
																$y = 104;
																$h = 81;
															}else if($graphs['jml'] == 15){
																$y = 98;
																$h = 87;
															}else if($graphs['jml'] == 16){
																$y = 92;
																$h = 93;
															}else if($graphs['jml'] == 17){
																$y = 86;
																$h = 99;
															}else if($graphs['jml'] == 18){
																$y = 80;
																$h = 105;
															}else if($graphs['jml'] == 19){
																$y = 74;
																$h = 111;
															}else if($graphs['jml'] == 20){
																$y = 68;
																$h = 117;
															}else if($graphs['jml'] == 21){
																$y = 64;
																$h = 121;
															}else if($graphs['jml'] == 22){
																$y = 58;
																$h = 127;
															}else if($graphs['jml'] == 23){
																$y = 52;
																$h = 133;
															}else if($graphs['jml'] == 24){
																$y = 46;
																$h = 139;
															}else if($graphs['jml'] == 25){
																$y = 40;
																$h = 145;
															}else if($graphs['jml'] == 26){
																$y = 34;
																$h = 151;
															}else if($graphs['jml'] == 27){
																$y = 28;
																$h = 157;
															}else if($graphs['jml'] == 28){
																$y = 22;
																$h = 163;
															}else if($graphs['jml'] == 29){
																$y = 16;
																$h = 169;
															}else if($graphs['jml'] <= 30){
																$y = 10;
																$h = 175;
															}
															
															
															if($graphs['date'] == 1){
														?>
																<rect x="37" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 2){ ?>
																<rect x="73" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 3){ ?>
																<rect x="109" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 4){ ?>
																<rect x="145" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 5){ ?>
																<rect x="181" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 6){ ?>
																<rect x="217" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 7){ ?>
																<rect x="253" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 8){ ?>
																<rect x="289" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 9){ ?>
																<rect x="325" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 10){ ?>
																<rect x="361" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }else if($graphs['date'] == 11){ ?>
																<rect x="397" y="<?= $y; ?>" width="23" height="<?= $h; ?>" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
															<?php }?>
														<?php endforeach; ?>
                                                    </g>
													<!-- END BALOK GRAPH -->
													
                                                    <g>
                                                        <rect x="30" y="184" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
                                                    </g>
													
                                                    
													
                                                </g>
                                                
                                                <!-- BEGIN Huruf A-K -->
                                                <g>
                                                    <g>
                                                        <text text-anchor="middle" x="48.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Jan</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="84.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Feb</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="120.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Mar</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="156.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Apr</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="192.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">May</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="228.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Jun</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="264.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Jul</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="300.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Aug</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="336.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Sep</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="372.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Oct</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="middle" x="408.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">Nov</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="end" x="23.5" y="188.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">0</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="end" x="23.5" y="159.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">5</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="end" x="23.5" y="130.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">10</text>
                                                    </g>
                                                    <g>
                                                        <text text-anchor="end" x="23.5" y="101.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">15</text>
                                                    </g>
													<g>
                                                        <text text-anchor="end" x="23.5" y="72.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">20</text>
                                                    </g>
													<g>
                                                        <text text-anchor="end" x="23.5" y="43.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">25</text>
                                                    </g>
													<g>
                                                        <text text-anchor="end" x="23.5" y="14.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">> 30</text>
                                                    </g>
                                                </g>
                                                <!-- END Huruf A-K -->
                                            </g>
                                            <g></g>
                                        </svg>
                                        <div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>value1</th>
                                                        <th>value2</th>
                                                        <th>value3</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>X</td>
                                                        <td>5</td>
                                                        <td>50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>F</td>
                                                        <td>25</td>
                                                        <td>55</td>
                                                    </tr>
                                                    <tr>
                                                        <td>A</td>
                                                        <td>12</td>
                                                        <td>50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>B</td>
                                                        <td>3</td>
                                                        <td>85</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C</td>
                                                        <td>35</td>
                                                        <td>90</td>
                                                    </tr>
                                                    <tr>
                                                        <td>D</td>
                                                        <td>15</td>
                                                        <td>98</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E</td>
                                                        <td>12</td>
                                                        <td>70</td>
                                                    </tr>
                                                    <tr>
                                                        <td>O</td>
                                                        <td>5</td>
                                                        <td>80</td>
                                                    </tr>
                                                    <tr>
                                                        <td>M</td>
                                                        <td>18</td>
                                                        <td>110</td>
                                                    </tr>
                                                    <tr>
                                                        <td>N</td>
                                                        <td>40</td>
                                                        <td>128</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div aria-hidden="true" style="display: none; position: absolute; top: 220px; left: 473px; white-space: nowrap; font-family: &quot;Proxima Nova&quot;; font-size: 11px;">...</div>
                                <div></div>
                            </div>
                        </div>
                        <ul class="chart-legend-list">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
	<?php
		$addr = CustomerAddress::find()
				->where(['idcustomer'=>$customer->idcustomer])
				->all();
		foreach($addr as $addrs):
	?>
	<div class="col-md-6 col-xs-12">
        <section class="table-responsive card">
            <header class="card-header">
               <?= $addrs->alias; ?>
            </header>
            <div class="card-block">
                				
				<p><?= $addrs->address; ?>, 
				<?= $addrs->province; ?>, 
				<?= $addrs->city; ?>, 
				<?= $addrs->zip; ?></p>
				<p><?= $addrs->phone; ?></p>
				
            </div>
        </section>
    </div> 
	<?php endforeach; ?>	
</div>