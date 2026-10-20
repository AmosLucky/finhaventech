<?php
require 'header.php';


if(isset($_GET['user'])){
        $_SESSION['user'] = $_GET['user'];
    }



?>


	<!-- Banner Area Start -->
	<div class="banner__two swiper banner-two-slider">
		<div class="swiper-wrapper">
			<div class="banner__two-image swiper-slide" data-background="assets/img/banner/banner-3.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="banner__two-content">
								<b class="subtitle"><?= $company_name ?></b>
								<span data-animation="fadeInUp" data-delay=".3s">Trade Invest stock, and Bond</span>
								<h1 data-animation="fadeInUp" data-delay=".7s">The Better Way to Trade & Invest</h1>
								<div class="banner__two-content-button" data-animation="fadeInUp" data-delay="1s">
									<a class="btn-five" href="about.php">Learn More<i class="far fa-chevron-double-right"></i></a>
								</div>
								<img class="banner__two-image-shape-one" src="assets/img/shape/banner-1.png" data-animation="rollIn" data-delay="2s" alt="">
							</div>
							<img class="banner__two-image-shape-two" src="assets/img/shape/banner-2.png" data-animation="fadeInRightBig" data-delay="1.1s" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="banner__two-image swiper-slide" data-background="assets/img/banner/banner-4.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="banner__two-content">
								<b class="subtitle"><?= $company_name ?></b>
								<span data-animation="fadeInUp" data-delay=".3s">We Are Expert In This Field</span>
								<h1 data-animation="fadeInUp" data-delay=".7s">Our customers achieve their financial goals by helping them trade and invest with ease</h1>
								<div class="banner__two-content-button" data-animation="fadeInUp" data-delay="1s">
									<a class="btn-five" href="register.php">Get Started<i class="far fa-chevron-double-right"></i></a>
								</div>
								<img class="banner__two-image-shape-one" src="assets/img/shape/banner-1.png" data-animation="rollIn" data-delay="2s" alt="">
							</div>
							<img class="banner__two-image-shape-two" src="assets/img/shape/banner-2.png" data-animation="fadeInRightBig" data-delay="1.1s" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="banner__two-arrow">
			<div class="banner__two-arrow-prev swiper-button-prev"><i class="fal fa-long-arrow-left"></i></div>
			<div class="banner__two-arrow-next swiper-button-next"><i class="fal fa-long-arrow-right"></i></div>
		</div>
	</div>
	<!-- Banner Area End -->
	<!-- About Area Start -->
	<div class="about__two dark__image section-padding">
		<img class="about__two-shape dark-n" src="assets/img/shape/about.png" alt="">
		<img class="about__two-shape light-n" src="assets/img/shape/about-dark.png" alt="">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-7 col-lg-6 lg-mb-30">
					<div class="row">
						<div class="col-6">
							<img src="assets/img/about/about-3.jpg" alt="">
						</div>
						<div class="col-6 mt-95 sm-mt-55">
							<img src="assets/img/about/about-4.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-6">
					<div class="about__two-right">
						<div class="about__two-right-title">
							<span class="subtitle-two">Security Comes First.</span>
							<h2>Security.</h2>
							<p>At <?= $company_name ?> uses the highest levels of Internet Security, 
							and it is secured by 256 bits SSL security encryption to ensure 
							that your information is completely protected from fraud.</p>
						</div>
						<div class="about__two-right-title">
							<!-- <span class="subtitle-two">Security Comes First.</span> -->
							<h2>Two Factor Auth</h2>
							<p>
								Two-factor authentication (2FA) by default on all <?= $company_name ?> accounts, to securely 
								protect you from unauthorised access and impersonation.
								
							<!-- At <?= $company_name ?> uses the highest levels of Internet Security, 
							and it is secured by 256 bits SSL security encryption to ensure 
							that your information is completely protected from fraud. -->
						</p>
						</div>
						<div class="about__two-right-experience">
							<div class="about__two-right-experience-counter">
								<h1><span class="counter">25</span>+</h1>
							</div>
							<div>
								<h6>Years of Experience</h6>
							</div>
						</div>
						<div class="about__two-right-btn">
							<div>
								<a class="btn-six" href="about.php">Read More<i class="far fa-chevron-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Area End -->
	<!-- Digital Solution Area Start -->
	<div class="solution__area section-padding" data-background="assets/img/pages/solution.jpg">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-9">
					<div class="solution__area-title">
						<span class="subtitle-two">Digital Solution</span>
						<h1>Trusted , Happy & Satisfied Clients.</h1>
						<a class="btn-five" href="register.php">Join Us<i class="far fa-chevron-double-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Digital Solution Area End -->

	<!-- Blog Area Start -->
	<div class="blog__two section-padding">
		<div class="container">
			<div class="row mb-60">
				<div class="team__area-title t-center">
					<span class="subtitle-two">Opportunities to explore our services</span>
					<h2> Our Services</h2>
				</div>
			</div>
			<div class="row">

				<div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_oil.php"><img src="assets/img/pages/cryptot.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Powerful Trading Platforms</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p><?= $company_name ?> offers multiple platform options to cover the needs of each type of trader and investors .</p>
							<!-- <a class="btn-six" href="product_oil.php">Read More<i class="far fa-chevron-double-right"></i></a> -->
						</div>
					</div>
				</div>


				<div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_oil.php"><img src="assets/img/blog/apexnft.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">High leverage</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>
							Chance to magnify your investment and really win big with super-low spreads to further up your profits
						</p>
							<!-- <a class="btn-six" href="product_oil.php">Read More<i class="far fa-chevron-double-right"></i></a> -->
						</div>
					</div>
				</div>



				<div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_oil.php"><img src="assets/img/blog/apexmining.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Fast execution</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>
							Super-fast trading software, so you never suffer slippage.
						</p>
							<!-- <a class="btn-six" href="product_oil.php">Read More<i class="far fa-chevron-double-right"></i></a> -->
						</div>
					</div>
				</div>


				
				<div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_oil.php"><img src="assets/img/blog/blog-4.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Insurance</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>
							Our team can advise you on this cover and provide you with a very competitive quotation and ensure that you get adequate coverage for your investment with us.
						</p>
							<!-- <a class="btn-six" href="product_oil.php">Read More<i class="far fa-chevron-double-right"></i></a> -->
						</div>
					</div>
				</div>



			<!-- old -->
				<!-- <div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_oil.php"><img src="assets/img/blog/blog-4.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Oil & Gas</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>The oil and gas industry is vital for meeting global energy demands, powering
								transportation and industry.</p>
							<a class="btn-six" href="product_oil.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 lg-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_estate.php"><img src="assets/img/blog/blog-5.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Real Estate</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>Real estate investments offer a tangible path to wealth accumulation, with properties
								serving as both homes and valuable assets.</p>
							<a class="btn-six" href="product_estate.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_agrofarm.php"><img src="assets/img/blog/blog-6.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Agro Farming</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>Agro farming supports food production and nourishes communities with fresh produce,
								forming the basis of global agriculture</p>
							<a class="btn-six" href="product_agrofarm.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div>





				<div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_crypto.php"><img src="assets/img/pages/cryptot.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Crypto Trading</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>A Digital Currency Exchange Is A Business That Allows Customers To Trade Cryptocurrencies
								Or Digital Currencies For Other Assets.</p>
							<a class="btn-six" href="product_crypto.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 lg-mb-30">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_mining.php"><img src="assets/img/blog/apexmining.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Mining</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>The world's demand for gemstones is poised to increase significantly as we move towards
								achieving global net-zero emissions by 2050.</p>
							<a class="btn-six" href="product_mining.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_loan.php"><img src="assets/img/blog/apexloan.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">Loan</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>At <?= $company_name ?>, we understand the importance of supporting our valued investors
								in their business growth and financial endeavors.</p>
							<a class="btn-six" href="product_loan.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div> -->

				<!-- <div class="col-xl-4 col-lg-6">
					<div class="blog__two-item">
						<div class="blog__two-item-image">
							<a href="product_nft.php"><img src="assets/img/blog/apexnft.jpg" alt=""></a>
							<div class="blog__two-item-image-date">
								<span class="text-five">NFT</span>
							</div>
						</div>
						<div class="blog__two-item-content">
							<p>A non-fungible token (NFT) is a financial security consisting of digital data stored in a
								blockchain, a form of distributed ledger. </p>
							<a class="btn-six" href="product_nft.php">Read More<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- Blog Area End -->

	<!-- Wark Area Start -->
	<div class="work__area section-padding pb-0">
		<div class="container">
			<div class="row mb-70">
				<div class="col-xl-12">
					<div class="work__area-title t-center">
						<span class="subtitle-two">The Process</span>
						<h2> Easy Steps to Get Started</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-sm-6 xl-mb-30">
					<div class="work__area-item">
						<span>01</span>
						<h6>Signup</h6>
						<p>Goto the signup page and fill the Required Form</p>
						<img class="work__area-item-arrow sm-display-n dark-n" src="assets/img/icon/arrow-1.png" alt="">
						<img class="work__area-item-arrow sm-display-n light-n" src="assets/img/icon/arrow-1-dark.png" alt="">
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 sm-mb-30">
					<div class="work__area-item">
						<span>02</span>
						<h6>Depostit Funds</h6>
						<p>After signing up, login to Account </p>
						<img class="work__area-item-arrow xl-display-n dark-n" src="assets/img/icon/arrow-2.png" alt="">
						<img class="work__area-item-arrow xl-display-n light-n" src="assets/img/icon/arrow-2-dark.png" alt="">
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 sm-mb-30">
					<div class="work__area-item">
						<span>03</span>
						<h6>Invest</h6>
						<p>Choose a pricing plan .</p>
						<img class="work__area-item-arrow xl-display-n dark-n" src="assets/img/icon/arrow-1.png" alt="">
						<img class="work__area-item-arrow xl-display-n light-n" src="assets/img/icon/arrow-1-dark.png" alt="">
						<img class="work__area-item-arrow display-n xl-display-b sm-display-n dark-n" src="assets/img/icon/arrow-2.png" alt="">
						<img class="work__area-item-arrow display-n xl-display-b sm-display-n light-n" src="assets/img/icon/arrow-2-dark.png" alt="">
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="work__area-item">
						<span>04</span>
						<h6>Start Earning</h6>
						<p>Your success journey with <?= $company_name ?> starts here.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Wark Area End -->

	<!-- Pricing Plan Area Start -->
	<div class="pricing__area section-padding pb-0">
		<div class="container">
			<div class="row mb-70">
				<div class="col-xl-12">
					<div class="pricing__area-title t-center">
						<span class="subtitle-one">Our Plans</span>
						<h2>Best  Plan</h2>
					</div>
				</div>
			</div>
			<div class="row">

			 <?php
                       $sql = "SELECT * FROM investment_plans where deleted = '0'";
                       $result = $con->query($sql);
                       if($result){ 
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['name'];
              $id = $row['id'];
              $min =  $row['min_deposite'];
               $max =  $row['max_deposite'];
               $profit =  $row['daily_profit'];
                $name =  $row['name'];
                $capital_after =  $row['capital_after'];
                 $profit_after =  $row['profit_after'];
                 $referal_bonus =  $row['referal_bonus'];
                  $reg_date =  $row['reg_date'];
                  $daily_profit =  $row['daily_profit'];

                  $i++;

                            # code...
                        
                        ?>
				<div class="col-xl-4 col-lg-6 col-md-6 xl-mb-30">
					<div class="pricing__area-item page">
						<div class="pricing__area-item-price">
							<h6 class='text-light'><span><?= $reg_date ?> %</span></h6>
							<span class="text-two">every <?= (float)$profit_after*24  ?> hours</span>
						</div>
						<div class="pricing__area-item-title">
							<h3><?= $name ?></h3>
						</div>
						<div class="pricing__area-item-list">
							<ul>
								<li><i class="fal fa-check"></i>Min - $<?= number_format($min); ?></li>
								<li><i class="fal fa-check"></i>Max - $<?= number_format($max) ?></li>
								<li><i class="fal fa-check"></i>Duration - <?= $capital_after ?> days</li>
								<li><i class="fal fa-check"></i>Referral Commision - <?= $referal_bonus ?>% </li>
								<li><i class="fal fa-check"></i>24/7 Customer Support</li>
							</ul>
						</div>
						<a class="btn-eight" href="register.php">Get Started</a>
					</div>
				</div>

				 <?php } } ?>
				
				
			</div>
		</div>
	</div>

	
	<!-- Pricing Plan Area End -->

	<!-- Consulting Area Start -->
	<div class="consulting__area section-padding">
		<img class="consulting__area-shape dark-n" src="assets/img/shape/consulting.png" alt="">
		<img class="consulting__area-shape light-n" src="assets/img/shape/consulting-dark.png" alt="">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-7 col-lg-6 lg-mb-30">
					<div class="consulting__area-image dark__image">
						<img src="assets/img/pages/consulting.jpg" alt="">
					</div>
				</div>
				<div class="col-xl-5 col-lg-6">
					<div class="consulting__area-right">
						<div class="consulting__area-right-title">
							<span class="subtitle-two">The right team</span>
							<h2>Helping You Make More Informed Financial Decisions</h2>
