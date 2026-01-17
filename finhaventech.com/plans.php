<?php

require "header.php";


?>

            <!-- Page Title -->
    <section class="page-title" style="background-image:url(home/images/background/5.jpg)">
        <div class="auto-container">
            <h2>Packages</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="index">Home</a></li>
                <li>Packages</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Services One -->
    <section class="services-one" style="background-image:url(home/images/background/pattern-3.png)">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="sec-title_title">Awesome</div>
                <h2 class="sec-title_heading">Investment Packages</h2>
                <div class="sec-title_text">

                </div>
            </div>
            <div class="row clearfix text-center">

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
                                
                    <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5 mx-auto" data-wow-duration="1s"
                         data-wow-delay="0.1s" data-wow-offset="0"
                         style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="pricing_design">
                            <div class="single-pricing">
                                <div class="price-head">
                                    <h2><?= $name ?></h2>
                                    <h1><?= $daily_profit ?>%</h1>
                                    <span>/Daily</span>
                                </div>
                                <ul>
                                    <li><b>Minimum</b>  $<?= number_format($min) ?></li>
                                    <li><b>Maximum</b>   $<?= number_format($max) ?></li>
                                    <li><b>Daily returns</b> at <?= $daily_profit ?>%</li>
                                    <li><b>Referral bonus</b> 3%</li>
                                    <li><b>Contract</b> <?= $profit_after ?> Day(s)</li>
                                    <li><b>Total</b> <?= $daily_profit ?>%</li>
                                </ul>
                                <div class="pricing-price">

                                </div>
                                <a href="auth/register" class="price_btn">Start Investment</a>
                            </div>
                        </div>
                    </div><!--- END COL -->

                    <?php } } ?>
                
                   
                
                

            </div>



        </div>
    </section>
    <!-- End Services One -->

    



    <!-- CTA One -->
    <section class="cta-one">
        <div class="auto-container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="left-box">
                    <h3 class="cta-one_heading">Looking for the Best Investment and Asset manager?</h3>
                    <div class="cta-one_text"><?= $company_name ?> is poised to help change your financial story.</div>
                </div>
                <div class="right-box">
                    <a class="btn-style-seven theme-btn clearfix" href="#">
                        <div class="btn-wrap">
                            <span class="text-one">Get a quote</span>
                            <span class="text-two">Get a quote</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA One -->
<?php

require "footer.php";


?>