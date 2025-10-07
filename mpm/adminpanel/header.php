

<?php

session_start();


if(!isset($_SESSION['admin'])){
   echo " <script>
        window.location.href='./index.php';
        </script>";

}
include '../conn.php';

$admin_id =  $_SESSION['admin_id'];

$sql = "SELECT * FROM members where id = '$admin_id'";





?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Admin Control</title>
        <!--<meta name="viewport" content="width=1024">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="admin panel" name="description" />
        <meta name="theme-color" content="#0173d4">
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
        
        <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        
        <!-- Plugins css -->
        <link href="plugins/modal-effect/css/component.css" rel="stylesheet">

        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/default.js"></script>
    </head>    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="home.php" class="logo">
                        <!-- <i class="fa fa-tachometer" aria-hidden="true"></i> -->
                            <i class="fa fa-gear"></i> <span>Admin </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <a href="#" class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
    
                        
                    </div>
                </nav>
            </div>            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="../images/chat.png" alt="" class="thumb-md rounded-circle" width="30px" height="auto">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Admin
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php" class="dropdown-item">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?php echo $company_name ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="home.php" class="waves-effect active-menu">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                    <!-- <i class="md md-home"></i> -->
                                    <span> Dashboard </span></a>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                    <span> Members </span> <span class="pull-righ">
                                        +
                                    </span>
                                    </a>
                                <ul class="list-unstyled" style="display: block;">
                                            <li class=""><a href="members.php?type=all" >All Accounts</a></li>
                                    <li class=""><a href="members.php?type=active">Active Accounts</a></li>
                                    <li class=""><a href="members.php?type=deactive">Deactivated Accounts</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub d-none">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                     <span> Deposits </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class=""><a href="deposits.php?type=all" >All Deposits</a></li>
                                    <li class=""><a href="deposits.php?type=completed" >Active Deposits</a></li>
                                    <li class=""><a href="deposits.php?type=completed" >Completed Deposits</a></li>
                                    <li class=""><a href="deposits.php?type=pending" >Pending Deposits</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-reply-all" aria-hidden="true"></i>
                                    <span> Withdrawal </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class=""><a href="withdrawals.php?type=all">All Withdrawal</a></li>
                                    <li class=""><a href="withdrawals.php?type=approved">Completed Withdrawal</a></li>
                                    <li class=""><a href="withdrawals.php?type=pending">Pending Withdrawal</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                    <span> Investments </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class=""><a href="investment_request.php?type=all">All Investments</a></li>
                                    <li class=""><a href="investment_request.php?type=pending">Pending Investments</a></li>
                                    <li class=""><a href="investments.php">Active Investments</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                    <span> Transactions </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class=""><a href="transactions.php">All Transactions</a></li>
                                    <!-- <li class=""><a href="transaction.php?a=2">Completed Transactions</a></li>
                                    <li class=""><a href="transaction.php?a=3">Pending Transactions</a></li> -->
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span> Settings </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class=""><a href="setting.php?a=1">Deposit Plans</a></li>
                                    <li class=""><a href="wallets.php?a=1">Add wallets</a></li>
                                    <li class=""><a href="testimony.php?a=2">Add Testimonials</a></li>
                                    <li class=""><a href="faq.php?a=3">Add FAQs</a></li>
                                    <!-- <li class=""><a href="setting.php?a=4">Set Deposit/Withdrawal Charges</a></li>
                                    <li class=""><a href="setting.php?a=5">Extra Statistics</a></li> -->
                                </ul>
                            </li>
                            
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                                    <span> Reward </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class=""><a href="bonus.php?a=1">Send Bonus</a></li>
                                    <!-- <li class=""><a href="bonus.php?a=2">Send Penalty</a></li> -->
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop ">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                    <span> Message </span> <span class="pull-righ">+</span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <!-- <li class=""><a href="msg.php?a=1">Read Messages</a></li> -->
                                    <li class=""><a href="message.php?a=2">Send Bulk Mail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="logout.php" class="waves-effect">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <span> Logout </span></a>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>            <!-- Left Sidebar End --> 


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">