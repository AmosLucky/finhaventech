<?php

require "header.php";


?>
    <!-- End Main Header -->

        <!-- Page Title -->
    <section class="page-title" style="background-image:url(home/images/background/5.jpg)">
        <div class="auto-container">
            <h2>Contact us</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Contact us</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Business One -->
    <section class="business-one style-five" style="background-image:url(home/images/background/pattern-39.png)">
        <div class="auto-container">
            <!-- Business One Lower Section -->
            <div class="business-one_lower-section text-center" style="margin-top: 10rem;">
                <h6>Main Details:</h6>
                <div class="row clearfix">
                    <!-- Branch Column -->
                    <div class="branch-column col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="branch-column_inner">
                            <div class="branch-name"> (Head Office)</div>
                            <ul class="branch-info_list">
                                <li>
                                    <?= $company_address ?>
                                </li>
                                <li><a href="tel:"></a> </li>
                                <li><a href="mailto: <?= $company_email ?>"> <?= $company_email ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Business One -->

    <!-- Map One -->
    <section class="map-one">
        <div class="map-outer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s" allowfullscreen=""></iframe>
        </div>
    </section>
    <!-- End Map One -->



    <!-- CTA One -->
    <section class="cta-one">
        <div class="auto-container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="left-box">
                    <h3 class="cta-one_heading">Looking for the Best Investment and Asset manager?</h3>
                    <div class="cta-one_text">Prefinet is poised to help change your financial story.</div>
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