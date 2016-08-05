<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use hok00age\RajaOngkir;
use  yii\web\Session;

$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
$session = Yii::$app->session;

$this->params['breadcrumbs'][] = 'Store Information';

$this->title = "Store Information";
?>
<script>
		( function($) {
			
			function loading_city(){
				$('#loading_city').html("<img src='../../img/ajax_loader.gif'/>").fadeIn('fast');
			}
			function loading_city_hide(){
				$('#loading_city').fadeOut('fast');
			}
			function hide_current(){
				$('#currents').fadeOut('fast');
				$('#current').fadeOut('fast');				
			}

			$(document).ready(function()
			{
				$('#province').change(function()
				{
					var id=$(this).val();
					var dataString = 'id='+ id;
					hide_current();
					loading_city();
					$.ajax
					({
						type: 'GET',
						url: '?r=store/list-city&id='+id,
						data: dataString,
						cache: false,
						success: function(html)
						{
							loading_city_hide();
							$('#city').html(html);
							
							
						} 
					});
				});
		
			});
		} ) ( jQuery );
	</script>
<div class="box-typical box-typical-padding">	
	<h5 class="m-t-lg with-border">
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-info-sign"></i> Store Information </h4>
		</div>
	</h5>
	
    <?php 
		$form = ActiveForm::begin([
		'options'=>[
				'enctype'=>'multipart/form-data'
				]								
			]); 
	?>

    <?= $form->field($model, 'nama_toko')->textInput(['maxlength' => 50])->label('Store Name') ?>	   
	
	<label>Province</label>
    <select name="province" id="province"  class="form-control" class="validate-select" title="Province/State" >
		<option selected value="<?= $model->idprovince.';'.$model->province?>"><?= $model->province; ?></option>
		<?php
			$provinces = $client->getProvince(); 																					
	
			$json =  $provinces->raw_body;
			$data = json_decode($json, true);
					
			foreach ($data['rajaongkir']['results'] as $field => $value):
		?>
			<option value='<?= $data['rajaongkir']['results'][$field]['province_id'].';'.$data['rajaongkir']['results'][$field]['province'];?>'><?= $data['rajaongkir']['results'][$field]['province']; ?></option>
			
		<?php	
			endforeach;
		?>
	</select>	
	<br/>
	<label id="current">City</label>
	<select id="currents" class="form-control" name="city">
		<option selected value="<?= $model->idcity.';'.$model->city?>"><?= $model->city; ?></option>
	</select>
	
    <div class="input-box" id="city">
		<div id="loading_city"></div>
    </div>    
	
	<?= $form->field($model, 'address')->widget(TinyMce::className(), [
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
		]);
	?>
	
	<?= $form->field($model, 'phone')->textInput(['maxlength' => 50])->label('Phone') ?>
	
	<?= $form->field($model, 'work_hour')->textInput(['maxlength' => 50])->label('Work Hours') ?>  			  	
	<label>Current Logo</label>
	<img src="../../img/logo/<?= $model->logo ?>" style="width:111px;height:51px">
	<br/><br/>
	<?= $form->field($model, 'logo')->fileInput()->label('Logo')?>	   			  	
	
	
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
		]);
	?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<?php 
		$this->registerJs("
		(function($) {
					$('#tags').tagEditor();
			})(jQuery);
		");
				
	?>	

</div>