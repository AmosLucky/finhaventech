<?php

session_start();
include '../conn.php';
if(!isset($_SESSION['user'])){
   echo " <script>
        window.location.href='../auth/login';
        </script>";

}
$bitcoin_address = "";
$etherum_address =  "";
$pendding_balance =  0.00;
$approved_balance = 0.00;
$total_withdrawn = 0.00;
$total_deposit = 0.00;
$total_invest = 0.00;
$total_ref_bonus = 0.00;

$running_invest = 0.00;
$referral_balance = 0.00;
$profit = 0.00;
$blocked_reward = 0.00;
$is_suspended = false;
$msg_title = "";
$msg = "";
$is_compounded = false;
$compounded_duration = 0;
$profile_pic = "";

 $user_id = $_SESSION['id'];

        $id = $_SESSION['id'];
       $balance =  $_SESSION['balance'];
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];
        $_SESSION['phonenumber'];
        $_SESSION['state'];
       $is_comounded;
        
        $firstname =  $_SESSION['firstname'];
          $_SESSION['referree'] ;

//////////////////NOTIFICATION AND MESSAGES//////////////////
          $notification_count = 0;   
$notifications = $model->selectFromTable("notifications","type='general'");
$notifications = $notifications['msg'];


//////////////////////MESSAGES////////////////////////
   $message_count = 0;   
$messages = $model->selectFromTable("notifications","type='personal' && user_id = $user_id");
$messages = $messages['msg'];

$mquery = "SELECT * from notifications where type='personal' && status = 'not-seen' &&  user_id = '$user_id'";
$mresult = mysqli_query($con,$mquery);
$message_count = mysqli_num_rows($mresult);


          //////////////////////////////////////

$sql = "SELECT * FROM members WHERE id =  '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    

    while ($row = mysqli_fetch_array($result)) {
		$address = $row['address'];
        $dob = $row['dob'];
      $balance = $row['balance'];
      $bitcoin_address = $row['bitcoin_wallet'];
      $etherum_address = $row['etherum_wallet'];
      $referral_balance = $row['referral_balance'];
      $pending_ref_balance = $row['pending_ref_balance'];
      $running_invest  = $row['running_invest'];
      $pendding_invest = $row['pendding_investment'];
      $pending_days = $row['pendding_days'];
      $num_of_days = $row['num_of_days'];
      $pending_profit = $row['pendding_profit'];
      $profit = $row['profit'];
      $completed_investment = $row['completed_investment'];
      $is_comounded = $row['isCompounded'];
      $blocked_reward = $row['blocked_balance'];
      $is_suspended = $row['is_suspended'];
	  $country = $row['state'];

      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $phone = $row['phonenumber'];
        $seen = $row['seen'];
        $msg_title = $row['msg_title'];
        $msg = $row['msg'];
         $is_compounded = $row['isCompounded']; 
        $compounded_duration = $row['compounded_period'];
        $profile_pic =  $row['profile_pic'];

		$is_verified = $row['is_verified'];

        if(!$is_verified){

        //   echo " <script>
		// 	window.location.href = '../verify.php';
		// </script>";

        }

      if(!$seen){
        $notification_count = 1;  



      }


      # code...
    }

    

    $pendding_balance = 0;

    $sql = "Select * from transactions where user_id = '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
       $transaction_type = $row['transaction_type'];
	   $status = $row['status'];
       if($transaction_type == "Investment" && $status == "pending"){
        $pendding_balance += floatval($row['amount']);
       }

      if($transaction_type == "Withdrawal"  && $status == "approved"){
        $total_withdrawn += floatval($row['amount']);

        
      }

      if($transaction_type == "deposit"  && $status == "approved"){
        $total_deposit += floatval($row['amount']);

        
      }

      if($transaction_type == "Investment" && $status == "approved"){
        $total_invest += floatval($row['amount']);

        
      }

      if($transaction_type == "Bonus"){
        $total_ref_bonus += floatval($row['amount']);

        
      }



     
    }


    if(strlen($profile_pic) < 3){
        $profile_pic = "profile.png";
    }

   // $sql = "Select * from transactions where user_id = '$user_id' && status = 'successful' && transaction_type = 'withdrawal'";

    // $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    // while ($row = mysqli_fetch_array($result)) {
    //    $total_withdrawn += floatval($row['amount']);
    // }


    ///////////////SELECT RUNNING INVESTMENT AND PROFIT////////////////////

   // $investment de
    
 

// for ($i=0; $i < count($notifications) ; $i++) { 
//  $seen_users = json_decode(unserialize($notifications[$i]['seen_users']));
//print_r($seen_users);
// if(in_array($user_id,$seen_users)){
//  //echo "true";
// }else{
//  //$notification_count++;

//  //echo "false";
// }


    // code...
//}

//die();

// print_r($notifications);
// die();
// echo $notifications["title"];
// die();

?>
<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Remixicon CSS -->
    <link rel="stylesheet" href="css/remixicon.css">
    <!-- boxicons CSS -->
    <link rel="stylesheet" href="css/boxicons.min.css">
    <!-- MetisMenu Min CSS -->
    <link rel="stylesheet" href="css/metismenu.min.css">
    <!-- Simplebar Min CSS -->
    <link rel="stylesheet" href="css/simplebar.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Dark Mode CSS -->
    <link rel="stylesheet" href="css/dark-mode.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../home/images/logo.png">
    <!-- Title -->
    <title>User Dashboard </title>
