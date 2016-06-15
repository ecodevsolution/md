 <div class="mobile-nav-overlay close-mobile-nav"></div>
 <div class="main-container col2-right-layout">
	<div class="main container">
       <div class="row">
          <div class="col-main col-sm-9">
             <div class="page-title">
                <h1>Your order has been received.</h1>
             </div>
             <div class="form-wrap">
                <h2 class="sub-title">Thank you for your purchase!</h2>
                <p>Your order # is: <?= $idorder; ?>.</p>
                <p>You will receive an order confirmation email with details of your order and a link to track its progress.</p>
                <div class="buttons-set">
                   <button type="button" class="button" title="Continue Shopping" onclick="window.location='<?= Yii::$app->homeUrl; ?>'"><span><span>Continue Shopping</span></span></button>
                </div>
             </div>
          </div>    
       </div>
    </div>
 </div>