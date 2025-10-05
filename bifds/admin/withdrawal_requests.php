<?php
include 'admin_head.php';
if(isset($_POST['decline'])){
  $id = $_POST['id'];
  

  $sql = "DELETE FROM requests where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DECILEND</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DECILEND</div>';
         }

}



if(isset($_POST['approve'])){
  $id = $_POST['id'];
  $approved_date = date(" D d M h:m");

  $sql = "SELECT * FROM requests where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){
    while ($row = mysqli_fetch_array($result)) {
       $user_id = $row['user_id'];
       $user_name = $row['user_name'];
       $amount = $row['amount'];
       $status = $row['status'];
      # code...
       $wallet = $row['address_type'];
    }
   if($status == "approved"){
     $msg =  '<div class="alert alert-danger text-center">THIS REQUEST HAS ALREADY BEEN APPROVED</div>';


   }else{
   

     $sql1 = "UPDATE members set balance = balance - '$amount' where id = '$user_id'";
     $result1 = mysqli_query($con,$sql1) or die("Cant delete ".mysqli_error($con));
     if($result1){
     
       $sql2 = "UPDATE requests set status = 'approved' where id = '$id'";
     $result2 = mysqli_query($con,$sql2) or die("Cant delete ".mysqli_error($con));

     if($result2){
       $msg = '<div class="alert alert-success text-center"> SUCCESSFULLY APPROVED</div>';

       $sql3 = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type)
        value(
        '$user_id',
        '$user_name',
        '$amount',
        '$wallet',
        'successful',
        '$approved_date',
        'withdrawal'

      )";
  $result4 = mysqli_query($con,$sql3) or die("Can not submit ".mysqli_error($con));

     }

     }

   }

           
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE Approved</div>';
         }

}

?>




<div class="container">
   <?php

 if(isset($_POST['decline']) || isset($_POST['approve'])){ ?>
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    <?php } ?>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Withdrawal Request</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
    
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>request date</th>
        <th> Status</th>
        <th> Amount</th>

        <th>balance</th>
        <th> wallet address</th>
        <th>wallet type</th>
        
        
      </tr>
    </thead>
      <tfoot>
    
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>request date</th>
        <th> Status</th>
        <th> Amount</th>

        <th>balance</th>
        <th> wallet address</th>
        <th>wallet type</th>
        
        
      </tr>
    </tfoot>
    <tbody>
     <?php  

     $sql = "select * from requests";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
      $username = $row['user_name'];
     
      $request_date = $row['request_date'];
      $balance =  $row['balance'];
      $status  = $row['status'];
      $id = $row['id'];
      $user_id = $row['user_id'];
      $amount = $row['amount'];
      $wallet_address = $row['address'];
       $address_type = $row['address_type'];
     // $running_invest = $row['running_invest'];
      # code...
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $request_date; ?></td>
         <td><?php echo $status; ?></td>
         <td><?php echo $amount; ?></td>
        <td><?php echo  $balance; ?></td>
         <td><input id="address<?php echo $id ?>" type="text" name="" class="form-control" value="<?php echo $wallet_address; ?>" style="width: 100px">
          <br>
      <i class="fa fa-fax" aria-hidden="true" type="button" id="copy<?php echo $id ?>"></i>

         </td>
         <td><?php echo $address_type; ?></td>
        
         
        <td> 
          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal1<?php echo $id ?>"> 
             <i class="fa fa-check" aria-hidden="true"></i>
           </button>

        

<!--         ////////////////////////// aprooves //////////////////////
 -->

  <!-- Modal -->
  <div class="modal fade" id="myModal1<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Approve</h4>
        </div>
        <div class="modal-body">
          <p>You are about to Approve this Request</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
        <button name="approve" type="submit" class="btn btn-info">Confirm Approve Request</button>
            </form>
        </div>
      </div>
    </div>
  </div>



 <!-- /////////// end of approval button/////////////////
 -->

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
          <h4 class="modal-title">Decline?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to Decline this Request</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
        <button name="decline" type="submit" class="btn btn-danger">Confirm Decline Request</button>
            </form>
        </div>
      </div>
    </div>
  </div>

          

          </td>
         
      </tr>
      <script type="text/javascript">
  
            
   
     var copyBtn = document.getElementById("copy<?php echo $id ?>");

     copyBtn.addEventListener("click",function () {
       var copyText = document.getElementById("address<?php echo $id ?>");
      //alert("<?php echo $id ?>");
       copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("successfully Copied : " + copyText.value);

       // body...
     });
     


  
     

  
 
 
</script>




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