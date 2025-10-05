<?php

require "header.php";

?>
		<!-- Banner Area Starts -->
		<section class="banner-area">
			<div class="banner-overlay">
				<div class="banner-text text-center">
					<div class="container">
						<!-- Section Title Starts -->
						<div class="row text-center">
							<div class="col-xs-12">
								<!-- Title Starts -->
								<h2 class="title-head">About <span>Us</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="index"> home</a></li>
									<li>About</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Starts -->
         <!-- About Section Starts -->
         <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">About <span>Us</span></h2>
                    <div class="title-head-subtitle">
                        <p>Investing in greater possibilities together
                        </p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                    <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script> <div class="livecoinwatch-widget-3" lcw-base="USD" lcw-d-head="true" lcw-d-name="true" lcw-d-code="true" lcw-d-icon="true" lcw-color-tx="#ffffff" lcw-color-bg="#1f2434" lcw-border-w="1" ></div>
                        <!-- <img id="about-us" class="img-responsive img-about-us" src="images/about-us.jpg" alt="about us"> -->
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about">WE ARE  <?= $company_name ?></h3>
                        <p class="about-text">Welcome to <?= $company_name ?> , a leading force in the world of cryptocurrency trading and investment. Founded with a vision to revolutionize digital finance, we provide secure, innovative, and user-centric solutions tailored for both novice and seasoned investors.</p>
                        <p class="about-text">
                        Whether you're exploring cryptocurrency for the first time or looking to optimize your investment strategies,  is your trusted partner in the digital economy. Join us today and be part of the future of finance.

                        </p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                            <li><a data-toggle="tab" href="#menu2">Our Vision</a></li>
                            <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>
                                To empower our clients by offering innovative investment strategies that maximize growth, mitigate risk, and secure financial futures.
                                    </p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p>
                                To be a trusted leader in the investment industry, known for delivering superior results, exceptional service, and sustainable growth.
                                </p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p>
                                At <?= $company_name ?>, we leverage the latest financial technologies and market research to identify and capitalize on emerging trends, ensuring that our clients stay ahead in a rapidly evolving global economy.
                                </p>
                            </div>
                        </div>
                       
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
		<!-- Facts Section Starts -->
        <section class="facts">
			<!-- Container Starts -->
			<div class="container">
				<!-- Fact Badges Starts -->
				<div class="row text-center facts-content">
					<div class="text-center heading-facts">
						<h2><?php echo $company_name ?> <span> numbers</span></h2>
						<p>leading investment platform since day one of digital assets</p>
					</div>
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6 fact">
						<h3>$77.45B</h3>
						<h4>market cap</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6 fact fact-clear">
						<h3>165k</h3>
						<h4>daily transactions</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6 fact">
						<h3>1726</h3>
						<h4>active accounts</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<!-- Fact Badge Item Starts -->
					<div class="col-xs-12 col-md-3 col-sm-6">
						<h3>17</h3>
						<h4>years on the market</h4>
					</div>
					<!-- Fact Badge Item Ends -->
					<div class="col-xs-12 buttons">
						<a class="btn btn-primary btn-pricing" href="plans">See Plans</a>
						<span class="or"> or </span>
						<a class="btn btn-primary btn-register" href="register">Register Now</a>
					</div>
				</div>
				<!-- Fact Badges Ends -->
			</div>
			<!-- Container Ends -->
        </section>
        <!-- facts Section Ends -->
        <!-- Team Section Starts -->
        <section class="team" style="display:none">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">our <span>experts</span></h2>
                    <div class="title-head-subtitle">
                        <p> A talented team of Cryptocurrency experts based in London</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Team Members Starts -->
                <div class="row team-content team-members">
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="images/team/member1.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Maryana Mori</h4>
                                <p>Ceo Founder</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Starts -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="images/team/member2.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Marco Verratti</h4>
                                <p>Director</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <!-- Team Member-->
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="images/team/member3.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Emilia Bella</h4>
                                <p>Bitcoin Consultant</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="images/team/member4.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Antonio Conte</h4>
                                <p>Bitcoin Developer</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                </div>
                <!-- Team Members Ends -->
            </div>
        </section>

          <!-- About Section Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block" style="margin-top:50px">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="strong-security" src="images/icons/orange/strong-security.png" alt="strong security"/>
									</span>
                                    <h3 class="feature-title">Cutting-Edge Technology</h3>
                                    <p>
                                    We leverage the latest financial technologies and tools to provide you with real-time insights and analysis. Our intuitive platforms make it easy to track your financial progress and adjust your strategies whenever needed.
                                    </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="world-coverage" src="images/icons/orange/world-coverage.png" alt="world coverage"/>
									</span>
                                    <h3 class="feature-title">Proven Success</h3>
                                    <p>
                                    Our clients trust us because we deliver results. We have a proven track record of helping individuals and businesses optimize their finances, achieve their goals, and secure their financial future.
                                    </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="payment-options" src="images/icons/orange/payment-options.png" alt="payment options"/>
									</span>
                                    <h3 class="feature-title">Expert Guidance</h3>
                                    <p>
                                    Our team of financial experts brings years of industry experience and knowledge to help you make informed decisions. We stay ahead of the curve with the latest financial trends and regulatory changes, ensuring that your strategy is always current and effective.
                                </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="mobile-app" src="images/icons/orange/mobile-app.png" alt="mobile app"/>
									</span>
                                    <h3 class="feature-title">Transparency & Integrity</h3>
                                    <p>
                                    We pride ourselves on maintaining a high standard of transparency and integrity in everything we do. Our fees, recommendations, and processes are clear, so you can trust that your best interests are always at the forefront of our work.
                                    </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="cost-efficiency" src="images/icons/orange/cost-efficiency.png" alt="cost efficiency"/>
									</span>
                                    <h3 class="feature-title">Dedicated Support</h3>
                                    <p>
                                    At <?= $company_name ?>, you are never just another client. We offer personalized, dedicated support and are always available to answer your questions, provide updates, and offer expert advice whenever you need it.
                                    </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="high-liquidity" src="images/icons/orange/high-liquidity.png" alt="high liquidity"/>
									</span>
                                    <h3 class="feature-title">Focus on Financial Wellness</h3>
                                    <p>
                                    We believe in empowering our clients with knowledge and confidence in their financial decisions. Through educational resources, workshops, and one-on-one consultations, we provide you with the tools to take control of your financial future.
                                    </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        <!-- Team Section Ends -->
        <!-- Call To Action Section Starts -->
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
			<div class="call-action-all-overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- Call To Action Text Starts -->
							<div class="action-text">
								<h2>Get Started Today With investment</h2>
								<p class="lead">Open account for free and get start!</p>
							</div>
							<!-- Call To Action Text Ends -->
							<!-- Call To Action Button Starts -->
							<p class="action-btn"><a class="btn btn-primary" href="register">Register Now</a></p>
							<!-- Call To Action Button Ends -->
						</div>
					</div>
				</div>
			</div>
        </section>
        <!-- Call To Action Section Ends -->
        <!-- Call To Action Section Ends -->
        <?php 

        require "footer.php";


        ?>