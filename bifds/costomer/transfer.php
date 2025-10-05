<?php
include "header.php";
$error = "";
 //$OTP = "";

$username = $_SESSION['user'];
$user_id = $_SESSION['id'];


  $msg = "";
  $alertType ="";
  $accountNumber = "";
  $accountName = "";
  $bankName = "";
  $swiftCode = "";
  $transferType = "";
  $amount = "";
  $description = "" ;
  $routin_number  = "";
  $state = "";


if(isset($_POST['send'])){
  $accountNumber = $_POST['accountNumber'];
  $accountName = $_POST['accountName'];
  $bankName = $_POST['bankName'];
  $swiftCode = $_POST['routin_number'];
  $transfer_type = "InterBank";//$_POST['transferType'];
  $transaction_type  = "Debit";
  $amount = $_POST['amount'];
  $description = $_POST['description'];
   $date = date("M d Y");
   $status = "Pending";
   $routin_number = $_POST['routin_number'];
   $state = $_POST['country'];
   
    $transaction_date  = $date;

  if(strlen($accountNumber) > 5){
         if(strlen($accountName) > 2){
                 if(strlen($bankName) > 3){
                  if(strlen($description) >= 0){

                   

                  ///////////////////////////
                   if(strlen($amount) > 0){

                  ///////////////////////////
                    if($amount <= $balance){

                        if($amount > 9.99){

                          ///////////////////CHECK IF ACCOUNT IS ACTIVE///////
                          if($active == 1){
                                                      ///////////////////////////////GENERATE OTP//////////////
                          $OTP =  rand(1,100000);
                           $_SESSION['OTP'] = $OTP;


                           $sql1 = "UPDATE users SET  first_pin = '$OTP' where id = '$user_id'";
                           $result1 = mysqli_query($con,$sql1)or die("We cant complete this transaction ".mysqli_error($con));


               if($result1){
                 $sql = "INSERT INTO transactions (
                      user_id,
                      transaction_type,
                      name,
                      description,
                      status,
                      amount,
                      account_number,
                      transaction_date,
                      channel,
                      bank_name,
                      transaction_level,
                      routing_number,
                      swift_code,
                      bank_country

                    ) values(
                    '$user_id','$transaction_type','$accountName',
                    '$description','$status','$amount','$accountNumber',
                      '$transaction_date','$transfer_type','$bankName','1','$routin_number','$swiftCode','$state')";

                      $result = mysqli_query($con,$sql) or die("Cant send ".mysqli_error($con));
                      if($result){

                        



                  $alertType ="alert-success";
                     

                        $msg = "Transaction is now pending";
                        $last_id = $con->insert_id;
                        $t = "t_otp?t=".$last_id."_tyu8694kloghgh_";
                        ?>

    <script>
  $(document).ready(function(){
    $('#myModal').modal('show');
  });
setTimeout(myFunction, 7000);
function myFunction() {
   window.location.href="<?php echo $t ?>";
}
</script>


                    

                        <?php 



////////////////////////SEND EMAIL//////

                        //////////////////////////////////////
                        $code_type = "ITAC Code";
     $subject = "OTP";
     $email = $email;
     $msg2 = "<!DOCTYPE html>
<html>
<head>
 <meta charset='utf-8'>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <title></title>
 <style type='text/css'>
   body{
     margin: 20px;
   }
   .head{
     height: 50px;
     padding: 20px;
     background-color: #152238;

   }
   .body{
     padding: 20px;
     background-color: #F8F4E6;
   }
   .logo{
     height: 50px;
   }
   .footer{
     background-color: #152238;
     height: 100px;
     color: white;
     padding: 20px;

   }
   .block{
     margin-top: 5px;
   }
 </style>
</head>
<body>
 <div class='head'>
   $company_logo2
   
 </div>
 <div class='body'>
   <h2>
     Hello $fullname

   </h2>

  
<p class='block'>
You have initiated a transfer of $ $amount, please enter your $OTP to complete this transaction.


<br>

</p>

   
 </div>

 <div class='footer'>
   <p>
     Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
$company_mail
   </p>
   
 </div>

</body>
</html>
";
              
               require "../mail.php"; 
               //return;


                        ////////////////////////////////////////END OF MAIL///







                      }
                          


               } else{
                 $alertType ="alert-danger";
                 $msg = "We cant complete this transaction, please try again ";

               }
                          


                        //   ///////////////////////SEND MEAIL/////////////
                        //   $msg1 = "
                        //           Dear $firstname,<br>
                        //           A transfer of $ $amount is initiaited in your account,<br>
                        //           Use <span style='color:red'>$OTP </span> as your OTP to confirm the transaction.<br>
                        //           Note: DO NOT SHARE THIS CODE TO AVOID LOSS OF FUND
                        //           ";
                        //   sendMail($email,"OTP verification",$msg1);

                        //   /////////////////////////////SHOW MODALLLLLLLL


                        //    echo "<script>
                        // $('document').ready(function(){
                        //   $('#modal').show();

                        //   });
                        // </script>";





                          /////////////////////////////////////////////////


                          }else{
                            ///////////////////////////ACCOUNT BLOCKED//////
                            $alertType ="alert-danger";
                           $msg = "Dear Valued Customer , your account has been temporarily blocked from Making online transactions due to unusual activity.
                                        <br>
This measure is to ensure the security of your account.
<br>
Please contact our customer service for assistance and to resolve this issue.
<br>
support@blue-ridgetrust.com
<br>
Thank you for banking with us.
<br>
Best regards. ";

                          }

                         

                        }else{
                  $alertType ="alert-danger";
                  $msg = "Amount must be greater than $10";
            
                          }


                    }else{
                  $alertType ="alert-danger";
                  $msg = "Insufficient balance";
            
               }
                


                }else{
                  $alertType ="alert-danger";
                  $msg = "Please input an amount";
            
               }
                 }else{
                  $alertType ="alert-danger";
                  $msg = "Please input description";
            
               }




                }else{
                  $alertType ="alert-danger";
                  $msg = "Please input a bank name";
            
               }

        }else{
           $alertType ="alert-danger";
           $msg = "Please input an account name";
    
       }

  }else{
     $alertType ="alert-danger";
     $msg = "Please input a correct receivers account number";

  }

}

