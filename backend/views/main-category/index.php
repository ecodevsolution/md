<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MainCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-category-index">
	<div class="x_panel">
		<div class="col-md-12">
			<h1><?= Html::encode($this->title) ?></h1>
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
			<div class="col-md-3">
				<p>
					<?= Html::a('Create Main Category', ['create'], ['class' => 'btn btn-success']) ?>
				</p>
			</div>
			
			<div class="col-md-4"></div>
			
			<div class="col-md-5" style="text-align:right;">
				<div id="bc1" class="btn-group btn-breadcrumb">
					<a href="?r=main-category/index" class="btn btn-default"><div>Main Category</div></a>
					<a href="?r=sub-category/index" class="btn btn-default"><div>Sub Category</div></a>
					<a href="?r=detail-category/index" class="btn btn-default"><div>Detail Category</div></a>
				</div>
			</div>		
		</div>	
		
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
		
					'idmain',
					'main_category_name',
					'flag',
		
					['class' => 'yii\grid\ActionColumn'],
				],
			]); ?>
	</div>
</div>
