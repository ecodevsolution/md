<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Brand;
use backend\models\Image;
use backend\models\MainCategory;
use backend\models\SubCategory;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-info-sign"></i> <?= Html::encode($this->title) ?> </h4></div></h5>	

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
					])->label(false);?>							
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
		
		<h5 class="m-t-lg with-border"><div class="panel-heading"><h4><i class="glyphicon glyphicon-th-list"></i> Product Category </h4></div></h5>	
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
	<?php
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$prod = Image::find()
				  ->where(['product_id' => $id])
				  ->all();
		
		foreach($prod as $prods):
	?>
	<div class="item panel panel-default"><!-- widgetBody -->
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Current Image</h3>
			<div class="pull-right">
               <?= Html::a('', ['del', 'id' => $prods->id_images], ['class' => 'glyphicon glyphicon-minus']) ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
					<?php 
						if(isset($prods->image)){
							echo Html::img('../../images/cart/'.$prods->image_name,['width'=>93]); 
							
						}
					?>	
                </div>
				<div class="col-sm-12">
                	<?= $form->field($prods, 'title')->textInput(['readonly' => true]) ?>
				</div>
				<div class="col-sm-12">
					<?= $form->field($prods, 'is_cover')->dropDownList(array('0' => 'Yes', '1' => 'No'),['readonly' => true]) ?>				
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
                'model' => $modelsImage[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'image_name',
                    'is_cover',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsImage as $i => $modelImage): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">                        
                        <div class="pull-right">
                            <button type="button" class="add-item add-button"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item remove-button"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
								
                                <?= $form->field($modelImage, "[{$i}]image_name")->fileInput()->label(false)?>
                            </div>
                            <div class="col-sm-12">
                                <?= $form->field($modelImage, "[{$i}]title")->textInput(['maxlength' => 50]) ?>
                            </div>
							<div class="col-sm-12">
								<?= $form->field($modelImage, "[{$i}]is_cover")->dropDownList(array('0' => 'Yes', '1' => 'No'),['prompt'=>'- Choose -']) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