////////////////////////////////////////////CONFIRM BUTTON///////

if(isset($_POST['confirm'])){

   $accountNumber = $_POST['accountNumber'];
  $accountName = $_POST['accountName'];
  $bankName = $_POST['bankName'];
  $swiftCode = $_POST['swiftCode'];
  $transferType = $_POST['transferType'];
  $amount = $_POST['amount'];
  $description = $_POST['description'];
  $receivedOTP =   $_POST['OTP'];



if($receivedOTP > 1000){
  $OTP =  $_SESSION['OTP'];
  //echo "s==".$receivedOTP ."  r==".$OTP;

  if($receivedOTP == $OTP){

      ////////////////////INSERT///////////////////


   $transaction_type = "Debit";
     $transaction_date = date("M d Y");
                     $status = "Completed";


                  //////////////EVERYTHING IS RIGHT?//////////////////////////
                     ////////////CUT THE BALANCE/////
                     //$new_balance -= 

               $sql = "UPDATE users SET balance = balance - '$amount' where id = '$user_id'";  
               $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

               if($result){
                 $sql = "INSERT INTO transactions (
                      user_id,
                      transaction_type,
                      name,
                      description,
                      status,
                      amount,
                      account_number,
                      transaction_date,
                      channel
                    ) values(
                    '$user_id','$transaction_type','$accountName',
                    '$description','$status','$amount','$accountNumber',
                      '$transaction_date','$transferType')";

                      $result = mysqli_query($con,$sql) or die("Cant send ".mysqli_error($con));
                      if($result){
                       
                         $alertType ="alert-success";
                       $msg = "Transaction successful <br> $ $amount has been sent to $accountName";

                         $accountNumber = "";
                         $amount = "";
                         $receivedOTP = "";
                           echo '<script>
                          if ( window.history.replaceState ) {
                              window.history.replaceState( null, null, window.location.href );
                                             }
                                         </script>';



                      }
                          


               } else{
                 $alertType ="alert-danger";
                 $msg = "We cant complete this transaction, please try again ";

               }



  }else{
    ////////////////////////INCORECT OTP
     $alertType ="alert-danger";
     $msg = "The OTP you supplied is incorrect ";
  }

}else{

  ///////////////invalid OTP
   $alertType ="alert-danger";
     $msg = "The OTP you supplied is invalid ";
}




  ///////////////////////end////////////



}






