<?php

require "header.php";

?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

            <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4 mx-auto">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Referral Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                $<?= number_format($referral_balance,2) ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
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
                                   value="<?= $url ?>/auth/register?user=<?= $user ?>" readonly>
                                  
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button  class="btn btn-primary copy"
                                data-clipboard-target="#inputEmail4">copy</button>
                    </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Referrals</h6>
        </div>
        <div class="card-body">
                        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                   <tr>
                                        <th>S/N</th>
										<th>Date</th>
										
										
										<th>Amount</th>
										<th>Transaction Type</th>
										
										<th>Status</th>
                                        </tr>
                    </thead>
                    <tbody>
                                        
                    
                      <?php
      


      $sql = "SELECT * from  transactions where user_id = '$user_id' and transaction_type = 'investment' order by id desc"; 
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
												<!-- <td><?php  echo $wallet ?></td> -->
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

   <?php

   require "footer.php";

   ?>