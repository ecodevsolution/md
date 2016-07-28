<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = 'Update Customer: ' . ' ' . $customer->idcustomer;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $customer->idcustomer, 'url' => ['view', 'id' => $customer->idcustomer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'model' => $model,
		'status' => $status,
		'item'=>$item,
		'customer'=>$customer,
		'graph' => $graph,
    ]) ?>

</div>
