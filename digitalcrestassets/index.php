<?php
    require "header.php";

?>
<!-- Slider Starts -->
<div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Indicators Starts -->
    <ol class="carousel-indicators visible-lg visible-md">
        <li data-target="#main-slide" data-slide-to="0" class="active"></li>
        <li data-target="#main-slide" data-slide-to="1"></li>
        <li data-target="#main-slide" data-slide-to="2"></li>
    </ol>
    <!-- Indicators Ends -->
    <!-- Carousel Inner Starts -->
    <div class="carousel-inner">
        <!-- Carousel Item Starts -->
        <div class="item active bg-parallax item-1">
            <div class="slider-content">
                <div class="container">
                    <div class="slider-text text-center">
                        <h3 class="slide-title"><span>Secure</span> and <span>Easy Way</span><br /> To financial growth
                        </h3>
                        <p>
                            <a href="about" class="slider btn btn-primary">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel Item Ends -->
        <!-- Carousel Item Starts -->
        <div class="item bg-parallax item-2">
            <div class="slider-content">
                <div class="col-md-12">
                    <div class="container">
                        <div class="slider-text text-center">
                            <h3 class="slide-title"><span>Inestment</span> Platform <br />You can <span>Trust</span>
                            </h3>
                            <p>
                                <a href="plans" class="slider btn btn-primary">our plans</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel Item Ends -->
    </div>
    <!-- Carousel Inner Ends -->
    <!-- Carousel Controlers Starts -->
    <a class="left carousel-control" href="index.html#main-slide" data-slide="prev">
        <span><i class="fa fa-angle-left"></i></span>
    </a>
    <a class="right carousel-control" href="index.html#main-slide" data-slide="next">
        <span><i class="fa fa-angle-right"></i></span>
    </a>
    <!-- Carousel Controlers Ends -->
</div>
<!-- Slider Ends -->
<!-- Features Section Starts -->
<section class="features">
    <div class="container">
        <div class="row features-row">
            <!-- Feature Box Starts -->
            <div class="feature-box col-md-4 col-sm-12">
                <span class="feature-icon">
                    <img id="download-bitcoin" src="images/icons/orange/download-bitcoin.png" alt="download bitcoin">
                </span>
                <div class="feature-box-content">
                    <h3>Register</h3>
                    <p>Click on the registration button to register, verify yourself and get a new account in minutes.
                    </p>
                </div>
            </div>
            <!-- Feature Box Ends -->
            <!-- Feature Box Starts -->
            <div class="feature-box two col-md-4 col-sm-12">
                <span class="feature-icon">
                    <img id="add-bitcoins" src="images/icons/orange/add-bitcoins.png" alt="add bitcoins">
                </span>
                <div class="feature-box-content">
                    <h3>Fund your Account</h3>
                    <p>Make deposit to your account to perform transactions and access our various services.</p>
                </div>
            </div>
            <!-- Feature Box Ends -->
            <!-- Feature Box Starts -->
            <div class="feature-box three col-md-4 col-sm-12">
                <span class="feature-icon">
                    <img id="buy-sell-bitcoins" src="images/icons/orange/buy-sell-bitcoins.png"
                        alt="buy and sell bitcoins">
                </span>
                <div class="feature-box-content">
                    <h3>Perform transactions</h3>
                    <p>Explore our seamless services by performing various transactions on your account.</p>
                </div>
            </div>
            <!-- Feature Box Ends -->
        </div>
    </div>
</section>
<!-- Features Section Ends -->
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
                <!-- <img id="about-us" class="img-responsive img-about-us" src="images/about-us.jpg" alt="about us"> -->
                <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script> <div class="livecoinwatch-widget-1" lcw-coin="BTC" lcw-base="USD" lcw-secondary="BTC" lcw-period="d" lcw-color-tx="#ffffff" lcw-color-pr="#58c7c5" lcw-color-bg="#1f2434" lcw-border-w="1" ></div>
            </div>
            <!-- Image Ends -->
            <!-- Content Starts -->
            <div class="col-sm-12 col-md-7 col-lg-6">
                <h3 class="title-about">WE ARE
                    <?= $company_name ?>
                </h3>
                <p class="about-text">
                Welcome to <?= $company_name ?> , a leading force in the world of cryptocurrency trading and investment. Founded with a vision to revolutionize digital finance, we provide secure, innovative, and user-centric solutions tailored for both novice and seasoned investors.
                </p>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                    <li><a data-toggle="tab" href="#menu2">Our Vision</a></li>
                    <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">
                        <p>
                            To empower our clients by offering innovative investment strategies that maximize growth,
                            mitigate risk, and secure financial futures.
                        </p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <p>
                            To be a trusted leader in the investment industry, known for delivering superior results,
                            exceptional service, and sustainable growth.
                        </p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <p>
                            At
                            <?= $company_name ?>, we leverage the latest financial technologies and market research to
                            identify and capitalize on emerging trends, ensuring that our clients stay ahead in a
                            rapidly evolving global economy.
                        </p>
                    </div>
                </div>
                <a class="btn btn-primary" href="about">Read More</a>
            </div>
            <!-- Content Ends -->
        </div>
        <!-- Section Content Ends -->
    </div>
