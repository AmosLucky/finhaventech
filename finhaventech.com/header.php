<!--<div style="height:250px;width:100%; background:red; color:white">-->
<!--    <center>-->
<!--        Your websites SSL certificate expired-->
<!--    </center>-->
    
<!--</div>-->

<?php

require "conn.php";

?>
<!DOCTYPE html>
<html>


<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">

    <!-- Stylesheets -->
    <link href="home/css/bootstrap.css" rel="stylesheet">
    <link href="home/css/style.css" rel="stylesheet">
    <link href="home/css/responsive.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;display=swap" rel="stylesheet">

    <meta name="og:title" content="<?= $company_name ?>" />
    <meta name="og:type" content="company" />
    <meta name="og:url" content="/" />
    <meta name="og:image" content="home/images/logo.png" />
    <meta name="og:site_name" content="<?= $company_name ?>" />
    <meta name="og:description"
          content="Comprehensive financial advice and investment services that are tailored to meet your individual needs." />
    <meta name="description" content="">
    <meta name="keywords" content="business, marketing, agency">
    <title> <?= $company_name ?> | Home Page</title>
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- favicons Icons -->
    <link rel="icon" type="image/png" sizes="16x16" href="home/images/logo.png" />
        <style>
        .pricing-content{position:relative;}
        .pricing_design{
            position: relative;
            margin: 0px 15px;
        }
        .pricing_design .single-pricing{
            background:#454B1B;
            padding: 60px 40px;
            border-radius:30px;
            box-shadow: 0 10px 40px -10px rgba(0,64,128,.2);
            position: relative;
            z-index: 1;
        }
        .pricing_design .single-pricing:before{
            content: "";
            background-color: #fff;
            width: 100%;
            height: 100%;
            border-radius: 18px 18px 190px 18px;
            border: 1px solid #eee;
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: -1;
        }
        .price-head{}
        .price-head h2 {
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: 600;
        }
        .price-head h1 {
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 5px;
        }
        .price-head span{}

        .single-pricing ul{list-style:none;margin-top: 30px;}
        .single-pricing ul li {
            line-height: 36px;
        }
        .single-pricing ul li i {
            background: #454B1B;
            color: #fff;
            width: 20px;
            height: 20px;
            border-radius: 30px;
            font-size: 11px;
            text-align: center;
            line-height: 20px;
            margin-right: 6px;
        }
        .pricing-price{}

        .price_btn {
            background: #454B1B;
            padding: 10px 30px;
            color: #fff;
            display: inline-block;
            margin-top: 20px;
            border-radius: 2px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }
        .price_btn:hover{background:#097969;}
        a{
            color: #ffffff;
        }

        .text-center {
            text-align: center!important;
        }

    </style>
    <style>
        /* Custom CSS for the Float widget */
        .telegram-float-widget {
            position: fixed;
            left: 10px;
            /* Adjust the left positioning as needed */
            bottom: 25rem;
            /* Adjust the bottom positioning as needed */
            z-index: 9999;
        }

        .whatsapp-float-widget {
            position: fixed;
            right: 10px;
            /* Adjust the left positioning as needed */
            bottom: 25rem;
            /* Adjust the bottom positioning as needed */
            z-index: 9999;
        }
    </style>
    <style>
        .watkey {
            z-index: 9;
            position: fixed;
            bottom: 40px;
            left: 15px;
            padding: 4px;
            border: 1px solid #0d9f16;
            border-radius: 50%;
        }
    </style>
</head>

<body>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- End Preloader -->

    <!-- Main Header / Header Style Three -->
    <header class="main-header header-style-four">

        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="left-box">
                        <div class="text"> World’s best Finance company</div>
                    </div>
                    <div class="right-box align-items-center d-flex">

                        <!-- Social Box -->
                        <ul class="header-social_box-two">
                            <li><a href="https://www.twitter.com/" class="fa-brands fa-facebook-f fa-fw"></a></li>
                            <li><a href="https://www.facebook.com/" class="fa-brands fa-twitter fa-fw"></a></li>
                            <li><a href="https://www.linkedin.com/" class="fa-brands fa-linkedin fa-fw"></a></li>
                            <li><a href="https://instagram.com/" class="fa-solid fa-instagram fa-fw"></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Logo Box -->
                    <div class="logo"><a href="index">
                        <img src="home/images/logo.png" alt="" title="" style="width: 200px;">
                    </a></div>

                    <!-- Upper Right -->
                    <div class="upper-right d-flex align-items-center flex-wrap">
                                                <!-- Info Box -->
                        <div class="upper-column info-box">
                            <div class="icon-box flaticon-clock"></div>
                            <strong>Mail us for help:</strong>
                            <?= $company_email ?>
                        </div>
                        <!-- Info Box -->
                        <div class="upper-column info-box">
                            <div class="icon-box flaticon-pin"></div>
                             <?= $company_address ?>
                            
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Header Lower -->
        <div class="header-lower">

            <div class="auto-container">
                <div class="inner-container">

                    <div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">

                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="index">Home</a></li>
                                    <li><a href="about">About</a></li>

                                    <li class="dropdown"><a href="#">Pages</a>
                                        <ul>
                                            <li ><a href="plans" >Plans</a></li>
                                            <li><a href="faqs" >Frequently Asked
                                                    Questions</a></li>
                                            <li ><a href="terms" >Terms &
                                                    Conditions</a></li>
                                            <li ><a href="privacy" >Privacy
                                                    policy</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                                                                            <li ><a href="service_details?id=1">Forex Trading</a></li>
                                                                                            <li ><a href="service_details?id=2">Real Estate Investments</a></li>
                                                                                            <li ><a href="service_details?id=3">Gold Investments</a></li>
                                                                                            <li ><a href="service_details?id=4">Retirement Planning</a></li>
                                                                                            <li ><a href="service_details?id=5">Medical Cannabis</a></li>
                                                                                            <li ><a href="service_details?id=6">Cryptocurrencies</a></li>
                                                                                            <li ><a href="service_details?id=7">Financial Planning</a></li>
                                                                                            <li ><a href="service_details?id=8">Oil and Gas</a></li>
                                                                                            <li ><a href="service_details?id=9">Loans and Grants</a></li>
                                                                                            <li ><a href="service_details?id=10">Stock &amp; Share</a></li>
                                                                                    </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Investor Panel</a>
                                        <ul>
                                            <li ><a href="auth/login">Login</a></li>

                                            <li ><a href="auth/register" >Register</a>
                                        </ul>
                                    </li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>
                            </div>

                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box d-flex align-items-center">

                            <!-- Cart Box -->
                            <div class="cart-box">
                                <a class="cart fa-solid fa-sign-in fa-fw" href="auth/login"></a>
                            </div>



                        </div>

                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

                    </div>

                </div>

            </div>
        </div>
        <!-- End Header Lower -->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index" title="">
                            <img src="home/images/logo.png" style="width: 200px;" alt="" title=""></a>
                    </div>

                    <!-- Right Col -->
                    <div class="right-box d-flex align-items-center flex-wrap">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box d-flex align-items-center">


                            <!-- Cart Box -->
                            <div class="cart-box">
                                <a class="cart fa-solid fa-sign-in fa-fw" href="auth/login"></a>
                            </div>



                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fas fa-window-close fa-fw"></span></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="index"><img src="home/images/logo.png" style="width: 100px;" alt="" title=""></a></div>

                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>
        <!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->
  