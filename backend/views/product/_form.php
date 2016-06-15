<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Brand;
use backend\models\Image;
use backend\models\MainCategory;
use backend\models\SubCategory;
use dosamigos\tinymce\TinyMce;
use yii\web\View;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $model common\models\Product */
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
						<legend>Product Information</legend>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><strong>Product</strong> Information</h3>
		
									</div>
									<div class="panel-body">
										<div class="form-group">
											<?= $form->field($model, 'title')->textInput(['maxlength' => 255])->label('Product Name')?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'sku')->textInput(['maxlength' => 255])->label('SKU') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'idbrand')->dropDownList(
													ArrayHelper::map(Brand::find()->all(),'idbrand', 'brand_name'),
													['prompt'=>'- Choose -']
												)->label('Brand')
											?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'short_description')->textarea(['rows' => 6])->label('Short Description') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'description')->widget(TinyMce::className(), [
													'options' => ['rows' => 6],
													'language' => 'en_GB',
													'clientOptions' => [
														'plugins' => [
															"advlist autolink lists link charmap print preview anchor",
															"searchreplace visualblocks code fullscreen",
															"insertdatetime media table contextmenu paste"
														],
														'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
													]
												])->label('Description');
											?>
											
										</div>
										<div class="form-group">
											<?= $form->field($model, 'tag')->textInput(['maxlength' => 255])->label('Tags') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'status')->dropDownList(['1'=>'Enable', '0'=>'Disable',
													'prompt'=>'- Choose -']
												)->label('status');
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
						<legend>Product Category</legend>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><strong>Product</strong> Category</h3>
		
									</div>
									<div class="panel-body">
										<div class="form-group">
											<?= $form->field($model, 'idmain')->dropDownList(
												ArrayHelper::map(MainCategory::find()->all(),'idmain', 'main_category_name'),
												['prompt'=>'- Choose -',
												'onchange'=>'
													$.post("index.php?r=product/lists&id='.'"+$(this).val(), function( data ) {
													$( "select#product-idsub" ).html( data );
													});
												'])->label('Category');
					
										?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'idsub')->dropDownList(
												ArrayHelper::map(SubCategory::find()->all(),'idsubcategory', 'sub_category_name'),
												['prompt'=>'- Choose -',
												'onchange'=>'
													$.post("index.php?r=product/detail&id='.'"+$(this).val(), function( data ) {
													$( "select#product-iddetail" ).html( data );
													});
												'])->label('Sub Category');
					
										?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'iddetail')->dropDownList(
												['prompt'=>'- Choose -',
												
												])->label('Detail Category');
										?>
										</div>
										
										<div class="form-group">
											<?= $form->field($model, 'sale')->dropDownList(['1'=>'SALE', '0'=>'NO',
												'prompt'=>'- Choose -',
												
												])->label('SALE');
										?>
										</div>
										
										<div class="form-group">
											<?= $form->field($model, 'condition')->dropDownList(['1'=>'NEW', '0'=>'Refurbish',
												'prompt'=>'- Choose -',
												
												])->label('CONDITION');
										?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
						<legend>Price Rules</legend>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><strong>Price</strong> Rules</h3>

									</div>
									<div class="panel-body">
										<div class="form-group">
											<?= $form->field($model, 'price')->textInput()->label('Price') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'tax')->textInput()->label('Tax(%)') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'discount')->textInput()->label('Discount(%)') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'minqty')->textInput()->label('Minimal Qty') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'maxqty')->textInput()->label('Maximal Qty') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'weight')->textInput()->label('Weight(kgs)') ?>
										</div>
										<div class="form-group">
											<?= $form->field($model, 'stock')->textInput()->label('Stock') ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
						<legend>Product Image</legend>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-body"> 
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Product Image</label>
											<div class="col-md-12 col-xs-12">
											<?php
												if(isset($_GET['id'])){
													$idimg = $_GET['id'];
													$img   = Image::find()
														->where(['product_id' => $idimg])
														->all();
												
												foreach($img as $imgs):
											?>
											<div class="item panel panel-default"><!-- widgetBody -->
												<div class="panel-heading">
													<h3 class="panel-title pull-left">Current Product</h3>
													<div class="pull-right">
													<?= Html::a('', ['delimg', 'id' => $imgs->idimage], ['class' => 'glyphicon glyphicon-minus']) ?>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="panel-body">
													<div class="row">
														<div class="col-sm-12">
															<?php 
																if(isset($imgs->image_name)){
																	echo Html::img('../../image/cart/'.$imgs->image_name,['width'=>93]); 
																	
																}
															?>	
														</div>
														<div class="col-sm-12">
															<?= $form->field($imgs, 'title')->textInput(['readonly' => true]) ?>
														</div>
													</div><!-- .row -->
												</div>
											</div>
										<?php endforeach; } ?>
										
										<div class="panel panel-default">
											<div class="panel-heading"><h4><i class="glyphicon glyphicon-camera"></i> Product Image </h4></div>
											
											<div class="panel-body">
												<?php DynamicFormWidget::begin([
													'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
													'widgetBody' => '.container-items', // required: css class selector
													'widgetItem' => '.item', // required: css class
													'limit' => 4, // the maximum times, an element can be cloned (default 999)
													'min' => 1, // 0 or 1 (default 1)
													'insertButton' => '.add-item', // css class
													'deleteButton' => '.remove-item', // css class
													'model' => $img[0],
													'formId' => 'dynamic-form',
													'formFields' => [
														'image_upload',
														'title',
													],
												]); ?>
							
												<div class="container-items"><!-- widgetContainer -->
												<?php foreach ($img as $i => $imgs): ?>
													<div class="item panel panel-default"><!-- widgetBody -->
														<div class="panel-heading">
															<h3 class="panel-title pull-left">Add Product</h3>
															<div class="pull-right">
																<button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
																<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="panel-body">
															<?php
																// necessary for update action.
																if (! $imgs->isNewRecord) {
																	echo Html::activeHiddenInput($imgs, "[{$i}]idimage");
																}
															?>
															<div class="row">
																<div class="col-sm-6">
																	<?= $form->field($imgs, "[{$i}]image_name")->fileInput() ?>
																	<label> Title </label>
																	<?= $form->field($imgs, "[{$i}]title")->textInput(['maxlength' => true])->label(false) ?>
																	<label> Primary </label>
																	<?= $form->field($imgs, "[{$i}]is_cover")->dropDownList(['1' => 'Yes','2'=>'No'])->label(false) ?>
																</div>
															</div><!-- .row -->
														</div>
													</div>
												<?php endforeach; ?>
												</div>
												<?php DynamicFormWidget::end(); ?>                                                                                 
											</div>
										</div>
                                     </div>
								</div>
							</div>
						</div>
					</fieldset>


    <?php ActiveForm::end(); ?>

</div>
