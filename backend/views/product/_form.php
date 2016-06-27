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


$root = '@web';



$this->registerJsFile($root."/js/lib/select2/select2.full.min.js",		
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_READY]); 

$this->registerJsFile($root."/js/lib/jquery-tag-editor/jquery.tag-editor.min.js",		
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_READY]);




?>

			

<div class="box-typical box-typical-padding">

	<h5 class="m-t-lg with-border"><?= Html::encode($this->title) ?></h5>

	<?php 
		$form = ActiveForm::begin([
		'options'=>[
				'enctype'=>'multipart/form-data',
				'id' => 'dynamic-form']								
			]); 
	?>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Product Name</label>
			<div class="col-sm-10">
				<?= $form->field($model, 'title')->textInput(['placeholder' => 'Product name ..'])->label(false)?>				
			</div>
		</div>
		<div class="form-group row">			
			<label class="col-sm-2 form-control-label">SKU</label>
			<div class="col-sm-10">
				<?= $form->field($model, 'sku')->textInput(['placeholder' => 'SKU ..'])->label(false) ?>				
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Brands</label>
			<div class="col-sm-10">
				<?= $form->field($model, 'idbrand')->dropDownList(
						ArrayHelper::map(Brand::find()->all(),'idbrand', 'brand_name'),
						['prompt'=>'- Choose Brands-']
					)->label(false)
				?>				
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 form-control-label">Short Description</label>
			<div class="col-sm-10">
				<?= $form->field($model, 'short_description')->textarea(['rows' => 6])->label(false) ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="exampleSelect" class="col-sm-2 form-control-label">Full Description</label>
			<div class="col-sm-10">				
				<?= $form->field($model, 'description')->textarea(['rows' => 8])->label(false) ?>				
			</div>
		</div>
		<div class="form-group row">
			<label for="exampleSelect" class="col-sm-2 form-control-label">Status</label>
			<div class="col-sm-10">
				<?= $form->field($model, 'status')->dropDownList(['1'=>'Enable', '0'=>'Disable'],
						['prompt'=>'- Choose Status -']
					)->label(false);
				?>
			</div>
		</div>
	</form>
	
	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-usd"></i> Price Rules </h4></div></h5>
	<h5 class="m-t-lg with-border">Product Category</h5>
	<div class="row">
		<div class="col-lg-4">
			<fieldset class="form-group">
				<label class="form-label semibold" for="exampleInput">Category</label>
				<?= $form->field($model, 'idmain')->dropDownList(
						ArrayHelper::map(MainCategory::find()->all(),'idmain', 'main_category_name'),
						['prompt'=>'- Choose -',
						'onchange'=>'
							$.post("index.php?r=product/lists&id='.'"+$(this).val(), function( data ) {
							$( "select#product-idsub" ).html( data );
							});
						'])->label(false);
				
				?>
			</fieldset>
		</div>
		<div class="col-lg-4">
			<fieldset class="form-group">
				<label class="form-label" for="exampleInputEmail1">Sub Category</label>
				<?= $form->field($model, 'idsub')->dropDownList(
						ArrayHelper::map(SubCategory::find()->all(),'idsubcategory', 'sub_category_name'),
						['prompt'=>'- Choose -',
						'onchange'=>'
							$.post("index.php?r=product/detail&id='.'"+$(this).val(), function( data ) {
							$( "select#product-iddetail" ).html( data );
							});
						'])->label(false);
				
				?>
			</fieldset>
		</div>
		<div class="col-lg-4">
			<fieldset class="form-group">
				<label class="form-label" for="exampleInputPassword1">Detail Category</label>
				<?= $form->field($model, 'iddetail')->dropDownList(
						['prompt'=>'- Choose -',
						
						])->label(false);
				?>
			</fieldset>
		</div>
	</div><!--.row-->


	<div class="row">
		<div class="col-md-6 col-sm-6">
			<fieldset class="form-group">
				<label class="form-label" for="exampleInputDisabled">SALE</label>
				<?= $form->field($model, 'sale')->dropDownList(['1'=>'SALE', '0'=>'NO'],
						['prompt'=>'- Choose -'])->label(false);
				?>
			</fieldset>
		</div>
		<div class="col-md-6 col-sm-6">
			<fieldset class="form-group">
				<label class="form-label" for="exampleInputDisabled2">CONDITION</label>
				<?= $form->field($model, 'condition')->dropDownList(['1'=>'NEW', '0'=>'Refurbish'],
					['prompt'=>'- Choose -'])->label(false);
				?>
			</fieldset>
		</div>
	</div><!--.row-->

	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-usd"></i> Price Rules </h4></div></h5>

	<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">Rp. </div>
					<?= $form->field($model, 'price')->textInput(['placeholder'=>'Price'])->label(false) ?>
					<div class="input-group-addon">.00</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></div>
					<?= $form->field($model, 'tax')->textInput(['placeholder'=>'Tax'])->label(false) ?>
					<div class="input-group-addon">%</div>
				</div>
			</div>
		</div>	
		
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></div>
					<?= $form->field($model, 'discount')->textInput(['placeholder'=>'Discount'])->label(false) ?>
					<div class="input-group-addon">%</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">Min</div>
					<?= $form->field($model, 'minqty')->textInput(['placeholder'=>'Minimal Qty'])->label(false) ?>
					<div class="input-group-addon">Pcs</div>
				</div>
			</div>
		</div>	
		
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">Max</div>
					<?= $form->field($model, 'maxqty')->textInput(['placeholder'=>'Maximal Qty'])->label(false) ?>
					<div class="input-group-addon">Pcs</div>
				</div>
			</div>
		</div>	
		
		
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></div>
					<?= $form->field($model, 'weight')->textInput(['placeholder'=>'Weight'])->label(false) ?>
					<div class="input-group-addon">Gr</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></div>
					<?= $form->field($model, 'stock')->textInput(['placeholder'=>'Stock'])->label(false) ?>
					<div class="input-group-addon">Pcs</div>
				</div>
			</div>
		</div>
	</div><!--.row-->



	
	

	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-camera"></i> Image Product </h4></div></h5>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body"> 
					<div class="form-group">						
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
												<div class="pull-right">
													<button type="button" style="font-size: 7px;" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
													<button type="button" style="font-size: 7px;" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
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
														<?= $form->field($imgs, "[{$i}]image_name")->fileInput()->label(false) ?>
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
		</div><!--.row-->
	</div><!--.box-typical-->

	<script type="text/javascript">
		$(function() {
				$('#tags-editor-textarea').tagEditor();
			})();				
	</script>
