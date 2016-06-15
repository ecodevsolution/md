<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\IconBox;

/* @var $this yii\web\View */
/* @var $model backend\models\InfoBox */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-box-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'logo')->dropDownList(
						ArrayHelper::map(IconBox::find()->all(),'icon_code', 'name_icon'),
						['prompt'=>'- Choose -'])->label('Icon');				 
				?>
    <?= $form->field($model, 'tag_info')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tag_desc')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