<p>
The <?= $company_name ?> visionary team is committed to delivering exceptional results, 
focused being one step ahead. We are building an FX trading platform for the long-term, 
setting up the standard to
 change the fortune of future generations to come!
.</p>

							
						</div>
						<div class="consulting__area-right-list">
							<span><i class="far fa-check"></i>Transparency</span>
							<span><i class="far fa-check"></i>Certified Company</span>
						</div>
						<a class="btn-six" href="register.php">Get Started<i class="far fa-chevron-double-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Company Area End -->
	<!-- About Company Two Area Start -->
	<div class="company__two section-padding pt-0">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-7 lg-mb-30">
					<div class="company__two-left">
						<div class="company__two-left-title">
							<span class="subtitle-one">Who we are</span>
							<h2>Leading cryptocurrency, investment and trading platform.</h2>
							<p class="">
								Through its real-time Forex trading platform, <?= $company_name ?> offers complete 
								suite of tool for Web, Desktop, Mobile and MT4 trading with 24 hours
								 a day support and Dealing room service. In addition, <?= $company_name ?>
								  provides One on One copy trading services to enable users 
								earn passive income with little or no trading experience.
								
							</p>
						</div>
						<div class="company__two-left-skill">
							<div class="company__two-left-skill-item">
								<h2><span class="counter">20,700</span>k</h2>
								<h6>Transactions.</h6>
							</div>
							<div class="company__two-left-skill-item">
								<h2><span class="counter">25</span>+</h2>
								<h6>Years experience.</h6>
							</div>
							<div class="company__two-left-skill-item">
								<h2><span class="counter">70</span>+</h2>
								<h6>Trading awards.</h6>
							</div>
						</div>
						<a class="btn-two" href="register.php?a=signup">Discover more<i class="far fa-chevron-double-right"></i></a>
					</div>
				</div>
				<div class="col-xl-6 col-lg-5">
					<div class="company__two-right dark__image t-right">
						<img class="img__full" src="assets/img/about/about-9.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Company Two Area End -->

<?php

require 'footer.php';
?>