
    <!-- Footer -->
    <footer class="main-footer style-six" style="background-image:url(home/images/background/pattern-11.png)">
        <div class="auto-container">
            <!-- Widgets Section -->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="index"><img src="home/images/logo.png" alt="" /></a>
                                    </div>
                                    <div class="text">
                                        <?= $company_name ?> is a trailblazing company that leverages the power of AI to provide
                                        unparalleled cryptocurrency investment, mining, and trading solutions.
                                    </div>
                                    <a href="about" class="theme-btn about-btn">About us</a>
                                </div>
                            </div>



                        </div>
                    </div>

                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row clearfix">

                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="footer-widget contact-widget">
                                    <h4>Official info:</h4>
                                    <ul class="contact-list">
                                        <li><span class="icon fa fa-map"></span>
                                        <?= $company_address ?>
Minneapolis, MN 55437</li>
                                        <li><span class="icon fa fa-envelope"></span><?= $company_email ?></li>
                                    </ul>
                                    <div class="timing">
                                        <strong>Open Hours: </strong>
                                        Mon - Sun:  24/7
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="footer-widget instagram-widget">
                                    <h4>Latest News</h4>
                                    <div class="widget-content">
                                        <div class="images-outer clearfix">
                                            <!-- TradingView Widget BEGIN -->
                                            <div class="tradingview-widget-container">
                                                <div class="tradingview-widget-container__widget"></div>
                                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                                                <script type="text/javascript" src="../s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                                                    {
                                                        "feedMode": "market",
                                                        "market": "stock",
                                                        "isTransparent": false,
                                                        "displayMode": "regular",
                                                        "width": "100%",
                                                        "height": "400",
                                                        "colorTheme": "light",
                                                        "locale": "en"
                                                    }
                                                </script>
                                            </div>
                                            <!-- TradingView Widget END -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright">2017 - 2025 &copy; All rights reserved by <a href="index"><?= $company_name ?></a></div>
            </div>

        </div>
    </footer>
    <!-- Footer -->



    
    </div>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-long-arrow-up fa-fw"></span></div>

<script src="home/js/jquery.js"></script>
<script src="home/js/appear.js"></script>
<script src="home/js/owl.js"></script>
<script src="home/js/wow.js"></script>
<script src="home/js/odometer.js"></script>
<script src="home/js/mixitup.js"></script>
<script src="home/js/knob.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/parallax-scroll.js"></script>
<script src="home/js/parallax.min.js"></script>
<script src="home/js/bootstrap.min.js"></script>
<script src="home/js/tilt.jquery.min.js"></script>
<script src="home/js/magnific-popup.min.js"></script>

<script src="home/js/script.js"></script>


<style>
    #google_translate_element {
        z-index: 9999999;
        position: fixed;
        bottom: 25px;
        left: 15px;
    }

    .goog-te-gadget {
        font-family: Roboto, "Open Sans", sans-serif !important;
        text-transform: uppercase;
    }

    .goog-te-gadget-simple {
        padding: 0px !important;
        line-height: 1.428571429;
        color: white;
        vertical-align: middle;
        background-color: black;
        border: 1px solid #a5a5a599;
        border-radius: 4px;
        float: right;
        margin-top: -4px;
        z-index: 999999;
    }

    .goog-te-banner-frame.skiptranslate {
        display: none !important;
        color: white;
    }

    .goog-te-gadget-icon {
        background: none !important;
        display: none;
        color: white;
    }

    .goog-te-gadget-simple .goog-te-menu-value {
        font-size: 12px;
        color: white;
        font-family: 'Open Sans', sans-serif;
    }
</style>
<div id="google_translate_element"></div>
<script type="text/javascript">
    window.onload = function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit">
</script>
<!-- start popup massage -->
<div class="notifier" style="display: none;">
    <div class="txt" style="color:black;">While you are waiting,someone from <b></b> just traded with <a
            href="javascript:void(0);" onclick="javascript:void(0);"></a></div>
</div>
<style>
    .notifier {
        border-radius: 7px;
        position: fixed;
        z-index: 90;
        bottom: 80px;
        right: 50px;
        background: #fff;
        padding: 15px 40px;
        box-shadow: 0px 5px 13px 0px rgba(0, 0, 0, .3);
    }

    .notifier a {
        font-weight: 700;
        display: block;
        color: #0080FF;
    }

    .notifier a,
    .notifier a:active {
        transition: all .2s ease;
        color: #0080FF;
    }
</style>
<script data-cfasync="false" src="#"></script>
<script type="text/javascript">
    var listCountries = ['Germany', 'Spain', 'Russia', 'Italy',
        'Italy',  'United States', 'Egypt',
        'United Kingdom', "United States","England","Germany","Germany","United States","Switzerland",
        "Austria","Austria","Austria","Australia","Australia","Australia","Russia","Russia",
        "United States","United Kingdom","Spain","Spain","India","England","Italy","Ukraine"
    ];
    var listPlans = ['$500','$5000','$1,000','$1000','$550','$3000','$690', '$360',
        '$700', '$600',"$500","$700","$1,000","$1289","$5000","$7000","$10000"];
    interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'While you are still contemplating ,an investor from <b>' + country + '</b> ' +
            'just traded with <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' .</a>';
        $(".notifier .txt")(msg);
        $(".notifier").stop(true).fadeIn(300);
        window.setTimeout(function() {
            $(".notifier").stop(true).fadeOut(300);
        }, 6000);
        run = setInterval(request, interval);
    }
</script>
<!-- end popup massage -->


<!--End of Tawk.to Script-->

</body>


</html>
