<?php
include 'admin_head.php';
$msg ="";


//$id = $_GET['d'];

// if(isset($_POST['delete'])){
//   $id = $_POST['id'];

//   $sql = "DELETE FROM transactions where id = '$id'";
// $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
//    if($result){

//             $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
//          }else{
//             $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE DELETED</div>';
//          }

// }





if(isset($_POST['add_profit'])){
 $running_invest = $_POST['running_invest'];
  $id = $_POST['id'];
  $num_of_days = $_POST['num_of_days'];
  $one_day = 1;
  $user = $_POST['username']; 
  $profit = $_POST['profit']; ;

    $daily_profit =  $running_invest *  0.1;

  switch ($num_of_days) {

    case "0":
              $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit</div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;

      case "1":
       $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       case "2":
        $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       case "3":
        $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       case "4":
        $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       


       case "5":
            // $sql1 = "UPDATE members SET balance = balance + '$running_invest' WHERE id = '$id'";
            // $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
            ////
            $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));

             $sql2 = "UPDATE members SET 
             num_of_days =  '0',
            running_invest =  '0',
            profit =  '0'  WHERE id = '$id'";

            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));


             

              


            if( $result2 && $result3){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;
    
    default:
      # code...
      break;
  }
}

    // $sql = "select * from members where id = '$id'";
    // $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));




















    /////////////////////////////////////////////////////////////////////////////////////////////////////////
//    if($result){
//     while ($row = mysqli_fetch_array($result)) {
//       $amount = $row['amount'];
//       $status = $row['status'];
//       # code...
//     }
//     /////////////////////////////////////////////////////

//     if($status == "pendding" || $status == "pending"){
  

//     $sql = "select running_invest,paid, referred_by,num_of_days from members where id = '$user_id'";
//     $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    if($result){
//     while ($row = mysqli_fetch_array($result)) {
//       $running_invest = $row['running_invest'];
//       $paid = $row['paid'];
//       $referer = $row['referred_by'];
//       $num_of_days = $row['num_of_days'];
//       # code...
//     }
// //////////////////////////////////////////////// when user has not paid //////////
//     if($paid == false){
//        $sql = "select referral_balance,id from members where username = '$referer'";
//     $result1 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    $num = mysqli_num_rows($result1);
//    if($num==1){
//     //////////////////////// updating payeee  to paid member

//      $sql = "UPDATE members set  paid = true where id = '$user_id'";
//     $result2 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
    

//     if($result1){

//       ///////////// get referrers details ///////////
//     while ($row = mysqli_fetch_array($result1)) {
//       $referral_balance = $row['referral_balance'];
//       $referral_id = $row['id'];
//       //$referer = $row['referred_by'];
//       # code...
//     }
//     //////////////// add to his referral amount /////////
//     $ten_percent = (10/100) * ($amount);
//     $new_referral_balance = floatval($referral_balance) + $ten_percent; 
//     $sql = "UPDATE members set  referral_balance = '$new_referral_balance' where id = '$referral_id'";
//     $result3 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));

//     }

//    }
//  }
//     //////////////////////////////end //////////
//     $new_running_invest = floatval($running_invest) + floatval($amount);

//    if($num_of_days == 0){
//      $sql = "UPDATE members set  running_invest = '$new_running_invest', num_of_days = 1 where id = '$user_id'";
//    }else{
//      $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
//    }
// $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    if($result){
//     $sql = "UPDATE transactions set status  = 'approved' where id = '$id'";
// $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    if($result){
//     $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY TRANSACTION</div>';
//   }

//    }




            
//          }else{
//             $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
//          }

       
//      }else{
//             $msg = '<div class="alert alert-danger text-center"> TRANSACTION HAD BEEN ALREADY Approved</div>';
//          }

//    }else{
//             $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
//          }

   


?>








<div class="container">
   <?php

 if(isset($_POST['add_profit'])){ ?>
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    <?php } ?>
	
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Investors</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
        <th>username</th>
        <th> balance</th>
        <th>num_of_days </th>
        <th>running_invest</th>
        <th> profit</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <th>S/N</th>
        <th>username</th>
        <th> balance</th>
        <th>num_of_days </th>
        <th>running_invest</th>
        <th> profit</th>
                    
                  </tfoot>
                  
                  <tbody>
     <?php  

     $sql = "select * from members where running_invest > 0 order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select transactions ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
     	$username = $row['username'];
     	$id = $row['id'];
     	$balance = $row['balance'];
     	$num_of_days  = $row['num_of_days'];
     	$profit = $row['profit'];
      $running_invest = $row['running_invest'];
     	
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $balance; ?></td>
        
        <td><?php echo $num_of_days; ?></td>
        <td><?php echo $running_invest; ?></td>
        <td><?php echo $profit; ?></td>
         
        <td> 
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#approveModal<?php echo $id ?>"> Add Profit </button>

         
            <!-- Modal -->
  <div class="modal fade" id="approveModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Profit?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to add  to this profit</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
     <input type="hidden" name="running_invest" value="<?php echo $running_invest ?>">
      <input type="hidden" name="num_of_days" value="<?php echo $num_of_days ?>">
      <input type="hidden" name="username" value="<?php echo $username ?>">
      <input type="hidden" name="profit" value="<?php echo $profit ?>">
          <button class="btn btn-info" type="submit"  name="add_profit">Confirm  increment</button>
          </form>
        </div>
      </div>
    </div>
  </div>

          




        </td>
        <td>
        <!-- 	<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal<?php //echo $id ?>"> DELETE </button> -->

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