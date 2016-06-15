<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use hok00age\RajaOngkir;
	$client = new RajaOngkir("d5d252c02222c480ca9e0347aa8f6442");
    $this->title = 'New Address';
?>

	<script>
		( function($) {
			$(document).ready(function()
			{
					$('#province').change(function()
				{
					var id=$(this).val();
					var dataString = 'id='+ id;
					$.ajax
					({
						type: 'GET',
						url: 'city-'+id,
						data: dataString,
						cache: false,
						success: function(html)
						{
							$('#city').html(html);
							
						} 
					});
				});
		
			});			
			
		} ) ( jQuery );
		
	</script>
<div class="mobile-nav-overlay close-mobile-nav"></div>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 f-right">
                <div class="my-account">
                    <div class="page-title">
                        <h1>Add New Address</h1>
                    </div>
                    <?php $form = ActiveForm::begin(); ?>       
                        <div class="fieldset">
                            <h2 class="legend">Address</h2>
                            <ul class="form-list">
                                <li class="wide">
                                    <label for="street_1" class="required"><em>*</em>Street Address</label>
                                    <div class="input-box">
                                        <input type="text" name="street1" value="" title="Street Address" id="street_1" required class="input-text  required-entry" />
                                    </div>
                                </li>
                                <li class="wide">
                                    <div class="input-box">
                                        <input type="text" name="street2" value="" title="Street Address 2" id="street_2" class="input-text " />
                                    </div>
                                </li>
								<?php
									$this->registerCss("
										#labelcity{
											padding-bottom:10px;
										}
									");
								?>
                                <li class="fields">
									<div class="field">
                                        <label for="region_id" class="required"><em>*</em>State/Province</label>
                                        <div class="input-box">
                                            <select name="province" id="province"  class="validate-select" title="Province/State" >
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
                                        </div>
                                    </div>
                                    <div class="field">
																		
                                        <div class="input-box" id="city">
                                           
                                        </div>
                                    </div>
                                  
                                </li>
                                <li class="fields">
                                    <div class="field">
                                        <label for="zip" class="required"><em>*</em>Zip/Postal Code</label>
                                        <div class="input-box">
                                            <input type="text" name="postcode" value="" title="Zip/Postal Code" id="zip" required class="input-text validate-zip-international  required-entry" />
                                        </div>
                                    </div>
									<div class="field">
                                        <label for="telephone" class="required"><em>*</em>Telephone</label>
                                        <div class="input-box">
                                            <input type="text" name="telephone" value="" title="Telephone" required class="input-text   required-entry" id="telephone" />
                                        </div>
                                    </div>                                   
                                </li>
								<li class="fields">
                                    <div class="field">
                                        <label for="zip" class="required"><em>*</em>Alias</label>
                                        <div class="input-box">
											 <?= $form->field($modelAddress, 'alias')->textInput(['id'=>'alias','title'=>'Address Alias','class'=>'input-text validate-zip-international','placeholder'=>'My Address / Billing Address'])->label(false); ?>                                           
                                        </div>
                                    </div>
									                             
                                </li>
                            </ul>
                        </div>
                        <div class="buttons-set">
                            <p class="required">* Required Fields</p>
                            <p class="back-link"><a href="myaccount"><small>&laquo; </small>Back</a></p>
							<?= Html::submitButton('Save Address',['class' => 'btn btn-primary']) ?>                           						   
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
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