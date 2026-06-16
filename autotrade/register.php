
<?php

session_start();
require 'conn.php';

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
$user = "";

if(isset($_GET['ref'])){
$_SESSION['ref'] = $_GET['ref'];
$ref = $_SESSION['ref'];
$user = $_GET['ref'];
}

if(isset($_GET['user'])){
$user = $_GET['user'];
}
// echo "oooo";
if(isset($_POST['register'])){

//collecting from input field
$fname = "   ";//$_POST['fname'];
$lname = "   ";//$_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$state= "   ";//$_POST['state'];
$phone = "  ";//$_POST['phone'];
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

$sql =
"select * from members where username = '$usernamev'";
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

// //insert

// if(isset($_SESSION['ref'])){
// $referrerv = mysqli_real_escape_string($con,$_SESSION['ref']);
// }
// else{
// $referrerv = 'lucky';
// }

$sql = "insert into members (firstname, lastname,username,
password,phonenumber,state,email,paid,referred_by,referree,image,gender,bitcoin_wallet,date,running_invest,balance,num_of_days,profit,active,has_deposited)
values ('$fnamev','$lnamev','$usernamev','$passwordv','$phonev','$statev','$emailv',false,
'$referral',0, ' ','$gender','$btc_wallet',now(),0,0,0,0,1,0)";
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
            Thank you for creating account on our website,
            login to proceed to your dashboard.

         </p>
         <p class='block'>
            Login Details:<br>
            Password: ******<br>
            Username: $username<br>
            Email: $email<br>

         </p>

         <div class='footer'>
            <p>
               Support is available 24/7 <br>
               Best Regards, $company_name the
               AU: + <br>
               $company_email
            </p>

         </div>

      </body>
   </html>
   ";

   require "mail.php";
   //return;

   // $sent = SendMail($email,$subject,$msg);
   // if($sent){
   // echo "<h1>SENTHHHHHHHHHHHHHHHHHHH</h1>";
   // }else{
   // echo "<h1>NOOOOOOOOOOOOOOOOOOOO</h1>";

   // }
   // echo $email;
   // echo $emailv;
   ////////////////////////////////////////////////////////////////

   $sql =
   "select * from members where username = '$usernamev' && password = '$password' ";
   $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
   $checkuser = mysqli_num_rows($result);
   if($checkuser == 1){
   while ($row = mysqli_fetch_array($result)) {
   $_SESSION['id'] = $row['id'];
   $_SESSION['user'] =$row['username'];
   // $_SESSION['balance'] = $row['balance'];
   $_SESSION['email'] =$row['email'];
   $_SESSION['phonenumber'] = $row['phonenumber'];
   $_SESSION['balance'] = $row['balance'];
   $_SESSION['state'] =$row['state'];
   $_SESSION['gender'] =$row['gender'];

   $_SESSION['referree'] = $row['referree'];
   $_SESSION['firstname'] = $row['firstname'];
   $_SESSION['password'] = $row['password'];

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
        window.location.href='user/index.php';
        </script>";
   }

   ///////////////////////////////////////////////////////////////////////////
   }

   }
   else{
   $error = '<div class="alert alert-danger text-center">Username or email
      already exists</div>';
   }
   }
   else{
   $error = '<div class="alert alert-danger text-center">Invalid email</div>';
   }
   }
   else{
   $error = '<div class="alert alert-danger text-center"> Please check your
      country </div>';
   }
   }else{
   $error = '<div class="alert alert-danger text-center">Password does not match
   </div>';
   }
   }else{
   $error = '<div class="alert alert-danger text-center"> Password too weak
   </div>';
   }
   }

   else{
   $error = '<div class="alert alert-danger text-center">Username too short
   </div>';
   }

   }
   else{ $error = '<div class="alert alert-danger text-center">Names too short
   </div>';
   }
   }

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Investment Account</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
    background:
    linear-gradient(rgba(10,10,10,.85),rgba(10,10,10,.85)),
    url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
}

.container{
    width:100%;
    max-width:1100px;
    display:grid;
    grid-template-columns:1fr 1fr;
    background:rgba(255,255,255,.05);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.1);
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.5);
}