</section>
<!-- About Section Ends -->
<!-- Features and Video Section Starts -->
<section class="image-block">
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
                                <img id="strong-security" src="images/icons/orange/strong-security.png"
                                    alt="strong security" />
                            </span>
                            <h3 class="feature-title">Cutting-Edge Technology</h3>
                            <p>
                                We leverage the latest financial technologies and tools to provide you with real-time
                                insights and analysis. Our intuitive platforms make it easy to track your financial
                                progress and adjust your strategies whenever needed.
                            </p>
                        </div>
                    </div>
                    <!-- Feature Ends -->
                    <div class="gap-20-mobile"></div>
                    <!-- Feature Starts -->
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="world-coverage" src="images/icons/orange/world-coverage.png"
                                    alt="world coverage" />
                            </span>
                            <h3 class="feature-title">Proven Success</h3>
                            <p>
                                Our clients trust us because we deliver results. We have a proven track record of
                                helping individuals and businesses optimize their finances, achieve their goals, and
                                secure their financial future.
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
                                <img id="payment-options" src="images/icons/orange/payment-options.png"
                                    alt="payment options" />
                            </span>
                            <h3 class="feature-title">Expert Guidance</h3>
                            <p>
                                Our team of financial experts brings years of industry experience and knowledge to help
                                you make informed decisions. We stay ahead of the curve with the latest financial trends
                                and regulatory changes, ensuring that your strategy is always current and effective.
                            </p>
                        </div>
                    </div>
                    <!-- Feature Ends -->
                    <div class="gap-20-mobile"></div>
                    <!-- Feature Starts -->
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="mobile-app" src="images/icons/orange/mobile-app.png" alt="mobile app" />
                            </span>
                            <h3 class="feature-title">Transparency & Integrity</h3>
                            <p>
                                We pride ourselves on maintaining a high standard of transparency and integrity in
                                everything we do. Our fees, recommendations, and processes are clear, so you can trust
                                that your best interests are always at the forefront of our work.
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
                                <img id="cost-efficiency" src="images/icons/orange/cost-efficiency.png"
                                    alt="cost efficiency" />
                            </span>
                            <h3 class="feature-title">Dedicated Support</h3>
                            <p>
                                At
                                <?= $company_name ?>, you are never just another client. We offer personalized,
                                dedicated support and are always available to answer your questions, provide updates,
                                and offer expert advice whenever you need it.
                            </p>
                        </div>
                    </div>
                    <!-- Feature Ends -->
                    <div class="gap-20-mobile"></div>
                    <!-- Feature Starts -->
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="high-liquidity" src="images/icons/orange/high-liquidity.png"
                                    alt="high liquidity" />
                            </span>
                            <h3 class="feature-title">Focus on Financial Wellness</h3>
                            <p>
                                We believe in empowering our clients with knowledge and confidence in their financial
                                decisions. Through educational resources, workshops, and one-on-one consultations, we
                                provide you with the tools to take control of your financial future.
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
<!-- Bitcoin Calculator Section Starts -->
<section class="bitcoin-calculator-section d-none" style="display:none">
    <div class="container">
        <div class="row">
            <!-- Section Heading Starts -->
            <div class="col-md-12">
                <h2 class="title-head text-center"><span>Bitcoin</span> Calculator</h2>
                <p class="message text-center">Find out the current Bitcoin value with our easy-to-use converter</p>
            </div>
            <!-- Section Heading Ends -->
            <!-- Bitcoin Calculator Form Starts -->
            <div class="col-md-12 text-center">
                <form class="bitcoin-calculator" id="bitcoin-calculator">
                    <!-- Input #1 Starts -->
                    <input class="form-input" name="btc-calculator-value" value="1">
                    <!-- Input #1 Ends -->
                    <div class="form-info"><i class="fa fa-bitcoin"></i></div>
                    <div class="form-equal">=</div>
                    <!-- Input/Result Starts -->
                    <input class="form-input form-input-result" name="btc-calculator-result">
                    <!-- Input/Result Ends -->
                    <!-- Select Currency Starts -->
                    <div class="form-wrap">
                        <select id="currency-select" class="form-input select-currency select-primary"
                            name="btc-calculator-currency" data-dropdown-class="select-primary-dropdown"></select>
                    </div>
                    <!-- Select Currency Ends -->
                </form>
                <p class="info"><i>* Data updated every 15 minutes</i></p>
            </div>
            <!-- Bitcoin Calculator Form Ends -->
        </div>
    </div>
