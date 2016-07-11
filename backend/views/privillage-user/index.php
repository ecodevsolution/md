<?php
	use backend\models\DtlMenuUser;
	use backend\models\PrivillageUser;
	
	$this->title = 'Privillage';
	$this->params['breadcrumbs'][] = $this->title;
	
?>
	<div class="inbox-mail">
		<div class="col-md-4 compose">		
			<nav class="nav-sidebar panel">
				<ul class="nav tabs">
				
					<?php
						foreach($model as $models):
					?>
					<li class="active"><a href="?r=privillage-user/index&id=<?= $models->idrole; ?>"><i class="fa fa-user"></i>   <?= $models->rolename?> <div class="clearfix"></div></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
		<!-- tab content -->
		<form action="?r=privillage-user/post" method="POST">
			<div class="col-md-8 tab-content tab-content-in">
				<div class="tab-pane active text-style" id="tab1">
					<div class="inbox-right">
				
						<div class="mailbox-content">
							<h5>Access Menu </h5> <h5 style="float:right"><INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" /> Check All</h5><br/>
							<table class="table">
								<tbody>
									<?php
										if(isset($_GET['id'])){
											
										foreach($akses as $aksess):
										
										$access = PrivillageUser::find()
												->where(['idrole'=>$_GET['id']])
												->AndWhere(['idmenu'=>$aksess->idmenu])
												->Limit(1)
												->all();
										foreach($access as $acc):
											if($acc->flag == 1){
												$check = "checked";
											}else{
												$check = "";
											}
										
									?>
									
									<tr class="table-row">
										<td class="table-img" width="5%">
											<input type="checkbox" <?= $check ?> name="idmenu[]" value="<?= $aksess->idmenu; ?>">
											<input type="hidden" name="role" value="<?= $_GET['id']; ?>">
										</td>
										<td class="table-text">
											<h6><?= $aksess->menu_name; ?></h6>	
												<?php
													$dtl = DtlMenuUser::find()
														->where(['id_menu'=>$aksess->idmenu])
														->All();
													foreach($dtl as $dtls):
														$accesss = PrivillageUser::find()
															->where(['idrole'=>$_GET['id']])
															->AndWhere(['idmenu'=>$aksess->idmenu])
															->AndWhere(['iddtlmenu'=>$dtls->id_dtl_menu])
															->Limit(1)
															->all();
														foreach($accesss as $accs):
															if($accs->flag == 1){
																$checked = "checked";
															}else{
																$checked = "";
															}
														echo"<tr><td></td><td><input type='checkbox' $checked name='detail[]' value='$dtls->id_dtl_menu'/>  $dtls->menu_detail_name</td></tr>";
														endforeach;
													endforeach;
												?>
										</td>
									</tr>
										
									<?php
										endforeach;
										endforeach;
										echo"";
										
										}else{echo "<i class='text text-danger'>Please Choose Your Accsess !</i>";}
									?>								
								</tbody>
							</table>
							
						</div>
						
					</div>
				</div>
			</div>
			<input type='submit' name='submit' style="margin-right:15px;margin-top:10px" value='Submit' class='btn btn-primary pull-right'/>
		</form>
		<div class="clearfix"> </div>
	</div>
	
	<script>
		function checkAll(ele) {
			var checkboxes = document.getElementsByTagName('input');
			if (ele.checked) {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = true;
					}
				}
			} else {
				for (var i = 0; i < checkboxes.length; i++) {
					console.log(i)
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = false;
					}
				}
			}
		}
	</script>