<?php 

require "header.php";

?>         
 <div class="content-w">


                <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <form action="" method="post">
                                            <h5 class="form-header"> GIB Fund Transfer</h5>
                                            <p>For external ransfer, <a href="transfer">click here</a></p>
                                            <div class="form-desc">Please note that every successful transfer is not
                                                reversable
                                            </div>
                                                                                        <div class="col-lg-12 col-xxl-6">
                                                <!--START - BALANCES-->
                                                <?php
                                        require "./balance_widget.php";
                                         ?>
                                                <!--END - BALANCES-->
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group"><label for=""> Amount</label><input
                                                            class="form-control" type="number" name="amount" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group"><label for=""> Account Number</label><input
                                                            class="form-control" placeholder="enter account number"
                                                            name="acc_number" id="search" required="required"
                                                            type="number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="result"></div>
                                        </form>
                                    </div>
                                </div>
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
        <div class="date-break">22nd May 08:47 29am</div>
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