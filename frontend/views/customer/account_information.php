<div class="main-container col2-left-layout">
               <div class="main container">
                  <div class="row">
                     <div class="col-main col-sm-9 f-right">
                        <div class="my-account">
                           <div class="page-title">
                              <h1>Edit Account Information</h1>
                           </div>
                           <form action="my_account.html" method="post" id="form-validate" autocomplete="off">
                              <div class="fieldset">
                                 <input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
                                 <h2 class="legend">Account Information</h2>
                                 <ul class="form-list">
                                    <li class="fields">
                                       <div class="customer-name-middlename">
                                          <div class="field name-firstname">
                                             <label for="firstname" class="required"><em>*</em>First Name</label>
                                             <div class="input-box">
                                                <input type="text" id="firstname" name="firstname" value="dsadsa" title="First Name" maxlength="255" class="input-text required-entry"  />
                                             </div>
                                          </div>
                                          <div class="field name-middlename">
                                             <label for="middlename">Middle Name/Initial</label>
                                             <div class="input-box">
                                                <input type="text" id="middlename" name="middlename" value="dsadsadasd" title="Middle Name/Initial" class="input-text "  />
                                             </div>
                                          </div>
                                          <div class="field name-lastname">
                                             <label for="lastname" class="required"><em>*</em>Last Name</label>
                                             <div class="input-box">
                                                <input type="text" id="lastname" name="lastname" value="dsadsad" title="Last Name" maxlength="255" class="input-text required-entry"  />
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <label for="email" class="required"><em>*</em>Email Address</label>
                                       <div class="input-box">
                                          <input type="text" name="email" id="email" value="dsadasdsad@gmail.com" title="Email Address" class="input-text required-entry validate-email" />
                                       </div>
                                    </li>
                                    <li class="control">
                                       <input type="checkbox" name="change_password" id="change_password" value="1" onclick="setPasswordForm(this.checked)" title="Change Password" class="checkbox" /><label for="change_password">Change Password</label>
                                    </li>
                                 </ul>
                              </div>
                              <div class="fieldset" style="display:none;">
                                 <h2 class="legend">Change Password</h2>
                                 <ul class="form-list">
                                    <li>
                                       <label for="current_password" class="required"><em>*</em>Current Password</label>
                                       <div class="input-box">
                                          <!-- This is a dummy hidden field to trick firefox from auto filling the password -->
                                          <input type="text" class="input-text no-display" name="dummy" id="dummy" />
                                          <input type="password" title="Current Password" class="input-text" name="current_password" id="current_password" />
                                       </div>
                                    </li>
                                    <li class="fields">
                                       <div class="field">
                                          <label for="password" class="required"><em>*</em>New Password</label>
                                          <div class="input-box">
                                             <input type="password" title="New Password" class="input-text validate-password" name="password" id="password" />
                                          </div>
                                       </div>
                                       <div class="field">
                                          <label for="confirmation" class="required"><em>*</em>Confirm New Password</label>
                                          <div class="input-box">
                                             <input type="password" title="Confirm New Password" class="input-text validate-cpassword" name="confirmation" id="confirmation" />
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="buttons-set">
                                 <p class="required">* Required Fields</p>
                                 <p class="back-link"><a href="my_account.html"><small>&laquo; </small>Back</a></p>
                                 <button type="submit" title="Save" class="button"><span><span>Save</span></span></button>
                              </div>
                           </form>
                           <script type="text/javascript">
                              //<![CDATA[
                                  var dataForm = new VarienForm('form-validate', true);
                                  function setPasswordForm(arg){
                                      if(arg){
                                          $('current_password').up(3).show();
                                          $('current_password').addClassName('required-entry');
                                          $('password').addClassName('required-entry');
                                          $('confirmation').addClassName('required-entry');
                              
                                      }else{
                                          $('current_password').up(3).hide();
                                          $('current_password').removeClassName('required-entry');
                                          $('password').removeClassName('required-entry');
                                          $('confirmation').removeClassName('required-entry');
                                      }
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
                              <ul>
                                 <li><a href="my_account.html">Account Dashboard</a></li>
                                 <li><a href="account_information.html">Account Information</a></li>
                                 <li><a href="address_book.html">Address Book</a></li>
                                 <li><a href="my_order.html">My Orders</a></li>
                                 <li><a href="product_review.html">My Product Reviews</a></li>
                                 <li><a href="Newsletter.html">Newsletter Subscriptions</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>