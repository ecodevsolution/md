<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\SubCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsubcategory')->dropDownList
										(ArrayHelper::map (SubCategory::find()->all(),'idsubcategory','sub_category_name'),
										['prompt'=>'- Choose -']);?>

    <?= $form->field($model, 'detail_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'flag')->dropDownList(['1'=>'active', '0'=>'deactive']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