?>     


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Transaction Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
        Verifying transaction ....

        <div style="height: 300px; width: 100%; display: flex; justify-content: center;align-items: center;">
          <img src="images/adding_dots.gif" height="200"/>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="content-w">


                <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <form action="" method="post">
                                            <h5 class="form-header">External Transfer Fund</h5>
                                            <div class="form-desc">Please note that every successful transfer is not
                                                reversable</a>
                                            </div>
                                         <div class="col-lg-12 col-xxl-6">
                                                <!--START - BALANCES-->
                                                <?php
                                        require "./balance_widget.php";
                                         ?>
                                                <!--END - BALANCES-->
                                            </div>
                                           <div class="justify-content-center text-center alert <?php echo $alertType ?>"> <?php echo  $msg ?></div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label for=""> Bank Name</label><input
                                                            class="form-control" placeholder="Enter bank name"
                                                            value=""
                                                            name="bankName" required="required" type="text">
                                                        <div
                                                            class="help-block form-text with-errors form-control-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label for=""> Account Number</label>
                                                    <input
                                                            class="form-control" placeholder="Enter account number"
                                                            name="accountNumber" required="required" type="number" 
                                                            value="<?php echo $accountName ?>">
                                                        <div
                                                            class="help-block form-text with-errors form-control-feedback">
                                                        </div>
                                                    </div>
                                                    <div id="spinner" style="display: none">
                            <div class="spinner-border text-success" ></div>
                          <span>Fetching Account...</span>
                          </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label for=""> Account Name</label><input
                                                            class="form-control" type="text" required="required"
                                                            name="accountName" placeholder="E.g John Doe">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label for=""> Amount</label><input
                                                            class="form-control" type="number" name="amount" required placeholder="E.g 876464">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label for=""> Swift Code / Routing
                                                            Number</label><input class="form-control" type="text"
                                                            name="routin_number" required placeholder="E.g AAAA-BB-CC-123">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label for=""> Country</label>
                                                    <select name="country" class="form-control">
    <option value="United States">United States</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
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
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint Lucia">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Serbia">Serbia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-sm-4">
                                                    <div class="form-group"><label for=""> Swift Code / Routing Number /
                                                            BIC</label><input class="form-control" type="text"
                                                            name="swift"
                                                            placeholder="Swift Code / Routing Number / BIC">
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-sm-4">
													<div class="form-group"><label for=""> Routing Number</label><input class="form-control" type="text" name="email" placeholder="optional">
													</div>
												</div> -->
                                            </div>

                                            <div class="form-group"><label for=""> Description (optional)</label>
                                                <textarea class="form-control" placeholder="optional" name="description"></textarea>
                                            </div>
                                            <div class="form-check"><label class="form-check-label"><input
                                                        class="form-check-input" type="checkbox" required>I agree to
                                                   <a href="../contact.php"> terms and conditions<a></label>
                                            </div>
                                            <div class="form-buttons-w text-right compact"><button
                                                    class="btn btn-primary" name="send" type="submit"
                                                    value="Transfer">Transfer Fund <i
                                                        class="os-icon os-icon-grid-18"></i></button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--<div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Chat</span></div>
  <div class="floated-chat-w">
    <div class="floated-chat-i">
      <div class="chat-close"><i class="os-icon os-icon-close"></i></div>
      <div class="chat-head">
        <div class="user-w with-status status-red">
          <div class="user-avatar-w">
            <div class="user-avatar"><img alt="" src="img/avatar1.jpeg"></div>
          </div>
          <div class="user-name">
            <h6 class="user-title">MIKE</h6>
            <div class="user-role">Customer Service</div>
          </div>
        </div>
      </div>
      <div class="chat-messages">
        <div class="message">
          <div class="message-content">Hi Jerry, how can I help you?</div>
        </div>
        <div class="date-break">19th May 03:58 22pm</div>
        <div class="message">
          <div class="message-content">We are currently offline, please drop your message and we will reply you shortly</div>
        </div>
      </div>
      <div class="chat-controls">
        <input class="message-input" placeholder="Type your message here..." type="text">
        <div class="chat-extra"></div>
      </div>
    </div>
  </div>-->
                    </div>

                </div>
            </div>
        </div>



        
        <script type="text/javascript">
          $(document).ready(function () {

            /////////////////FETCH ACCOUNT NAME GENERATOR   //////////////////
            $("#accountNumber").keyup(function() {
              var accountNumber = $("#accountNumber").val();
              if(accountNumber.length > 9){
                $("#spinner").show();
                $.ajax({
                   url: "ajaxRequest.php",
                   type: "POST",
                    data: {"accountNumber" : accountNumber}, 
                  success: function(result){
                   // alert(result);
                   var json = $.parseJSON(result);
                   //alert(json['msg']);
                   if(json['msg'] == 100){
                    $("#bankName").val(json['bank_name']);
                     $("#accountName").val(json['full_name']);
                      $("#accountNumber").val(json['account_number']);
                    

                   }else{

                   }
                    $("#spinner").hide();

                 
                   }
                 });

              }

              // body...
            });
         //////////////////////////////////////END OF ACCOUNT NAME GENERATOR   /////////////////////////////////////////// body...
         $("#dismiss").click(function () {
           $("#modal").hide();

           // body...
         });

          })
        </script>







       <?php
       require "footer.php";
        ?>