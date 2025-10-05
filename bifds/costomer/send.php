<?php

require "header.php";

?>

    <div class="content-w">


                <div class="content-i">
                    <div class="content-box">
                        <div class="section-heading centered">
                            <h1>TRANSFER TYPE</h1>
                            <p>Click on any of the transfer types to continue</p>
                        </div>
                        <div class="pricing-plans row no-gutters">

                            <div class="pricing-plan col-sm-6">
                                <a href="internal">
                                    <div class="plan-head">
                                        <div class="plan-image"><img alt="" src="img/plan4.png"></div>
                                        <div class="plan-name">
                                          <?= $company_name ?> to <?= $company_name ?>                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="pricing-plan col-sm-6">
                                <a href="transfer">
                                    <div class="plan-head">
                                        <div class="plan-image"><img alt="" src="img/plan3.png"></div>
                                        <div class="plan-name">OTHER BANKS</div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <!--<div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Chat</span></div>
  <div class="floated-chat-w">
    <div class="floated-chat-i">
      <div class="chat-close"><i class="os-icon os-icon-close"></i></div>
      <div class="chat-head">
        <div class="user-w with-status status-red">
          <div class="user-avatar-w">
            <div class="user-avatar"><img alt="" src="img/avatar1.jpeg"></div>
          </div>
          <div class="user-name">
            <h6 class="user-title">MIKE</h6>
            <div class="user-role">Customer Service</div>
          </div>
        </div>
      </div>
      <div class="chat-messages">
        <div class="message">
          <div class="message-content">Hi Jerry, how can I help you?</div>
        </div>
        <div class="date-break">19th May 10:54 45am</div>
        <div class="message">
          <div class="message-content">We are currently offline, please drop your message and we will reply you shortly</div>
        </div>
      </div>
      <div class="chat-controls">
        <input class="message-input" placeholder="Type your message here..." type="text">
        <div class="chat-extra"></div>
      </div>
    </div>
  </div>-->
                    </div>
                </div>
            </div>
        </div>
       <?php 

       require "footer.php";


?>