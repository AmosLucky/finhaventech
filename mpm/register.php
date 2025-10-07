
<?php

session_start();
require "header.php";


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

  $sql = "select * from members where username = '$usernamev' || email = '$emailv'";
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
      background-color: white;

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
      Our investment platform is a product of careful preparation and fruitful work of experts in the field of Bitcoin mining, highly profitable trade in cryptocurrencies and foreign exchanges. Using modern methods of doing business and a personal approach to each client, we offer a unique investment model to investors who want to use Bitcoin not only as a method of payment, but also as a reliable source of stable income. $company_name  business uses improved mining equipments and antminers at the most stable markets, which minimizes the risks of financial loss to clients and guarantees them a fixed income accrued every calendar day
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
               
                require "mail.php"; 
               // return;



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
        window.location.href='user/index.php';
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

    <!--=================================
    Inner Header -->
    <div class="inner-header bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
            <h1 class="breadcrumb-title mb-0">Sign Up</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
              <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home me-1"></i>Home</a></li>
              <li class="breadcrumb-item active"><span>Sign Up</span></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  <!--=================================
  Inner Header -->

  <!--=================================
  Login -->
  <section class="space-ptb login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-9 col-sm-11">
           <?php echo  $error ?>
         
          <div class="tab-content" >
             
            
              <form method="POST" class="row mt-4 mb-4 mb-sm-5 align-items-center form-flat-style gx-2">

                <input type="hidden" name="fname" value="first name">
                             <input type="hidden" name="lname" value="first name">
                              <input type="hidden" name="state" value="Country">


                <div class="mb-3 col-sm-12">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" placeholder="Username" name="username" required="" value="<?php echo $username ?>">
                </div>
                <div class="mb-3 col-sm-12">
                  <label class="form-label">Email Address:</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?php echo $email ?>">
                </div>
                  <div class="mb-3 col-sm-12">
                  <label class="form-label">Phone number:</label>
                                     <input type="text" class="form-control" name="phone" required value="<?php echo $phone ?>" placeholder="Phone number" >
                                </div>
                        
                <div class="mb-3 col-sm-12">
                  <label class="form-label">Password:</label>
                  <input type="Password" class="form-control" placeholder="Password" name="password" required="">
                </div>
                <div class="mb-3 col-sm-12">
                  <label class="form-label">Confirm Password:</label>
                  <input type="Password" class="form-control" placeholder="Confirm Password" name="repassword" required="">
                </div>

                <div class="mb-3 col-sm-12">
                  <label class="form-label">Referral</label>
                                    <input type="text" class="form-control" name="referral" value="<?php echo $user ?>" placeholder="Referral (optional)"  >
                                </div> 

                <div class="col-sm-6">
                  <div class="d-grid">
                    <button type="submit" name="register" class="btn btn-primary btn-flat">Sign up</button>
                  </div>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                    <li class="me-1"><a href="signin">Already Registered User? Click here</a></li>
                  </ul>
                </div>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Login -->

  <!--=================================
  Footer -->
  <?php 

require "footer.php";

?>