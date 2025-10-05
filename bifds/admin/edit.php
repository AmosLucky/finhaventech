<?php

if(!isset($_GET['id'])){
    echo "<script>window.location.href='index.php'</script>";
}

$user_id = $_GET['id'];


require_once "admin_head.php";
$error_msg = "";
$success_msg = "";
 $firstname = "";
      $surname = "";
      $username = "";
      $othername = "";
      $email = "";
      $password = "";
      $account_type = "";
      $phone = "";
      $gender = "";
      $date_of_birth ="" ;
      $address = "";
      $occupation = "";
      $marital_status = "";
      $currency = "";
      $pic = "";
      $active = 1;
      $fixed_deposit = "";
      $balance  = "";
      $savings_interest  = "";
      $second_pin = "";
      $first_pin  = "";


      



      if(isset($_POST['update'])){
        $first_name  = $_POST['first_name'];
      $username = $_POST['username'];
      $surname = $_POST['surname'];
      $country = $_POST['country'];
      $other_name  = $_POST['other_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $account_type = $_POST['account_type'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $address = $_POST['address'];
      $occupation = $_POST['occupation'];
      $marital_status = $_POST['marital_status'];
      $profile_picture = $_POST['profile_picture'];

      $user_id = $_POST['user_id'];

      ////upload new //picture
      if(strlen($_FILES['pic']['name']) > 3){


        
      $target_dir = "../uploads/";
      $target_file = $target_dir . basename($_FILES["pic"]["name"]);
      $file_name =  basename($_FILES["pic"]["name"]);
      
      
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                  $msg = "The file " . basename($_FILES["pic"]["name"]) . " has been uploaded.";
                 // basename($_FILES["fileToUpload"]["name"])
      

                 ///end
              }

              $profile_picture = $file_name;

       
      }
     
      //$currency = $row['currency'];
     
      $balance = $_POST['balance'];
      $fixed_deposit = $_POST['fixed_deposit'];

      $sql1 = "UPDATE users SET  balance = '$balance' , fixed_deposit = '$fixed_deposit', first_name = '$first_name',username = '$username', country = '$country',
       other_name = '$other_name', email = '$email' ,password =  '$password',account_type = '$account_type', 
       phone = '$phone',gender = '$gender', dob = '$dob', address = '$address', occupation = '$occupation',
        marital_status = '$marital_status', profile_picture = '$profile_picture'
        WHERE id = '$user_id'";

        $res1 = mysqli_query($con, $sql1) or die("Error fetching user ".mysqli_error($con));

        if($res1){
            echo "<div class='alert alert-success'>Update success</div>";
        }else{
            echo "<div class='alert alert-success'>Error occoured</div>";

        }






      }



      $sql = "SELECT * FROM users WHERE id = '$user_id'";

      $res = mysqli_query($con, $sql) or die("Error fetching user ".mysqli_error($conn));

      if(mysqli_num_rows($res) < 1){
        echo "<script>window.location.href='index.php'</script>";

      }





      $row = mysqli_fetch_assoc($res);
      //////
      $first_name = $row['first_name'];
      $username = $row['username'];
      $surname = $row['surname'];
      $country = $row['country'];
      $othername = $row['other_name'];
      $email = $row['email'];
      $password = $row['password'];
      $account_type = $row['account_type'];
      $phone = $row['phone'];
      $gender = $row['gender'];
      $dob = $row['dob'];
      $address = $row['address'];
      $occupation = $row['occupation'];
      $marital_status = $row['marital_status'];
      
     
      //$currency = $row['currency'];
      $profile_picture = $row['profile_picture'];
      $balance = $row['balance'];
      $fixed_deposit = $row['fixed_deposit'];




