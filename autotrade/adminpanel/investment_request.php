<?php

require "header.php";

$msg = "";


// if(isset($_GET['d'])){
//   $id = $_GET['d'];
//   $sql = "DELETE FROM transactions where id = '$id'";
//   $result = mysqli_query($con,$sql);
//   if($result){
//     $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
//   }
// }

if(isset($_POST['decline'])){
  $id = $_POST['id'];

  $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }else{

    $msg = '<div class="alert alert-danger">Error occoured</div>';

  }
       

}

if(isset($_POST['decline2'])){
  $id = $_POST['id'];
  

  //$wallet = $_POST['wallet'];
  $user_id = $_POST['user_id'];
  ///$user_name = $_POST['username'];
  $amount = $_POST['amount'];

  $sql = "SELECT balance from members where id = '$user_id'";
    $result0 = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));
    if($result0){

      while ($row = mysqli_fetch_array($result0)) {
     $balance = $row['balance'];
      # code...
    }
     $new_balance = $balance + $amount;
     $sql = "UPDATE members set balance = '$new_balance' where id = '$user_id'";
     $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));

        if($result){


          $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }
          


        }

    }else{
      $msg = '<div class="alert alert-danger">User not found</div>';
    }

  

 
     

}


$sql = "SELECT * FROM transactions where transaction_type = 'Investment'  order by id desc ";
$type = "all";

if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "completed":
      $sql = "SELECT * FROM transactions where transaction_type = 'Investment' and status ='approved' order by id desc";
      $type = "completed";
      break;
    case "pending":
      $sql = "SELECT * FROM transactions where transaction_type = 'Investment' and status ='pending' order by id desc";
      $type = "pending";
      break;
    default:
    $sql = "SELECT * FROM transactions where transaction_type = 'Investment' order by id desc ";

      $type = "all";
     
  }



}


?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        
                        <!-- End row-->
                        <div class="row">
                        <?php echo $msg ?>
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $type ?> Investments</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                <tr>
                  <th>S/N</th>
                  <th>Sender</th>
                  <th>Amount</th>
                  <th>status</th>
                  <th>Time</th>
                  <th>View / Delete</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                  $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));


$sn = 0;
while ($row = mysqli_fetch_array($result)) {

  $sn++;
  $user = "";

  # code...
  $date = $row['invest_date'];
  $amount = $row['amount'];
  //$type = $row['transaction_type'];
  $wallet = $row['wallet_type'];
  $status =  $row['status'];
  $user_id =  $row['user_id'];
  $id = $row['id'];

  $sql1 = "SELECT username from members where id = '$user_id'";
  $result1 = mysqli_query($con,$sql1)  or die("Error getting transactions ".mysqli_error($con));
  while ( $row1 = mysqli_fetch_array($result1)) {
    $user = $row1['username'];
    # code...
  }

  if($status == "approved"){
    $status_widget = '<span class="badge badge-success ">approved</span>';
   }else{
    $status_widget = '<span class="badge badge-warning">pending</span>';

   }


                  ?>
                <tr>
                  <td><?php  echo $sn ?></td>
                  <td><?php  echo $user ?></td>
                  <td>$<?php  echo number_format($amount) ?></td>
                  <td><?php  echo  $status_widget ?></td>
                  <td><?php  echo $date ?></th>
                  <td style="display:flex">
                    <a href="view_investment.php?t_id=<?php echo $id ?>"><button class="btn btn-primary" style="margin-right:3px">View</button></a>
                    <form method="POST">
                      <input type="hidden" name="id" value="<?php echo $id ?>" >
                      <input type="hidden" name="status" value="<?php echo $status ?>" >
                      <input type="hidden" name="user_id" value="<?php echo $user_id ?>" >
                      <input type="hidden" name="amount" value="<?php echo $amount ?>" >
                      

                    <button class="btn btn-danger" type="submit" name="decline">Delete</button>

                    </form>
                   
                  </td>
                </tr>

                

               
                <?php } ?>
                </tbody>
                <tfoot>

                <tr>
                  <th>S/N</th>
                  <th>Sender</th>
                  <th>Amount</th>
                  <th>Time</th>
                  <th>View / Delete</th>
                </tr>

                
                </tfoot>
                                                </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- CHAT -->
                            <!-- end col-->


                            <!-- TODOs -->
                             <!-- end col -->
                        </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

               <?php

               require "footer.php";
               
               ?>