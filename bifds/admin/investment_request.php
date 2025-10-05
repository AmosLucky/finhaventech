<?php
include 'admin_head.php';
$msg ="";


//$id = $_GET['d'];

if(isset($_POST['delete'])){
  $id = $_POST['id'];

  $sql = "DELETE FROM transactions where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE DELETED</div>';
         }

}





if(isset($_POST['approve'])){
  $user_id = $_POST['user_id'];
  $id = $_POST['id'];

    $sql = "select * from transactions where id = '$id'";
    $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
   if($result){
    while ($row = mysqli_fetch_array($result)) {
      $amount = $row['amount'];
      $status = $row['status'];
      # code...
    }
    /////////////////////////////////////////////////////

    if($status == "pendding" || $status == "pending"){
  

    $sql = "select running_invest,paid, referred_by,num_of_days from members where id = '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
   if($result){
    while ($row = mysqli_fetch_array($result)) {
      $running_invest = $row['running_invest'];
      $paid = $row['paid'];
      $referer = $row['referred_by'];
      $num_of_days = $row['num_of_days'];
      # code...
    }
//////////////////////////////////////////////// when user has not paid //////////
    if($paid == false){
       $sql = "select referral_balance,id from members where username = '$referer'";
    $result1 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
   $num = mysqli_num_rows($result1);
   if($num==1){
    //////////////////////// updating payeee  to paid member

     $sql = "UPDATE members set  paid = true where id = '$user_id'";
    $result2 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
    

    if($result1){

      ///////////// get referrers details ///////////
    while ($row = mysqli_fetch_array($result1)) {
      $referral_balance = $row['referral_balance'];
      $referral_id = $row['id'];
      //$referer = $row['referred_by'];
      # code...
    }
    //////////////// add to his referral amount /////////
    $ten_percent = 0.1 * ($amount);
    $new_referral_balance = floatval($referral_balance) + $ten_percent; 
    $sql = "UPDATE members set  referral_balance = '$new_referral_balance', balance = balance + '$ten_percent' where id = '$referral_id'";
    $result3 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));

    }

   }
 }
    //////////////////////////////end //////////
    $new_running_invest = floatval($running_invest) + floatval($amount);

   if($num_of_days == 0){
     $sql = "UPDATE members set  running_invest = '$new_running_invest', num_of_days = 1 where id = '$user_id'";
   }else{
     $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
   }
$result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
   if($result){
    $sql = "UPDATE transactions set status  = 'approved' where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
   if($result){
    $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY TRANSACTION</div>';
  }

   }




            
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
         }

       
     }else{
            $msg = '<div class="alert alert-danger text-center"> TRANSACTION HAD BEEN ALREADY Approved</div>';
         }

   }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
         }

   }


?>








<div class="container">
   <?php

 if(isset($_POST['delete']) || isset($_POST['approve'])){ ?>
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    <?php } ?>
	  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Investment Request</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
   
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>wallet type</th>
        <th>status </th>
        <th>amount</th>
        <th>investment date</th>
       
      </tr>
    </thead>
    <tfoot>
       <tr>
        <th>S/N</th>
        <th>username</th>
        <th>wallet type</th>
        <th>status </th>
        <th>amount</th>
        <th>investment date</th>
       
      </tr>
    </tfoot>
    <tbody>
     <?php  

     $sql = "select * from transactions order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select transactions ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
     	$username = $row['user_name'];
     	$wallet_type = $row['wallet_type'];
     	$status = $row['status'];
     	$amount =  $row['amount'];
     	$invest_date  = $row['invest_date'];
     	$id = $row['id'];
      $user_id = $row['user_id'];
     	
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $wallet_type; ?></td>
         <td><?php echo $status; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $invest_date; ?></td>
         
        <td> 
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#approveModal<?php echo $id ?>"> 
            <i class="fa fa-check" aria-hidden="true"></i>
           </button>

         
            <!-- Modal -->
  <div class="modal fade" id="approveModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Approve?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to approve this investment, Aproval Can't be reversed</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
          <button class="btn btn-info" type="submit"  name="approve">Confirm  inestment</button>
          </form>
        </div>
      </div>
    </div>
  </div>

          




        </td>
        <td>
        	<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal<?php echo $id ?>"> 
            <i class="fa fa-trash" aria-hidden="true"></i>
           </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DELETE?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete this Investment, Delete Can't be reversed</p>
        </div>
        <div class="modal-footer">
         
            
        
          <button type="button" name="delete" class="btn btn-default" data-dismiss="modal">Close</button>
           
        </div>
        <div class="modal-footer">
          <form method="POST">
             <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <button class="btn btn-danger" name="delete" type="submit">Confirm Delete Investment</button>

          </form>
        </div>
      </div>
    </div>
  </div>

        	

        	</td>
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>



<?php
include 'admin_footer.php';


?>