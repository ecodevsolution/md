<?php
/* @var $this yii\web\View */
$this->title = 'New Address';
?>
<div class="main-container col2-left-layout">
               <div class="main container">
                  <div class="row">
                     <div class="col-main col-sm-9 f-right">
                        <div class="my-account">
                           <div class="page-title">
                              <h1>Add New Address</h1>
                           </div>
                           <form action="address_book.html" method="post" id="form-validate">
                              <div class="fieldset">
                                 <input name="form_key" type="hidden" value="Nwo6Xy6zjgA7pf7S" />
                                 <input type="hidden" name="success_url" value="" />
                                 <input type="hidden" name="error_url" value="" />
                                 <h2 class="legend">Contact Information</h2>
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
                                    <li class="wide">
                                       <label for="company">Company</label>
                                       <div class="input-box">
                                          <input type="text" name="company" id="company" title="Company" value="" class="input-text " />
                                       </div>
                                    </li>
                                    <li class="fields">
                                       <div class="field">
                                          <label for="telephone" class="required"><em>*</em>Telephone</label>
                                          <div class="input-box">
                                             <input type="text" name="telephone" value="" title="Telephone" class="input-text   required-entry" id="telephone" />
                                          </div>
                                       </div>
                                       <div class="field">
                                          <label for="fax">Fax</label>
                                          <div class="input-box">
                                             <input type="text" name="fax" id="fax" title="Fax" value="" class="input-text " />
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="fieldset">
                                 <h2 class="legend">Address</h2>
                                 <ul class="form-list">
                                    <li class="wide">
                                       <label for="street_1" class="required"><em>*</em>Street Address</label>
                                       <div class="input-box">
                                          <input type="text" name="street[]" value="" title="Street Address" id="street_1" class="input-text  required-entry" />
                                       </div>
                                    </li>
                                    <li class="wide">
                                       <div class="input-box">
                                          <input type="text" name="street[]" value="" title="Street Address 2" id="street_2" class="input-text " />
                                       </div>
                                    </li>
                                    <li class="fields">
                                       <div class="field">
                                          <label for="city" class="required"><em>*</em>City</label>
                                          <div class="input-box">
                                             <input type="text" name="city" value=""  title="City" class="input-text  required-entry" id="city" />
                                          </div>
                                       </div>
                                       <div class="field">
                                          <label for="region_id" class="required"><em>*</em>State/Province</label>
                                          <div class="input-box">
                                             <select id="region_id" name="region_id" title="State/Province" class="validate-select" style="display:none;">
                                                <option value="">Please select region, state or province</option>
                                             </select>
                                             <script type="text/javascript">
                                                //<![CDATA[
                                                    $('region_id').setAttribute('defaultValue',  "0");
                                                //]]>
                                             </script>
                                             <input type="text" id="region" name="region" value=""  title="State/Province" class="input-text " />
                                          </div>
                                       </div>
                                    </li>
                                    <li class="fields">
                                       <div class="field">
                                          <label for="zip" class="required"><em>*</em>Zip/Postal Code</label>
                                          <div class="input-box">
                                             <input type="text" name="postcode" value="" title="Zip/Postal Code" id="zip" class="input-text validate-zip-international  required-entry" />
                                          </div>
                                       </div>
                                       <div class="field">
                                          <label for="country" class="required"><em>*</em>Country</label>
                                          <div class="input-box">
                                             <select name="country_id" id="country" class="validate-select" title="Country" >
                                                <option value="" > </option>
                                                <option value="AF" >Afghanistan</option>
                                                <option value="AX" >�land Islands</option>
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
                                                <option value="CI" >C�te d�Ivoire</option>
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
                                                <option value="RE" >R�union</option>
                                                <option value="RO" >Romania</option>
                                                <option value="RU" >Russia</option>
                                                <option value="RW" >Rwanda</option>
                                                <option value="BL" >Saint Barth�lemy</option>
                                                <option value="SH" >Saint Helena</option>
                                                <option value="KN" >Saint Kitts and Nevis</option>
                                                <option value="LC" >Saint Lucia</option>
                                                <option value="MF" >Saint Martin</option>
                                                <option value="PM" >Saint Pierre and Miquelon</option>
                                                <option value="WS" >Samoa</option>
                                                <option value="SM" >San Marino</option>
                                                <option value="ST" >S�o Tom� and Pr�ncipe</option>
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
                                    <li class="control">
                                       <input type="checkbox" id="primary_billing" name="default_billing" value="1" title="Use as My Default Billing Address" class="checkbox" /><label for="primary_billing">Use as my default billing address</label>
                                    </li>
                                    <li class="control">
                                       <input type="checkbox" id="primary_shipping" name="default_shipping" value="1" title="Use as My Default Shipping Address" class="checkbox" /><label for="primary_shipping">Use as my default shipping address</label>
                                    </li>
                                 </ul>
                              </div>
                              <div class="buttons-set">
                                 <p class="required">* Required Fields</p>
                                 <p class="back-link"><a href="addressbook"><small>&laquo; </small>Back</a></p>
                                 <button data-action="save-customer-address" type="submit" title="Save Address" class="button"><span><span>Save Address</span></span></button>
                              </div>
                           </form>
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