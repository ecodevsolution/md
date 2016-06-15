<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = "404 NOT FOUND";
?>
	<div class="mobile-nav-overlay close-mobile-nav"></div>
		<div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                     <div class="std"><h1 style="text-align:center;margin: 20px 0; font-size: 70px;margin-top:70px">404<i class="icon-doc"></i></h1>
						<p style="text-align:center; font-size: 15px;">You might want to check that URL again or head over to our <a href="<?= Yii::$app->homeUrl; ?>">homepage.</a></p>
					</div>                
				</div>
		</div>
	</div>