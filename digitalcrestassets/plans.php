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
								<h2 class="title-head">Our <span>Prices</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="index"> home</a></li>
									<li>Plans</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Ends -->
        <!-- Pricing Starts -->
        <!-- Pricing Starts -->
<section class="pricing">
    <div class="container">
        <!-- Section Title Starts -->
        <div class="row text-center">
            <h2 class="title-head">affordable <span>plans</span></h2>
            <div class="title-head-subtitle">
                <p>AFFORDABLE PLANS TO GET STARTED</p>
            </div>
        </div>
        <!-- Section Title Ends -->
        <!-- Section Content Starts -->
        <div class="row pricing-tables-content">
            <div class="pricing-container">


                
                <ul class="pricing-list bounce-invert">

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


                    <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <ul class="pricing-wrapper">
                            <!-- Buy Pricing Table #2 Starts -->
                            <li data-type="buy" class="is-visible">
                                <header class="pricing-header">
                                    <h2><b><?= $name ?></b></h2>
                                    <div class="price" >
                                        <!-- <span class="currency"><i class="fa fa-dollar"></i></span> -->
                                        <span class="value" style="font-size: 35px!important;"><?= $daily_profit ?>% daily</span>
                                    </div>

                                </header>

                                <body>

                                    <table style="width: 100%; text-align: center;">
                                        <tr>
                                            <td>Minimum Deposit</td>
                                            <td>$<?= number_format($min); ?></td>
                                        </tr>
                                        <tr>
                                            <td> Maximum Deposit</td>
                                            <td>$<?= number_format($max) ?></td>
                                        </tr>
                                        <tr>
                                            <td> Daily profit</td>
                                            <td>$<?= $daily_profit ?></td>
                                        </tr>
                                        <tr>
                                            <td> Duration </td>
                                            <td><?= number_format($capital_after) ?> day(s)</td>
                                        </tr>
                                        <tr>
                                            <td> Capital Protection </td>
                                            <td>100%</td>
                                        </tr>
                                    </table>
                                </body>
                                <footer class="pricing-footer">
                                    <a href="#" class="btn btn-primary">ORDER NOW</a>
                                </footer>
                            </li>

                            <!-- Sell Pricing Table #2 Ends -->
                        </ul>
                    </li>

                    <?php } } ?>


                </ul>


                
            </div>
        </div>
    </div>
</section>
<!-- Pricing Ends -->
        <!-- Pricing Ends -->
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