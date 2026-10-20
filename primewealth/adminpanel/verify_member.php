<?php

require "header.php";
$msg = "";
$sql = "SELECT *  From members where is_verified = '2' ";
$type = "all";


if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "active":
      $sql = "SELECT * FROM members where active = '1' and is_admin = '0' order by id desc";
      $type = "active";
      break;
    case "deactive":
      $sql = "SELECT * FROM members where deleted = '1' and is_admin = '0' order by id desc";
      $type = "deactive";
      break;
    default:
      $sql = "SELECT *  From members where is_verified = '2' ";
      $type = "all";
     
  }



}

if(isset($_POST['decline'])){
  $id = $_POST['id'];
  
  $sql_0 = "UPDATE  members SET  is_verified = '1' where id = '$id'";
  
  $result_0 = mysqli_query($con,$sql_0) or die("Cant delete ".mysqli_error($con));
  if($result_0){
  
  $msg = '<div class="alert alert-success text-center">SUCCESSFULLY Declined</div>';
  }else{
  $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE Declined</div>';
  }
  
  }

  if(isset($_POST['approve'])){
    $id = $_POST['id'];
    
    $sql_0 = "UPDATE  members SET  is_verified = '3' where id = '$id'";
    
    $result_0 = mysqli_query($con,$sql_0) or die("Cant delete ".mysqli_error($con));
    if($result_0){
    
    $msg = '<div class="alert alert-success text-center">SUCCESSFULLY Approved</div>';
    }else{
    $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE Approved</div>';
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
                                        <h3 class="card-title text-white">Pending verifications</h3>
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
                                                    <th>Approve</th>
                                                    <th>decline</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    <?php  

$sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
  $username = $row['username'];
  $email = $row['email'];
  $image = $row['profile_pic'];
  $referred_by = $row['referred_by'];
  $date = $row['date'];
  $balance =  $row['balance'];
  $ref_balance  = $row['referral_balance'];
  $id = $row['id'];
  $bitcoin_wallet = $row['bitcoin_wallet'];
  $etherum_wallet = $row['etherum_wallet'];
  $running_invest = $row['running_invest'];
  $active = $row['active'];

  # code...
  if($active = "1"){
   $status_widget = '<span class="badge badge-success text-light">Active</span>';
  }else{
   $status_widget = '<span class="badge badge-warnign text-light">Deactive</span>';

  }


?>
     <tr>
       <td><?php echo $sn++; ?></td>
       <td><img src= "../uploads/<?php echo $image ?>" height="150"/></td>
       <td><?php echo $username; ?></td>
       <td><?php echo $email; ?></td>
      
       <td>$<?php echo round($balance,3); ?></td>
       <td>
        <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id   ?>"/>
            <input type="submit" value="approve" name="approve" class="btn btn-success" />

        </form>
       </td>
       <td>
       <form method="POST">
       <input type="hidden" name="id" value="<?php echo $id   ?>"/>
            <input type="submit" value="decline" name="decline" class="btn btn-danger" />

        </form>
        </td>
      
          
        
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