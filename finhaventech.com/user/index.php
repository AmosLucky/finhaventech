<?php

require "header.php";

?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

        

    


    <div class="today-card-area pt-24" style="margin-top:-3rem;">
        <div class="container-fluid">
            <!-- <div class="alert alert-info">Login successful.</div> -->
            <div class="row justify-content-between">
                <div class="col-lg-3 col-sm-6 text-start col-6">
                    <div class="single-today-card d-flex align-items-center">
                        <a href="deposit" class="default-btn">Deposit</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-start col-6">
                    <div class="single-today-card d-flex align-items-center">
                        <a href="investment" class="default-btn">Invest</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-end col-6">
                    <div class="single-today-card d-flex align-items-center">
                         <a href="withdrawal" class="btn btn-primary rounded-pill">Withdraw</a>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Account Balance</span>
                            <h6>$<?= number_format($balance,2) ?></h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/user.png" alt="Images">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Profit Balance</span>
                            <h6>$<?php  echo number_format($profit,2) ?></h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/user.png" alt="Images">
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Bonus Balance</span>
                            <h6>$0.00</h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/user.png" alt="Images">
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="images/icon/user-2.png" alt="Images">
                                Ongoing Investments
                            </p>
                            <h6>
                                $<?php  echo  number_format($running_invest,2)  ?>
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="images/icon/discount-2.png" alt="Images">
                                Pending Deposits
                            </p>
                            <h6>$<?php  echo number_format($pendding_invest,2) ?></h6>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="images/icon/curser.png" alt="Images">
                                Completed Investments
                            </p>

                            <h6>$0.00</h6>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="images/icon/discount-2.png" alt="Images">
                                Pending Withdrawals
                            </p>
                            <h6>$0.00</h6>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="images/icon/items.png" alt="Images">
                                Completed Withdrawals
                            </p>
                            <h6> $<?php  echo number_format($total_withdrawn,2) ?></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Today's Earning</span>
                            <h6>$<?php  echo number_format($profit,2) ?></h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/discount.png" alt="Images">
                        </div>
                    </div>
                </div>




                <div class="col-lg-3 col-sm-6">
                   <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Bonus</span>
                           <h6>$0.00</h6>
                        </div>

                       <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/groop.png" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Referral Balance</span>
                            <h6>$<?php  echo number_format($referral_balance,2) ?></h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/groop.png" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Total Withdrawal</span>
                            <h6>$<?php  echo number_format($total_withdrawn,2) ?></h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="images/icon/discount.png" alt="Images">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="overview-area mb-4 mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="height:100%;width:100%">
                        <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                            {
                                "width": "100%",
                                "height": "610",
                                "symbol": "BINANCE:BTCUSDT",
                                "interval": "60",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "allow_symbol_change": true,
                                "calendar": false,
                                "support_host": "https://www.tradingview.com"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>

            </div>
        </div>
    </div>
    <div class="overview-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="chart-wrap">
                        <!-- <div class="sales-overview d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="overview-content">
                                    Earning Overview
                                    <i class="ri-arrow-up-line"></i>
                                </h6>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <ul>
                                    <li>
                                        <span>This Month</span>
                                        <h6 class="this-month">$0.00</h6>
                                    </li>
                                    <li>
                                        <span>Last Month</span>
                                        <h6>$0.00</h6>
                                    </li>
                                </ul>
                            </div> -->
                        </div>

                        <div id="ana_dash_1"></div>
                    </div>
                </div>

                <!-- <div class="col-lg-5">
                    <div class="active-user">
                        <div id="stacked-column-chart-2"></div>

                        <div class="active-user-content-wrap">
                            <h6 class="active-user-content">
                                Investment Overview
                                <i class="ri-arrow-up-line"></i>
                            </h6>


                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>



    <div class="latest-transaction-area">
        <div class="container-fluid">
            <div class="table-responsive" data-simplebar>
                <h5 class="mb-2">Most Recent Transactions</h5>
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                        <th width="25%">ID</th>
                        <th width="25%">AMOUNT</th>
                        <th width="25%">STATUS</th>
                        <th width="25%">TYPE</th>
                        <th width="25%">DATE</th>
                    </tr>
                     
                    </thead>
                    <tbody>

                        <?php
      


      $sql = "SELECT * from  transactions where user_id = '$user_id' order by id desc limit 0, 5"; 
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $date = $row['invest_date'];
        $amount = $row['amount'];
        $type = $row['transaction_type'];
        $wallet = $row['wallet_type'];
        $status =  $row['status'];
      

      ?>
                    <tr>
                        <th width="25%"><?php  echo $sn ?></th>
                        <th width="25%"><?php  echo "$".$amount ?></th>
                        <th width="25%"><?php  echo $status ?></th>
                        <th width="25%"><?php  echo $type ?></th>
                        <th width="25%"><?php  echo $date ?></th>
                    </tr>

                    <?php } ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Link
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">

                <div class="form-row">
                    <div class="form-group col-md-6 mx-auto">
                        <label for="inputEmail4">Referral Link</label>
                        <input type="text" class="form-control" id="inputEmail4"
                               value="<?= $url ?>/auth/register?referral=<?= $user ?>" readonly>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button  class="btn btn-primary copy"
                             data-clipboard-target="#inputEmail4">copy</button>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    
    </div>
<?php

require "footer.php";

?>