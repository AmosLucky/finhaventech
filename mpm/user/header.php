<?php

session_start();
include '../conn.php';
if(!isset($_SESSION['user'])){
   echo " <script>
        window.location.href='../login.php';
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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script type="text/javascript" src="https://js.stripe.com/v3/"></script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="sIAIW8dEBLG2O8AHp32To0NFX7ldZ9IBzCrvzEds">
    <title><?= $company_name ?> | Account Dashboard</title>
            <link rel="icon" href="" type="image/png" />
        <!-- Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/8c623c5eb2.js" crossorigin="anonymous"></script>

        <!-- Page CSS -->
        <link rel="stylesheet" href="themes/purposeTheme/assets/libs/fullcalendar/dist/fullcalendar.min.css">
        <!-- Purpose CSS -->
        <link rel="stylesheet" href="themes/purposeTheme/assets/css/brown.css"
            id="stylesheet">
        <link rel="stylesheet" href="themes/purposeTheme/assets/css/style.css">
        <link rel="stylesheet" href="themes/purposeTheme/assets/libs/animate.css/animate.min.css">
        <link rel="stylesheet" href="themes/purposeTheme/assets/libs/sweetalert2/dist/sweetalert2.min.css">
        <script src="themes/purposeTheme/assets/libs/sweetalert/sweetalert.min.js "></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="themes/purposeTheme/assets/libs/flatpickr/dist/flatpickr.min.css">

        
       
</head>

<body class="application application-offset">
           <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
    <!-- Application container -->
    <div class="container-fluid container-application">
        
        <!-- Sidenav -->
<div class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="index.php">
            <img src="../assets/img/logo.png" class="navbar-brand-img" alt="logo">
        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin"
                data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- User mini profile -->
    <div class="text-center sidenav-user d-flex flex-column align-items-center justify-content-between">
        <!-- Avatar -->
        <div>
            <a href="#" class="avatar rounded-circle avatar-xl">
           
                <i class="fas fa-user-circle fa-4x"></i>
            </a>
                            
            <div class="mt-4">
                <h5 class="mb-0 text-white"> <?= $user ?></h5>
                <span class="mb-3 text-sm text-white d-block opacity-8">online</span>
                <a href="#" class="shadow btn btn-sm btn-white btn-icon rounded-pill hover-translate-y-n3">
                    <span class="btn-inner--icon">
                        
                    </span>
                    <span
                        class="btn-inner--text">$<?php echo number_format($balance,2) ?></span>
                </a>
            </div>
        </div>
        <!-- User info -->
        <!-- Actions -->
        <div class="mt-4 w-100 actions d-flex justify-content-between">
            
            
        </div>
    </div>
    <!-- Application nav -->
    <div class="clearfix nav-application">
        <a href="index.php"
            class="text-sm btn btn-square active">
            <span class="btn-inner--icon d-block">
            
                <i class="fas fa-home fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Home</span>
        </a>
        <a href="deposit.php"
            class="text-sm btn btn-square   ">
            <span class="btn-inner--icon d-block"><i class="fas fa-arrow-alt-circle-up fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Deposit</span>
        </a>
                    <a href="withdrawal.php"
                class="text-sm btn btn-square  ">
                <span class="btn-inner--icon d-block"><i class="fas fa-arrow-alt-circle-up fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Withdraw</span>
            </a>
                            <!-- <a href="tradinghistory.php"
                class="text-sm btn btn-square ">
                <span class="btn-inner--icon d-block"><i class="fas fa-history fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Profit History</span>
            </a> -->
                <a href="accounthistory.php"
            class="text-sm btn btn-square ">
            <span class="btn-inner--icon d-block"><i class="fas fa-money-check-alt fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Transactions</span>
        </a>
                    <a href="transfer-funds.php"
                class="text-sm btn btn-square ">
                <span class="btn-inner--icon d-block"><i class="fas fa-exchange fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Transfer funds</span>
            </a>
                <a href="account-settings.php"
            class="text-sm btn btn-square ">
            <span class="btn-inner--icon d-block"><i class="fas fa-address-card fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Profile</span>
        </a>
                    <a href="buy-plan.php"
                class="text-sm btn btn-square ">
                <span class="btn-inner--icon d-block"><i class="fas fa-hand-holding-usd fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Trading Plans</span>
            </a>

            <!-- <a href="dashboard/myplans/All"
                class="text-sm btn btn-square  ">
                <span class="btn-inner--icon d-block"><i class="far fa-hand-holding-seedling fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">My Plans</span>
            </a> -->
                <a href="referuser.php"
            class="text-sm btn btn-square ">
            <span class="btn-inner--icon d-block"><i class="fas fa-retweet fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Referrals</span>
        </a>
    </div>
    <!-- Misc area -->
    <div class="card bg-gradient-warning">
        <div class="card-body">
            <h5 class="text-white">Need Help!</h5>
            <p class="mb-4 text-white">
                Contact our 24/7 customer support center
            </p>
           
            <a href="support.php" class="btn btn-sm btn-block btn-white rounded-pill">Contact Us</a>
        </div>
    </div>
</div>
        <!-- Content -->
        <div class="main-content position-relative">
            <!-- Main nav -->
            <!-- Main nav -->
<nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary navbar-border" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand + Toggler (for mobile devices) -->
        <div class="pl-4 d-block d-md-none">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/img/logo.png" class="navbar-brand-img" alt="...">
            </a>
        </div>

        <!-- User's navbar -->
        <div class="ml-auto navbar-user d-lg-none">
            <ul class="flex-row navbar-nav align-items-center">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-icon sidenav-toggler" 
                    data-action="sidenav-pin" data-target="#sidenav-main">
                        <i class="fas fa-list"></i></a>
                        
                </li>

                                <li class="nav-item dropdown dropdown-animate">
                                        <a class="nav-link nav-link-icon" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <strong style="font-size:8px;">KYC</strong>
                    </a>
                    <div class="p-0 dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow">
                        <div class="p-2">
                            <h5 class="mb-0 heading h6">KYC Verification</h5>
                        </div>
                        <div class="pb-2 mt-0 text-center list-group list-group-flush">
                                                        <div class="">
                                <a href="verify-account.php" class="btn btn-primary btn-sm">Verify
                                    Account </a>
                            </div>
                                                    </div>
                    </div>
                                    </li>
                
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm rounded-circle">
                                                        <i class="fas fa-user-circle fa-2x"></i>
                                                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="px-0 dropdown-header">Hi, <?= $user ?>!</h6>
                        <a href="account-settings.php" class="dropdown-item">
                            <i class="far fa-user"></i>
                            <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger" href="logout.php" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="far fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="logout.php" method="POST" style="display: none;">
                           
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">

            <!-- Right menu -->
            <ul class="navbar-nav ml-lg-auto align-items-center d-none d-lg-flex">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main">
                        <i class="fas fa-list"></i>
                    </a>
                </li>

                                <li class="nav-item dropdown dropdown-animate">
                                        <a class="nav-link nav-link-icon" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <strong style="font-size:8px;">KYC</strong>
                    </a>
                    <div class="p-0 dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow">
                        <div class="p-2">
                            <h5 class="mb-0 heading h6">KYC Verification</h5>
                        </div>
                        <div class="pb-2 mt-0 text-center list-group list-group-flush">
                                                        <div class="">
                                <a href="verify-account.php" class="btn btn-primary btn-sm">Verify
                                    Account </a>
                            </div>
                                                    </div>
                    </div>
                                    </li>
                
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media media-pill align-items-center">
                            <span class="avatar rounded-circle">
                            <i class="fas fa-user-circle fa-2x"></i>
                                                        </span>
                            <div class="ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm font-weight-bold"><?= $user ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="px-0 dropdown-header">Hi, <?= $user ?>!</h6>
                        <a href="account-settings.php" class="dropdown-item">
                            <i class="far fa-user"></i>
                            <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger" href="logout.php" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="far fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="logout.php" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="sIAIW8dEBLG2O8AHp32To0NFX7ldZ9IBzCrvzEds">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>