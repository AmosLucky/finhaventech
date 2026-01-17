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
										<th>Date</th>
										
										
										<th>Amount</th>
										<th>Transaction Type</th>
										
										<th>Status</th>
                                        </tr>
                    </thead>
                    <tbody>
                                        </tbody>
                    <tfoot>
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
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    </div>

    <?php

    require "footer.php";

    ?>