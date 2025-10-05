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
                $state = $_POST['state'];
                $image = $_FILES['image']['tmp_name'];
                //$dob = $_POST['dob'];
                $address = $_POST['address'];

                $target_dir = "../uploads/";
                $basename = basename($_FILES["image"]["name"]);
      $target_file =  $target_dir.basename($_FILES["image"]["name"]);


                $params =  array("firstname"=>$fname,"lastname"=>$lname,"phonenumber"=>$phone,"state"=>$state,"profile_pic"=>$basename, "address"=>$address,"is_verified" => '2');

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

                $result = $model->updateTable("members",$params,$user_id);
                if($result['status']){
                   if(!$is_verified){
       $msg = '<div class="alert alert-success text-center">
    kYC successfully Completed

     </div>';
     $is_verified = true;
     
     
     echo "<script>
setInterval(function(){
    window.location.href = './account'
}, 1000);
</script>";
     
     

    }else{
       $msg = '<div class="alert alert-success text-center">
    Account updated successfully

     </div>';

    }

                }else{
                    $msg = '<div class="alert alert-danger text-center">
    An error occurred

     </div>';

                }

              }else{
                 $msg = '<div class="alert alert-danger text-center">
    An error occurred

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

                <div class="col-lg-12">
    <?php 

    if($is_verified == 2){

      echo "<div class='alert alert-warning'>Your account is under review</div>";
      
    }


?>
</div>
                
     <div class="row">
     
            <div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="card-title mb-4">User Information</div>
                    <?php
                    echo $msg
                    ?>
                   <form  method="post" enctype="multipart/form-data">
                  
                   
                   



										<div class="row">

                    <div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Photo ID (Drivers licence, Passport or National ID)</label>
													<div class="input-group">
                          <input type="file" name="image" id="fname" class="form-control" required >
													</div>
												</div>
											</div>

                    <div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">First name</label>
													<div class="input-group">
                          <input type="" name="fname" id="fname" class="form-control" value="<?php  echo $firstname ?>" required>
													</div>
												</div>
											</div>

                      <div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Last name</label>
													<div class="input-group">
                          <input type="" name="lname" id="lname" class="form-control" value="<?php  echo $lastname ?>" required>
													</div>
												</div>
											</div>


                      <div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Phone number</label>
													<div class="input-group">
                          <input type="" name="phone" id="phone" class="form-control" value="<?php  echo $phone ?>" required>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Country</label>
													<div class="input-">
														<div class="">
                  <select class="form-control" name="state"  required>
                   

                    <option value="<?php echo $country ?>" > <?php echo $country ?></option>
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
																
															</select>
                              
                             
														</div>
													</div>
												</div>
											</div>

                      <div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Address</label>
													<div class="input-group">
                          <input type="text" name="address" placeholder="Address" value="<?php echo $address ?>" class="form-control" required>
													</div>
												</div>
											</div>
											
											<div class="col-lg-3 col-md-6">
												<div class="form-group">
													<label class="form-label float-left">Email</label>
													<div class="input-group">
                          <input type="text" name="email" placeholder="<?php echo $email ?>" class="form-control" readonly="">
													</div>
												</div>
											</div>
											
										</div>
                    <?php 

if($is_verified < 2){

                    ?>
										<div class="float-right">
											<button class="btn btn-primary" type="submit" name="update_user"><i class="fa fa-refresh"></i> Update</button>
										</div>
                    <?php } ?>
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

