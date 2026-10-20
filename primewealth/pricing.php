<?php

require 'header.php'
?>



<title>Pricing Plans - <?= $company_name ?></title>
<!-- Page Banner Area Start -->
<div class="page__banner" data-background="assets/img/pages/page-banner.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="page__banner-content">
					<span>Price</span>
					<ul>
						<li><a href="index.php">Home</a><span>|</span></li>
						<li>Pricing Plans</li>
					</ul>
					<h1>Pricing Plans</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Banner Area End -->

<!-- Pricing Plan Area Start -->
	<div class="pricing__area section-padding pb-0">
		<div class="container">
			<div class="row mb-70">
				<div class="col-xl-12">
					<div class="pricing__area-title t-center">
						<span class="subtitle-one">Trading Plan</span>
						<h2>Best Trading Plan</h2>
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
							<h4><span><?= $reg_date ?> </span></h4>
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

	<div class="pricing__area section-padding pb-0" style='display:none'>
		<div class="container">
			<div class="row mb-70">
				<div class="col-xl-12">
					<div class="pricing__area-title t-center">
						<span class="subtitle-one">Mining Plan</span>
						<h2>Best Mining Plan</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 xl-mb-30">
					<div class="pricing__area-item page">
						<div class="pricing__area-item-price">
							<h4><span>10% </span>Daily</h4>
							<span class="text-two">For 7 days</span>
						</div>
						<div class="pricing__area-item-title">
							<h3>Professional plan</h3>
						</div>
						<div class="pricing__area-item-list">
							<ul>
								<li><i class="fal fa-check"></i>Min - $15,000</li>
								<li><i class="fal fa-check"></i>Max - $19,999</li>
								<li><i class="fal fa-check"></i>10% Daily For 7 Days</li>
								<li><i class="fal fa-check"></i>Referral Commision - 3% </li>
								<li><i class="fal fa-check"></i>24/7 Customer Support</li>
							</ul>
						</div>
						<a class="btn-eight" href="register.php">Get Started</a>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 xl-mb-30">
					<div class="pricing__area-item page">
						<div class="pricing__area-item-price">
							<h4><span>10% </span>Daily</h4>
							<span class="text-two">For 7 days</span>
						</div>
						<div class="pricing__area-item-title">
							<h3>Diamond Plan</h3>
						</div>
						<div class="pricing__area-item-list">
							<ul>
								<li><i class="fal fa-check"></i>Min - $20,000</li>
								<li><i class="fal fa-check"></i>Max - $49,999</li>
								<li><i class="fal fa-check"></i>10% Daily For 7 Days</li>
								<li><i class="fal fa-check"></i>Referral Commision - 3% </li>
								<li><i class="fal fa-check"></i>24/7 Customer Support</li>
							</ul>
						</div>
						<a class="btn-eight" href="register.php">Get Started</a>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 xl-mb-30">
					<div class="pricing__area-item page">
						<div class="pricing__area-item-price">
							<h4><span>5% </span>Daily</h4>
							<span class="text-two">For 1 Month</span>
						</div>
						<div class="pricing__area-item-title">
							<h3>Gold Plan</h3>
						</div>
						<div class="pricing__area-item-list">
							<ul>
								<li><i class="fal fa-check"></i>Min - $50,000</li>
								<li><i class="fal fa-check"></i>Max - Unlimited</li>
								<li><i class="fal fa-check"></i>15% Weekly For 1 Month</li>
								<li><i class="fal fa-check"></i>Referral Commision - 4% </li>
								<li><i class="fal fa-check"></i>24/7 Customer Support</li>
							</ul>
						</div>
						<a class="btn-eight" href="register.php">Get Started</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Pricing Plan Area End -->

<?php
require 'footer.php'
?>