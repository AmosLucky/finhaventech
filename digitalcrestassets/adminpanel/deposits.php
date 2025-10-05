<?php

require "header.php";

$msg = "";


if(isset($_POST['d'])){
  $id = $_POST['id'];
  $user_id = $_POST['user_id'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  if($status == "approved" ){
  $sql1 = "UPDATE members set balance = balance - '$amount' where id = '$user_id' ";
  $rs = mysqli_query($con,$sql1) or die(mysqli_error($con));
  if($rs){
  $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }
}
  }else{
    $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }

  }
}


$sql = "SELECT * FROM transactions where transaction_type = 'Deposit' order by id desc ";

$type = "all";

if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "completed":
      $sql = "SELECT * FROM transactions where transaction_type = 'Deposit' and status ='approved' order by id desc";
      $type = "completed";
      break;
    case "pending":
      $sql = "SELECT * FROM transactions where transaction_type = 'Deposit' and status ='pending' order by id desc";
      $type = "pending";
      break;
    default:
    $sql = "SELECT * FROM transactions where transaction_type = 'Deposit' order by id desc ";

      $type = "all";
     
  }



}


?>

                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                    <?php echo $msg ?>

                        <!-- Page-Title -->
                        
<div class="row">
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <!-- End row-->
                        
                        <!-- VIEW TRANSACTION MODAL-->
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $type ?> Deposits</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Sender</th>
                                                            <th>Amount</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th>View/Delete</th>
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


                  ?>
                <tr>
                  <td><?php  echo $sn ?></td>
                  <td><?php  echo $user ?></td>
                  <td>$<?php  echo number_format($amount) ?></td>
                  <td><?php  echo $date ?></td>
                  <td><?php  echo $status ?></td>
                  <td style="display:flex">
                    <a href="view_deposit.php?t_id=<?php echo $id ?>"><button class="btn btn-sm btn-primary btn-custom ">View</button></a>
                    
                    
                    <form method="POST">
                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                    <input type="hidden" name="status" value="<?php echo $status ?>">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                      <button type="submit" name="d" class="btn btn-sm btn-pink btn-custom ">Delete</button>

                    </form>
                  </td>
                </tr>

                

               
                <?php } ?>
                </tbody>

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

                <?php require "footer.php"; ?>