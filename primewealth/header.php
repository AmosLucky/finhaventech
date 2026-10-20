<?php
 require 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<!-- Start Meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?= $company_name ?> -  Explore now!">
	<meta name="keywords" content="">
	<meta name="author" content="ThemeOri">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title of Site -->
	<title><?= $company_name ?> - The world's most advanced  platform</title>
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="assets/img/favicon-1.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="assets/css/all.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Swiper Bundle CSS -->
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- Mean Menu CSS -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/sass/style.css">


	
	<style>
		#google_translate_element select {
			font-size: 16px;
			color: #000;
			padding: 4px;
			border-radius: 4px;
			border: none;
			box-shadow: none;
		}

		#google_translate_element .goog-logo-link {
			display: none !important;
		}

		.goog-te-gadget {
			color: transparent !important;
		}

		.VIpgJd-ZVi9od-l4eHX-hSRGPd,
		.VIpgJd-ZVi9od-l4eHX-hSRGPd:link,
		.VIpgJd-ZVi9od-l4eHX-hSRGPd:visited,
		.VIpgJd-ZVi9od-l4eHX-hSRGPd:hover,
		.VIpgJd-ZVi9od-l4eHX-hSRGPd:active {
			display: none;
			/* font-size: 12px; */
			/* font-weight: bold; */
			/* color: #444; */
			/* text-decoration: none; */
		}

		.transparent-overlay {
			position: relative;
		}

		.transparent-overlay::before {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.feature-container {
			background-color: #a80000;
			color: #fff;
		}

		.feature__box i {
			font-size: 50px;
		}

		.feature__box {
			background-color: rgba(255, 255, 255, 0.08);
			color: #fff;
			padding: 10px;
			border-radius: 5px;
			text-align: center;
			transition: all 0.3s ease;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.feature__content h3 {
			color: #fff;
		}
	</style>
	
</head>

<body>
	<!-- Preloader Start -->
	<!-- Preloader End -->
	<!-- Dark Light Start -->
	<div class="switch__tab">
		<span class="switch__tab-btn active light-mode-title">Light</span>
		<span class="mode__switch two" onclick="darkLight()"><span></span></span>
		<span class="switch__tab-btn dark-mode-title">Dark</span>
	</div>
	<!-- Dark Light End -->
	<!-- Header Two Start -->
	<div class="header__two">
		<div class="header__two-topbar">
			<div class="container">
				<div class="row align-items-center borders">
					<div class="col-xl-6 col-sm-8">
						<div class="header__two-topbar-left sm-t-center">

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="lang">
              	<div id="google_translate_element"></div>
              	
							<script>
                               function googleTranslateElementInit() {
                                  new google.translate.TranslateElement({
                                     pageLanguage: 'en'
                                  }, 'google_translate_element');
                               }
                            </script>
                            <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                
                            </ul>
                        </div>

						<div class="d-flex d-md-none gap-2 mt-2">
    <a href="login.php" class="btn btn-primary btn-sm flex-fill">
        Login
    </a>

    <a href="register.php" class="btn btn-outline-primary btn-sm flex-fill">
        Register
    </a>
</div>
                        <!-- Header Social End -->
						 
		<div class="auto__container pl-35 pr-35">
			<div class="header__area-menubar two">
				<div class="header__area-menubar-left">
					<div class="header__area-menubar-left-logo">
						<a href="index.php">
							<img class="one" src="assets/img/logo-3.png" alt="">
							<img class="two" src="assets/img/logo-3.png" alt="">
							<img class="light" src="assets/img/logo-3.png" alt="">
						</a>
					</div>
				</div>
				<div class="header__area-menubar-center two">
					<div class="header__area-menubar-center-menu two menu-responsive">
						<ul id="mobilemenu">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							
							<li><a href="FAQS.php">FAQs</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li class="menu-item-has-children"><a href="#">Account</a>
								<ul class="sub-menu">
									<li><a href="login.php">Login</a></li>
									<li><a href="register.php">Signup</a></li>
								</ul>
								
							</li>
							<!-- <li class="menu-item-has-children"><a href="#">Services</a>
								<ul class="sub-menu">
									<li><a href="product_oil.php">Oil & Gas</a></li>
									<li><a href="product_estate.php">Real estate</a></li>
								<li><a href="product_agrofarm.php">Agro Farming</a></li>
								<li><a href="product_crypto.php">Cryptocurrency Trading</a></li>
                    			<li><a href="product_mining.php">Mining</a></li>
								<li><a href="product_loan.php">Loan</a></li>
								<li><a href="product_nft.php">NFT</a></li>



								</ul>
							</li> -->

							<li><a href="pricing.php">Pricing</a></li>
						</ul>
					</div>
				</div>

				<div class="header__area-menubar-right">
					
					<div class="header__area-menubar-right-box">
						<div></div>
						
						<div class="header__area-menubar-right-box-search">
							<div class="search">
								<span class="header__area-menubar-right-box-search-icon open"><i class="fal fa-search"></i></span>
							</div>
							<div class="header__area-menubar-right-box-search-box">
								<form>
									<input type="search" placeholder="Search Here.....">
									<button type="submit"><i class="fal fa-search"></i>
									</button>
								</form> <span class="header__area-menubar-right-box-search-box-icon"><i class="fal fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="responsive-menu"></div>
				</div>
				<div class="header__area-menubar-right-btn">
					<a class="btn-six" href="login.php">Account<i class="far fa-chevron-double-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Header Two End -->