.left{
    background:linear-gradient(135deg,#0d1117,#1a1f29);
    padding:60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.left h1{
    color:#fff;
    font-size:42px;
    line-height:1.2;
    margin-bottom:20px;
}

.left p{
    color:#c5c5c5;
    line-height:1.8;
}

.highlight{
    color:#f0b90b;
}

.right{
    padding:50px;
    background:rgba(255,255,255,.03);
}

.form-title{
    color:#fff;
    font-size:28px;
    font-weight:600;
    margin-bottom:30px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}

.input-group{
    display:flex;
    flex-direction:column;
}

.input-group.full{
    grid-column:span 2;
}

label{
    color:#ddd;
    font-size:14px;
    margin-bottom:8px;
}

input,
select{
    width:100%;
    padding:15px;
    border:none;
    outline:none;
    border-radius:12px;
    background:rgba(255,255,255,.08);
    color:#fff;
    font-size:15px;
    border:1px solid rgba(255,255,255,.1);
}

input:focus,
select:focus{
    border-color:#f0b90b;
    box-shadow:0 0 15px rgba(240,185,11,.3);
}

select option{
    color:#000;
}

.btn{
    width:100%;
    padding:16px;
    border:none;
    margin-top:25px;
    border-radius:12px;
    background:linear-gradient(135deg,#f0b90b,#ffdb6d);
    color:#111;
    font-weight:700;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
}

.login-link{
    text-align:center;
    margin-top:20px;
    color:#cfcfcf;
}

.login-link a{
    color:#f0b90b;
    text-decoration:none;
    font-weight:600;
}

.security-box{
    margin-top:25px;
    display:flex;
    gap:10px;
    align-items:center;
    color:#aaa;
    font-size:13px;
}

@media(max-width:900px){

.container{
    grid-template-columns:1fr;
}

.left{
    padding:40px;
}

.left h1{
    font-size:32px;
}

}

@media (max-width: 768px) {

    .left {
        display: none;
    }

}
.form-grid{
    grid-template-columns:1fr;
}

.input-group.full{
    grid-column:span 1;
}


}

</style>
</head>
<body>

<div class="container">

    <div class="left">

        <h1>
            Secure Your Future With
            <span class="highlight">Smart Investments</span>
        </h1>

        <p>
            Join thousands of investors growing their wealth through our
            trusted investment platform. Access diversified portfolios,
            real-time analytics, and secure fund management.
        </p>

    </div>

    <div class="right">

        <h2 class="form-title">Create Account</h2>

        <form>

            <div class="form-grid">

                <div class="input-group">
                    <label>First Name</label>
                    <input type="text" placeholder="John">
                </div>

                <div class="input-group">
                    <label>Last Name</label>
                    <input type="text" placeholder="Doe">
                </div>

                <div class="input-group full">
                    <label>Email Address</label>
                    <input type="email" placeholder="example@email.com">
                </div>

                <div class="input-group full">
                    <label>Username</label>
                    <input type="text" placeholder="john_doe">
                </div>

                <div class="input-group">
                    <label>Country</label>

                
<select name="country" required>
    <option value="">Select Country</option>

    <option>Afghanistan</option>
    <option>Albania</option>
    <option>Algeria</option>
    <option>Andorra</option>
    <option>Angola</option>
    <option>Antigua and Barbuda</option>
    <option>Argentina</option>
    <option>Armenia</option>
    <option>Australia</option>
    <option>Austria</option>
    <option>Azerbaijan</option>

    <option>Bahamas</option>
    <option>Bahrain</option>
    <option>Bangladesh</option>
    <option>Barbados</option>
    <option>Belarus</option>
    <option>Belgium</option>
    <option>Belize</option>
    <option>Benin</option>
    <option>Bhutan</option>
    <option>Bolivia</option>
    <option>Bosnia and Herzegovina</option>
    <option>Botswana</option>
    <option>Brazil</option>
    <option>Brunei</option>
    <option>Bulgaria</option>
    <option>Burkina Faso</option>
    <option>Burundi</option>

    <option>Cambodia</option>
    <option>Cameroon</option>
    <option>Canada</option>
    <option>Cape Verde</option>
    <option>Central African Republic</option>
    <option>Chad</option>
    <option>Chile</option>
    <option>China</option>
    <option>Colombia</option>
    <option>Comoros</option>
    <option>Congo</option>
    <option>Costa Rica</option>
    <option>Croatia</option>
    <option>Cuba</option>
    <option>Cyprus</option>
    <option>Czech Republic</option>

    <option>Denmark</option>
    <option>Djibouti</option>
    <option>Dominica</option>
    <option>Dominican Republic</option>

    <option>Ecuador</option>
    <option>Egypt</option>
    <option>El Salvador</option>
    <option>Equatorial Guinea</option>
    <option>Eritrea</option>
    <option>Estonia</option>
    <option>Eswatini</option>
    <option>Ethiopia</option>

    <option>Fiji</option>
    <option>Finland</option>
    <option>France</option>

    <option>Gabon</option>
    <option>Gambia</option>
    <option>Georgia</option>
    <option>Germany</option>
    <option>Ghana</option>
    <option>Greece</option>
    <option>Grenada</option>
    <option>Guatemala</option>
    <option>Guinea</option>
    <option>Guinea-Bissau</option>
    <option>Guyana</option>

    <option>Haiti</option>
    <option>Honduras</option>
    <option>Hungary</option>

    <option>Iceland</option>
    <option>India</option>
    <option>Indonesia</option>
    <option>Iran</option>
    <option>Iraq</option>
    <option>Ireland</option>
    <option>Israel</option>
    <option>Italy</option>

    <option>Jamaica</option>
    <option>Japan</option>
    <option>Jordan</option>

    <option>Kazakhstan</option>
    <option>Kenya</option>
    <option>Kiribati</option>
    <option>Kuwait</option>
    <option>Kyrgyzstan</option>

    <option>Laos</option>
    <option>Latvia</option>
    <option>Lebanon</option>
    <option>Lesotho</option>
    <option>Liberia</option>
    <option>Libya</option>
    <option>Liechtenstein</option>
    <option>Lithuania</option>
    <option>Luxembourg</option>

    <option>Madagascar</option>
    <option>Malawi</option>
    <option>Malaysia</option>
    <option>Maldives</option>
    <option>Mali</option>
    <option>Malta</option>
    <option>Marshall Islands</option>
    <option>Mauritania</option>
    <option>Mauritius</option>
    <option>Mexico</option>
    <option>Micronesia</option>
    <option>Moldova</option>
    <option>Monaco</option>
    <option>Mongolia</option>
    <option>Montenegro</option>
    <option>Morocco</option>
    <option>Mozambique</option>
    <option>Myanmar</option>

    <option>Namibia</option>
    <option>Nauru</option>
    <option>Nepal</option>
    <option>Netherlands</option>
    <option>New Zealand</option>
    <option>Nicaragua</option>
    <option>Niger</option>
    <option>Nigeria</option>
    <option>North Korea</option>
    <option>North Macedonia</option>
    <option>Norway</option>

    <option>Oman</option>

    <option>Pakistan</option>
    <option>Palau</option>
    <option>Panama</option>
    <option>Papua New Guinea</option>
    <option>Paraguay</option>
    <option>Peru</option>
    <option>Philippines</option>
    <option>Poland</option>
    <option>Portugal</option>

    <option>Qatar</option>

    <option>Romania</option>
    <option>Russia</option>
    <option>Rwanda</option>

    <option>Saint Kitts and Nevis</option>
    <option>Saint Lucia</option>
    <option>Saint Vincent and the Grenadines</option>
    <option>Samoa</option>
    <option>San Marino</option>
    <option>Sao Tome and Principe</option>
    <option>Saudi Arabia</option>
    <option>Senegal</option>
    <option>Serbia</option>
    <option>Seychelles</option>
    <option>Sierra Leone</option>
    <option>Singapore</option>
    <option>Slovakia</option>
    <option>Slovenia</option>
    <option>Solomon Islands</option>
    <option>Somalia</option>
    <option>South Africa</option>
    <option>South Korea</option>
    <option>South Sudan</option>
    <option>Spain</option>
    <option>Sri Lanka</option>
    <option>Sudan</option>
    <option>Suriname</option>
    <option>Sweden</option>
    <option>Switzerland</option>
    <option>Syria</option>

    <option>Taiwan</option>
    <option>Tajikistan</option>
    <option>Tanzania</option>
    <option>Thailand</option>
    <option>Timor-Leste</option>
    <option>Togo</option>
    <option>Tonga</option>
    <option>Trinidad and Tobago</option>
    <option>Tunisia</option>
    <option>Turkey</option>
    <option>Turkmenistan</option>
    <option>Tuvalu</option>

    <option>Uganda</option>
    <option>Ukraine</option>
    <option>United Arab Emirates</option>
    <option>United Kingdom</option>
    <option>United States</option>
    <option>Uruguay</option>
    <option>Uzbekistan</option>

    <option>Vanuatu</option>
    <option>Vatican City</option>
    <option>Venezuela</option>
    <option>Vietnam</option>

    <option>Yemen</option>

    <option>Zambia</option>
    <option>Zimbabwe</option>
</select>
```


                </div>

                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" placeholder="+234 800 000 0000">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" placeholder="********">
                </div>

                <div class="input-group">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="********">
                </div>

            </div>

            <button class="btn">
                CREATE INVESTMENT ACCOUNT
            </button>

            <div class="security-box">
                🔒 256-bit SSL Secured Registration
            </div>

            <div class="login-link">
                Already have an account?
                <a href="login.php">Login Here</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>