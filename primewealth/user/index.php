<?php

     require "header.php";
?>

<!-- Page content -->
            <div class="page-content">
                
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Welcome, <?= $user ?>!</h5>
            </div>
        </div>
    </div>
    <div>
    </div>
    <div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                								<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="width: 100%; height: 72px;">
  <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BINANCE%3ABTCUSDT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BINANCE%3AETHUSDT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22COINBASE%3AETHUSD%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BINANCE%3AADAUSDT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BINANCE%3AEOSUSDT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BINANCE%3AFTMUSDT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22BINANCE%3AMATICUSDT%22%7D%5D%2C%22showSymbolLogo%22%3Atrue%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Atrue%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A44%2C%22utm_source%22%3A%22deloxfunds.org%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%2C%22page-uri%22%3A%22deloxfunds.org%2Fuser%2Findex.php%22%7D" style="user-select: none; box-sizing: border-box; display: block; height: 72px; width: 100%;"></iframe>
  
<style>
	.tradingview-widget-copyright {
		font-size: 13px !important;
		line-height: 32px !important;
		text-align: center !important;
		vertical-align: middle !important;
		/* @mixin sf-pro-display-font; */
		font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
		color: #9db2bd !important;
	}

	.tradingview-widget-copyright .blue-text {
		color: #2962FF !important;
	}

	.tradingview-widget-copyright a {
		text-decoration: none !important;
		color: #9db2bd !important;
	}

	.tradingview-widget-copyright a:visited {
		color: #9db2bd !important;
	}

	.tradingview-widget-copyright a:hover .blue-text {
		color: #1E53E5 !important;
	}

	.tradingview-widget-copyright a:active .blue-text {
		color: #1848CC !important;
	}

	.tradingview-widget-copyright a:visited .blue-text {
		color: #2962FF !important;
	}
	</style></div>
<!-- TradingView Widget END -->
							</div>
						</div>
					</div>
				</div>

				<!-- row  -->

                <?php
require_once './user-dashboard-features.php';
?>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="nk-block-head-content">
                                <h5 class="text-primary h5">Account Summary</h5>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">My Assets</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$<?php echo number_format($balance,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-sack-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 d-none">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="mb-1 text-muted">Total Earnings </h6>
                                                <span
                                                    class="mb-0 h5 font-weight-bold">$<?php  echo number_format($profit,2) ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                    <i class="fas fa-coins"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Active Resource</h6>
                                            <span class="mb-0 h5 font-weight-bold">
                                                <span
                                                    class="mb-0 h5 font-weight-bold ">$<?php  echo  number_format($running_invest,2)  ?>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-arrow-alt-circle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        
                        
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="mb-1 text-muted">Total Take-Out</h6>
                                                <span class="mb-0 h5 font-weight-bold">
                                                    $<?php  echo number_format($total_withdrawn,2) ?>
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                    <i class="fas fa-arrow-circle-up"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Affiliate Reward</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$<?php  echo number_format($referral_balance,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-gifts"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Added Resource</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format($total_deposit,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-gift"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Margin/commission</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format($blocked_reward,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Pending Transaction</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format($pendding_balance,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







<!-- 
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                               
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Rewards</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format(0,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-gift"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->







                        <!-- <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                               
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Recovered</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format(0,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-shield"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->





                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <!-- <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1 text-muted">Bonus</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php //echo number_format($blocked_reward,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-gift"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        
                        </div>


                                            
                        <div class="mt-4 row g-2">
    
    <!-- Deposit -->
    <div class="col-4">
        <a href="deposit.php" class="btn btn-primary btn-sm w-100">
            Deposit
        </a>
    </div>

    <!-- Withdraw -->
    <div class="col-4">
        <a href="withdrawal.php" class="btn btn-success btn-sm w-100">
            Withdraw
        </a>
    </div>

    <!-- Activate -->
    <div class="col-4">
        <a href="buy-plan.php" class="btn btn-warning btn-sm w-100">
            Activate
        </a>
    </div>

</div>
                        
                    

                    
                    <div class="mt-4 row">
                        <div class="col-12">
                            <div class="nk-block-head-content">
                                <h6 class="text-primary h5">Recent transactions
                                     <!-- <span
                                        class="text-base count">(0)</span> -->
                                </h6>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2 text-right">
                                        <a href=""> <i class="fas fa-clipboard"></i> View
                                            all
                                            transactions</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                        <thead class="bg-light">
											<tr>
												<th>S/N</th>
												<th>Date</th>
										
										
										<th>Amount</th>
										<th>Transaction Type</th>
										
										<th>Status</th>
										 <th>Wallet</th>
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
											<tr class="border-bottom">
												<td><?php  echo $sn ?></td>
												<td><?php  echo $date ?></td>
												<td><?php  echo "$".$amount ?></td>
												<td class="text-red"><?php  echo $type ?></td>
												<td class="text-right"><?php  echo $status ?></td>
												<td><?php  echo $wallet ?></td>
												<!-- <td><a href="#" class="btn btn-sm btn-success">Transfer Now</a></td> -->
											</tr>
<?php
      }


      ?>
											
											
											
											
											
										</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    

                    <div class="mt-4 row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-black">Refer Us & Earn</h5>
                                    <p>Use the below link to invite your friends.</p>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control myInput readonly"
                                            value="https://<?php echo $domain  ?>/register?user=<?php echo $user   ?>" id="reflink" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" onclick="myFunction()"
                                                type="button">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small class="input-group-append" id="copied"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
            </div>
        </div>
    </div>


    <?php
     require "footer.php";
?>
