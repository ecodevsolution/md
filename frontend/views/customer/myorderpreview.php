<?php
    /* @var $this yii\web\View */
    $this->title = 'Order Preview';
?>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 f-right">
				<?php
					if($countReview > 0 ){
				?>
                <div class="my-account">
                    <div class="page-title">
                        <h1>My Product Reviews</h1>
                    </div>
                    <div class="pager">
                        <p class="amount">
                            <strong><?= $countReview ?> Item(s)</strong>
                        </p>
                        <div class="limiter">
                            <label>Show</label>
                            <select onchange="setLocation(this.value)">
								<option value="my-review-0" selected="selected">
                                    -          
                                </option>
                                <option value="my-review-10">
                                    10            
                                </option>
                                <option value="my-review-20">
                                    20            
                                </option>
                                <option value="my-review-30">
                                    50            
                                </option>
                            </select>
                            per page    
                        </div>
                    </div>
                    <table class="data-table for-desktop" id="my-reviews-table">
                        <col width="1" />
                        <col width="210" />
                        <col width="1" />
                        <col />
                        <col width="1" />
                        <tbody>
							<?php
								foreach($review as $reviews):
								
							?>
                            <tr>
                                <td><span class="nobr"><?= $reviews->date; ?></span></td>
                                <td>
                                    <h2 class="product-name"><a href="detail-product-<?= $reviews->idproduct; ?>"><?= $reviews->product->title; ?></a></h2>
                                </td>
                                <td>
                                    <div class="rating-box">
                                        <div class="rating" style="width:20%;"></div>
										<div class="rating" style="width:20%;"></div>
                                    </div>
                                </td>
                                <td><?= $reviews->description; ?></td>
                                <td><a href="review-detail-<?= $reviews->idreview; ?>" class="nobr">View Details</a></td>
                            </tr>
							<?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="data-table for-mobile" id="my-reviews-table-mobile">
                        <tbody>
                            <tr>
                                <td class="a-center">
                                    <div><span class="nobr">5/18/2016</span></div>
                                    <div>
                                        <h2 class="product-name"><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/catalog/product/view/id/126">Fashion Dress-Grey</a></h2>
                                    </div>
                                    <div>
                                        <div class="rating-box">
                                            <div class="rating" style="width:20%;"></div>
                                        </div>
                                    </div>
                                    <div>crot</div>
                                    <div><a href="http://newsmartwave.net/magento/porto/index.php/demo6_en/review/customer/view/id/769" class="nobr">View Details</a></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="buttons-set">
                        <p class="back-link"><a href="myaccount"><small>&laquo; </small>Back</a></p>
                    </div>
                </div>
				<?php
					}else{
						echo"<ul class='messages'><li class='success-msg'><ul><li><span>There are no reviews ..</span></li></ul></li></ul>";
					}
				?>
            </div>
            <div class="col-left sidebar f-left col-sm-3">
                <div class="block block-account">
                    <div class="block-title">
                        <strong><span>My Account</span></strong>
                    </div>
                    <div class="block-content">
                        <?php include"left_account.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>