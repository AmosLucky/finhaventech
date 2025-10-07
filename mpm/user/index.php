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
                        <div class="col-xl-4 col-md-6">
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
                                            <h6 class="mb-1 text-muted">Commission</h6>
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
                                            <h6 class="mb-1 text-muted">Rewards</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format($msg_title,2) ?></span>
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
                                            <h6 class="mb-1 text-muted">Recovered</h6>
                                            <span
                                                class="mb-0 h5 font-weight-bold">$ <?php echo number_format($msg,2) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                                <i class="fas fa-shield"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





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


                                            
                        <div class="mt-4 row">
                            <div class="col-12">
                                <div class="nk-block-head-content">
                                    
                                    <!-- <h5 class="text-primary h5">Active Plan(s) <span
                                            class="text-base count">(0)</span></h5> -->
                                </div>
                            </div>
                            <div class="col-12">
                                                                    <div class="mt-4 row">
                                        <div class="col-md-12">
                                            <div class="py-4 card">
                                                <div class="text-center card-body">
                                                    <!-- <p>Investment to a plan.</p> -->
                                                    <a href="deposit.php" class="px-3 btn btn-primary">Deposit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                            value="https://<?php echo $domain  ?>/signup?user=<?php echo $user   ?>" id="reflink" readonly>
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