?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="https://vinix-vue.envytheme.com/favicon.png">
    <title>Register</title>
    <link href="./register_files/app.8c22cb29.css" rel="preload" as="style">
    <link href="./register_files/chunk-vendors.8bc0f757.css" rel="preload" as="style">
    <link href="./register_files/app.b94c506f.js.download" rel="preload" as="script">
    <link href="./register_files/chunk-vendors.7dae25c3.js.download" rel="preload" as="script">
    <link href="./register_files/chunk-vendors.8bc0f757.css" rel="stylesheet">
    <link href="./register_files/app.8c22cb29.css" rel="stylesheet">
    <style type="text/css">
        .VueCarousel-navigation-button[data-v-453ad8cd] {
            position: absolute;
            top: 50%;
            box-sizing: border-box;
            color: #000;
            text-decoration: none;
            appearance: none;
            border: none;
            background-color: transparent;
            padding: 0;
            cursor: pointer;
            outline: none;
        }

        .VueCarousel-navigation-button[data-v-453ad8cd]:focus {
            outline: 1px solid lightblue;
        }

        .VueCarousel-navigation-next[data-v-453ad8cd] {
            right: 0;
            transform: translateY(-50%) translateX(100%);
            font-family: "system";
        }

        .VueCarousel-navigation-prev[data-v-453ad8cd] {
            left: 0;
            transform: translateY(-50%) translateX(-100%);
            font-family: "system";
        }

        .VueCarousel-navigation--disabled[data-v-453ad8cd] {
            opacity: 0.5;
            cursor: default;
        }

        /* Define the "system" font family */
        @font-face {
            font-family: system;
            font-style: normal;
            font-weight: 300;
            src: local(".SFNSText-Light"), local(".HelveticaNeueDeskInterface-Light"),
                local(".LucidaGrandeUI"), local("Ubuntu Light"), local("Segoe UI Symbol"),
                local("Roboto-Light"), local("DroidSans"), local("Tahoma");
        }
    </style>
    <style type="text/css">
        .VueCarousel-pagination[data-v-438fd353] {
            width: 100%;
            text-align: center;
        }

        .VueCarousel-pagination--top-overlay[data-v-438fd353] {
            position: absolute;
            top: 0;
        }

        .VueCarousel-pagination--bottom-overlay[data-v-438fd353] {
            position: absolute;
            bottom: 0;
        }

        .VueCarousel-dot-container[data-v-438fd353] {
            display: inline-block;
            margin: 0 auto;
            padding: 0;
        }

        .VueCarousel-dot[data-v-438fd353] {
            display: inline-block;
            cursor: pointer;
            appearance: none;
            border: none;
            background-clip: content-box;
            box-sizing: content-box;
            padding: 0;
            border-radius: 100%;
            outline: none;
        }

        .VueCarousel-dot[data-v-438fd353]:focus {
            outline: 1px solid lightblue;
        }
    </style>
    <style type="text/css">
        .VueCarousel-slide {
            flex-basis: inherit;
            flex-grow: 0;
            flex-shrink: 0;
            user-select: none;
            backface-visibility: hidden;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            outline: none;
        }

        .VueCarousel-slide-adjustableHeight {
            display: table;
            flex-basis: auto;
            width: 100%;
        }
    </style>
    <style type="text/css">
        .VueCarousel {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .VueCarousel--reverse {
            flex-direction: column-reverse;
        }

        .VueCarousel-wrapper {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .VueCarousel-inner {
            display: flex;
            flex-direction: row;
            backface-visibility: hidden;
        }

        .VueCarousel-inner--center {
            justify-content: center;
        }
    </style>
</head>

<body>
   
    <div>
        <!---->

        <div>
           
            <div class="signup-are ptb-10 mt-3">
                <div class="container">
                    <div class="signup-form">
                        <h3>Create your Account</h3>
                        <span class="text-danger text-center"><?php echo $error_msg ?></span>
                        <span class="text-success text-center"><?php echo$success_msg; ?></span>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="number" placeholder="Initial Balance"
                                            class="form-control" name="balance" 
                                            value="<?php echo $balance?>" required></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="number" placeholder="Fixed Deposit"
                                            class="form-control" name="fixed_deposit" value="<?php echo $fixed_deposit?>" required></div>
                                </div>
                                 
                                


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="First Name"
                                            class="form-control" name="first_name" 
                                            value="<?php echo $first_name?>" required></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Surname"
                                            class="form-control" name="surname" 
                                            value="<?php echo $surname?>" required></div>
                                </div>
                                <div class="col-lg-6">
                                    
                                    <div class="form-group">
                                        <input type="text" placeholder="Username"
                                            class="form-control" name="username" value="<?php echo $username?>" required></div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" placeholder="Other Name"
                                            class="form-control" name="other_name"
                                             value="<?php echo $othername?>" required></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="email" placeholder="email"
                                            class="form-control" name="email" value="<?php echo $email?>" required></div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Password"
                                            class="form-control" name="password" required value="<?php echo $password?>"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" name="account_type" value="<?php echo $account_type?>">
                                        <option><?php echo $account_type?></option>
                                            <option>Savings</option>
                                             <option>Current</option>
                                              <option>Checking</option>
                                            
                                        </select>
                                        </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group"><input type="phone" placeholder="Phone"
                                            class="form-control"name="phone" value="<?php echo $phone?>" required></div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" name="gender" value="<?php echo $gender?>">
                                        <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                                            <option>Male</option>
                                             <option>Female</option>
                                              <option>Others</option>
                                            
                                        </select>
                                        </div>
                                </div>




                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="date" placeholder="Date of birth"
                                            class="form-control" name="dob" value="<?php echo 
                                            $dob?>">
                                        </div>
                                </div>

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <textarea class="form-control" placeholder="Address" name="address" 
                                       value=""><?php echo $address?></textarea>
                                        </div>
                                </div>

                                  <div class="col-lg-6">
                                    <div class="form-group">
                                       <textarea class="form-control" placeholder="Occupation" name="occupation" value=""><?php echo $occupation?></textarea>
                                        </div>
                                </div>

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" name="marital_status" 
                                        value="<?php echo $marital_status?>">
                                        <option value="<?php echo $marital_status ?>"><?php echo $marital_status ?></option>
                                        <option>Single</option>
                                            <option>Married</option>
                                             <option>Widow</option>
                                              <option>Divorced</option>
                                            
                                        </select>
                                        </div>
                                </div>



                                <div class="col-lg-6 d-none">
                                    <div class="form-group">
                                        <select class="form-control" name="currency" value="<?php echo $currency?>">
                                            <option>Lira(TRY)</option>
                                             <option>Dollar(US)</option>
                                              <option>Pounds</option>
                                              <option>Euro</option>
                                            
                                        </select>
                                        </div>
                                </div>

                                 <div class="col-lg-6 d-none">
                                    <div class="form-group">
                                        <select class="form-control" name="currency" value="<?php echo $currency?>">
                                            <option>Lira(TRY)</option>
                                             <option>Dollar(US)</option>
                                              <option>Pounds</option>
                                              <option>Euro</option>
                                            
                                        </select>
                                        </div>
                                </div>

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" name="country" >
                                        <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                             <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
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
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
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
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
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
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
                                            
                                        </select>
                                        </div>
                                </div>


                                 <div class="col-lg-6">
                                    <p>
                                        Profile Picture
                                    </p>
                                    <div class="form-group">
                                        <img height='150' src="../uploads/<?php echo $profile_picture?>" >
                                         
                                        <input type="file" require name="pic" class="form-control"   accept="image/x-png,image/gif,image/jpeg">
                                        </div>
                                </div>

                                <input type="hidden" require name="profile_picture" class="form-control"   value="<?php echo $profile_picture ?>">

                                <input type="hidden" require name="user_id" class="form-control"   value="<?php echo $user_id ?>">


                                




                               <!--  <div class="col-lg-12">
                                    <div class="form-check"><input type="checkbox" id="checkme"
                                            class="form-check-input"><label for="checkme" class="form-check-label">Keep
                                            Me Sign Up</label></div>
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-primary" name="update">
                                    Update
                                            <span></span>
                                        </button></div>
                                        <br>
                                      
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
           



<?php
include 'admin_footer.php';


?>