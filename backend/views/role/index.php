<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title">
				<h3><?= Html::encode($this->title) ?></h3>
			</div>
			<div class="tbl-cell tbl-cell-action-bordered">
				 <?= Html::a('', ['create'], ['class' => 'font-icon font-icon-pencil']) ?>
			</div>
		</div>
	</header>
	<div class="box-typical-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>						
						<th width="90%">Role Name</th>						
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($model as $models):			
					?>
					<tr>
						<td>
							<?= $models->rolename; ?>
						</td>
						<td class="table-icon-cell">
							<?= Html::a('', ['update','id'=>$models->idrole], ['class' => 'fa fa-pencil']) ?>													
						</td>
						<td class="table-icon-cell">
							<?= Html::a('', ['delete','id'=>$models->idrole], ['class' => 'fa fa-trash swal-btn-warning']) ?>	
																									
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
