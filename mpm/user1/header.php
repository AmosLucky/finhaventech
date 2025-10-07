
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

      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $phone = $row['phonenumber'];
        $seen = $row['seen'];
        $msg_title = $row['msg_title'];
        $msg = $row['msg'];
         $is_compounded = $row['isCompounded']; 
        $compounded_duration = $row['compounded_period'];
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

      if($transaction_type == "Withdrawal"){
        $total_withdrawn += floatval($row['amount']);

        
      }

      if($transaction_type == "Deposit"){
        $total_deposit += floatval($row['amount']);

        
      }

      if($transaction_type == "Investment" && $status == "approved"){
        $total_invest += floatval($row['amount']);

        
      }

      if($transaction_type == "Bonus"){
        $total_ref_bonus += floatval($row['amount']);

        
      }



     
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
	
<!-- Mirrored from laravel.spruko.com/xino/ltr/index by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Oct 2021 12:33:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
	

		<!-- Title -->
        <title><?php echo $company_name ?> </title>

		<!-- Favicon -->
		<link rel="icon" href="../assets/img/footer-logo.png" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="assets/plugins/icons/icons.css" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Animations css-->
		<link href="assets/css/animate.css" rel="stylesheet">

		<!--  Custom Scroll bar-->
		<link href="assets/plugins/custom-scroll/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--  Left-Sidebar css -->
		<link href="assets/css/sidemenu.css" rel="stylesheet">

		
		<!-- Internal Chart-Morris css-->
        <link href="assets/plugins/morris.js/morris.css" rel="stylesheet">

		<!-- Internal Nice-select css  -->
		<link href="assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet"/>

		<!-- Internal News-Ticker css-->
		<link href="assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

		<!-- Jquery-countdown css-->
		<link href="assets/plugins/jquery-countdown/countdown.css" rel="stylesheet">

		<!-- Internal News-Ticker css-->
        <link href="assets/plugins/newsticker/jquery.jConveyorTicker.css" rel="stylesheet" />


		<!-- style css-->
		<link href="assets/css/style.css" rel="stylesheet">

		<!-- skin css-->
		<link href="assets/css/skin-modes.css" rel="stylesheet">

		<!-- dark-theme css-->
		<link href="assets/css/style-dark.css" rel="stylesheet">

        <!-- Switcher css -->
		<link href="assets/switcher/css/switcher.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/switcher/demo.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
	.content-body{
		margin-top: 50px;
	}
</style>
 


	</head>
	<body class="main-body app sidebar-mini sidebar-gone light-theme">

		<!-- Loader -->
		<div id="global-loader" class="light-loader">
			<img src="assets/img/loaders/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		
		<!-- End Switcher -->

		<!-- Page -->
		<div class="page">

			<!-- main-sidebar opened -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll ">
			<div class="main-sidebar-header">
			 	<a class=" logo-light" href="index"><img src="./images/logo.png" class="" alt="logo"></a>
				 <!-- <a class=" logo-dark" href="index"><img src="../assets/img/footer-logo.png" class="main-logo" alt="logo"></a> -->
			<!--	<a class=" desktop-logo logo-dark" href="index.html"><img src="uploads/logo.png" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light" href="index.html"><img src="uploads/logo.png" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark" href="index"><img src="uploads/logo.png" class="logo-icon dark-theme" alt="logo"></a> -->
			</div>
			<div class="main-sidebar-body circle-animation ">

				<ul class="side-menu circle">
					<li><h3 class="">Dashboard</h3></li>
					<li class="slide">
						<a class="side-menu__item" href="index">
							<!-- <i class="side-menu__icon ti-desktop"></i> -->
							<span class="side-menu__label">Home</span></a>
					</li>
					<!-- <li class="slide">
						<a class="side-menu__item" href="deposit">
							
							<span class="side-menu__label">Deposit</span></a>
					</li> -->
					<li class="slide">
						<a class="side-menu__item" href="deposit">
							<!-- <i class="side-menu__icon ti-desktop"></i> -->
							<span class="side-menu__label">Deposit</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="reinvest">
							<!-- <i class="side-menu__icon ti-desktop"></i> -->
							<span class="side-menu__label">Reinvest</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="withdraw">
							<!-- <i class="side-menu__icon ti-desktop"></i> -->
							<span class="side-menu__label">Withdraw</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="transfer">
							<!-- <i class="side-menu__icon ti-desktop"></i> -->
							<span class="side-menu__label">Transfer</span></a>
					</li>

