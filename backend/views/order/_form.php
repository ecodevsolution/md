<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4></div></h5>	
		<div class="col-md-6 col-xs-12">
		<section class="box-typical box-typical-max-280">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>Progress Status</h3>
						</div>
					</div>
				</header>
				<div class="box-typical-body jspScrollable" tabindex="0" style="overflow: hidden; padding: 0px; width: 1047px;">
					
				<div class="jspContainer" style="width: 1047px; height: 280px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 1035px;"><div class="table-responsive">
						<table class="table table-hover">
							<tbody>
								
								<tr>						
									<td><a href="#">#<?= $model->idorder; ?></a></td>									
									<td width="150">
										<?php
											if($model->status == 1){
												$value=10;
											}else if($model->status == 2){
												$value = 0;
											}else if($model->status == 3){
												$value = 30;
											}else if($model->status == 4){
												$value=60;
											}else if($model->status == 5){
												$value= 80;
											}else if($model->status == 6){
												$value = 100;
											}
										?> 
										<div class="progress-with-amount">
											<progress class="progress progress-no-margin" value="<?= $value ?>" max="100"><?= $value ?>%</progress>
											<div class="progress-with-amount-number"><?= $value ?>%</div>
										</div>
									</td>									
									<td>1.5000.000</td>
									<td nowrap="nowrap">
										<?php
											if($model->status == 1){
												echo"<div class='text-center '><span class='label label-warning'><i style='font-size:10px'>Awaiting Payment</i></span></div>";
											}else if($model->status == 2){
												echo"<div class='text-center '><span class='label label-danger'><i style='font-size:10px'>Order Rejected</i></span></div>";
											}else if($model->status == 3){
												echo"<div class='text-center '><span class='label label-success'><i style='font-size:10px'>Success</i></span></div>";
											}else if($model->status == 4){
												echo"<div class='text-center '><a href='?r=order/payment-confirmation&id=".$model->idorder."' class='label label-primary'><i style='font-size:10px'>Payment Confirmation</i></a></div>";
											}else if($model->status == 5){
												echo"<div class='text-center '><span class='label label-default'><i style='font-size:10px'>Order has Sent</i></span></div>";
											}else if($model->status == 6){
												echo"<div class='text-center '><span class='label label-success'><i style='font-size:10px'><i style='font-size:12px'>Order Received</i></span></div>";
											}
										?> 
									</td>						
								</tr>
								
								<?php foreach($status as $statuses): ?>
								<tr>
									<td><?= $statuses->date; ?></td>
									<td colspan="2"><?php
											if($statuses->status == 1){
												echo"<div class='text-center '><span class='label label-warning'><i style='font-size:12px'>Awaiting Payment</i></span></div>";
											}else if($statuses->status == 2){
												echo"<div class='text-center '><span class='label label-danger'><i style='font-size:12px'>Order Rejected</i></span></div>";
											}else if($statuses->status == 3){
												echo"<div class='text-center '><span class='label label-success'><i style='font-size:12px'>Success</i></span></div>";
											}else if($statuses->status == 4){
												echo"<div class='text-center '><a href='?r=order/payment-confirmation&id=".$model->idorder."' class='label label-primary'><i style='font-size:12px'>Payment Confirmation</i></a></div>";
											}else if($statuses->status == 5){
												echo"<div class='text-center '><span class='label label-default'><i style='font-size:12px'>Sent</i></span></div>";
											}else if($statuses->status == 6){
												echo"<div class='text-center '><span class='label label-success'><i style='font-size:12px'>Order Received</i></span></div>";
											}
										?> 
									</td>
									<td><?= $statuses->updateby; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>							
						</table>
						
					</div>
				</div>				
			</div>		
		</div><!--.box-typical-body-->
		<?php $form = ActiveForm::begin(); ?>
		<select name="status" class="form-control" style="width:70%;margin-bottom:10px;margin-left:20px" />
			<option value="">-Choose-</option>
			<option value="2">Rejected</option>
			<option value="3">Payment Success</option>
			<option value="4">Awaiting Payment Confirmation</option>
			<option value="5">Order Sent</option>
			<option value="6">Order Received</option>
		</select>
		<input type="hidden" name="order" value="<?= $model->idorder; ?>">
		<input type="submit" value="Process" class="btn btn-primary" style="margin-right:25px;right:0;bottom:30px;position: absolute;" />		
		<?php ActiveForm::end(); ?>
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
												<g clip-path="url(file:///D:/xampp/htdocs/Admin%20Panel/themesanytime.com/startui/demo/widgets.html#_ABSTRACT_RENDERER_ID_6)">
													<g>
														<rect x="30" y="184" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
														<rect x="30" y="155" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
														<rect x="30" y="126" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
														<rect x="30" y="97" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
														<rect x="30" y="68" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
														<rect x="30" y="39" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
														<rect x="30" y="10" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
													</g>
													<g>
														<rect x="37" y="179" width="23" height="5" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="73" y="156" width="23" height="28" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="109" y="171" width="23" height="13" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="145" y="181.716" width="23" height="2.783999999999992" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="181" y="144" width="23" height="40" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="217" y="168" width="23" height="16" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="253" y="171" width="23" height="13" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="289" y="179" width="23" height="5" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="325" y="164" width="23" height="20" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="361" y="139" width="23" height="45" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														<rect x="397" y="127" width="23" height="57" stroke="none" stroke-width="0" fill="#ac6bec"></rect>
														
													</g>
													<g>
														<rect x="30" y="184" width="400" height="1" stroke="none" stroke-width="0" fill="#eff1f2"></rect>
													</g>
													<!-- BEGIN GRAPHIC GARIS -->
													<g>
														<path d="M48.5,
																126.5L84.5,
																120.7L120.5,
																126.5L156.5,
																85.9L192.5,
																80.10000000000001L228.5,
																70.82000000000001L264.5,
																103.30000000000001L300.5,
																91.7L336.5,
																56.900000000000006L372.5,
																36.02000000000001L408.5,
																45.30000000000001L444.5" 															 
															stroke="#00a8ff" stroke-width="2" fill-opacity="1" fill="none">
														</path>													
													</g>
													<!-- END GRAPHIC GARIS -->
												</g>
												
												<!-- Bullets Graphic -->
												<g>
													<circle cx="48.5" cy="126.5" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="84.5" cy="120.7" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="120.5" cy="126.5" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="156.5" cy="85.9" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="192.5" cy="80.10000000000001" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="228.5" cy="70.82000000000001" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="264.5" cy="103.30000000000001" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="300.5" cy="91.7" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="336.5" cy="56.900000000000006" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="372.5" cy="36.02000000000001" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
													<circle cx="408.5" cy="45.30000000000001" r="3" stroke="none" stroke-width="0" fill="#00a8ff"></circle>
												
												</g>
												<!-- END BULLETS GRAPHIC-->
												
												<!-- BEGIN Huruf A-K -->
												<g>
													<g>
														<text text-anchor="middle" x="48.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">X</text>
													</g>
													<g>
														<text text-anchor="middle" x="84.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">F</text>
													</g>
													<g>
														<text text-anchor="middle" x="120.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">A</text>
													</g>
													<g>
														<text text-anchor="middle" x="156.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">B</text>
													</g>
													<g>
														<text text-anchor="middle" x="192.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">C</text>
													</g>
													<g>
														<text text-anchor="middle" x="228.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">D</text>
													</g>
													<g>
														<text text-anchor="middle" x="264.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">E</text>
													</g>
													<g>
														<text text-anchor="middle" x="300.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">O</text>
													</g>
													<g>
														<text text-anchor="middle" x="336.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">M</text>
													</g>
													<g>
														<text text-anchor="middle" x="372.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">N</text>
													</g>
													<g>
														<text text-anchor="middle" x="408.5" y="201.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">K</text>
													</g>
												
													<g>
														<text text-anchor="end" x="23.5" y="188.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">0</text>
													</g>
													<g>
														<text text-anchor="end" x="23.5" y="159.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">25</text>
													</g>
													<g>
														<text text-anchor="end" x="23.5" y="130.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">50</text>
													</g>
													<g>
														<text text-anchor="end" x="23.5" y="101.35" font-family="Proxima Nova" font-size="11" stroke="none" stroke-width="0" fill="#919fa9">75</text>
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
							<li>
								<div class="dot purple"></div>
								Success
							</li>
							<li>
								<div class="dot blue"></div>
								Failed
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>	
	<div class="col-md-6 col-xs-12">
		<section class="card card-blue-fill table-responsive">
			<header class="card-header">
				Shipping
				<button type="button" class="modal-close">
				<i class="font-icon-close-2"></i>
				</button>
			</header>
			<div class="card-block">
				<table class="table table-hover">
					<tr>
						<td>JNE</td>
						<td>Regular</td>
						<td>1kg</td>
						<td>Rp 10000</td>												
					</tr>
				</table>
			</div>
			
		</section>	
	</div>
	<div class="col-md-6 col-xs-12">
		<section class="card card-green table-responsive">
			<header class="card-header">
				Order Items
			</header>
			<div class="card-block">
				<table class="table table-hover">
					<tr>
						<td>JNE</td>
						<td>Regular</td>
						<td>1kg</td>
						<td>Rp 10000</td>												
					</tr>
				</table>
			</div>
			
		</section>	
	</div>
	<div class="col-md-6 col-xs-12">
		<section class="table-responsive">
			<header class="card-header">
				BANK PAYMENT
			</header>
			<div class="card-block">
				<table class="table table-hover">
					<tr>
						<td>BCA</td>
						<td>Muhamad Adinugraha</td>																				
					</tr>
				</table>
			</div>
			
		</section>	
	</div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idorder')->textInput() ?>

    <?= $form->field($model, 'idcustomer')->textInput() ?>

    <?= $form->field($model, 'idaddress')->textInput() ?>

    <?= $form->field($model, 'idinvoice')->textInput() ?>

    <?= $form->field($model, 'idshipping')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'account_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'sub_total')->textInput() ?>

    <?= $form->field($model, 'shipping')->textInput() ?>

    <?= $form->field($model, 'tax')->textInput() ?>

    <?= $form->field($model, 'grandtotal')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
