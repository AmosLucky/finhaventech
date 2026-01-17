<?php
session_start();

require '../conn.php';


$error = "";



// if(isset( $_SESSION['user'])){

//         echo " <script>
//         window.location.href='dashboard/index.php';
//         </script>";
//         }




        if(isset($_POST['login'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $usernamev = mysqli_real_escape_string($con,$username);
    $passwordv = mysqli_real_escape_string($con,$password);

    $sql = "select * from members where email = '$usernamev'  && password = '$passwordv' || username = '$usernamev'  && password = '$passwordv' ";
    $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $isAdmin = $row['is_admin'];
             $is_suspended = $row['is_suspended'];
              $suspension_reason = $row['suspension_reason'];
               $is_deleted = $row['deleted'];


           if($is_deleted){
              $error = '<div class="alert alert-danger text-center">
              This account is suspended
              </div>';

           }else{
            /////////////////////////////NORMAL LOGIN//////////

              if($isAdmin){
                $_SESSION['admin_id'] = $row['id'];
             $_SESSION['admin'] =$row['username'];
              $id = $_SESSION['admin_id'];
                $_SESSION['admin'];
        


          //insert into transaction


       echo " <script>
        window.location.href='../adminpanel';
        </script>";



    }else if($is_deleted){
         $error = "<div class='alert alert-danger text-center'>
        This account is suspended
              
              </div>";

    }else{
             
             $_SESSION['id'] = $row['id'];
             $_SESSION['user'] =$row['username'];
            // $_SESSION['balance'] =  $row['balance'];
              $_SESSION['email'] =$row['email'];
             $_SESSION['phonenumber'] =  $row['phonenumber'];
            $_SESSION['balance'] = $row['balance'];
             $_SESSION['state'] =$row['state'];
              $_SESSION['gender'] =$row['gender'];
               $is_comounded = $row['isCompounded'];
            
              $_SESSION['referree'] =  $row['referree'];
               $_SESSION['firstname'] =  $row['firstname'];
                $_SESSION['password'] =  $row['password'];
             $_SESSION['is_admin'] =  $row['is_admin'];
              $_SESSION['isCompounded'] =  $row['isCompounded'];
        echo " <script>
        window.location.href='../user/';
        </script>";

    }
           }
            
        }

        // $id = $_SESSION['id'];
        // $_SESSION['balance'];
        // $user = $_SESSION['user'];
        // $_SESSION['email'];
        // $_SESSION['phonenumber'];
        // $_SESSION['state'];
        
        //   $_SESSION['firstname'];
        //   $_SESSION['referree'] ;
        //   $isAdmin = $_SESSION['is_admin'];


          //insert into transaction
         


       



        

    }
    //user more than two
    else{

        $error = '<div class="alert alert-danger text-center">We cant find your account please check your username or password</div>';

    }


}


// if(isset($_POST['login'])){
//   $login_name = $_POST['username'];
//   $login_psw = $_POST['password'];
// }
// else if(isset($_POST['signup'])){
//   $fname = $_POST['fname'];
//   $lname = $_POST['lname'];
//   $email = $_POST['email'];
//   $uname = $_POST['uname'];
//   $pass = $_POST['psw'];
//   $phone = $_POST['phone'];
// }

?>
   
<!doctype html>
<html lang="zxx">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <title>Login Page - <?= $company_name ?></title>
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
            <h3>Login</h3>
            <p>Sign In to continue to <?= $company_name ?>.</p>
            <?= $error ?>

            <form class="user-form" method="post" action="">
                                <input type="hidden" name="_token" value="za1IhQVNYh6TQOfToFMBgXfSutKrVgD7c4x56AXo">                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="Enter your username"
                                   name="email" value=""/>
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
                        <div class="login-action">


                            <span class="forgot-login">
										<a href="recover-password">Forgot your password?</a>
									</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="default-btn register" type="submit" name="login">
                            Login
                        </button>
                    </div>



                    <div class="col-12">
                        <p class="create">Don’t have an account? <a href="register">Sign up</a></p>
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