</section>
<!-- Bitcoin Calculator Section Ends -->
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
                        <h4>Lina Marzouki</h4>
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
                    <!-- Team Member Details Ends -->
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
<!-- Team Section Ends -->
<!-- Quote and Chart Section Starts -->
<section class="image-block2">
    <div class="container-fluid">
        <div class="row">
            <!-- Quote Starts -->
            <div class="col-md-4 img-block-quote bg-image-2">
                <blockquote>
                    <p>We offer you an unbeatable protection against DDoS attacks with full data encryption for all your
                        transactions.</p>

                </blockquote>
            </div>
            <!-- Quote Ends -->
            <!-- Chart Starts -->
            <div class="col-md-8 bg-grey-chart">
                <div class="chart-widget dark-chart chart-1">
                    <div>
                        <div class="" data-bw-theme="dark">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>

                                <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                        {
                                            "width": "100%",
                                                "height": 550,
                                                    "defaultColumn": "overview",
                                                        "defaultScreen": "general",
                                                            "market": "forex",
                                                                "showToolbar": true,
                                                                    "colorTheme": "dark",
                                                                        "locale": "en"
                                        }
                                    </script>
                            </div>
                            <!-- TradingView Widget END -->



                        </div>
                    </div>
                </div>
                <div class="chart-widget light-chart chart-2">
                    <div>
                        <div class="btcwdgt-chart" bw-theme="light"></div>
                    </div>
                </div>
            </div>
            <!-- Chart Ends -->
        </div>
    </div>
</section>
<!-- Quote and Chart Section Ends -->
<!-- Blog Section Starts -->
<section class="blog">
    <div class="container">
        <!-- Section Title Starts -->
        <div class="row text-center">
            <h2 class="title-head">Our <span>Services</span></h2>
            <div class="title-head-subtitle">
                <!-- <p>Discover latest news about Bitcoin on our blog</p> -->
            </div>
        </div>
        <!-- Section Title Ends -->
        <!-- Section Content Starts -->
        <div class="row latest-posts-content">
            <!-- Article Starts -->
            <div class="col-sm-4 col-md-4 col-xs-12">
                <div class="latest-post">
                    <!-- Featured Image Starts -->
                    <a href="blog-post.html"><img class="img-responsive" src="images/blog/crypto.jpg" alt="img"></a>
                    <!-- Featured Image Ends -->
                    <!-- Article Content Starts -->
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="">CRYPTOCURRENCY</a>
                        </h4>
                        <div class="post-text">
                            <p>
                                Cryptocurrency are digital assets used in making investments.
                                <?php $company_name ?> invests and trades on top cryptocurrencies like Bitcoin,
                                Etherium, Litecoin, Ripple, etc. With the help of our market analysts, our investors
                                make great profits no cryptocurrency exchange can provide.
                            </p>
                        </div>
                    </div>
                    <div class="post-date">

                    </div>
                    <a href="services" class="btn btn-primary">read more</a>
                    <!-- Article Content Ends -->
                </div>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-sm-4 col-md-4 col-xs-12">
                <div class="latest-post">
                    <!-- Featured Image Starts -->
                    <a href="blog-post.html"><img class="img-responsive" src="images/blog/real.jpg" alt="img"></a>
                    <!-- Featured Image Ends -->
                    <!-- Article Content Starts -->
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="services">REAL ESTATE</a>
                        </h4>
                        <div class="post-text">
                            <p>
                                Real estate investment involves the purchase, ownership, management, rental and/or sale
                                of real estate for profit. Improvement of realty property as part of a real estate
                                investment strategy is generally considered to be a sub-specialty of real estate
                                investing called real estate development.
                                <?php $company_name ?> helps you secure properties at any location of your choice.
                            </p>
                        </div>
                    </div>
                    <div class="post-date">

                    </div>
                    <a href="services" class="btn btn-primary">read more</a>
                    <!-- Article Content Ends -->
                </div>
            </div>
            <!-- Article Ends -->
            <!-- Article Start -->
            <div class="col-sm-4 col-md-4 col-xs-12">
                <div class="latest-post">
                    <!-- Featured Image Starts -->
                    <a href="blog-post.html"><img class="img-responsive" src="images/blog/oil.jpg" alt="img"></a>
                    <!-- Featured Image Ends -->
                    <!-- Article Content Starts -->
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="services">OIL AND GAS</a>
                        </h4>
                        <div class="post-text">
                            <p>
                                Oil and gas are crucial energy resources that power much of the world's economy.
                                Extracted from beneath the Earth's surface, oil (petroleum) is refined into fuels like
                                gasoline, diesel, and jet fuel, while natural gas is used for heating, electricity
                                generation, and as a raw material in industries.
                            </p>
                        </div>
                    </div>
                    <div class="post-date">

                    </div>
                    <a href="services" class="btn btn-primary">read more</a>
                    <!-- Article Content Ends -->
                </div>
            </div>
        </div>
        <!-- Section Content Ends -->
    </div>
</section>
<!-- Blog Section Ends -->
<!-- Call To Action Section Starts -->
<section class="call-action-all">
    <div class="call-action-all-overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Call To Action Text Starts -->
                    <div class="action-text">
                        <h2>Get Started Today With investment</h2>
                        <p class="lead">Open account for free and start trading!</p>
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

<?php
    require "footer.php";

?>