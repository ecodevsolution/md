<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Logins';
$this->params['breadcrumbs'][] = $this->title;
?>

            <?php $form = ActiveForm::begin([
					'options'=>['class' => 'sign-box'],
					
					]); ?>
			
				<div class="sign-avatar">
                    <img src="img/avatar-sign.png" alt="">
                </div>
				
				<header class="sign-title">Sign In</header>
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>               
				<div class="form-group">
                    <div class="checkbox float-left">
                        <input type="checkbox" id="signed-in"/>
                        <label for="signed-in">Keep me signed in</label>
                    </div>
                    <div class="float-right reset">
                        <a href="reset-password.html">Reset Password</a>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
