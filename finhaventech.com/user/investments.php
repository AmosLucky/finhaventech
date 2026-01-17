<?php

require "header.php";

?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

        
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
                        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                   <tr>
                                        <th>S/N</th>
										<th>Plan</th>
										
										
										<th>Amount</th>
											<th>Return</th>
										<th>Received</th>
										
										<th>Next Payment</th>
                                        </tr>
                    </thead>
                    <tbody>
                                        
                    
                      <?php
      


      $sql = "SELECT * from  investments where user_id = '$user_id'  order by id desc"; 
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;
      function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%ad: %hh, %im %ss');
}
      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $plan_id = $row['plan_id'];
        $amount = $row['amount'];
        //$type = $row['transaction_type'];
        //$wallet = $row['wallet_type'];
        $status =  $row['status'];
         $plan_name =  $row['plan_name'];
         $profit =  $row['profit'];
          $capital_running_hours =  $row['capital_running_hours'];
          
         
          $plan_sql ="SELECT  * FROM investment_plans WHERE id = '$plan_id'";
          $plan_exec = mysqli_query($con,$plan_sql) or die( mysqli_error($con));
          $plan = mysqli_fetch_assoc($plan_exec);
          $daily_profit = $plan['daily_profit'];
          $amount_to_recieve = ($daily_profit/100) * ($amount);
         
      

      ?>
											<tr class="border-bottom">
												<td><?php  echo $sn ?></td>
												<td><?php  echo $plan_name ?></td>
												<td>$<?php  echo number_format($amount,2) ?></td>
												<td class="text-red">$<?php  echo number_format($amount_to_recieve,2) ?> daily + capital</td>
												<td class="text-right">$<?php  echo number_format($profit,2) ?></td>
												 <td><?php  if($row['active']){
												     echo secondsToTime(86400 - ($capital_running_hours * 3600));
												 }else{
												     echo "<div class='badge badge-success bg-success'>Completed</div>";
												 } ?></td>
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

    <div class="flex-grow-1"></div>

   <?php

   require "footer.php";

   ?>