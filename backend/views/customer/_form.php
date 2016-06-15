<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\web\View;
use backend\models\CustomerAddress;
use backend\models\City;
/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */


$root = '@web';
$this->registerJsFile($root."/js/plugins.js",		
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_HEAD]);  

$this->registerJsFile($root."/js/step-form-wizard/js/step-form-wizard.js",
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_END]);

?>

<div class="user-form-form">
	<div class="col-lg-12">
		<div class="tab-content">
			<div class="tab-pane active" id="style">
				<!-- Circle -->	
				<?php 
					$form = ActiveForm::begin([
					'options'=>[
								'enctype'=>'multipart/form-data',
								'data-style'=>'circle',
								'role'=>'form',
								'class'=>'wizard',
								'id' => 'dynamic-form']
								
								]); 
				?>
				
				<div class="wizard-div current wizard-circle">
					<fieldset>
						<legend>Customer Information</legend>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><strong>Customer</strong> Information</h3>
		
									</div>
									<div class="panel-body">
										<div class="form-group">
											<?= $form->field($model, 'titles')->dropDownList(['1'=>'Mr.', '2'=>'Mrs.'],
												['prompt'=>'- Choose -'])->label('Titles');				 
											?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'firstname')->textInput(['maxlength' => 255])->label('First Name') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'lastname')->textInput(['maxlength' => 255])->label('Last Name') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'password_hash')->passwordInput()->label('Password') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'status')->dropDownList(['1'=>'Enable', '0'=>'Disable'],
												['prompt'=>'- Choose -'])->label('Enable');				 
											?>
										</div>

									
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Customer Address</legend>
						<?php
							if(isset($_GET['id'])){
								$idcustomer = $_GET['id'];
								$addr   = CustomerAddress::find()
									  ->where(['idcustomer' => $idcustomer])
									  ->all();
							
							foreach($addr as $addrs):
						?>
								<div class="item panel panel-default"><!-- widgetBody -->
									<div class="panel-heading">
										<h3 class="panel-title pull-left">Current Address</h3>
										<div class="pull-right">
										   <?= Html::a('', ['deladdress', 'id' => $addrs->idcustomer], ['class' => 'glyphicon glyphicon-minus']) ?>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12">
												<?= $form->field($addrs, 'city')->textInput(['readonly' => true]) ?>
											</div>
											<div class="col-sm-12">
												<?= $form->field($addrs, 'province')->textInput(['readonly' => true]) ?>
											</div>
											<div class="col-sm-12">
												<?= $form->field($addrs, 'zip')->textInput(['readonly' => true]) ?>
											</div>
											<div class="col-sm-12">
												<?= $form->field($addrs, 'address')->textInput(['readonly' => true]) ?>
											</div>
											<div class="col-sm-12">
												<?= $form->field($addrs, 'aias')->textInput(['readonly' => true]) ?>
											</div>
											<div class="col-sm-12">
												<?= $form->field($addrs, 'phone')->textInput(['readonly' => true]) ?>
											</div>
										</div><!-- .row -->
									</div>
								</div>
								<?php endforeach; } ?>
								<div class="panel panel-default">
									<div class="panel-heading"><h4><i class="glyphicon glyphicon-tag"></i> Address </h4></div>
									<div class="panel-body">
										 <?php DynamicFormWidget::begin([
											'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
											'widgetBody' => '.container-items', // required: css class selector
											'widgetItem' => '.item', // required: css class
											'limit' => 4, // the maximum times, an element can be cloned (default 999)
											'min' => 1, // 0 or 1 (default 1)
											'insertButton' => '.tmbh-item', // css class
											'deleteButton' => '.dlt-item', // css class
											'model' => $address[0],
											'formId' => 'dynamic-form',
											'formFields' => [												
												'city',
												'province',
												'zip',
												'address',
												'alias',
												'phone',
											],
										]); ?>

										<div class="container-items"><!-- widgetContainer -->
										<?php foreach ($address as $i => $addresss): ?>
											<div class="item panel panel-default"><!-- widgetBody -->
												<div class="panel-heading">
													<h3 class="panel-title pull-left">Add Address</h3>
													<div class="pull-right">
														<button type="button" class="tmbh-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
														<button type="button" class="dlt-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="panel-body">
													<?php
														// necessary for update action.
														if (! $addresss->isNewRecord) {
															echo Html::activeHiddenInput($addresss, "[{$i}]idcontactuser");
														}
													?>
													<div class="row">
														<div class="col-sm-12">
															<div class="form-group">
																<?= $form->field($addresss, "[{$i}]city")->dropDownList(
																	ArrayHelper::map(CustomerAddress::find()->all(),'idcity', 'city_name'),
																	['prompt'=>'- Choose -',
																	'onchange'=>'
																		$.post("index.php?r=product/lists&id='.'"+$(this).val(), function( data ) {
																		$( "select#customeraddress-0-province" ).html( data );
																		});
																	'])->label('City');
										
															?>
															</div>
							
															<div class="form-group">
																<?= $form->field($addresss, "[{$i}]province")->dropDownList(
																	['prompt'=>'- Choose -',
																	
																	])->label('Province');
																?>
															</div>
										
														</div>
													</div><!-- .row -->
												</div>
											</div>
										<?php endforeach; ?>
										</div>
										<?php DynamicFormWidget::end(); ?>
									</div>
								</div>
					</fieldset>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
				