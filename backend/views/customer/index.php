<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title">
				<h3><?= Html::encode($this->title) ?></h3>
			</div>
		</div>
	</header>
	<div class="box-typical-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Is Guest</th>
						<th>Titles</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Birthday</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						foreach($model as $models):
					?>
					<tr>
						
						<td>
							<?php
								if($models->is_guest == 1){
									echo"<div class='text-center '> <span style='color:#46c35f;' class='fa fa-check'></span></div>";
								}else{
									echo"<div class='text-center '> <span style='color:#c50009;' class='fa fa-times'></span></div>";
								}
							?>
						</td>
						<td> <?php
								if($models->titles == 1){
									echo"<div class='text-center '> <span style='color:#46c35f;'>Male</span></div>";
								}else{
									echo"<div class='text-center '> <span style='color:#c50009;'>Female</span></div>";
								}
							?></td>
						<td> <?= $models->firstname; ?></td>
						<td> <?= $models->lastname; ?></td>
						<td> <?= $models->bod; ?></td>
						<td> <?= $models->email; ?></td>
						<td class="table-date">
							<?php
								if($models->status == 10){
									echo"<div class='text-center '> <span style='color:#46c35f;' class='fa fa-check'></span></div>";
								}else{
									echo"<div class='text-center '> <span style='color:#c50009;' class='fa fa-times'></span></div>";
								}
							?> 
						</td>
						<td class="table-icon-cell">
							<?= Html::a('', ['update','id'=>$models['idcustomer']], ['class' => 'font-icon font-icon-arrow-right']) ?>													
						</td>											
					</tr>	
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div><!--.box-typical-body-->
</section><!--.box-typical-->

	<?php 
		$this->registerJs("
		$(document).ready(function() {
			$('.swal-btn-basic').click(function(e){
				e.preventDefault();
				swal('Heres a message!');
			});

			$('.swal-btn-text').click(function(e){
				e.preventDefault();
				swal({
					title: 'Heres a message!',
					text: 'Its pretty, isnt it?'
				});
			});

			$('.swal-btn-success').click(function(e){
				e.preventDefault();
				swal({
					title: 'Good job!',
					text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn-success',
					confirmButtonText: 'Success'
				});
			});

			$('.swal-btn-warning').click(function(e){
				e.preventDefault();
				var getLink = $(this).attr('href');
                swal({
                        title: 'Are you sure?',
						text: 'You will not be able to recover this imaginary file!',
						type: 'warning',
						showCancelButton: true,
						confirmButtonClass: 'btn-danger',
						confirmButtonText: 'Yes, delete it!',
						cancelButtonText: 'No, cancel!',
						closeOnConfirm: false,
						closeOnCancel: false
						
                        },function(isConfirm){
							if (isConfirm) {
								window.location.href = getLink
							} else {
								swal({
									title: 'Cancelled',
									text: 'Your file is safe :)',
									type: 'error',
									confirmButtonClass: 'btn-danger'
								});
							}                        
                    });
                return false;
			});

			$('.swal-btn-cancel').click(function(e){
				e.preventDefault();
				swal({
							title: 'Are you sure?',
							text: 'You will not be able to recover this imaginary file!',
							type: 'warning',
							showCancelButton: true,
							confirmButtonClass: 'btn-danger',
							confirmButtonText: 'Yes, delete it!',
							cancelButtonText: 'No, cancel plx!',
							closeOnConfirm: false,
							closeOnCancel: false
						},
						function(isConfirm) {
							if (isConfirm) {
								swal({
									title: 'Deleted!',
									text: 'Your imaginary file has been deleted.',
									type: 'success',
									confirmButtonClass: 'btn-success'
								});
							} else {
								swal({
									title: 'Cancelled',
									text: 'Your imaginary file is safe :)',
									type: 'error',
									confirmButtonClass: 'btn-danger'
								});
							}
						});
			});

			$('.swal-btn-custom-img').click(function(e){
				e.preventDefault();
				swal({
					title: 'Sweet!',
					text: 'Heres a custom image.',
					confirmButtonClass: 'btn-success',
					imageUrl: 'img/smile.png'
				});
			});

			$('.swal-btn-info').click(function(e){
				e.preventDefault();
				swal({
					title: 'Are you sure?',
					text: 'Your will not be able to recover this imaginary file!',
					type: 'info',
					showCancelButton: true,
					cancelButtonClass: 'btn-default',
					confirmButtonText: 'Info',
					confirmButtonClass: 'btn-primary'
				});
			});

			$('.swal-btn-input').click(function(e){
				e.preventDefault();
				swal({
					title: 'An input!',
					text: 'Write something interesting:',
					type: 'input',
					showCancelButton: true,
					closeOnConfirm: false,
					inputPlaceholder: 'Write something'
				}, function (inputValue) {
					if (inputValue === false) return false;
					if (inputValue === '') {
						swal.showInputError('You need to write something!');
						return false
					}
					swal('Nice!', 'You wrote: ' + inputValue, 'success');
				});
			});
		});
		");
	?>