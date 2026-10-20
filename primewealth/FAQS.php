<?php
require 'header.php'
?>



<title>FAQs - <?= $company_name ?></title>
<!-- Page Banner Area Start -->
<div class="page__banner" data-background="assets/img/pages/page-banner.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="page__banner-content">
					<span>faq</span>
					<ul>
						<li><a href="indexbc14.html?a=home">Home</a><span>|</span></li>
						<li>FAQ's</li>
					</ul>
					<h1>Question & Ans.</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Banner Area End -->
<!-- Faq Area Start -->
<div class="faq__area section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xxl-7 col-lg-6 lg-mb-30">
				<div class="faq__two-left">
					<div class="faq__two-left-image">
						<img src="assets/img/pages/faq-1.jpg" alt="">
						<img class="faq__two-left-image-one" src="assets/img/pages/faq-2.jpg" alt="">
						<div class="faq__two-left-image-question left-right-animate">
							<img src="assets/img/icon/questions.png" alt="">
							<h6>Have any questions?</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-5 col-lg-6">
				<div class="faq__two-right">
					<div class="faq__two-right-title">
						<span class="subtitle-one">Frequently Asked Questions</span>
						<h2>Have any questions And answers</h2>
					</div>
					<div class="faq__collapse mt-35">
						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>What is <?= $company_name ?>?</h6>
									<i class="far fa-plus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content display-none">
									<p><?= $company_name ?> is a trading and investment platform offering advanced tools,
										real-time market data, and expert advice to help you make informed decisions and
										reach your financial goals. Join now and start trading and investing with
										confidence.</p>
								</div>
							</div>
						</div>
						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>How do I create my account?</h6>
									<i class="far fa-minus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content active">
									<p>Registration process is very easy and will take a few moments to complete Simply
										click CREATE ACCOUNT button and fill in all the required fields</p>
								</div>
							</div>
						</div>
						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>How long does my deposit to reflect?
									</h6>
									<i class="far fa-plus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content display-none">
									<p>Your deposit will be reflected immediately once it is confirmed on the blockchain
										network.</p>
								</div>
							</div>
						</div>
						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>How do I make a withdrawal?</h6>
									<i class="far fa-plus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content display-none">
									<p>To make a withdrawal request click the WITHDRAW button in your account dashboard
										and input the required details to withdraw. 
										<!--Also note that at some point you might need to privide us your fincen tax i.d number.-->
									</p>
								</div>
							</div>
						</div>
						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>What payment methods do you accept?
									</h6>
									<i class="far fa-plus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content display-none">
									<p>We accept BTC, USDT(TRC20) AND SOLANA.</p>
								</div>
							</div>
						</div>
						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>Can I do a direct deposit from
										<br>my account balance? </h6>
									<i class="far fa-plus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content display-none">
									<p> Yes! To make a deposit from your <?= $company_name ?> account balance.
										Simply login into your members account and click on Make Deposit and select the
										Deposit from Account Balance Radio button.
										Note you can’t reinvest in the starter plan for over 4 times whereas other plans is unlimited
									</p>
								</div>
							</div>
						</div>


						<div class="faq__collapse-item">
							<div class="faq__collapse-item-card">
								<div class="faq__collapse-item-card-header">
									<h6><span class="far fa-question-circle"></span>Can I make an additional deposit
										<br>to <?= $company_name ?> account?</h6>
									<i class="far fa-plus"></i>
								</div>
								<div class="faq__collapse-item-card-header-content display-none">
									<p>Yes, you can but all transactions are handled separately.</p>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Faq Area End -->

<?php
require 'footer.php'
?>