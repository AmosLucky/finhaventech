<?php
require "header.php";
?>
            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Transaction Records</h5>
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
                    <ul class="mb-3 nav nav-pills nav-pills-icon nav-justified" id="pills-tab" role="tablist">
                        <li class="p-2 nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <span class="d-block">
                                    <i class="fas fa-download "></i>
                                </span>
                                <span class="mt-2 d-none d-sm-block">Deposit</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                <span class="d-block">
                                    <i class="fas fa-arrow-alt-circle-up "></i>
                                </span>
                                <span class="mt-2 d-none d-sm-block">Withdrawal</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">
                                <span class="d-block">
                                    <i class="far fa-arrow-alt-from-left"></i>
                                </span>
                                <span class="mt-2 d-none d-sm-block">All</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="DeposTbl" class="table table-hover ">
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
      


      $sql = "SELECT * from  transactions where user_id = '$user_id' and transaction_type = 'deposit' order by id desc"; 
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table id="WithdrawTbl" class="table table-hover ">
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
      


      $sql = "SELECT * from  transactions where user_id = '$user_id' and transaction_type = 'Withdrawal' order by id desc"; 
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="table-responsive">
                                <table id="OthersTable" class="table table-hover ">
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
      


      $sql = "SELECT * from  transactions where user_id = '$user_id' order by id desc"; 
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
            </div>
        </div>
    </div>
           
            <!-- Footer -->
            <?php
     require "footer.php";
?>
