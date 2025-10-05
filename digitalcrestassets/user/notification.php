<?php
require 'header.php';

$params = array("seen"=>1);
	 $result = $model->updateTable("members",$params,$user_id);
	//print_r($result);



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
        <div class="content-body">
			<div class="container-fluid">
				<div class="form-head d-flex align-items-center flex-wrap mb-3">
					<h2 class="font-w600 mb-0 text-black">Notifications</h2>
					<a href="javascript:void(0);" class="btn btn-outline-secondary ml-auto"><i class="las la-calendar scale5 mr-2"></i>Filter Periode</a>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive table-hover fs-14">
							<table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example5">
								<thead>
									<!-- <tr>
										<th>
											<div class="checkbox mr-0 align-self-center">
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="custom-control-input" id="checkAll" required="">
													<label class="custom-control-label" for="checkAll"></label>
												</div>
											</div>
										</th>
										<th>Transaction ID</th>
										<th>Date</th>
										
										
										<th>Amount</th>
										<th>Transaction Type</th>
										
										<th>Status</th>
										 <th>Wallet</th>
									</tr> -->
								</thead>
								<tbody>

									  <?php
      


      if(isset($_GET['i'])){
      	$id=$_GET['i'];
      	$sql = "select * from  notifications where id = '$id' order by id desc";
      }else if(isset($_GET['p'])){
      	$sql = "select * from  notifications where user_id = '$user_id' && type = 'personal' order by id desc";
      	$msql = "UPDATE notifications set status = 'seen' where user_id = '$user_id'";
      	mysqli_query($con,$msql);

      }
      else{
      	$sql = "select * from  notifications where type = 'general' order by id desc";

      }
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
         $date = $row['post_date'];
         $title = $row['title'];
         $body = $row['body'];


        // $wallet = $row['wallet_type'];
        // $status =  $row['status'];
//          $id = $row['id'];
//       $notifications = $model->selectFromTable("notifications");
// $notifications = $notifications['msg'];

//for ($i=0; $i < count($notifications) ; $i++) { 
	//$seen_users = unserialize($row['seen_users']);
//print_r($seen_users);
//if(in_array($user_id,$seen_users)){
	//echo "true";
//}else{
	//$updated_arr = array_push($seen_users, $user_id);
	//print_r($seen_users);
	 //$sterilised_arr = serialize($updated_arr);
	// $params = array("seen_users"=>$sterilised_arr);
	//  $result = $model->updateTable("notifications",$params,$id);
	// print_r($result);


	//echo "false";
//}


	// code...
//}

      ?>
      <div class="container">
      	<div class="card shadow  p-3 m-3">
      		<div class="card-header">
      			<h6>
      				<?=  $title ?>
      			</h6>
      			
      		</div>
      		<div class="card-body">
      			<span>
      				<?=  $body ?>
      			</span>
      			
      		</div>
      		<div class="card-footer">
      			<span>
      				<?=  $date ?>
      			</span>
      			
      		</div>
      		
      	</div>
      	
      </div>


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