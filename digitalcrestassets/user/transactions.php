<?php
require 'header.php';

?>
	

        <!--**********************************
            Sidebar start
        ***********************************-->

        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body mt-5">
			<div class="container-fluid">
				<div class="form-head d-flex align-items-center flex-wrap mb-3">
					<h2 class="font-w600 mb-0 text-black">Transactions</h2>
					<a href="javascript:void(0);" class="btn btn-outline-secondary ml-auto"><i class="las la-calendar scale5 mr-2"></i>Filter Periode</a>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive market-values">
									<table class="table table-bordered table-hover table-striped text-nowrap mb-0 tx-13" >
										<thead>
											<tr>
												<th>S/N</th>
												<th>Date</th>
										
										
										<th>Amount</th>
										<th>Transaction Type</th>
										
										<th>Status</th>
										 <!-- <th>Wallet</th> -->
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
       

       <?php
       require 'footer.php';


       ?>