<!-- 
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-layout menu-icon"></i><span class="side-menu__label">Trade</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="deposit">Deposit</a></li>
							<li><a class="slide-item" href="withdraw">Withdraw</a></li>
							<li><a class="slide-item" href="reinvest">Reinvest</a></li>
						</ul>
					</li> -->
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-user"></i>
						<span class="side-menu__label">Account</span>
						<i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="account">profile</a></li>
							<li><a class="slide-item" href="referral">Affiliate</a></li>
							<li><a class="slide-item" href="transactions">Transactions</a></li>
							<li><a class="slide-item" href="wallets">Wallet</a></li>
							
						</ul>
					</li>

					
					

<!-- 
					<li><h3>Transactions</h3></li>
					<li class="slide">
						<a class="side-menu__item" href="transactions"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Transactions</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="support"><i class="side-menu__icon ti-email  menu-icons"></i><span class="side-menu__label">Support</span></a>
					</li>
					 -->
					
					
					

					
					
					

					
				
				</ul>
			</div>
		</aside>
		<!-- main-sidebar -->
		<!-- main-content -->
			<div class="main-content app-content">

				<!-- main-header -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
							<a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
						</div>
						<div class="main-header-center ml-3 d-sm-none d-md-none d-lg-block">
							<input type="search" class="form-control" placeholder="Search for anything...">
							<button class="btn"><i class="fas fa-search"></i></button>
						</div>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<!-- <a href="index.html">
                                <img src="uploads/logo.png" class="mobile-logo" alt="logo">
                                <img src="uploads/logo.png" class="dark-mobile-logo" alt="logo">
                            </a> -->
						</div>
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<form class="navbar-form nav-item my-auto d-lg-none" role="search">
								<div class="input-group nav-item my-auto">
									<input type="text" class="form-control" placeholder="Search">
									<span class="input-group-btn">
										<button type="reset" class="btn btn-default">
											<i class="ti-close"></i>
										</button>
										<button type="submit" class="btn btn-default nav-link">
											<i class="ti-search"></i>
										</button>
									</span>
								</div>
							</form>
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
							</div>
							<div class="dropdown  nav-item main-header-message ">
								<a class="new nav-link" href="#" ><i class="ti-email"></i><span class="pulse-danger"></span></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp ">
									<div class="main-dropdown-header  d-sm-none">
										<a class="main-header-arrow" href="#"><i class="icon ion-md-arrow-back"></i></a>
									</div>
									<div class="menu-header-content text-left d-flex">
										<div class="">
											<h6 class="menu-header-title text-white mb-0"> <?php 
                                        echo $message_count;

                                        ?>   new Messages</h6>
										</div>
										<div class="my-auto ml-auto">
											<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
										</div>
									</div>
									<div class="main-message-list chat-scroll">

										<?php 
                                            //while($row = mysqli_fetch_array($notifications)){
                                            //print_r($notifications);
                                            for ($i=0; $i < count($messages) ; $i++) { 
                                                // code...
                                            //}
                                                ///echo $notifications[$i];
                                                $title = $messages[$i]["title"];
                                                $post_date = $messages[$i]["post_date"];
                                                $body = $messages[$i]["body"];
                                                $id = $messages[$i]["id"];



                                            ?>
										<a  href="notification.php?p=<?php echo $id ?>" class="p-3 d-flex border-bottom">
											<div class="  drop-img  cover-image  " data-image-src="assets/img/faces/avatar.jpg">
												<span class="avatar-status bg-teal"></span>
											</div>

											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name"><?php echo $title ?></h5>
													<p class="time mb-0 text-right ml-auto float-right"><?php echo $post_date ?></p>
												</div>
												<p class="mb-0 desc"> <?php echo substr(strip_tags($body), 0,100)  ?>...</p>
											</div>
										</a>

									<?php } ?>
										
										
										
									</div>
									<div class="text-center dropdown-footer">
										<!-- <a href="text-center.html">VIEW ALL</a> -->
									</div>
								</div>
							</div>
							<div class="dropdown nav-item main-header-notification">
								<a class="new nav-link " href="#"><i class="ti-bell animated bell-animations"></i><span class=" pulse"></span></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="menu-header-content text-left d-flex">
										<div class="">
											<h6 class="menu-header-title text-white mb-0"><?php echo $notification_count ?> new Notifications</h6>
										</div>
										<div class="my-auto ml-auto">
											<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
										</div>
									</div>
									<div class="main-notification-list Notification-scroll">
										<?php 
											//while($row = mysqli_fetch_array($notifications)){
											//print_r($notifications);
											for ($i=0; $i < count($notifications) ; $i++) { 
												// code...
											//}
												///echo $notifications[$i];
												$title = $notifications[$i]["title"];
												$post_date = $notifications[$i]["post_date"];
												$body = $notifications[$i]["body"];
												$id = $notifications[$i]["id"];



											?>
										<a class="d-flex p-3 border-bottom" href="notifications?i=<?php echo $id ?>">
											<div class="notifyimg bg-success-transparent">
												<i class="ti-bell animated bell-animations"></i>
											</div>
											<div class="ml-3">
												<h5 class="notification-label mb-1"><?php echo substr($title, 0,30)  ?></h5>
												<h6>
													<?php echo substr(strip_tags($body), 0,100)  ?>
												</h6>
												<div class="notification-subtext"><?php echo $post_date  ?></div>
											</div>
											<div class="ml-auto" >
												<i class="las la-angle-right text-right text-muted"></i>
											</div>
										</a>

										<?php } ?>
										
										
										
									</div>
									<div class="dropdown-footer">
										<a href="notifications?a">VIEW ALL</a>
									</div>
								</div>
							</div>
							<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
								aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon fe fe-more-vertical "></span>
							</button>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user" href="#"><img alt="" src="assets/img/faces/avatar.jpg"></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="main-header-profile header-img">
										<div class="main-img-user"><img alt="" src="assets/img/faces/avatar.jpg"></div>
										<h6><?php echo $user ?></h6><span>Premium Member</span>
									</div>
									
									<a class="dropdown-item" href="account"><i class="far fa-edit"></i> Edit Profile</a>
									
									<a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
								</div>
							</div>
							<div class="dropdown main-header-message right-toggle">
								<a class="nav-link " data-toggle="sidebar-right" data-target=".sidebar-right">
									<i class="ti-menu tx-20 bg-transparent"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /main-header -->

				<!-- mobile-header -->
			<div class="responsive main-header collapse" id="navbarSupportedContent-4">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark d-sm-none ">
					<div class="navbar-collapse">
						<div class="d-flex order-lg-2 ml-auto">
							<form class="navbar-form nav-item my-auto d-lg-none" role="search">
								<div class="input-group nav-item my-auto">
									<input type="text" class="form-control" placeholder="Search">
									<span class="input-group-btn">
										<button type="reset" class="btn btn-default">
											<i class="ti-close"></i>
										</button>
										<button type="submit" class="btn btn-default nav-link">
											<i class="ti-search"></i>
										</button>
									</span>
								</div>
							</form>
							<div class="d-md-flex">
								<div class="nav-item full-screen fullscreen-button">
									<a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
								</div>
							</div>
							<div class="dropdown  nav-item main-header-message header-contact">
								<a class="new nav-link" href="#" ><i class="ti-email"></i><span class=" pulse-danger"></span></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="main-dropdown-header d-sm-none">
										<a class="main-header-arrow" href="#"><i class="icon ion-md-arrow-back"></i></a>
									</div>
									<div class="menu-header-content text-left d-flex">
										<div class="">
											<h6 class="menu-header-title text-white mb-0"> <?php 
                                        echo $message_count;

                                        ?>  new Messages</h6>
										</div>
										<div class="my-auto ml-auto">
											<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
										</div>
									</div>
									<div class="main-message-list text-scroll">

										
                                            <?php 
                                            //while($row = mysqli_fetch_array($notifications)){
                                            //print_r($notifications);
                                            for ($i=0; $i < count($messages) ; $i++) { 
                                                // code...
                                            //}
                                                ///echo $notifications[$i];
                                                $title = $messages[$i]["title"];
                                                $post_date = $messages[$i]["post_date"];
                                                $body = $messages[$i]["body"];
                                                $id = $messages[$i]["id"];



                                            ?>
											
											<li>
												<div class="timeline-badge success">
												</div>

												


												<a  href="notification.php?p=<?php echo $id ?>" class="p-3 d-flex border-bottom">
											<div class="  drop-img  cover-image  " data-image-src="assets/img/faces/avatar.jpg">
												<span class="avatar-status bg-teal"></span>
											</div>

											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name"><?php echo $title ?></h5>
													<p class="time mb-0 text-right ml-auto float-right"><?php echo $post_date ?></p>
												</div>
												<p class="mb-0 desc"><?php echo substr(strip_tags($body), 0,100)  ?>...</p>
											</div>
										</a>
											</li>
                                        <?php } ?>
										
										
										
										
									</div>
									<div class="text-center dropdown-footer">
										<!-- <a href="text-center.html">VIEW ALL</a> -->
									</div>
								</div>
							</div>
							<div class="dropdown nav-item main-header-notification">
								<a class="new nav-link" href="#"><i class="ti-bell "></i><span class=" pulse"></span></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="menu-header-content text-left d-flex">
										<div class="">
											<h6 class="menu-header-title text-white mb-0"><?php echo $notification_count ?> new Notifications</h6>
										</div>
										<div class="my-auto ml-auto">
											<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
										</div>
									</div>
									<div class="main-notification-list notify-scroll">
											<?php 
											//while($row = mysqli_fetch_array($notifications)){
											//print_r($notifications);
											for ($i=0; $i < count($notifications) ; $i++) { 
												// code...
											//}
												///echo $notifications[$i];
												$title = $notifications[$i]["title"];
												$post_date = $notifications[$i]["post_date"];
												$body = $notifications[$i]["body"];
												$id = $notifications[$i]["id"];



											?>
										<a class="d-flex p-3 border-bottom" href="notifications?i=<?php echo $id ?>">
											<div class="notifyimg bg-success-transparent">
												<i class="ti-bell animated bell-animations"></i>
											</div>
											<div class="ml-3">
												<h5 class="notification-label mb-1"><?php echo substr($title, 0,30)  ?></h5>
												<h6>
													<?php echo substr(strip_tags($body), 0,100)  ?>
												</h6>
												<div class="notification-subtext"><?php echo $post_date  ?></div>
											</div>
											<div class="ml-auto" >
												<i class="las la-angle-right text-right text-muted"></i>
											</div>
										</a>

										<?php } ?>
										
										
										
										
									</div>
									<div class="dropdown-footer">
										<a href="notifications?a">VIEW ALL</a>
									</div>
								</div>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user" href="#"><img alt="" src="assets/img/faces/avatar.jpg"></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="main-header-profile header-img">
										<div class="main-img-user"><img alt="" src="assets/img/faces/avatar.jpg"></div>
										<h6><?php echo $user ?></h6><span>Premium Member</span>
									</div>
									
									<a class="dropdown-item" href="account"><i class="far fa-edit"></i> Edit Profile</a>
									
									
									<a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>