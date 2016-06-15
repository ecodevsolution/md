<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MainCategory;


/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

	<?php $form = ActiveForm::begin([ 
		'options' => ['enctype'=>'multipart/form-data']
	]); ?>

	<?= $form->field($model, 'category')->dropDownList(
			ArrayHelper::map(MainCategory::find()->all(),'main_category_name', 'main_category_name'),
			['prompt'=>'- Choose -'])->label('Category');				 
	?>

	<?= $form->field($model, 'slider_img')->fileInput()->label('Slider') ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tag_highligt')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tag_end')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'more_description')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
