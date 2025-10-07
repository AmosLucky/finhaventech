<?php 
   require 'header.php';
?>
	
			<!-- mobile-header -->

				<!-- container -->
				<div class="container-fluid">

					
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<h6 class="content-title mb-2">Welcome back, <?php echo $user ?></h6>
					<!-- 	<div class="alert alert-warning"><b>Mentainance:</b> we a currently under a temporal mentainance which will last for 72 hours. During this period, you may notice a change in your account balance but do not panic as everything will be restore to its normal</div> -->
						
					</div>
					<div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
					<a href="withdraw" class="btn btn-success mt-2 mt-xl-0">
        <!-- <i class="mdi mdi-download "></i> -->
        Withdraw
      </a>
      <a href="deposit" class="btn btn-primary mt-2 mt-xl-0">Make Deposit</a>
					
					</div>
				</div>
				<!-- /breadcrumb -->
        <div class="row">
					<div class="col-xl-12 col-md-12 col-lg-12">
						<div class=" overflow-hidden bg-transparent card-crypto-scroll shadow-none">
							<div class="js-conveyor-example jctkr-wrapper jctkr-initialized">
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

        <div class="row row-sm">
					<div class="col-xl-4 col-lg-6 col-md-12">
						<div class="card crypto crypt-primary overflow-hidden">
							<div class="card-body iconfont text-left">
								<div class="media">
									<div class="media-body">
										<h6>Balance</h6>
										<h3 class="font-weight-semibold text-left mb-0 text-success">BTC (USD) <?php  echo  number_format($balance,2)  ?></h3>
										
									</div>
									<div class="card-body-top mb-3">
										<div>
											System Counter
										</div>
										<div>
											$<?php  echo number_format($profit,3) ?>
										</div>
									</div>
								</div>
								<div class="flot-wrapper">
									<div class="flot-chart ht-150 mt-4" id="flotChart3" style="padding: 0px;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 356.664px; height: 150px;" width="713" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 356.664px; height: 150px;" width="713" height="300"></canvas></div>
								</div>
							</div>
							<div class="card-footer">
								<nav class="nav">
									
								</nav>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-12">
						<div class="card crypto crypt-primary overflow-hidden">
							<div class="card-body iconfont text-left">
								<div class="media">
									<div class="media-body">
										<h6>Profit</h6>
										<h3 class="font-weight-semibold text-left mb-0 text-success"> (USD) <?php  echo  number_format($profit,2)  ?></h3>
										
									</div>
									<div class="card-body-top mb-3">
										<div>
											Profit
										</div>
										
									</div>
								</div>
								<div class="flot-wrapper">
									<div class="flot-chart ht-150 mt-4" id="flotChart3" style="padding: 0px;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 356.664px; height: 150px;" width="713" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 356.664px; height: 150px;" width="713" height="300"></canvas></div>
								</div>
							</div>
							<div class="card-footer">
								<nav class="nav">
									
								</nav>
							</div>
						</div>
					</div>


					<div class="col-xl-4 col-lg-6 col-md-12">
						<div class="card crypto crypt-primary overflow-hidden">
							<div class="card-body iconfont text-left">
								<div class="media">
									<div class="media-body">
										<h6>Running Balance</h6>
										<h3 class="font-weight-semibold text-left mb-0 text-success"> (USD) <?php  echo  number_format($running_invest,2)  ?></h3>
										
									</div>
									<div class="card-body-top mb-3">
										<!-- <div>
											System Counter
										</div>
										<div>
											$<?php // echo number_format($profit,3) ?>
										</div> -->
										<p class="text-muted mb-0">
									<i class="mdi mdi-arrow-up-drop-circle mr-1 text-success" aria-hidden="true"></i>Active Investment 
								</p>
									</div>
									
								</div>
								<div class="flot-wrapper">
									<div class="flot-chart ht-150 mt-4" id="flotChart3" style="padding: 0px;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 356.664px; height: 150px;" width="713" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 356.664px; height: 150px;" width="713" height="300"></canvas></div>
								</div>
							</div>
							<div class="card-footer">
								<nav class="nav">
									
								</nav>
							</div>
						</div>
					</div>
					
					
				</div>
				
				<!-- /row -->

				<div class="row">


        <div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="clearfix">
									<div class="float-right">
										<i class="mdi mdi-cube text-warning icon-size"></i>
									</div>
									<div class="float-left">
										<p class="mb-0 text-left">Pending Deposit</p>
										<div class="">
											<h3 class="font-weight-semibold text-left mb-0 text-danger">$ <?php echo number_format($pendding_balance,2) ?></h3>
										</div>
									</div>
								</div>
								<p class="text-muted mb-0">
									<i class="mdi mdi-arrow-up-drop-circle mr-1 text-success" aria-hidden="true"></i> Pending Deposit
								</p>
							</div>
						</div>
					</div>
          <div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="clearfix">
									<div class="float-right">
										<i class="mdi mdi-poll-box text-success icon-size"></i>
									</div>
									<div class="float-left">
										<p class="mb-0 text-left">Total Bonuses</p>
										<div class="">
											<h3 class="font-weight-semibold text-left mb-0">$ <?php  echo number_format($total_ref_bonus,2) ?></h3>
										</div>
									</div>
								</div>
								<p class="text-muted mb-0">
									<i class="mdi mdi-arrow-up-drop-circle mr-1 text-success" aria-hidden="true"></i>  Bonus
								</p>
							</div>
						</div>
					</div>

          <div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="clearfix">
									<div class="float-right">
										<i class="mdi mdi-poll-box text-danger icon-size"></i>
									</div>
									<div class="float-left">
										<p class="mb-0 text-left">Total Withdraw</p>
										<div class="">
											<h3 class="font-weight-semibold text-left mb-0">$ <?php  echo number_format($total_withdrawn,2) ?></h3>
										</div>
									</div>
								</div>
								<p class="text-muted mb-0">
									<i class="mdi mdi-arrow-down-drop-circle mr-1 text-danger" aria-hidden="true"></i> withdraw
								</p>
							</div>
						</div>
					</div>
          <div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="clearfix">
									<div class="float-right">
										<i class="mdi mdi-poll-box text-success icon-size"></i>
									</div>
									<div class="float-left">
										<p class="mb-0 text-left">Total Investemnt</p>
										<div class="">
											<h3 class="font-weight-semibold text-left mb-0">$ <?php echo number_format($total_invest,2) ?> </h3>
										</div>
									</div>
								</div>
								<p class="text-muted mb-0">
									<i class="mdi mdi-arrow-up-drop-circle mr-1 text-success" aria-hidden="true"></i> All Investemnt
								</p>
							</div>
						</div>
					</div>

					


					
					
					
					
					<!-- <div class="col-md-3">
						<div class="card px-2 py-2">
							///
						</div>
						
					</div> -->

					
					
				</div>

				<!-- row -->
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card overflow-hidden">
							<div class="card-body">
								<div class="">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">Recent Transactions</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									
								</div>
								<div class="table-responsive market-values">
									<table class="table table-bordered table-hover table-striped text-nowrap mb-0 tx-13" >
										<thead>
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
				<!-- /row -->
			


				</div>
				<!-- Container closed -->

			</div>
			<!-- main-content closed -->

			<?php 
require "footer.php";

		?>