<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use frontend\models\CustomerAddress;
use frontend\models\Order;
use frontend\models\Bank;
use frontend\models\Kurir;

$session = Yii::$app->session;		
/* @var $this yii\web\View */
/* @var $products common\models\Product[] */
?>

            <div class="mobile-nav-overlay close-mobile-nav"></div>
            <div class="main-container col1-layout">
               <div class="main container">
                  <div class="col-main">
                     <div class="opc-wrapper-opc design_package_smartwave design_theme_porto">
                        <div class="page-title">
                           <h1>Checkout</h1>
                        </div>
                        <div class="opc-menu">
                           <p class="left"><a class="login-trigger opc-login-trigger signin-modal theme-bg-color " data-modal="modal-login">LOGIN</a></p>
                           <div class="md-modal md-effect-7" id="modal-login">
                              <div class="md-content">
                                 <div class="md-modal-header">
                                    <button type="button" class="close"><i class="fa fa-close"></i></button>
                                    <h4>Login to your Account</h4>
                                 </div>
                                 <div class="md-content-wrapper">
                                    <form action="../index.htmlcustomer/account/loginPost/" method="post" id="login-form">
                                       <input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
                                       <div>
                                          <ul class="form-list">
                                             <li>
                                                <label for="email" class="required"><em>*</em>Email Address</label>
                                                <div class="input-box">
                                                   <input type="text" name="login[username]" value="" id="email" class="input-text required-entry validate-email" title="Email Address" />
                                                </div>
                                                <div class="clear"></div>
                                             </li>
                                             <div class="clear"></div>
                                             <li>
                                                <label for="pass" class="required"><em>*</em>Password</label>
                                                <div class="input-box">
                                                   <input type="password" name="login[password]" class="input-text required-entry validate-password" id="pass" title="Password" />
                                                </div>
                                                <div class="clear"></div>
                                             </li>
                                             <div class="clear"></div>
                                          </ul>
                                       </div>
                                       <div class="clear"></div>
                                       <input name="context" type="hidden" value="checkout" />
                                    </form>
                                    <div class="clear"></div>
                                    <form action="../index.htmlonepage/index/forgotpasswordpost/" method="post" id="form-validate-email" style="display:none">
                                       <p>Please enter your email address below. You will receive a link to reset your password.</p>
                                       <ul class="form-list">
                                          <li>
                                             <label for="email_address" class="required"><em>*</em>Email Address</label>
                                             <div class="input-box">
                                                <input type="text" name="email" alt="email" id="email_address" class="input-text required-entry validate-email" value="" />
                                             </div>
                                          </li>
                                       </ul>
                                    </form>
                                    <script type="text/javascript">
                                       //<![CDATA[
                                           var dataForm2 = new VarienForm('form-validate-email', true);
                                       //]]>
                                    </script>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="md-modal-footer">
                                    <div id="login-button-set">
                                       <a href="../index.htmlcustomer/account/forgotpassword/" class="f-left restore-account">Forgot Your Password?</a>          
                                       <button type="button" class="button btn btn-primary"><span><span>Login</span></span></button>
                                    </div>
                                    <div id="forgotpassword-button-set" style="display:none">
                                       <p class="back-link"><a href="../index.htmlcustomer/account/login/"><small>&laquo; </small>Back to Login</a></p>
                                       <button type="button" title="Submit" class="button btn"><span><span>Submit</span></span></button>
                                    </div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                           </div>
                           <div class="md-overlay"></div>
                           <script type="text/javascript">
                              //<![CDATA[
                                  var dataForm1 = new VarienForm('login-form', true);
                              //]]>
                           </script>
                           <div class="right review-menu-block">
                              <a class="review-total theme-bg-color"><i class="icon-cart"></i><span class="price">$79.00</span></a>
                              <div class="hidden theme-border-color" id="opc-review-block">
                                 <div id="checkout-review-table-wrapper">
                                    <h3 class="review-title">Review Your Order</h3>
                                    <table class="opc-data-table" id="checkout-review-table">
                                       <col />
                                       <col width="1" />
                                       <col width="1" />
                                       <col width="1" />
                                       <thead>
                                          <tr>
                                             <th rowspan="1">Product Name</th>
                                             <th colspan="1" class="a-center">Price</th>
                                             <th rowspan="1" class="a-center">Qty</th>
                                             <th colspan="1" class="a-center">Subtotal</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <td style="" class="a-right" colspan="3">
                                                Subtotal    
                                             </td>
                                             <td style="" class="a-right">
                                                <span class="price">$79.00</span>    
                                             </td>
                                          </tr>
                                          <tr>
                                             <td style="" class="a-right" colspan="3">
                                                <strong>Grand Total</strong>
                                             </td>
                                             <td style="" class="a-right">
                                                <strong><span class="price">$79.00</span></strong>
                                             </td>
                                          </tr>
                                       </tfoot>
                                       <tbody>
                                          <tr>
                                             <td>
                                                <h3 class="product-name">Sheri Collar Shirt</h3>
                                                <dl class="item-options">
                                                   <dt>Color</dt>
                                                   <dd>Ivory                            </dd>
                                                   <dt>Size</dt>
                                                   <dd>M                            </dd>
                                                </dl>
                                             </td>
                                             <td class="a-right">
                                                <span class="cart-price">
                                                <span class="price">$79.00</span>            
                                                </span>
                                             </td>
                                             <td class="a-center">1</td>
                                             <!-- sub total starts here -->
                                             <td class="a-right">
                                                <span class="cart-price">
                                                <span class="price">$79.00</span>            
                                                </span>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <script type="text/javascript">
                                    //<![CDATA[
                                        decorateTable('checkout-review-table');
                                        truncateOptions();
                                    //]]>
                                 </script>        
                              </div>
                           </div>
                           <div class="clear move-columns"></div>
                        </div>
                        <div class="clear"></div>
                        <div >
                           <div class="opc-col-left">
                              <form id="opc-address-form-billing" method="post">
                                 <div id="co-billing-form">
                                    <h3>Name & Address</h3>
                                    <ul class="form-list">
                                       <li id="billing-new-address-form">
                                          <fieldset>
                                             <input type="hidden" name="billing[address_id]" value="36403" id="billing:address_id" />
                                             <ul>
                                                <li class="fields">
                                                   <div class="customer-name-middlename">
                                                      <div class="field name-firstname">
                                                         <label for="billing:firstname" class="required"><em>*</em>First Name</label>
                                                         <div class="input-box">
                                                            <input type="text" id="billing:firstname" name="billing[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry"  />
                                                         </div>
                                                      </div>
                                                      <div class="field name-middlename">
                                                         <label for="billing:middlename">Middle Name/Initial</label>
                                                         <div class="input-box">
                                                            <input type="text" id="billing:middlename" name="billing[middlename]" value="" title="Middle Name/Initial" class="input-text "  />
                                                         </div>
                                                      </div>
                                                      <div class="field name-lastname">
                                                         <label for="billing:lastname" class="required"><em>*</em>Last Name</label>
                                                         <div class="input-box">
                                                            <input type="text" id="billing:lastname" name="billing[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry"  />
                                                         </div>
                                                      </div>
                                                   </div>
                                                </li>
                                                <div class="clear"></div>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="billing:company">Company</label>
                                                      <div class="input-box">
                                                         <input type="text" id="billing:company" name="billing[company]" value="" title="Company" class="input-text " />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="billing:email" class="required"><em>*</em>Email Address</label>
                                                      <div class="input-box">
                                                         <input type="text" name="billing[email]" id="billing:email" value="" title="Email Address" class="input-text validate-email required-entry" />
                                                      </div>
                                                   </div>
                                                </li>
                                                <div class="clear"></div>
                                                <li class="wide">
                                                   <label for="billing:street1" class="required"><em>*</em>Address</label>
                                                   <div class="input-box">
                                                      <input type="text" title="Street Address" name="billing[street][]" id="billing:street1" value="" class="input-text  required-entry" />
                                                   </div>
                                                </li>
                                                <li class="wide">
                                                   <div class="input-box">
                                                      <input type="text" title="Street Address 2" name="billing[street][]" id="billing:street2" value="" class="input-text " />
                                                   </div>
                                                </li>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="billing:city" class="required"><em>*</em>City</label>
                                                      <div class="input-box">
                                                         <input type="text" title="City" name="billing[city]" value="" class="input-text  required-entry" id="billing:city" />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="billing:region_id" class="required"><em>*</em>State/Province</label>
                                                      <div class="input-box">
                                                         <input type="text" name="billing[email]" id="billing:email" value="" title="Email Address" class="input-text validate-email required-entry">
                                                      </div>
                                                      <div class="input-box">
                                                         <select id="billing:region_id" name="billing[region_id]" title="State/Province" class="validate-select" style="display:none;">
                                                            <option value="">Please select region, state or province</option>
                                                         </select>
                                                         <script type="text/javascript">
                                                            //<![CDATA[
                                                                $('billing:region_id').setAttribute('defaultValue',  "");
                                                            //]]>
                                                         </script>
                                                         <input type="text" id="billing:region" name="billing[region]" value=""  title="State/Province" class="input-text " style="display:none;" />
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="billing:postcode" class="required"><em>*</em>Zip/Postal Code</label>
                                                      <div class="input-box">
                                                         <input type="text" title="Zip/Postal Code" name="billing[postcode]" id="billing:postcode" value="" class="input-text validate-zip-international  required-entry" />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="billing:country_id" class="required"><em>*</em>Country</label>
                                                      <div class="input-box">
                                                         <select name="billing[country_id]" id="billing:country_id" class="validate-select" title="Country" >
                                                            <option value="" > </option>
                                                            <option value="AF" >Afghanistan</option>
                                                            <option value="AX" >Åland Islands</option>
                                                            <option value="AL" >Albania</option>
                                                            <option value="DZ" >Algeria</option>
                                                            <option value="AS" >American Samoa</option>
                                                            <option value="AD" >Andorra</option>
                                                            <option value="AO" >Angola</option>
                                                            <option value="AI" >Anguilla</option>
                                                            <option value="AQ" >Antarctica</option>
                                                            <option value="AG" >Antigua and Barbuda</option>
                                                            <option value="AR" >Argentina</option>
                                                            <option value="AM" >Armenia</option>
                                                            <option value="AW" >Aruba</option>
                                                            <option value="AU" >Australia</option>
                                                            <option value="AT" >Austria</option>
                                                            <option value="AZ" >Azerbaijan</option>
                                                            <option value="BS" >Bahamas</option>
                                                            <option value="BH" >Bahrain</option>
                                                            <option value="BD" >Bangladesh</option>
                                                            <option value="BB" >Barbados</option>
                                                            <option value="BY" >Belarus</option>
                                                            <option value="BE" >Belgium</option>
                                                            <option value="BZ" >Belize</option>
                                                            <option value="BJ" >Benin</option>
                                                            <option value="BM" >Bermuda</option>
                                                            <option value="BT" >Bhutan</option>
                                                            <option value="BO" >Bolivia</option>
                                                            <option value="BA" >Bosnia and Herzegovina</option>
                                                            <option value="BW" >Botswana</option>
                                                            <option value="BV" >Bouvet Island</option>
                                                            <option value="BR" >Brazil</option>
                                                            <option value="IO" >British Indian Ocean Territory</option>
                                                            <option value="VG" >British Virgin Islands</option>
                                                            <option value="BN" >Brunei</option>
                                                            <option value="BG" >Bulgaria</option>
                                                            <option value="BF" >Burkina Faso</option>
                                                            <option value="BI" >Burundi</option>
                                                            <option value="KH" >Cambodia</option>
                                                            <option value="CM" >Cameroon</option>
                                                            <option value="CA" >Canada</option>
                                                            <option value="CV" >Cape Verde</option>
                                                            <option value="KY" >Cayman Islands</option>
                                                            <option value="CF" >Central African Republic</option>
                                                            <option value="TD" >Chad</option>
                                                            <option value="CL" >Chile</option>
                                                            <option value="CN" >China</option>
                                                            <option value="CX" >Christmas Island</option>
                                                            <option value="CC" >Cocos (Keeling) Islands</option>
                                                            <option value="CO" >Colombia</option>
                                                            <option value="KM" >Comoros</option>
                                                            <option value="CG" >Congo - Brazzaville</option>
                                                            <option value="CD" >Congo - Kinshasa</option>
                                                            <option value="CK" >Cook Islands</option>
                                                            <option value="CR" >Costa Rica</option>
                                                            <option value="CI" >Côte d’Ivoire</option>
                                                            <option value="HR" >Croatia</option>
                                                            <option value="CU" >Cuba</option>
                                                            <option value="CY" >Cyprus</option>
                                                            <option value="CZ" >Czech Republic</option>
                                                            <option value="DK" >Denmark</option>
                                                            <option value="DJ" >Djibouti</option>
                                                            <option value="DM" >Dominica</option>
                                                            <option value="DO" >Dominican Republic</option>
                                                            <option value="EC" >Ecuador</option>
                                                            <option value="EG" >Egypt</option>
                                                            <option value="SV" >El Salvador</option>
                                                            <option value="GQ" >Equatorial Guinea</option>
                                                            <option value="ER" >Eritrea</option>
                                                            <option value="EE" >Estonia</option>
                                                            <option value="ET" >Ethiopia</option>
                                                            <option value="FK" >Falkland Islands</option>
                                                            <option value="FO" >Faroe Islands</option>
                                                            <option value="FJ" >Fiji</option>
                                                            <option value="FI" >Finland</option>
                                                            <option value="FR" >France</option>
                                                            <option value="GF" >French Guiana</option>
                                                            <option value="PF" >French Polynesia</option>
                                                            <option value="TF" >French Southern Territories</option>
                                                            <option value="GA" >Gabon</option>
                                                            <option value="GM" >Gambia</option>
                                                            <option value="GE" >Georgia</option>
                                                            <option value="DE" >Germany</option>
                                                            <option value="GH" >Ghana</option>
                                                            <option value="GI" >Gibraltar</option>
                                                            <option value="GR" >Greece</option>
                                                            <option value="GL" >Greenland</option>
                                                            <option value="GD" >Grenada</option>
                                                            <option value="GP" >Guadeloupe</option>
                                                            <option value="GU" >Guam</option>
                                                            <option value="GT" >Guatemala</option>
                                                            <option value="GG" >Guernsey</option>
                                                            <option value="GN" >Guinea</option>
                                                            <option value="GW" >Guinea-Bissau</option>
                                                            <option value="GY" >Guyana</option>
                                                            <option value="HT" >Haiti</option>
                                                            <option value="HM" >Heard &amp; McDonald Islands</option>
                                                            <option value="HN" >Honduras</option>
                                                            <option value="HK" >Hong Kong SAR China</option>
                                                            <option value="HU" >Hungary</option>
                                                            <option value="IS" >Iceland</option>
                                                            <option value="IN" >India</option>
                                                            <option value="ID" >Indonesia</option>
                                                            <option value="IR" >Iran</option>
                                                            <option value="IQ" >Iraq</option>
                                                            <option value="IE" >Ireland</option>
                                                            <option value="IM" >Isle of Man</option>
                                                            <option value="IL" >Israel</option>
                                                            <option value="IT" >Italy</option>
                                                            <option value="JM" >Jamaica</option>
                                                            <option value="JP" >Japan</option>
                                                            <option value="JE" >Jersey</option>
                                                            <option value="JO" >Jordan</option>
                                                            <option value="KZ" >Kazakhstan</option>
                                                            <option value="KE" >Kenya</option>
                                                            <option value="KI" >Kiribati</option>
                                                            <option value="KW" >Kuwait</option>
                                                            <option value="KG" >Kyrgyzstan</option>
                                                            <option value="LA" >Laos</option>
                                                            <option value="LV" >Latvia</option>
                                                            <option value="LB" >Lebanon</option>
                                                            <option value="LS" >Lesotho</option>
                                                            <option value="LR" >Liberia</option>
                                                            <option value="LY" >Libya</option>
                                                            <option value="LI" >Liechtenstein</option>
                                                            <option value="LT" >Lithuania</option>
                                                            <option value="LU" >Luxembourg</option>
                                                            <option value="MO" >Macau SAR China</option>
                                                            <option value="MK" >Macedonia</option>
                                                            <option value="MG" >Madagascar</option>
                                                            <option value="MW" >Malawi</option>
                                                            <option value="MY" >Malaysia</option>
                                                            <option value="MV" >Maldives</option>
                                                            <option value="ML" >Mali</option>
                                                            <option value="MT" >Malta</option>
                                                            <option value="MH" >Marshall Islands</option>
                                                            <option value="MQ" >Martinique</option>
                                                            <option value="MR" >Mauritania</option>
                                                            <option value="MU" >Mauritius</option>
                                                            <option value="YT" >Mayotte</option>
                                                            <option value="MX" >Mexico</option>
                                                            <option value="FM" >Micronesia</option>
                                                            <option value="MD" >Moldova</option>
                                                            <option value="MC" >Monaco</option>
                                                            <option value="MN" >Mongolia</option>
                                                            <option value="ME" >Montenegro</option>
                                                            <option value="MS" >Montserrat</option>
                                                            <option value="MA" >Morocco</option>
                                                            <option value="MZ" >Mozambique</option>
                                                            <option value="MM" >Myanmar (Burma)</option>
                                                            <option value="NA" >Namibia</option>
                                                            <option value="NR" >Nauru</option>
                                                            <option value="NP" >Nepal</option>
                                                            <option value="NL" >Netherlands</option>
                                                            <option value="AN" >Netherlands Antilles</option>
                                                            <option value="NC" >New Caledonia</option>
                                                            <option value="NZ" >New Zealand</option>
                                                            <option value="NI" >Nicaragua</option>
                                                            <option value="NE" >Niger</option>
                                                            <option value="NG" >Nigeria</option>
                                                            <option value="NU" >Niue</option>
                                                            <option value="NF" >Norfolk Island</option>
                                                            <option value="MP" >Northern Mariana Islands</option>
                                                            <option value="KP" >North Korea</option>
                                                            <option value="NO" >Norway</option>
                                                            <option value="OM" >Oman</option>
                                                            <option value="PK" >Pakistan</option>
                                                            <option value="PW" >Palau</option>
                                                            <option value="PS" >Palestinian Territories</option>
                                                            <option value="PA" >Panama</option>
                                                            <option value="PG" >Papua New Guinea</option>
                                                            <option value="PY" >Paraguay</option>
                                                            <option value="PE" >Peru</option>
                                                            <option value="PH" >Philippines</option>
                                                            <option value="PN" >Pitcairn Islands</option>
                                                            <option value="PL" >Poland</option>
                                                            <option value="PT" >Portugal</option>
                                                            <option value="PR" >Puerto Rico</option>
                                                            <option value="QA" >Qatar</option>
                                                            <option value="RE" >Réunion</option>
                                                            <option value="RO" >Romania</option>
                                                            <option value="RU" >Russia</option>
                                                            <option value="RW" >Rwanda</option>
                                                            <option value="BL" >Saint Barthélemy</option>
                                                            <option value="SH" >Saint Helena</option>
                                                            <option value="KN" >Saint Kitts and Nevis</option>
                                                            <option value="LC" >Saint Lucia</option>
                                                            <option value="MF" >Saint Martin</option>
                                                            <option value="PM" >Saint Pierre and Miquelon</option>
                                                            <option value="WS" >Samoa</option>
                                                            <option value="SM" >San Marino</option>
                                                            <option value="ST" >São Tomé and Príncipe</option>
                                                            <option value="SA" >Saudi Arabia</option>
                                                            <option value="SN" >Senegal</option>
                                                            <option value="RS" >Serbia</option>
                                                            <option value="SC" >Seychelles</option>
                                                            <option value="SL" >Sierra Leone</option>
                                                            <option value="SG" >Singapore</option>
                                                            <option value="SK" >Slovakia</option>
                                                            <option value="SI" >Slovenia</option>
                                                            <option value="SB" >Solomon Islands</option>
                                                            <option value="SO" >Somalia</option>
                                                            <option value="ZA" >South Africa</option>
                                                            <option value="GS" >South Georgia &amp; South Sandwich Islands</option>
                                                            <option value="KR" >South Korea</option>
                                                            <option value="ES" >Spain</option>
                                                            <option value="LK" >Sri Lanka</option>
                                                            <option value="VC" >St. Vincent &amp; Grenadines</option>
                                                            <option value="SD" >Sudan</option>
                                                            <option value="SR" >Suriname</option>
                                                            <option value="SJ" >Svalbard and Jan Mayen</option>
                                                            <option value="SZ" >Swaziland</option>
                                                            <option value="SE" >Sweden</option>
                                                            <option value="CH" >Switzerland</option>
                                                            <option value="SY" >Syria</option>
                                                            <option value="TW" >Taiwan</option>
                                                            <option value="TJ" >Tajikistan</option>
                                                            <option value="TZ" >Tanzania</option>
                                                            <option value="TH" >Thailand</option>
                                                            <option value="TL" >Timor-Leste</option>
                                                            <option value="TG" >Togo</option>
                                                            <option value="TK" >Tokelau</option>
                                                            <option value="TO" >Tonga</option>
                                                            <option value="TT" >Trinidad and Tobago</option>
                                                            <option value="TN" >Tunisia</option>
                                                            <option value="TR" >Turkey</option>
                                                            <option value="TM" >Turkmenistan</option>
                                                            <option value="TC" >Turks and Caicos Islands</option>
                                                            <option value="TV" >Tuvalu</option>
                                                            <option value="UG" >Uganda</option>
                                                            <option value="UA" >Ukraine</option>
                                                            <option value="AE" >United Arab Emirates</option>
                                                            <option value="GB" >United Kingdom</option>
                                                            <option value="US" selected="selected" >United States</option>
                                                            <option value="UY" >Uruguay</option>
                                                            <option value="UM" >U.S. Outlying Islands</option>
                                                            <option value="VI" >U.S. Virgin Islands</option>
                                                            <option value="UZ" >Uzbekistan</option>
                                                            <option value="VU" >Vanuatu</option>
                                                            <option value="VA" >Vatican City</option>
                                                            <option value="VE" >Venezuela</option>
                                                            <option value="VN" >Vietnam</option>
                                                            <option value="WF" >Wallis and Futuna</option>
                                                            <option value="EH" >Western Sahara</option>
                                                            <option value="YE" >Yemen</option>
                                                            <option value="ZM" >Zambia</option>
                                                            <option value="ZW" >Zimbabwe</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="billing:telephone" class="required"><em>*</em>Telephone</label>
                                                      <div class="input-box">
                                                         <input type="text" name="billing[telephone]" value="" title="Telephone" class="input-text  required-entry" id="billing:telephone" />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="billing:fax">Fax</label>
                                                      <div class="input-box">
                                                         <input type="text" name="billing[fax]" value="" title="Fax" class="input-text " id="billing:fax" />
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="no-display"><input type="hidden" name="billing[save_in_address_book]" value="1" /></li>
                                             </ul>
                                          </fieldset>
                                       </li>
                                       <!-- fix browser autocomplete -->
                                       <div style="display:none !important">
                                          <input type="text" autocomplete="off" value="" />
                                          <input type="password" autocomplete="off" value=""/>
                                       </div>
                                       <!-- end fix browser autocomplete -->
                                       <li class="control">
                                          <input type="checkbox" name="billing[create_account]" id="billing:create_account" value="1" title="Create an account for later use"  class="checkbox" /><label for="billing:create_account">Create an account for later use</label>
                                       </li>
                                       <li class="fields hidden" id="register-customer-password">
                                          <div class="field">
                                             <label for="billing:customer_password" class="required"><em>*</em>Password</label>
                                             <div class="input-box">
                                                <input type="password" name="billing[customer_password]" title="Password" id="billing:customer_password" class="input-text validate-password " autocomplete="off" value=""/>
                                             </div>
                                          </div>
                                          <div class="field">
                                             <label for="billing:confirm_password" class="required"><em>*</em>Confirm Password</label>
                                             <div class="input-box">
                                                <input type="password" name="billing[confirm_password]" title="Confirm Password" id="billing:confirm_password" class="input-text validate-cpassword " autocomplete="off" value=""/>
                                             </div>
                                          </div>
                                       </li>
                                       <div class="clear"></div>
                                       <li class="control ">
                                          <input type="checkbox" name="billing[use_for_shipping]" id="billing:use_for_shipping_yes" value="1" checked="checked" title="Ship to this address" class="checkbox   " /><label for="billing:use_for_shipping_yes">Ship to this address</label>
                                       </li>
                                    </ul>
                                 </div>
                              </form>
                              <form id="opc-address-form-shipping" class="hidden" method="post">
                                 <div>
                                    <h3>Shipping Address</h3>
                                    <ul class="form-list">
                                       <li id="shipping-new-address-form">
                                          <fieldset>
                                             <input type="hidden" name="shipping[address_id]" value="36404" id="shipping:address_id" />
                                             <ul>
                                                <li class="fields">
                                                   <div class="customer-name-middlename">
                                                      <div class="field name-firstname">
                                                         <label for="shipping:firstname" class="required"><em>*</em>First Name</label>
                                                         <div class="input-box">
                                                            <input type="text" id="shipping:firstname" name="shipping[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry"  />
                                                         </div>
                                                      </div>
                                                      <div class="field name-middlename">
                                                         <label for="shipping:middlename">Middle Name/Initial</label>
                                                         <div class="input-box">
                                                            <input type="text" id="shipping:middlename" name="shipping[middlename]" value="" title="Middle Name/Initial" class="input-text "  />
                                                         </div>
                                                      </div>
                                                      <div class="field name-lastname">
                                                         <label for="shipping:lastname" class="required"><em>*</em>Last Name</label>
                                                         <div class="input-box">
                                                            <input type="text" id="shipping:lastname" name="shipping[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry"  />
                                                         </div>
                                                      </div>
                                                   </div>
                                                </li>
                                                <div class="clear"></div>
                                                <li class="fields">
                                                   <div class="fields">
                                                      <label for="shipping:company">Company</label>
                                                      <div class="input-box">
                                                         <input type="text" id="shipping:company" name="shipping[company]" value="" title="Company" class="input-text "/>
                                                      </div>
                                                   </div>
                                                </li>
                                                <div class="clear"></div>
                                                <li class="wide">
                                                   <label for="shipping:street1" class="required"><em>*</em>Address</label>
                                                   <div class="input-box">
                                                      <input type="text" title="Street Address" name="shipping[street][]" id="shipping:street1" value="" class="input-text  required-entry" />
                                                   </div>
                                                </li>
                                                <li class="wide">
                                                   <div class="input-box">
                                                      <input type="text" title="Street Address 2" name="shipping[street][]" id="shipping:street2" value="" class="input-text " />
                                                   </div>
                                                </li>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="shipping:city" class="required"><em>*</em>City</label>
                                                      <div class="input-box">
                                                         <input type="text" title="City" name="shipping[city]" value="" class="input-text  required-entry" id="shipping:city" />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="shipping:region" class="required"><em>*</em>State/Province</label>
                                                      <div class="input-box">
                                                         <select id="shipping:region_id" name="shipping[region_id]" title="State/Province" class="validate-select" style="display:none;">
                                                            <option value="">Please select region, state or province</option>
                                                         </select>
                                                         <script type="text/javascript">
                                                            //<![CDATA[
                                                                $('shipping:region_id').setAttribute('defaultValue',  "");
                                                            //]]>
                                                         </script>
                                                         <input type="text" id="shipping:region" name="shipping[region]" value="" title="State/Province" class="input-text " style="display:none;" />
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="shipping:postcode" class="required"><em>*</em>Zip/Postal Code</label>
                                                      <div class="input-box">
                                                         <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="shipping:postcode" value="" class="input-text validate-zip-international  required-entry"  />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="shipping:country_id" class="required"><em>*</em>Country</label>
                                                      <div class="input-box">
                                                         <select name="shipping[country_id]" id="shipping:country_id" class="validate-select" title="Country" onchange="if(window.shipping)shipping.setSameAsBilling(false);">
                                                            <option value="" > </option>
                                                            <option value="AF" >Afghanistan</option>
                                                            <option value="AX" >Åland Islands</option>
                                                            <option value="AL" >Albania</option>
                                                            <option value="DZ" >Algeria</option>
                                                            <option value="AS" >American Samoa</option>
                                                            <option value="AD" >Andorra</option>
                                                            <option value="AO" >Angola</option>
                                                            <option value="AI" >Anguilla</option>
                                                            <option value="AQ" >Antarctica</option>
                                                            <option value="AG" >Antigua and Barbuda</option>
                                                            <option value="AR" >Argentina</option>
                                                            <option value="AM" >Armenia</option>
                                                            <option value="AW" >Aruba</option>
                                                            <option value="AU" >Australia</option>
                                                            <option value="AT" >Austria</option>
                                                            <option value="AZ" >Azerbaijan</option>
                                                            <option value="BS" >Bahamas</option>
                                                            <option value="BH" >Bahrain</option>
                                                            <option value="BD" >Bangladesh</option>
                                                            <option value="BB" >Barbados</option>
                                                            <option value="BY" >Belarus</option>
                                                            <option value="BE" >Belgium</option>
                                                            <option value="BZ" >Belize</option>
                                                            <option value="BJ" >Benin</option>
                                                            <option value="BM" >Bermuda</option>
                                                            <option value="BT" >Bhutan</option>
                                                            <option value="BO" >Bolivia</option>
                                                            <option value="BA" >Bosnia and Herzegovina</option>
                                                            <option value="BW" >Botswana</option>
                                                            <option value="BV" >Bouvet Island</option>
                                                            <option value="BR" >Brazil</option>
                                                            <option value="IO" >British Indian Ocean Territory</option>
                                                            <option value="VG" >British Virgin Islands</option>
                                                            <option value="BN" >Brunei</option>
                                                            <option value="BG" >Bulgaria</option>
                                                            <option value="BF" >Burkina Faso</option>
                                                            <option value="BI" >Burundi</option>
                                                            <option value="KH" >Cambodia</option>
                                                            <option value="CM" >Cameroon</option>
                                                            <option value="CA" >Canada</option>
                                                            <option value="CV" >Cape Verde</option>
                                                            <option value="KY" >Cayman Islands</option>
                                                            <option value="CF" >Central African Republic</option>
                                                            <option value="TD" >Chad</option>
                                                            <option value="CL" >Chile</option>
                                                            <option value="CN" >China</option>
                                                            <option value="CX" >Christmas Island</option>
                                                            <option value="CC" >Cocos (Keeling) Islands</option>
                                                            <option value="CO" >Colombia</option>
                                                            <option value="KM" >Comoros</option>
                                                            <option value="CG" >Congo - Brazzaville</option>
                                                            <option value="CD" >Congo - Kinshasa</option>
                                                            <option value="CK" >Cook Islands</option>
                                                            <option value="CR" >Costa Rica</option>
                                                            <option value="CI" >Côte d’Ivoire</option>
                                                            <option value="HR" >Croatia</option>
                                                            <option value="CU" >Cuba</option>
                                                            <option value="CY" >Cyprus</option>
                                                            <option value="CZ" >Czech Republic</option>
                                                            <option value="DK" >Denmark</option>
                                                            <option value="DJ" >Djibouti</option>
                                                            <option value="DM" >Dominica</option>
                                                            <option value="DO" >Dominican Republic</option>
                                                            <option value="EC" >Ecuador</option>
                                                            <option value="EG" >Egypt</option>
                                                            <option value="SV" >El Salvador</option>
                                                            <option value="GQ" >Equatorial Guinea</option>
                                                            <option value="ER" >Eritrea</option>
                                                            <option value="EE" >Estonia</option>
                                                            <option value="ET" >Ethiopia</option>
                                                            <option value="FK" >Falkland Islands</option>
                                                            <option value="FO" >Faroe Islands</option>
                                                            <option value="FJ" >Fiji</option>
                                                            <option value="FI" >Finland</option>
                                                            <option value="FR" >France</option>
                                                            <option value="GF" >French Guiana</option>
                                                            <option value="PF" >French Polynesia</option>
                                                            <option value="TF" >French Southern Territories</option>
                                                            <option value="GA" >Gabon</option>
                                                            <option value="GM" >Gambia</option>
                                                            <option value="GE" >Georgia</option>
                                                            <option value="DE" >Germany</option>
                                                            <option value="GH" >Ghana</option>
                                                            <option value="GI" >Gibraltar</option>
                                                            <option value="GR" >Greece</option>
                                                            <option value="GL" >Greenland</option>
                                                            <option value="GD" >Grenada</option>
                                                            <option value="GP" >Guadeloupe</option>
                                                            <option value="GU" >Guam</option>
                                                            <option value="GT" >Guatemala</option>
                                                            <option value="GG" >Guernsey</option>
                                                            <option value="GN" >Guinea</option>
                                                            <option value="GW" >Guinea-Bissau</option>
                                                            <option value="GY" >Guyana</option>
                                                            <option value="HT" >Haiti</option>
                                                            <option value="HM" >Heard &amp; McDonald Islands</option>
                                                            <option value="HN" >Honduras</option>
                                                            <option value="HK" >Hong Kong SAR China</option>
                                                            <option value="HU" >Hungary</option>
                                                            <option value="IS" >Iceland</option>
                                                            <option value="IN" >India</option>
                                                            <option value="ID" >Indonesia</option>
                                                            <option value="IR" >Iran</option>
                                                            <option value="IQ" >Iraq</option>
                                                            <option value="IE" >Ireland</option>
                                                            <option value="IM" >Isle of Man</option>
                                                            <option value="IL" >Israel</option>
                                                            <option value="IT" >Italy</option>
                                                            <option value="JM" >Jamaica</option>
                                                            <option value="JP" >Japan</option>
                                                            <option value="JE" >Jersey</option>
                                                            <option value="JO" >Jordan</option>
                                                            <option value="KZ" >Kazakhstan</option>
                                                            <option value="KE" >Kenya</option>
                                                            <option value="KI" >Kiribati</option>
                                                            <option value="KW" >Kuwait</option>
                                                            <option value="KG" >Kyrgyzstan</option>
                                                            <option value="LA" >Laos</option>
                                                            <option value="LV" >Latvia</option>
                                                            <option value="LB" >Lebanon</option>
                                                            <option value="LS" >Lesotho</option>
                                                            <option value="LR" >Liberia</option>
                                                            <option value="LY" >Libya</option>
                                                            <option value="LI" >Liechtenstein</option>
                                                            <option value="LT" >Lithuania</option>
                                                            <option value="LU" >Luxembourg</option>
                                                            <option value="MO" >Macau SAR China</option>
                                                            <option value="MK" >Macedonia</option>
                                                            <option value="MG" >Madagascar</option>
                                                            <option value="MW" >Malawi</option>
                                                            <option value="MY" >Malaysia</option>
                                                            <option value="MV" >Maldives</option>
                                                            <option value="ML" >Mali</option>
                                                            <option value="MT" >Malta</option>
                                                            <option value="MH" >Marshall Islands</option>
                                                            <option value="MQ" >Martinique</option>
                                                            <option value="MR" >Mauritania</option>
                                                            <option value="MU" >Mauritius</option>
                                                            <option value="YT" >Mayotte</option>
                                                            <option value="MX" >Mexico</option>
                                                            <option value="FM" >Micronesia</option>
                                                            <option value="MD" >Moldova</option>
                                                            <option value="MC" >Monaco</option>
                                                            <option value="MN" >Mongolia</option>
                                                            <option value="ME" >Montenegro</option>
                                                            <option value="MS" >Montserrat</option>
                                                            <option value="MA" >Morocco</option>
                                                            <option value="MZ" >Mozambique</option>
                                                            <option value="MM" >Myanmar (Burma)</option>
                                                            <option value="NA" >Namibia</option>
                                                            <option value="NR" >Nauru</option>
                                                            <option value="NP" >Nepal</option>
                                                            <option value="NL" >Netherlands</option>
                                                            <option value="AN" >Netherlands Antilles</option>
                                                            <option value="NC" >New Caledonia</option>
                                                            <option value="NZ" >New Zealand</option>
                                                            <option value="NI" >Nicaragua</option>
                                                            <option value="NE" >Niger</option>
                                                            <option value="NG" >Nigeria</option>
                                                            <option value="NU" >Niue</option>
                                                            <option value="NF" >Norfolk Island</option>
                                                            <option value="MP" >Northern Mariana Islands</option>
                                                            <option value="KP" >North Korea</option>
                                                            <option value="NO" >Norway</option>
                                                            <option value="OM" >Oman</option>
                                                            <option value="PK" >Pakistan</option>
                                                            <option value="PW" >Palau</option>
                                                            <option value="PS" >Palestinian Territories</option>
                                                            <option value="PA" >Panama</option>
                                                            <option value="PG" >Papua New Guinea</option>
                                                            <option value="PY" >Paraguay</option>
                                                            <option value="PE" >Peru</option>
                                                            <option value="PH" >Philippines</option>
                                                            <option value="PN" >Pitcairn Islands</option>
                                                            <option value="PL" >Poland</option>
                                                            <option value="PT" >Portugal</option>
                                                            <option value="PR" >Puerto Rico</option>
                                                            <option value="QA" >Qatar</option>
                                                            <option value="RE" >Réunion</option>
                                                            <option value="RO" >Romania</option>
                                                            <option value="RU" >Russia</option>
                                                            <option value="RW" >Rwanda</option>
                                                            <option value="BL" >Saint Barthélemy</option>
                                                            <option value="SH" >Saint Helena</option>
                                                            <option value="KN" >Saint Kitts and Nevis</option>
                                                            <option value="LC" >Saint Lucia</option>
                                                            <option value="MF" >Saint Martin</option>
                                                            <option value="PM" >Saint Pierre and Miquelon</option>
                                                            <option value="WS" >Samoa</option>
                                                            <option value="SM" >San Marino</option>
                                                            <option value="ST" >São Tomé and Príncipe</option>
                                                            <option value="SA" >Saudi Arabia</option>
                                                            <option value="SN" >Senegal</option>
                                                            <option value="RS" >Serbia</option>
                                                            <option value="SC" >Seychelles</option>
                                                            <option value="SL" >Sierra Leone</option>
                                                            <option value="SG" >Singapore</option>
                                                            <option value="SK" >Slovakia</option>
                                                            <option value="SI" >Slovenia</option>
                                                            <option value="SB" >Solomon Islands</option>
                                                            <option value="SO" >Somalia</option>
                                                            <option value="ZA" >South Africa</option>
                                                            <option value="GS" >South Georgia &amp; South Sandwich Islands</option>
                                                            <option value="KR" >South Korea</option>
                                                            <option value="ES" >Spain</option>
                                                            <option value="LK" >Sri Lanka</option>
                                                            <option value="VC" >St. Vincent &amp; Grenadines</option>
                                                            <option value="SD" >Sudan</option>
                                                            <option value="SR" >Suriname</option>
                                                            <option value="SJ" >Svalbard and Jan Mayen</option>
                                                            <option value="SZ" >Swaziland</option>
                                                            <option value="SE" >Sweden</option>
                                                            <option value="CH" >Switzerland</option>
                                                            <option value="SY" >Syria</option>
                                                            <option value="TW" >Taiwan</option>
                                                            <option value="TJ" >Tajikistan</option>
                                                            <option value="TZ" >Tanzania</option>
                                                            <option value="TH" >Thailand</option>
                                                            <option value="TL" >Timor-Leste</option>
                                                            <option value="TG" >Togo</option>
                                                            <option value="TK" >Tokelau</option>
                                                            <option value="TO" >Tonga</option>
                                                            <option value="TT" >Trinidad and Tobago</option>
                                                            <option value="TN" >Tunisia</option>
                                                            <option value="TR" >Turkey</option>
                                                            <option value="TM" >Turkmenistan</option>
                                                            <option value="TC" >Turks and Caicos Islands</option>
                                                            <option value="TV" >Tuvalu</option>
                                                            <option value="UG" >Uganda</option>
                                                            <option value="UA" >Ukraine</option>
                                                            <option value="AE" >United Arab Emirates</option>
                                                            <option value="GB" >United Kingdom</option>
                                                            <option value="US" selected="selected" >United States</option>
                                                            <option value="UY" >Uruguay</option>
                                                            <option value="UM" >U.S. Outlying Islands</option>
                                                            <option value="VI" >U.S. Virgin Islands</option>
                                                            <option value="UZ" >Uzbekistan</option>
                                                            <option value="VU" >Vanuatu</option>
                                                            <option value="VA" >Vatican City</option>
                                                            <option value="VE" >Venezuela</option>
                                                            <option value="VN" >Vietnam</option>
                                                            <option value="WF" >Wallis and Futuna</option>
                                                            <option value="EH" >Western Sahara</option>
                                                            <option value="YE" >Yemen</option>
                                                            <option value="ZM" >Zambia</option>
                                                            <option value="ZW" >Zimbabwe</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="fields">
                                                   <div class="field">
                                                      <label for="shipping:telephone" class="required"><em>*</em>Telephone</label>
                                                      <div class="input-box">
                                                         <input type="text" name="shipping[telephone]" value="" title="Telephone" class="input-text  required-entry" id="shipping:telephone" />
                                                      </div>
                                                   </div>
                                                   <div class="field">
                                                      <label for="shipping:fax">Fax</label>
                                                      <div class="input-box">
                                                         <input type="text" name="shipping[fax]" value="" title="Fax" class="input-text " id="shipping:fax"  />
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="no-display"><input type="hidden" name="shipping[save_in_address_book]" value="1" /></li>
                                             </ul>
                                          </fieldset>
                                       </li>
                                       <li class="control hidden">
                                          <input type="checkbox" name="shipping[same_as_billing]" id="shipping:same_as_billing" value="1" checked="checked" title="Use Billing Address" class="checkbox" /><label for="shipping:same_as_billing">Use Billing Address</label>
                                       </li>
                                    </ul>
                                 </div>
                              </form>
                           </div>
                           <div class="opc-col-center">
                              <div class="shipping-block">
                                 <h3>Shipping Method</h3>
                                 <div id="shipping-block-methods">
                                    <form id="opc-co-shipping-method-form" autocomplete="off">
                                       <div id="checkout-shipping-method-load">
                                          <dl class="sp-methods">
                                             <dt>Flat Rate</dt>
                                             <dd>
                                                <ul>
                                                   <li>
                                                      <span class="no-display"><input name="shipping_method" type="radio" value="flatrate_flatrate" id="s_method_flatrate_flatrate" checked="checked" /></span>
                                                      <label for="s_method_flatrate_flatrate">Fixed                                                                        <span class="price">$5.00</span>                                                </label>
                                                   </li>
                                                </ul>
                                             </dd>
                                          </dl>
                                          <script type="text/javascript">
                                             // //<![CDATA[
                                             //             var shippingCodePrice = {'flatrate_flatrate':5};
                                                 
                                             //     $$('input[type="radio"][name="shipping_method"]').each(function(el){
                                             //         Event.observe(el, 'click', function(){
                                             //             if (el.checked == true) {
                                             //                 var getShippingCode = el.getValue();
                                             //                                     var newPrice = shippingCodePrice[getShippingCode];
                                             //                     if (!lastPrice) {
                                             //                         lastPrice = newPrice;
                                             //                         quoteBaseGrandTotal += newPrice;
                                             //                     }
                                             //                     if (newPrice != lastPrice) {
                                             //                         quoteBaseGrandTotal += (newPrice-lastPrice);
                                             //                         lastPrice = newPrice;
                                             //                     }
                                             //                                 checkQuoteBaseGrandTotal = quoteBaseGrandTotal;
                                             //                 return false;
                                             //             }
                                             //        });
                                             //     });
                                             // //]]>
                                          </script>
                                       </div>
                                       <div id="onepage-checkout-shipping-method-additional-load">
                                          <script type="text/javascript">
                                             //<![CDATA[
                                             // if(!window.toogleVisibilityOnObjects) {
                                             //     var toogleVisibilityOnObjects = function(source, objects) {
                                             //         if($(source) && $(source).checked) {
                                             //             objects.each(function(item){
                                             //                 $(item).show();
                                             //                 $$('#' + item + ' .input-text').each(function(item) {
                                             //                     item.removeClassName('validation-passed');
                                             //                 });
                                             //             });
                                             //         } else {
                                             //             objects.each(function(item){
                                             //                 if ($(item)) {
                                             //                     $(item).hide();
                                             //                     $$('#' + item + ' .input-text').each(function(sitem) {
                                             //                         sitem.addClassName('validation-passed');
                                             //                     });
                                             //                     $$('#' + item + ' .giftmessage-area').each(function(sitem) {
                                             //                         sitem.value = '';
                                             //                     });
                                             //                     $$('#' + item + ' .checkbox').each(function(sitem) {
                                             //                         sitem.checked = false;
                                             //                     });
                                             //                     $$('#' + item + ' .select').each(function(sitem) {
                                             //                         sitem.value = '';
                                             //                     });
                                             //                     $$('#' + item + ' .price-box').each(function(sitem) {
                                             //                         sitem.addClassName('no-display');
                                             //                     });
                                             //                 }
                                             //             });
                                             //         }
                                             //     }
                                             // }
                                             
                                             // if(!window.toogleRequired) {
                                             //     var toogleRequired = function (source, objects)
                                             //     {
                                             //         if(!$(source).value.blank()) {
                                             //             objects.each(function(item) {
                                             //                $(item).addClassName('required-entry');
                                             //             });
                                             //         } else {
                                             //             objects.each(function(item) {
                                             //                 if (typeof shippingMethod != 'undefined' && shippingMethod.validator) {
                                             //                    shippingMethod.validator.reset(item);
                                             //                 }
                                             //                 $(item).removeClassName('required-entry');
                                             //             });
                                             
                                             //         }
                                             //     }
                                             // }
                                             // if(window.shipping) {
                                             
                                             // shipping.onSave = function(evt){
                                             //     new Ajax.Updater('onepage-checkout-shipping-method-additional-load', 'http://newsmartwave.net/magento/porto/index.php/demo6_en/onepage/index/getAdditional/', {onSuccess: function() {
                                             //           this.nextStep(evt);
                                             //     }.bind(this), evalScripts:true});
                                             // }.bindAsEventListener(shipping);
                                             
                                             // billing.onSave = function(evt){
                                             //     new Ajax.Updater('onepage-checkout-shipping-method-additional-load', 'http://newsmartwave.net/magento/porto/index.php/demo6_en/onepage/index/getAdditional/', {onSuccess: function() {
                                             //           this.nextStep(evt);
                                             //     }.bind(this), evalScripts:true});
                                             // }.bindAsEventListener(billing);
                                             
                                             // }
                                             // //]]>
                                          </script>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="discount-block">
                                 <h3>Discount Codes<span class='expand_plus theme-bg-color'></span></h3>
                                 <div  class="collapse-block hidden">
                                    <form id="opc-discount-coupon-form" action="../index.htmlcheckout/cart/couponPost/" method="post">
                                       <div class="discount">
                                          <div class="discount-form">
                                             <label for="coupon_code">Enter your coupon code:</label>            
                                             <div class="input-box">
                                                <input class="input-text" id="coupon_code" type="text" name="coupon_code" value="" autocomplete="off"/>
                                             </div>
                                             <div class="buttons-set">
                                                <button type="button" title="Apply" class="button apply-coupon"  value="Apply"><span><span>Apply</span></span></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="opc-col-right">
                              <div class="payment-block ">
                                 <h3>Payment Method</h3>
                                 <script type="text/javascript">
                                    // //<![CDATA[
                                    //     var quoteBaseGrandTotal = 79;
                                    //     var checkQuoteBaseGrandTotal = quoteBaseGrandTotal;
                                    //     var payment = new Payment('co-payment-form', 'http://newsmartwave.net/magento/porto/index.php/demo6_en/checkout/onepage/savePayment/');
                                    //     var lastPrice;
                                    // //]]>
                                 </script>
                                 <form action="" id="co-payment-form">
                                    <fieldset id="checkout-payment-method-load">
                                       <dt id="dt_method_checkmo">
                                          <input id="p_method_checkmo" value="checkmo" type="radio" name="payment[method]" title="Check / Money order" onclick="payment.switchMethod('checkmo')" checked="checked" class="radio" />
                                          <label for="p_method_checkmo">Check / Money order </label>
                                       </dt>
                                       <dt id="dt_method_ccsave">
                                          <input id="p_method_ccsave" value="ccsave" type="radio" name="payment[method]" title="Credit Card (saved)" onclick="payment.switchMethod('ccsave')" class="radio" />
                                          <label for="p_method_ccsave">Credit Card (saved) </label>
                                       </dt>
                                       <dd id="dd_method_ccsave">
                                          <ul class="form-list" id="payment_form_ccsave" style="display:none;">
                                             <li>
                                                <label for="ccsave_cc_owner" class="required"><em>*</em>Name on Card</label>
                                                <div class="input-box">
                                                   <input type="text" title="Name on Card" class="input-text required-entry" id="ccsave_cc_owner" name="payment[cc_owner]" value="" />
                                                </div>
                                             </li>
                                             <li>
                                                <label for="ccsave_cc_type" class="required"><em>*</em>Credit Card Type</label>
                                                <div class="input-box">
                                                   <select id="ccsave_cc_type" name="payment[cc_type]" title="Credit Card Type" class="required-entry validate-cc-type-select">
                                                      <option value="">--Please Select--</option>
                                                      <option value="AE">American Express</option>
                                                      <option value="VI">Visa</option>
                                                      <option value="MC">MasterCard</option>
                                                      <option value="DI">Discover</option>
                                                   </select>
                                                </div>
                                             </li>
                                             <li>
                                                <label for="ccsave_cc_number" class="required"><em>*</em>Credit Card Number</label>
                                                <div class="input-box">
                                                   <input type="text" id="ccsave_cc_number" name="payment[cc_number]" title="Credit Card Number" class="input-text validate-cc-number validate-cc-type" value="" />
                                                </div>
                                             </li>
                                             <li>
                                                <label for="ccsave_expiration" class="required"><em>*</em>Expiration Date</label>
                                                <div class="input-box">
                                                   <div class="v-fix">
                                                      <select id="ccsave_expiration" name="payment[cc_exp_month]" class="month validate-cc-exp required-entry">
                                                         <option value="" selected="selected">Month</option>
                                                         <option value="1">01 - January</option>
                                                         <option value="2">02 - February</option>
                                                         <option value="3">03 - March</option>
                                                         <option value="4">04 - April</option>
                                                         <option value="5">05 - May</option>
                                                         <option value="6">06 - June</option>
                                                         <option value="7">07 - July</option>
                                                         <option value="8">08 - August</option>
                                                         <option value="9">09 - September</option>
                                                         <option value="10">10 - October</option>
                                                         <option value="11">11 - November</option>
                                                         <option value="12">12 - December</option>
                                                      </select>
                                                   </div>
                                                   <div class="v-fix">
                                                      <select id="ccsave_expiration_yr" name="payment[cc_exp_year]" class="year required-entry">
                                                         <option value="" selected="selected">Year</option>
                                                         <option value="2016">2016</option>
                                                         <option value="2017">2017</option>
                                                         <option value="2018">2018</option>
                                                         <option value="2019">2019</option>
                                                         <option value="2020">2020</option>
                                                         <option value="2021">2021</option>
                                                         <option value="2022">2022</option>
                                                         <option value="2023">2023</option>
                                                         <option value="2024">2024</option>
                                                         <option value="2025">2025</option>
                                                         <option value="2026">2026</option>
                                                      </select>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <label for="ccsave_cc_cid" class="required"><em>*</em>Card Verification Number</label>
                                                <div class="input-box">
                                                   <div class="v-fix">
                                                      <input type="text" title="Card Verification Number" class="input-text cvv required-entry validate-cc-cvn" id="ccsave_cc_cid" name="payment[cc_cid]" value="" />
                                                   </div>
                                                   <a href="#" class="cvv-what-is-this">What is this?</a>
                                                </div>
                                             </li>
                                          </ul>
                                       </dd>
                                       <script type="text/javascript">
                                          // //<![CDATA[
                                          //     payment.init();
                                          //     //]]>
                                       </script>
                                    </fieldset>
                                 </form>
                                 <div class="tool-tip" id="payment-tool-tip" style="display:none;">
                                    <div class="btn-close"><a href="#" id="payment-tool-tip-close" title="Close">Close</a></div>
                                    <div class="tool-tip-content"><img src="http://newsmartwave.net/magento/porto/skin/frontend/base/default/images/cvv.gif" alt="Card Verification Number Visual Reference" title="Card Verification Number Visual Reference" /></div>
                                 </div>
                                 <script type="text/javascript">
                                    // //<![CDATA[
                                    //     function toggleToolTip(event){
                                    //         if($('payment-tool-tip')){
                                    //             $('payment-tool-tip').setStyle({
                                    //                 top: (Event.pointerY(event)-560)+'px'//,
                                    //                 //left: (Event.pointerX(event)+100)+'px'
                                    //             })
                                    //             $('payment-tool-tip').toggle();
                                    //         }
                                    //         Event.stop(event);
                                    //     }
                                    //     if($('payment-tool-tip-close')){
                                    //         Event.observe($('payment-tool-tip-close'), 'click', toggleToolTip);
                                    //     }
                                    // //]]>
                                 </script>
                                 <script type="text/javascript">
                                    //<![CDATA[
                                        // payment.currentMethod = "checkmo";
                                    //]]>
                                 </script>
                              </div>
                              <div class="opc-review-actions" id="checkout-review-submit">
                                 <h5 class="grand_total">Grand Total<span class="price">$79.00</span></h5>
                                 <button type="button" title="Place Order Now" class="button btn-checkout opc-btn-checkout" onclick="window.location='success.html';"><span><span>Place Order Now</span></span></button>

                              </div>
                           </div>
                        </div>
                     </div>
                     <script>
                        // var vopc = '4.0.9';
                        // IWD.OPC.Checkout.config = '{"baseUrl":"http:\/\/newsmartwave.net\/magento\/porto\/index.php\/demo6_en\/","isLoggedIn":0,"comment":"0","paypalLightBoxEnabled":true}';
                            
                     </script>
                     <div id="agree_error" style="display:none !important;">Please agree to all the terms and conditions before placing the order.</div>
                     <div id="pssm_msg" style="display:none !important;">Please specify shipping method.</div>
                     <div class="opc-ajax-loader">
                        <div style="width:100%;text-align:center;position:absolute;left:0;top:50%;font-size:16px;z-index:10;margin-top:-8px;">
                           <i class="ajax-loader large animate-spin"></i>
                        </div>
                     </div>
                     <div class="opc-message-wrapper design_package_smartwave design_theme_porto">
                        <div class="opc-messages">
                           <a class="close-message-wrapper"><i class="fa fa-close"></i></a>
                           <div class="opc-message-container"></div>
                           <div class="opc-messages-action"><button class="button"><span><span>Close</span></span></button></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>