</head>

<body class="body-bg-f5f5f5">
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="content">
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start Sidebar Area -->
<div class="side-menu-area">
    <div class="side-menu-logo bg-linear">
        <a href="dashboard" class="navbar-brand d-flex align-items-center">
            <img src="../home/images/logo.png" alt="" style="width: 200px;">
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <nav class="sidebar-nav" data-simplebar>
        <ul id="sidebar-menu" class="sidebar-menu">
            <li class="nav-item-title">MENU</li>

            <li>
                <a href="dashboard" class="box-style">
                    <i class="ri-home-2-fill"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="has-arrow box-style">
                    <i class="ri-money-dollar-box-line"></i>
                    <span class="menu-title">Deposit</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li>
                        <a href="deposit" >
                            <span class="menu-title">New Deposit</span>
                        </a>
                    </li>

                    <li>
                        <a href="deposits">
                            <span class="menu-title">Deposit List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="has-arrow box-style">
                    <i class="ri-building-line"></i>
                    <span class="menu-title">Investment</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li>
                        <a href="investment">
                            <span class="menu-title">New Investment</span>
                        </a>
                    </li>

                    <li>
                        <a href="investments">
                            <span class="menu-title">Investment History</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="has-arrow box-style">
                    <i class="ri-send-plane-fill"></i>
                    <span class="menu-title">Withdrawal</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <li>
                        <a href="withdrawals">
                            <span class="menu-title">Withdrawals</span>
                        </a>
                    </li>

                    <li>
                        <a href="withdrawal">
                            <span class="menu-title">New Withdrawal</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="has-arrow box-style">
                    <i class="ri-git-commit-line"></i>
                    <span class="menu-title">Services</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <!-- <li>
                        <a href="cards">
                            <span class="menu-title">Cards</span>
                        </a>
                    </li>
                    <li>
                        <a href="loans">
                            <span class="menu-title">Loan</span>
                        </a>
                    </li>
                    <li>
                        <a href="membership">
                            <span class="menu-title">Membership ID</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="kyc">
                            <span class="menu-title">KYC</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="transfer" class="box-style">
                    <i class="bx bx-send"></i>
                    <span class="menu-title">Transfer Funds </span>
                </a>
            </li>

            <!-- <li>
                <a href="subtrade" class="box-style">
                    <i class="bx bx-user-plus"></i>
                    <span class="menu-title">Managed Accounts </span>
                </a>
            </li> -->

            <li>
                <a href="referral" class="box-style">
                    <i class="bx bx-user-plus"></i>
                    <span class="menu-title">Referrals </span>
                </a>
            </li>
                        <li>
                <a href="settings" class="box-style">
                    <i class="bx bx-cog"></i>
                    <span class="menu-title">Settings </span>
                </a>
            </li>

            <li>
                <a href="logout" class="box-style">
                    <i class="bx bx-log-out"></i>
                    <span class="menu-title">Logout </span>
                </a>
            </li>


        </ul>


        <div class="dark-bar">
            <a href="#" class="d-flex align-items-center">
                <span class="dark-title">Enable Dark Theme</span>
            </a>

            <div class="form-check form-switch">
                <input type="checkbox" class="checkbox" id="darkSwitch">
            </div>
        </div>
    </nav>
</div>
<!-- End Sidebar Area -->

<!-- Start Main Content Area -->
<div class="main-content d-flex flex-column">
    <div class="container-fluid">
        <nav class="navbar main-top-navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="responsive-burger-menu d-block d-lg-none">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>



                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <div id="google_translate_element"></div>
                    </li>



                    <li class="nav-item dropdown profile-nav-item">
                        <a class="nav-link dropdown-toggle avatar" href="#" id="navbarDropdown-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=<?= $user ?>" alt="Images" class="rounded-circle"
                            style="width: 50px;">
                            <h3><?= $user ?></h3>
                            <span>Investor</span>
                        </a>

                        <div class="dropdown-menu">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="https://ui-avatars.com/api/?name=<?= $user ?>" class="rounded-circle" alt="image">
                                </div>

                                <div class="info text-center">
                                    <span class="name"><?= $user ?></span>
                                    <p class="mb-3 email">
                                        <a>
                                            <span class="__cf_email__">
                                               <?= $email ?>
                                            </span>
                                        </a>
                                    </p>
                                    <!-- <p class="mb-3 email">
                                        <a>
                                            <span class="__cf_email__">
                                                PXVnNubXK3
                                            </span>
                                        </a>
                                    </p> -->
                                </div>
                            </div>

                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="settings" class="nav-link">
                                            <i class="ri-user-line"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="dropdown-footer">
                                <ul class="profile-nav">
                                    <li class="nav-item">
                                        <a href="logout" class="nav-link">
                                            <i class="ri-login-circle-line"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ri-settings-5-line"></i>
                        </a>
                    </li>
                    -->
                </ul>
            </div>
        </nav>
    </div>
