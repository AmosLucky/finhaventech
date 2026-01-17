
<?php

session_start();
require "../conn.php";


  $fname = "";
  $lname = "";
  $username = "";
  $password = "";
  $state= "";
  $phone = "";
  $email = "";





$error = "";
$sucess = "";
$ref ="";

if(isset($_GET['ref'])){
  $_SESSION['ref'] = $_GET['ref'];
  $ref =  $_SESSION['ref'];
}

$user = "";
if(isset($_GET['user'])){
  $user = $_GET['user'];
}

if(isset($_GET['referral'])){
  $user = $_GET['referral'];
}
// echo "oooo";
if(isset($_POST['register'])){

  //collecting from input field
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $state= $_POST['state'];
  $phone = $_POST['phone'];
  $repassword = $_POST['repassword'];
  $email = $_POST['email'];
  $referral = $_POST['referral'];
  $btc_wallet = "";//$_POST['btc_wallet'];
  
 $gender = "";

  //$referrer = $_POST['referrer'];

  // validating the form
  // firstnaem && last name
  if(strlen($fname) > 0 && strlen($lname) > 0){
    //username and password
    if (strlen($username) > 2 ){
      if(strlen($password) > 5){
        if($password == $repassword){
      //state , phone or email
      if ($state != "select-country"){
        //email
        if (strpos($email, '@') == true ){
          



  //sanitising and checking for scarmmers

  $fnamev = mysqli_real_escape_string($con,$fname);
  $lnamev = mysqli_real_escape_string($con,$lname);
  $usernamev = mysqli_real_escape_string($con,$username);
  $passwordv = mysqli_real_escape_string($con,$password);
  $statev = mysqli_real_escape_string($con,$state);
  $phonev = mysqli_real_escape_string($con,$phone);
  $emailv = mysqli_real_escape_string($con,$email);
  //$referrerv = mysqli_real_escape_string($con,$referrer);

  //check if username already exists

  $sql = "select * from members where username = '$usernamev'";
  $check = mysqli_query($con,$sql) or die("cant check ".mysql_error($con));
   $usernamecheck = mysqli_num_rows($check);
  if($usernamecheck < 1){

    //credit the referrer
    if(strlen($referral) > 3){
    $referral = mysqli_real_escape_string($con,$referral);
      $sql = "SELECT * from members where username = '$referral'";
      $checkref = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));
      $refcheck = mysqli_num_rows($checkref);
      //if the exists
      if($refcheck == 1){
        while($row = mysqli_fetch_array($checkref)){

          $num_referree = $row['referree'];
          $user = $row['username'];


          //updating the referrer
          $add = $num_referree + 1;
        $sql = "UPDATE members set referree = '$add' where username = '$user'  ";
      $check = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));

        }

      }

  }

else{//set referree as lucky
    $sql = "select * from members where username = ''";
      $checkref = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));
      while($row = mysqli_fetch_array($checkref)){

          $num_referree = $row['referree'];
          $user = $row['username'];


          //updating the referrer
          $add = $num_referree + 1;
        $sql = "update members set referree = '$add' where username = '$user'  ";
      $check = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));

        }


}
$reg_date = date("d-m-Y");


//     //insert

//     if(isset($_SESSION['ref'])){
//     $referrerv = mysqli_real_escape_string($con,$_SESSION['ref']);
//   }
//   else{
//     $referrerv = 'lucky';
//   }


  $sql = "insert into members (firstname, lastname,username, password,phonenumber,state,email,paid,referred_by,referree,image,gender,bitcoin_wallet,date,running_invest,balance,num_of_days,profit,active,has_deposited) values ('$fnamev','$lnamev','$usernamev','$passwordv','$phonev','$statev','$emailv',false, '$referral',0, ' ','$gender','$btc_wallet',now(),0,0,0,0,1,0)";
    $result = mysqli_query($con,$sql) or die("cant register ".mysqli_error($con));
    if($result){
     $sucess = '<div class="alert alert-success text-center">Sucessfully Registered</div>';
     $ref_link = $url."/signup?user=".$username;

         
//////////////////////////////////////
     $subject = "Welcome";
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
      Hello $username

    </h2>
   
    <p class='block'>
     Welcome to $company_name.
     <br>
     $company_name, we are consulting asset management company, we provide risk-calibrated multi-asset solutions that help our clients to navigate uncertain markets with agility. $company_name has served professionals for many decades, helping them enhance workflows and make informed decisions. We’re recognized and valued for helping customers realize their potential and deliver impact when it matters most. $company_name is a global provider of professional information, software solutions, and services for accountants, sales and marketing, finance, audit, risk, compliance, and many other regulatory sectors. We offer clients the option of managing their portfolios actively with the best trading experts from Blockchain and sales management team, proficiency is in delivering growth. We look forward to you being part of our community.
     </p>
<p class='block'>
Login Details:<br>
Password: $password<br>
Username: $username<br>
Email: $email<br>
Affiliate link: $ref_link
</p>


  <div class='footer'>
    <p>
      Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
$company_email
    </p>
    
  </div>

</body>
</html>
";
               
                require "../mail.php"; 
                //return;



   // $sent = SendMail($email,$subject,$msg);
    // if($sent){
    //   echo "<h1>SENTHHHHHHHHHHHHHHHHHHH</h1>";
    // }else{
    //    echo "<h1>NOOOOOOOOOOOOOOOOOOOO</h1>";

    // }
    // echo $email; 
    // echo $emailv; 
   ////////////////////////////////////////////////////////////////


     


    $sql = "select * from members where email = '$email' && password = '$password' ";
    $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['id'];
             $_SESSION['user'] =$row['username'];
            // $_SESSION['balance'] =  $row['balance'];
              $_SESSION['email'] =$row['email'];
             $_SESSION['phonenumber'] =  $row['phonenumber'];
            $_SESSION['balance'] = $row['balance'];
             $_SESSION['state'] =$row['state'];
              $_SESSION['gender'] =$row['gender'];
            
              $_SESSION['referree'] =  $row['referree'];
               $_SESSION['firstname'] =  $row['firstname'];
                $_SESSION['password'] =  $row['password'];
            
            
        }

        $id = $_SESSION['id'];
        $_SESSION['balance'];
        $user = $_SESSION['user'];
        $_SESSION['email'];
        $_SESSION['phonenumber'];
        $_SESSION['state'];
        
          $_SESSION['firstname'];
          $_SESSION['referree'] ;


          //insert into transaction


       echo " <script>
        window.location.href='../user/';
        </script>";
      }



