<?php
    /* @var $this yii\web\View */
    $this->title = 'Address Book';
?>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 f-right">
                <div class="my-account">
                    <div class="page-title title-buttons">
                        <h1>Address Book</h1>
                        <button type="button" title="Add New Address" class="button" onclick="window.location='address-new';"><span><span>Add New Address</span></span></button>
                    </div>
                    <div class="col2-set addresses-list">
                        <div class="col-1 addresses-primary">
                            <ol>
								<?php
									foreach($findAddress as $findaddrs):
								?>
                                <li class="item">
                                    <h3><?= $findaddrs->alias; ?></h3>
                                    <address>
                                        <?= $findaddrs->address ?>,  <?= $findaddrs->city ?>, <?= $findaddrs->zip ?><br/>
                                        <?= $findaddrs->province ?><br/>
                                        <?php echo "T: ".$findaddrs->phone ?>
                                    </address>
                                    <p><a href="edit-address">Change <?= $findaddrs->alias; ?></a></p>
                                </li>
                               <?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="col-2 addresses-additional">
                            <h2>Additional Address Entries</h2>
                            <ol>
                                <li class="item empty">
                                    <p>You have no additional address entries in your address book.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="buttons-set">
                        <p class="back-link"><a href="myaccount"><small>&laquo; </small>Back</a></p>
                    </div>
                    <script type="text/javascript">
                        //<![CDATA[
                            function deleteAddress(addressId) {
                                if(confirm('Are you sure you want to delete this address?')) {
                                    window.location='http://newsmartwave.net/magento/porto/index.php/demo6_en/customer/address/delete/id/'+addressId;
                                }
                                return false;
                            }
                        //]]>
                    </script>
                </div>
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