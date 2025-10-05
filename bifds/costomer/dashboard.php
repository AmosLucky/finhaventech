<?php

require "header.php";


if($_SESSION['alert'] == 0){
    $_SESSION['alert'] = 1;

?>
<div aria-hidden="true" class="onboarding-modal modal fade animated show-on-load" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-centered" role="document">
				<div class="modal-content text-center"><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Skip</span><span class="os-icon os-icon-close"></span></button>
					<div class="">
						<div class="onboarding-slide">
							<div class="onboarding-media"><img alt="" src="img/bigicon2.jpeg" width="200px">
							</div>
							<div class="onboarding-content with-gradient">
								<h4 class="onboarding-title">Hello <?php echo $firstname." ".$surname." ".$othername;  ?></h4>
								<div class="onboarding-text">Please keep your login details safe. If you think somebody has unauthorized access to your account, please change your password immediately or email customer support at <a href="#"><span class="__cf_email__" data-cfemail=""><?php echo $company_email ?></span></a> </div>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>

        <?php } ?>

        <div class="content-w">
                <div class="content-i">
                    <div class="content-box">
                        <div class="element-wrapper compact pt-4">
                            <div style="font-size: 18px;">Welcome <?php echo $firstname." ".$surname." ".$othername;  ?> </h6>
                            <div class="element-actions"><a class="btn btn-success btn-sm" href="#"><span>Accont Number:
                            <?php  echo $account_number ?></span></a></div>
                            <h6 class="element-header">Financial Overview                             </h6>
                            <div class="element-box-tp">
                                <div class="row">
                                    <div class="col-lg-7 col-xxl-6">
                                        <!--START - BALANCES-->
                                        <?php
                                        require "./balance_widget.php";
                                         ?>
                                        <!--END - BALANCES-->
                                    </div>
                                    <div class="col-lg-5 col-xxl-6">
                                        <!--START - MESSAGE ALERT-->
                                        <div class="alert alert-warning borderless">
                                            <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
                                            <p>You can earn: 15,000 Membership Rewards points for each approved referral
                                                – up to 55,000 Membership Rewards points per calendar year.</p>
                                            <div class="alert-btn"><a class="btn btn-white-gold" href="#"><i
                                                        class="os-icon os-icon-ui-92"></i><span>Notify Me
                                                        Later</span></a></div>
                                        </div>
                                        <!--END - MESSAGE ALERT-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xxl-12">
                                <!--START - CHART-->
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div id="tradingview_9dfa4"></div>
                                    <div class="tradingview-widget-copyright"></div>
                                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                    new TradingView.MediumWidget({
                                        "symbols": [
                                            [
                                                "FX:USDCAD|12M"
                                            ]
                                        ],
                                        "chartOnly": false,
                                        "width": "100%",
                                        "height": "500",
                                        "locale": "en",
                                        "colorTheme": "light",
                                        "gridLineColor": "rgba(42 ,46, 57, 0)",
                                        "fontColor": "#787B86",
                                        "isTransparent": false,
                                        "autosize": true,
                                        "showFloatingTooltip": true,
                                        "scalePosition": "right",
                                        "scaleMode": "Normal",
                                        "fontFamily": "Trebuchet MS, sans-serif",
                                        "noTimeScale": false,
                                        "chartType": "area",
                                        "lineColor": "#2962FF",
                                        "bottomColor": "rgba(41, 98, 255, 0)",
                                        "topColor": "rgba(41, 98, 255, 0.3)",
                                        "container_id": "tradingview_9dfa4"
                                    });
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                                <!--END - CHART-->
                            </div>
                        </div>

 
                  </div>
                </div>
            </div>
        </div>
        <?php
       require "footer.php";
       ?>