///////////////////////////////////////////////////////////////////////////
  }



}
else{
   $error = '<div class="alert alert-danger text-center">Username or email already exists</div>';
}
}
else{
   $error = '<div class="alert alert-danger text-center">Invalid email</div>';
}
}
else{
   $error = '<div class="alert alert-danger text-center"> Please check your country </div>';
  }
}else{
   $error = '<div class="alert alert-danger text-center">Password does not match  </div>';
  }
}else{
   $error = '<div class="alert alert-danger text-center"> Password too weak </div>';
  }
}


else{
   $error = '<div class="alert alert-danger text-center">Username  too short </div>';
}

}
else{  $error = '<div class="alert alert-danger text-center">Names too short </div>'; 
}
}







 ?>
    
<!doctype html>
<html lang="zxx">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='../../www.google.com/recaptcha/api.js'></script>
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="../user/css/bootstrap.min.css">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="../user/css/owl.theme.default.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="../user/css/owl.carousel.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="../user/css/animate.min.css">
    <!-- Remixicon CSS -->
    <link rel="stylesheet" href="../user/css/remixicon.css">
    <!-- boxicons CSS -->
    <link rel="stylesheet" href="../user/css/boxicons.min.css">
    <!-- MetisMenu Min CSS -->
    <link rel="stylesheet" href="../user/css/metismenu.min.css">
    <!-- Simplebar Min CSS -->
    <link rel="stylesheet" href="../user/css/simplebar.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="../user/css/style.css">
    <!-- Dark Mode CSS -->
    <link rel="stylesheet" href="../user/css/dark-mode.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../user/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../home/images/logo.png">
    <title>Account Registration - <?= $company_name ?></title>
    <script type="text/javascript" src="../translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>
</head>

<body class="body-bg-f5f5f5">
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="content">
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start User Area -->
<section class="user-area">
    <div class="container">
        <div class="user-form-content">
            <h3>Register</h3>
            <p>Register to continue to <?= $company_name ?>.</p>

            <form class="user-form" method="post">
                <?= $error ?>
                                <input type="hidden" name="_token" value="za1IhQVNYh6TQOfToFMBgXfSutKrVgD7c4x56AXo">                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="Enter your name"
                                   value="" name="fname">
                                    <input class="form-control" type="hidden" placeholder="Enter your name"
                                   value="none" name="lname">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="Enter your username"
                                   name="username" value=""/>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email"  name="email" value=""
                                   placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" placeholder="Enter your Phone"
                                   name="phone" value=""/>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Country</label>
                            <select  class="form-control" name="state">
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

                    <div class="col-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password"
                                   placeholder="Enter your password">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Repeat password</label>
                            <input class="form-control" type="repassword" name="repassword"
                                   placeholder="Enter your repeat password">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Referral</label>
                            <input class="form-control" type="text" placeholder="Enter your Phone"
                                   name="referral" value="<?= $user ?>"/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">

                                <!-- <strong>ReCaptcha:</strong> -->

                                <div class="g-recaptcha" data-sitekey="6Ld0nSwrAAAAAOhX-4hrQ2w0Rns56gJkHcPj-DRf"></div>

                                
                            </div>

                        </div>

                    </div>

                    <div class="col-12">
                        <button class="default-btn register" name="register" type="submit">
                            Sign up
                        </button>
                    </div>



                    <div class="col-12">
                        <p class="create">Already have an account? <a href="login">Sign in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End User Area -->

<div class="dark-bar">
    <a href="#" class="d-flex align-items-center">
        <span class="dark-title">Enable Dark Theme</span>
    </a>

    <div class="form-check form-switch">
        <input type="checkbox" class="checkbox" id="darkSwitch">
    </div>
</div>

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
</div>
<!-- End Go Top Area -->

<!-- Jquery Min JS -->
<script src="../user/js/jquery.min.js"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="../user/js/bootstrap.bundle.min.js"></script>
<!-- Owl Carousel Min JS -->
<script src="../user/js/owl.carousel.min.js"></script>
<!-- Metismenu Min JS -->
<script src="../user/js/metismenu.min.js"></script>
<!-- Simplebar Min JS -->
<script src="../user/js/simplebar.min.js"></script>
<!-- mixitup Min JS -->
<script src="../user/js/mixitup.min.js"></script>
<!-- Dark Mode Switch Min JS -->
<script src="../user/js/dark-mode-switch.min.js"></script>
<!-- Form Validator Min JS -->
<script src="../user/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="../user/js/contact-form-script.js"></script>
<!-- Ajaxchimp Min JS -->
<script src="../user/js/ajaxchimp.min.js"></script>
<!-- Custom JS -->
<script src="../user/js/custom.js"></script>
</body>

</html>
