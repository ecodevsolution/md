<?php

use yii\web\View;
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumb;
use common\widgets\Alert;

AppAsset::register($this);
	
	if (Yii::$app->controller->action->id === 'login') { 
		echo $this->render(
			'main-login',
			['content' => $content]
		);
	} else {
		$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/backend/layout');
		
		$root = '@web';			
			$this->registerJsFile($root."/js/lib/tether/tether.min.js",
			['depends' => [\yii\web\JqueryAsset::className()],
			'position' => View::POS_HEAD]);
	
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body class="with-side-menu control-panel control-panel-compact">
		<?php $this->beginBody() ?>
				
		<?= $this->render(
			'header.php',
			['directoryAsset' => $directoryAsset]
		) ?>
		
		<?= $this->render(
			'left.php',
			['directoryAsset' => $directoryAsset]
		)
		?>
		
		<div class="page-content">
			<div class="container-fluid">
			
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<?= Breadcrumb::widget([
									'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
								]) ?>
							</div>
						</div>
					</div>
				</header>
				<?= $content ?>			 
			</div>
		</div>
		
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
<?php } ?>
