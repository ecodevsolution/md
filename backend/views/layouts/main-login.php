<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
		<head>
			<meta charset="<?= Yii::$app->charset ?>"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<?= Html::csrfMetaTags() ?>
			<title>Login</title>
			<?php $this->head() ?>
		</head>
		
		<body style="background:#F7F7F7;">
    
			<div class="">
				<a class="hiddenanchor" id="toregister"></a>
				<a class="hiddenanchor" id="tologin"></a>
			
				<?php $this->beginBody() ?>
					<?= $content ?>
				<?php $this->endBody() ?>
				
			</div>
		</body>
	</html>
<?php $this->endPage() ?>
