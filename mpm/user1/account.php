<?php
include "header.php";

$error = "";
$msg = "";

            if(isset($_POST['update_password'])){

              $old_password = $_POST['old_password'];
              $new_password = $_POST['new_password'];
              $confirm = $_POST['new_passwordv'];

              if(strlen($new_password) > 5 && strlen($confirm) > 5){

                if($new_password == $confirm){

                  $sql = "SELECT * from members WHERE id = '$user_id' && password = '$old_password'";
                   $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));

                   $num = mysqli_num_rows($result);

                   if($num == 1){

                    $sql = "UPDATE members set password = '$new_password' WHERE id = '$user_id'";
                   $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
                   if($result){

                  
     $error = '<div class="alert alert-success text-center">
    Your password has been changed successfully

     </div>';

      ///// to do errorr///////

    }




                   }else{
     $error = '<div class="alert alert-danger text-center">
   Error: The old password You entered is incorrect 

     </div>';

      ///// to do errorr///////

    }



                   }else{
     $error = '<div class="alert alert-danger text-center">
     Error: Password does not match its comfirmation

     </div>';

      ///// to do errorr///////

    }



                }else{
     $error = '<div class="alert alert-danger text-center">
   
    Password must be greater than 5 characters

     </div>';

      ///// to do errorr///////

    }



              }



              if(isset($_POST['update_user'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $phone = $_POST['phone'];
                $params =  array("firstname"=>$fname,"lastname"=>$lname,"phonenumber"=>$phone);

                $result = $model->updateTable("members",$params,$user_id);
                if($result['status']){
                   $msg = '<div class="alert alert-success text-center">
    Your password has been changed successfully

     </div>';

                }else{
                    $msg = '<div class="alert alert-danger text-center">
    Your password has been changed successfully

     </div>';

                }

              }





            ?>






        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
      <div class="container-fluid">
        <!-- Add Project -->
        
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>My Account</h4>
                           
                        </div>
                    </div>
                 
                </div>
                <!-- row -->
                
     <div class="row">
     
            <div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="card-title mb-4">User Information</div>
                    <?php
                    echo $msg
                    ?>
                   <form  method="post">
                   <input type="hidden" name="fname" id="fname" class="form-control" value="<?php  echo $firstname ?>">
                   <input type="hidden" name="lname" id="lname" class="form-control" value="<?php  echo $lastname ?>">
                   <input type="hidden" name="phone" id="phone" class="form-control" value="<?php  echo $phone ?>">



										<div class="row">
											<div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Country</label>
													<div class="input-group">
														<div class="input-group-append w-100">
                                                                                                                    <select class="form-control select2 br-0 bg-light nice-select" name="country" data-placeholder="Choose one (with optgroup)" style="display: none;">
																<optgroup label="Coins">
																	<option disabled="" selected="" value="Not Available"></option>
                                                                                                                                           <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
   <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
																</optgroup>
															</select><div class="nice-select form-control select2 br-0 bg-light" tabindex="0"><span class="current"></span><ul class="list"><li data-value="Not Available" class="option selected disabled"></li><li data-value="Afganistan" class="option">Afghanistan</li><li data-value="Albania" class="option">Albania</li><li data-value="Algeria" class="option">Algeria</li><li data-value="American Samoa" class="option">American Samoa</li><li data-value="Andorra" class="option">Andorra</li><li data-value="Angola" class="option">Angola</li><li data-value="Anguilla" class="option">Anguilla</li><li data-value="Antigua &amp; Barbuda" class="option">Antigua &amp; Barbuda</li><li data-value="Argentina" class="option">Argentina</li><li data-value="Armenia" class="option">Armenia</li><li data-value="Aruba" class="option">Aruba</li><li data-value="Australia" class="option">Australia</li><li data-value="Austria" class="option">Austria</li><li data-value="Azerbaijan" class="option">Azerbaijan</li><li data-value="Bahamas" class="option">Bahamas</li><li data-value="Bahrain" class="option">Bahrain</li><li data-value="Bangladesh" class="option">Bangladesh</li><li data-value="Barbados" class="option">Barbados</li><li data-value="Belarus" class="option">Belarus</li><li data-value="Belgium" class="option">Belgium</li><li data-value="Belize" class="option">Belize</li><li data-value="Benin" class="option">Benin</li><li data-value="Bermuda" class="option">Bermuda</li><li data-value="Bhutan" class="option">Bhutan</li><li data-value="Bolivia" class="option">Bolivia</li><li data-value="Bonaire" class="option">Bonaire</li><li data-value="Bosnia &amp; Herzegovina" class="option">Bosnia &amp; Herzegovina</li><li data-value="Botswana" class="option">Botswana</li><li data-value="Brazil" class="option">Brazil</li><li data-value="British Indian Ocean Ter" class="option">British Indian Ocean Ter</li><li data-value="Brunei" class="option">Brunei</li><li data-value="Bulgaria" class="option">Bulgaria</li><li data-value="Burkina Faso" class="option">Burkina Faso</li><li data-value="Burundi" class="option">Burundi</li><li data-value="Cambodia" class="option">Cambodia</li><li data-value="Cameroon" class="option">Cameroon</li><li data-value="Canada" class="option">Canada</li><li data-value="Canary Islands" class="option">Canary Islands</li><li data-value="Cape Verde" class="option">Cape Verde</li><li data-value="Cayman Islands" class="option">Cayman Islands</li><li data-value="Central African Republic" class="option">Central African Republic</li><li data-value="Chad" class="option">Chad</li><li data-value="Channel Islands" class="option">Channel Islands</li><li data-value="Chile" class="option">Chile</li><li data-value="China" class="option">China</li><li data-value="Christmas Island" class="option">Christmas Island</li><li data-value="Cocos Island" class="option">Cocos Island</li><li data-value="Colombia" class="option">Colombia</li><li data-value="Comoros" class="option">Comoros</li><li data-value="Congo" class="option">Congo</li><li data-value="Cook Islands" class="option">Cook Islands</li><li data-value="Costa Rica" class="option">Costa Rica</li><li data-value="Cote DIvoire" class="option">Cote DIvoire</li><li data-value="Croatia" class="option">Croatia</li><li data-value="Cuba" class="option">Cuba</li><li data-value="Curaco" class="option">Curacao</li><li data-value="Cyprus" class="option">Cyprus</li><li data-value="Czech Republic" class="option">Czech Republic</li><li data-value="Denmark" class="option">Denmark</li><li data-value="Djibouti" class="option">Djibouti</li><li data-value="Dominica" class="option">Dominica</li><li data-value="Dominican Republic" class="option">Dominican Republic</li><li data-value="East Timor" class="option">East Timor</li><li data-value="Ecuador" class="option">Ecuador</li><li data-value="Egypt" class="option">Egypt</li><li data-value="El Salvador" class="option">El Salvador</li><li data-value="Equatorial Guinea" class="option">Equatorial Guinea</li><li data-value="Eritrea" class="option">Eritrea</li><li data-value="Estonia" class="option">Estonia</li><li data-value="Ethiopia" class="option">Ethiopia</li><li data-value="Falkland Islands" class="option">Falkland Islands</li><li data-value="Faroe Islands" class="option">Faroe Islands</li><li data-value="Fiji" class="option">Fiji</li><li data-value="Finland" class="option">Finland</li><li data-value="France" class="option">France</li><li data-value="French Guiana" class="option">French Guiana</li><li data-value="French Polynesia" class="option">French Polynesia</li><li data-value="French Southern Ter" class="option">French Southern Ter</li><li data-value="Gabon" class="option">Gabon</li><li data-value="Gambia" class="option">Gambia</li><li data-value="Georgia" class="option">Georgia</li><li data-value="Germany" class="option">Germany</li><li data-value="Ghana" class="option">Ghana</li><li data-value="Gibraltar" class="option">Gibraltar</li><li data-value="Great Britain" class="option">Great Britain</li><li data-value="Greece" class="option">Greece</li><li data-value="Greenland" class="option">Greenland</li><li data-value="Grenada" class="option">Grenada</li><li data-value="Guadeloupe" class="option">Guadeloupe</li><li data-value="Guam" class="option">Guam</li><li data-value="Guatemala" class="option">Guatemala</li><li data-value="Guinea" class="option">Guinea</li><li data-value="Guyana" class="option">Guyana</li><li data-value="Haiti" class="option">Haiti</li><li data-value="Hawaii" class="option">Hawaii</li><li data-value="Honduras" class="option">Honduras</li><li data-value="Hong Kong" class="option">Hong Kong</li><li data-value="Hungary" class="option">Hungary</li><li data-value="Iceland" class="option">Iceland</li><li data-value="Indonesia" class="option">Indonesia</li><li data-value="India" class="option">India</li><li data-value="Iran" class="option">Iran</li><li data-value="Iraq" class="option">Iraq</li><li data-value="Ireland" class="option">Ireland</li><li data-value="Isle of Man" class="option">Isle of Man</li><li data-value="Israel" class="option">Israel</li><li data-value="Italy" class="option">Italy</li><li data-value="Jamaica" class="option">Jamaica</li><li data-value="Japan" class="option">Japan</li><li data-value="Jordan" class="option">Jordan</li><li data-value="Kazakhstan" class="option">Kazakhstan</li><li data-value="Kenya" class="option">Kenya</li><li data-value="Kiribati" class="option">Kiribati</li><li data-value="Korea North" class="option">Korea North</li><li data-value="Korea Sout" class="option">Korea South</li><li data-value="Kuwait" class="option">Kuwait</li><li data-value="Kyrgyzstan" class="option">Kyrgyzstan</li><li data-value="Laos" class="option">Laos</li><li data-value="Latvia" class="option">Latvia</li><li data-value="Lebanon" class="option">Lebanon</li><li data-value="Lesotho" class="option">Lesotho</li><li data-value="Liberia" class="option">Liberia</li><li data-value="Libya" class="option">Libya</li><li data-value="Liechtenstein" class="option">Liechtenstein</li><li data-value="Lithuania" class="option">Lithuania</li><li data-value="Luxembourg" class="option">Luxembourg</li><li data-value="Macau" class="option">Macau</li><li data-value="Macedonia" class="option">Macedonia</li><li data-value="Madagascar" class="option">Madagascar</li><li data-value="Malaysia" class="option">Malaysia</li><li data-value="Malawi" class="option">Malawi</li><li data-value="Maldives" class="option">Maldives</li><li data-value="Mali" class="option">Mali</li><li data-value="Malta" class="option">Malta</li><li data-value="Marshall Islands" class="option">Marshall Islands</li><li data-value="Martinique" class="option">Martinique</li><li data-value="Mauritania" class="option">Mauritania</li><li data-value="Mauritius" class="option">Mauritius</li><li data-value="Mayotte" class="option">Mayotte</li><li data-value="Mexico" class="option">Mexico</li><li data-value="Midway Islands" class="option">Midway Islands</li><li data-value="Moldova" class="option">Moldova</li><li data-value="Monaco" class="option">Monaco</li><li data-value="Mongolia" class="option">Mongolia</li><li data-value="Montserrat" class="option">Montserrat</li><li data-value="Morocco" class="option">Morocco</li><li data-value="Mozambique" class="option">Mozambique</li><li data-value="Myanmar" class="option">Myanmar</li><li data-value="Nambia" class="option">Nambia</li><li data-value="Nauru" class="option">Nauru</li><li data-value="Nepal" class="option">Nepal</li><li data-value="Netherland Antilles" class="option">Netherland Antilles</li><li data-value="Netherlands" class="option">Netherlands (Holland, Europe)</li><li data-value="Nevis" class="option">Nevis</li><li data-value="New Caledonia" class="option">New Caledonia</li><li data-value="New Zealand" class="option">New Zealand</li><li data-value="Nicaragua" class="option">Nicaragua</li><li data-value="Niger" class="option">Niger</li><li data-value="Nigeria" class="option">Nigeria</li><li data-value="Niue" class="option">Niue</li><li data-value="Norfolk Island" class="option">Norfolk Island</li><li data-value="Norway" class="option">Norway</li><li data-value="Oman" class="option">Oman</li><li data-value="Pakistan" class="option">Pakistan</li><li data-value="Palau Island" class="option">Palau Island</li><li data-value="Palestine" class="option">Palestine</li><li data-value="Panama" class="option">Panama</li><li data-value="Papua New Guinea" class="option">Papua New Guinea</li><li data-value="Paraguay" class="option">Paraguay</li><li data-value="Peru" class="option">Peru</li><li data-value="Phillipines" class="option">Philippines</li><li data-value="Pitcairn Island" class="option">Pitcairn Island</li><li data-value="Poland" class="option">Poland</li><li data-value="Portugal" class="option">Portugal</li><li data-value="Puerto Rico" class="option">Puerto Rico</li><li data-value="Qatar" class="option">Qatar</li><li data-value="Republic of Montenegro" class="option">Republic of Montenegro</li><li data-value="Republic of Serbia" class="option">Republic of Serbia</li><li data-value="Reunion" class="option">Reunion</li><li data-value="Romania" class="option">Romania</li><li data-value="Russia" class="option">Russia</li><li data-value="Rwanda" class="option">Rwanda</li><li data-value="St Barthelemy" class="option">St Barthelemy</li><li data-value="St Eustatius" class="option">St Eustatius</li><li data-value="St Helena" class="option">St Helena</li><li data-value="St Kitts-Nevis" class="option">St Kitts-Nevis</li><li data-value="St Lucia" class="option">St Lucia</li><li data-value="St Maarten" class="option">St Maarten</li><li data-value="St Pierre &amp; Miquelon" class="option">St Pierre &amp; Miquelon</li><li data-value="St Vincent &amp; Grenadines" class="option">St Vincent &amp; Grenadines</li><li data-value="Saipan" class="option">Saipan</li><li data-value="Samoa" class="option">Samoa</li><li data-value="Samoa American" class="option">Samoa American</li><li data-value="San Marino" class="option">San Marino</li><li data-value="Sao Tome &amp; Principe" class="option">Sao Tome &amp; Principe</li><li data-value="Saudi Arabia" class="option">Saudi Arabia</li><li data-value="Senegal" class="option">Senegal</li><li data-value="Seychelles" class="option">Seychelles</li><li data-value="Sierra Leone" class="option">Sierra Leone</li><li data-value="Singapore" class="option">Singapore</li><li data-value="Slovakia" class="option">Slovakia</li><li data-value="Slovenia" class="option">Slovenia</li><li data-value="Solomon Islands" class="option">Solomon Islands</li><li data-value="Somalia" class="option">Somalia</li><li data-value="South Africa" class="option">South Africa</li><li data-value="Spain" class="option">Spain</li><li data-value="Sri Lanka" class="option">Sri Lanka</li><li data-value="Sudan" class="option">Sudan</li><li data-value="Suriname" class="option">Suriname</li><li data-value="Swaziland" class="option">Swaziland</li><li data-value="Sweden" class="option">Sweden</li><li data-value="Switzerland" class="option">Switzerland</li><li data-value="Syria" class="option">Syria</li><li data-value="Tahiti" class="option">Tahiti</li><li data-value="Taiwan" class="option">Taiwan</li><li data-value="Tajikistan" class="option">Tajikistan</li><li data-value="Tanzania" class="option">Tanzania</li><li data-value="Thailand" class="option">Thailand</li><li data-value="Togo" class="option">Togo</li><li data-value="Tokelau" class="option">Tokelau</li><li data-value="Tonga" class="option">Tonga</li><li data-value="Trinidad &amp; Tobago" class="option">Trinidad &amp; Tobago</li><li data-value="Tunisia" class="option">Tunisia</li><li data-value="Turkey" class="option">Turkey</li><li data-value="Turkmenistan" class="option">Turkmenistan</li><li data-value="Turks &amp; Caicos Is" class="option">Turks &amp; Caicos Is</li><li data-value="Tuvalu" class="option">Tuvalu</li><li data-value="Uganda" class="option">Uganda</li><li data-value="United Kingdom" class="option">United Kingdom</li><li data-value="Ukraine" class="option">Ukraine</li><li data-value="United Arab Erimates" class="option">United Arab Emirates</li><li data-value="United States of America" class="option">United States of America</li><li data-value="Uraguay" class="option">Uruguay</li><li data-value="Uzbekistan" class="option">Uzbekistan</li><li data-value="Vanuatu" class="option">Vanuatu</li><li data-value="Vatican City State" class="option">Vatican City State</li><li data-value="Venezuela" class="option">Venezuela</li><li data-value="Vietnam" class="option">Vietnam</li><li data-value="Virgin Islands (Brit)" class="option">Virgin Islands (Brit)</li><li data-value="Virgin Islands (USA)" class="option">Virgin Islands (USA)</li><li data-value="Wake Island" class="option">Wake Island</li><li data-value="Wallis &amp; Futana Is" class="option">Wallis &amp; Futana Is</li><li data-value="Yemen" class="option">Yemen</li><li data-value="Zaire" class="option">Zaire</li><li data-value="Zambia" class="option">Zambia</li><li data-value="Zimbabwe" class="option">Zimbabwe</li></ul></div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Email</label>
													<div class="input-group">
                          <input type="text" name="email" placeholder="<?php echo $email ?>" class="form-control" value="">
													</div>
												</div>
											</div>
											
										</div>
										<div class="float-right">
											<button class="btn btn-primary" type="submit" name="update_user"><i class="fa fa-refresh"></i> Update</button>
										</div>
                                                                        </form>
									</div>
								</div>
							</div>

              <div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="card-title mb-4">User Password</div>
                    <?php
                    echo $error
                    ?>
                    <form action="" method="post">
										<div class="row">
                           <div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Old Password</label>
													<div class="input-group">
                           <input type="password" name="old_password" class="form-control" value="">
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">New Password</label>
													<div class="input-group">
                           <input type="password" name="new_password" class="form-control" value="">
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Confirm Password</label>
													<div class="input-group">
                           <input type="password" name="new_passwordv" class="form-control" value="">
													</div>
												</div>
											</div>
											
										</div>
										<div class="float-right">
											<button class="btn btn-primary" type="submit" name="update_password"><i class="fa fa-refresh"></i> Update Password</button>
										</div>
                                                                        </form>
									</div>
								</div>
							</div>

          </div>
        </div>
    
</div>
        <!--**********************************
            Content body end
        ***********************************-->



       

     

      <!-- Footer -->
     <?php
include "footer.php";

     ?>

