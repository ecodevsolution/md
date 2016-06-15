<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model backend\models\Aboutus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aboutus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
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
			])->label('Description');
		?>
		
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>