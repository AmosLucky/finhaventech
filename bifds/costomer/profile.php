<?php
require "header.php";

?>
<!--------------------
END - Main Menu
-------------------->            <div class="content-w">

                <!--------------------
END - Breadcrumbs
-------------------->

                <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="user-profile compact">
                                                                        <div class="up-head-w"
                                        style="background-image:url('../uploads/<?php echo $profile_picture  ?>')">
                                        <div class="up-social"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a
                                                href="#"><i class="os-icon os-icon-facebook"></i></a></div>
                                        <div class="up-main-info">
                                            <h2 class="up-header"><?php echo $firstname." ".$surname." ".$othername;  ?>  </h2>
                                            <h6 class="up-sub-header"><?php  echo $country ?> - <?php  echo $gender ?>                                            </h6>
                                        </div>
                                        <svg class="decor" width="842px" height="219px" viewbox="0 0 842 219"
                                            preserveaspectratio="xMaxYMax meet" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                                                <path class="decor-path"
                                                    d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                                                        <div class="up-controls">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="value-pair">
                                                    <div class="label">Status:</div>
                                                    <div class="value badge badge-pill badge-success">Online</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right"><a class="btn btn-primary btn-sm"
                                                    href=""><i
                                                        class="os-icon os-icon-link-3"></i><span><?php  echo $account_number ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="up-contents">
                                        <div class="m-b">
                                            <div class="row m-b">
                                                <div class="col-sm-6 b-r b-b">
                                                    <div class="el-tablo centered padded-v">
                                                        <div class="value">25</div>
                                                        <div class="label">Login Reward</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 b-b">
                                                    <div class="el-tablo centered padded-v">
                                                        <div class="value">315</div>
                                                        <div class="label">Reputation</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="padded">
                                                <div class="os-progress-bar primary">
                                                    <div class="bar-labels">
                                                        <div class="bar-label-left"><span>Profile Completion</span><span
                                                                class="positive">+10</span></div>
                                                        <div class="bar-label-right"><span class="info">99/100</span>
                                                        </div>
                                                    </div>
                                                    <div class="bar-level-1" style="width: 100%">
                                                        <div class="bar-level-2" style="width:100%">
                                                            <div class="bar-level-3" style="width: 99%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="os-progress-bar primary">
                                                    <div class="bar-labels">
                                                        <div class="bar-label-left"><span>Account Security</span><span
                                                                class="positive">+15</span></div>
                                                        <div class="bar-label-right"><span class="info">100/100</span>
                                                        </div>
                                                    </div>
                                                    <div class="bar-level-1" style="width: 100%">
                                                        <div class="bar-level-2" style="width: 100%">
                                                            <div class="bar-level-3" style="width: 100%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <form id="formValidate">
                                            <div class="element-info">
                                                <div class="element-info-with-icon">
                                                    <div class="element-info-icon">
                                                        <div class="os-icon os-icon-wallet-loaded"></div>
                                                    </div>
                                                    <div class="element-info-text">
                                                        <h5 class="element-inner-header">Profile Settings</h5>
                                                        <div class="element-inner-desc">Please make sure your account
                                                            details is up to date to help us serve you better </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <h4>Account Number: <?php  echo $account_number ?></h4>
                                            </center><br>
                                            <div class="form-group">
                                                <label for=""> Email address</label>
                                                <input class="form-control" data-error="Your email address is invalid"
                                                    placeholder="Enter email" required="required" readonly type="email"
                                                    value="<?php  echo $email ?>">
                                                <div class="help-block form-text with-errors form-control-feedback">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for=""> First Name</label>
                                                        <input class="form-control" readonly name="fname"
                                                            value="<?php  echo $firstname ?>" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Other Names</label>
                                                        <input class="form-control" readonly
                                                            value="<?php  echo $surname ?> " name="lname" type="text">
                                                        <div
                                                            class="help-block form-text with-errors form-control-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for=""> Gender</label>
                                                        <input class="form-control" readonly name="fname"
                                                            value="<?php  echo $gender ?> " type="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input class="form-control" readonly value="hidden" name="lname"
                                                            type="text">
                                                        <div
                                                            class="help-block form-text with-errors form-control-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Country</label>
                                                        <input class="form-control" readonly name="fname"
                                                            value="<?php  echo $country ?> " type="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Marital status</label>
                                                        <input class="form-control" readonly value="<?php echo $marital_status ?> "
                                                            name="lname" type="text">
                                                        <div
                                                            class="help-block form-text with-errors form-control-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Address</label>
                                                <input class="form-control" data-error="Your email address is invalid"
                                                    placeholder="Enter email" required="required" readonly type="email"
                                                    value="<?php  echo $address ?>">
                                                <div class="help-block form-text with-errors form-control-feedback">
                                                </div>
                                            </div>

                                            <div class="form-buttons-w">

                                            </div>
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
        <div class="date-break">19th May 10:56 36am</div>
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