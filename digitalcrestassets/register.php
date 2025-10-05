
<?php

session_start();
require 'header.php';

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
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->

    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-2 col-lg-2">
			</div>
			
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<!-- Logo Starts -->
				<a class="visible-xs" href="index.html">
					<img id="logo" class="img-responsive mobile-logo" src="images/logo-dark.png" alt="logo">
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h2 class="title-head hidden-xs">get <span>started</span></h2>
							 <p class="info-form">Open account for free!</p>
							 <?= $error ?>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						<form method="POST">
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="username" id="username" placeholder="username" type="text" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
							</div>
							<!-- Input Field Ends -->
							 <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="repassword" id="repassword" placeholder="CONFIRM PASSWORD" type="password" required>
							</div>
							<!-- Input Field Ends -->
							  <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" value="<?= $ref ?>" name="referral" id="referral" placeholder="REFERRAL (optional)" type="text" >
							</div>
							<!-- Input Field Ends -->
							   
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="register">create account</button>
								<p class="text-center">already have an account ? <a href="login">Login</a>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						<!-- Form Ends -->
					</div>
				</div>
				
			</div>
		</div>
        <!-- Template JS Files -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/custom.js"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="js/styleswitcher.js"></script>

    </div>
    <!-- Wrapper Ends -->
</body>


<!-- Mirrored from slimhamdi.net/bayya/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Sep 2024 10:48:42 GMT -->
</html>