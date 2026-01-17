<?php

require "header.php";
$msg = "";
$sql = "SELECT *  From members where is_admin = '0' ";
$type = "all";


if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "active":
      $sql = "SELECT * FROM members where deleted = '0' and is_admin = '0' order by id desc";
      $type = "active";
      break;
    case "deactive":
      $sql = "SELECT * FROM members where deleted = '1' and is_admin = '0' order by id desc";
      $type = "deactive";
      break;
    default:
      $sql = "SELECT * FROM members where is_admin = '0' order by id desc";
      $type = "all";
     
  }



}

if(isset($_POST['delete_user'])){
  $id = $_POST['id'];
  
  $sql_0 = "DELETE FROM  members where id = '$id' ";
  
  $result_0 = mysqli_query($con,$sql_0) or die("Cant delete ".mysqli_error($con));
  if($result_0){
  
  $msg = '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
  }else{
  $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
  }
  
  }

?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
                    <div class="row">
                        </div>
                        <div class="row container mx-5">
      <div class="col-md-8"><?php echo $msg ?></div>
    </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <!-- End row-->
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $type ?> Accounts</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                    <th>S/N</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    
                                                    <th>Balance</th>
                                                    <th>Status</th>
                                                    <th>Referral</th>
                                                    <th>View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    <?php  

$sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
  $username = $row['username'];
  $email = $row['email'];
  $referred_by = $row['referred_by'];
  $date = $row['date'];
  $balance =  $row['balance'];
  $ref_balance  = $row['referral_balance'];
  $id = $row['id'];
  $bitcoin_wallet = $row['bitcoin_wallet'];
  $etherum_wallet = $row['etherum_wallet'];
  $running_invest = $row['running_invest'];
   $active = $row['deleted'];

  # code...
  if($active == 0){
   $status_widget = '<span class="badge badge-success text-light">Active</span>';
  }else{
   $status_widget = '<span class="badge badge-warning text-light">Inactive</span>';

  }


?>
     <tr>
       <td><?php echo $sn++; ?></td>
       <td><?php echo $username; ?></td>
       <td><?php echo $email; ?></td>
      
       <td>$<?php echo round($balance,3); ?></td>
       <td><?php echo $status_widget; ?></td>
       
       <td><?php echo $referred_by; ?></td>
       
          <td>
          <a class="btn  btn-primary " href="user_details.php?v=<?php echo $id   ?>">View</a>
          </td>
       <td> 
     </tr>

               <?php  }  ?>

                                                       
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