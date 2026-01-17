
    <div class="flex-grow-1"></div>

    <div class="footer-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="copy-right">
                        <p>Copyright @ 2025 <?= $company_name ?>. </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Main Content Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
</div>
<!-- End Go Top Area -->

<script type="text/javascript">
    window.onload = function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Jquery Min JS -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Owl Carousel Min JS -->
<script src="js/owl.carousel.min.js"></script>
<!-- Metismenu Min JS -->
<script src="js/metismenu.min.js"></script>
<!-- Simplebar Min JS -->
<script src="js/simplebar.min.js"></script>
<!-- mixitup Min JS -->
<script src="js/mixitup.min.js"></script>
<!-- Dark Mode Switch Min JS -->
<script src="js/dark-mode-switch.min.js"></script>
<!-- Apexcharts Min JS -->
<script src="js/apexcharts/apexcharts.min.js"></script>
<!-- Charts Custom Min JS -->

<!-- Form Validator Min JS -->
<script src="js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="js/contact-form-script.js"></script>
<!-- Ajaxchimp Min JS -->
<script src="js/ajaxchimp.min.js"></script>
<!-- Custom JS -->
<script src="js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
<script>
    new ClipboardJS('.copy');
</script>
        <script>
            // Assuming you have a route named 'earnings.chart' that returns JSON data
            const earningsUrl = "earnings/chart/14";
            const withdrawalsUrl = "withdrawal/chart/14";

            // Fetch earnings data using AJAX
            Promise.all([fetch(earningsUrl), fetch(withdrawalsUrl)])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    const earningsData = data[0];
                    const withdrawalsData = data[1];
                    // Create ApexCharts instance
                    const chart = new ApexCharts(document.querySelector("#ana_dash_1"), {
                        chart: {
                            height: 395,
                            type: "area",
                            stacked: !0,
                            toolbar: {
                                show: !1,
                                autoSelected: "zoom"
                            }
                        },
                        colors: [
                            "#7f26c6",
                            "#7f26c6"
                        ],
                        dataLabels: {
                            enabled: !1
                        },
                        stroke: {
                            curve: "smooth",
                            width: [1.5, 1.5],
                            dashArray: [0, 4],
                            lineCap: "round"
                        },
                        grid: {
                            padding: {
                                left: 0,
                                right: 0
                            },
                            strokeDashArray: 3
                        },
                        markers: {
                            size: 0,
                            hover: {
                                size: 0
                            }
                        },
                        series: [
                            {
                                name: "Earnings",
                                data: earningsData,
                            },
                            {
                                name: "Withdrawals",
                                data: withdrawalsData,
                            },
                        ],
                        xaxis: {
                            type: "datetime",
                            axisTicks: {
                                show: !0
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0,
                                opacityTo: 0,
                                stops: [0, 90, 100]
                            }
                        },
                        tooltip: {
                            x: {
                                format: "dd/MM/yy HH:mm"
                            }
                        },
                        legend: {
                            position: "bottom",
                            horizontalAlign: "right",
                            show: false
                        },
                    });

                    // Render the chart
                    chart.render();
                });

        </script>

        <script>
            // Assuming you have a route named 'earnings.chart' that returns JSON data
            const investmentUrl = "investments/chart/14";

            // Fetch earnings data using AJAX
            Promise.all([fetch(investmentUrl)])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    const earningsData = data[0];
                    // Create ApexCharts instance
                    const chart = new ApexCharts(document.querySelector("#stacked-column-chart-2"), {
                        chart: {
                            height: 385,
                            type: "bar",
                            stacked: !0,
                            toolbar: {
                                show: !1
                            },
                            zoom: {
                                enabled: !0
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: "15%",
                                endingShape: "rounded"
                            }
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        series: [
                            {
                                name: "Investments",
                                data: earningsData,
                            },
                        ],
                        xaxis: {
                            type: "datetime",
                            axisTicks: {
                                show: !0
                            }
                        },
                        colors: ["#ff9f43"],
                        legend: { position: "top"},
                        fill: { opacity: 1 },
                    });

                    // Render the chart
                    chart.render();

                });

        </script>

    <!-- Smartsupp Live Chat script -->

    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum quaerat harum itaque possimus, modi consequatur ad voluptatibus dolore porro voluptatum rerum minus cumque! Officia sequi commodi autem minima, quos illo.
    


</body>
</html>
