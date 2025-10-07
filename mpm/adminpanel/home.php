<?php 

include 'header.php';
$msg = "";



// if(isset($_POST['suspend'])){

//   $id = $_POST['id'];
//   $reason = $_POST['suspend'];
//   $sql = "UPDATE members set is_suspended = '1', suspension_reason = '$reason' where id = '$id' ";
//   $result = mysqli_query($con,$sql);
//   if( $result){
//     $msg = '<div class="alert alert-success">Successfully suspended</div>';
//   }else{
//    $msg = '<div class="alert alert-danger">Failed</div>';

//   }
// }

//$sql = "SELECT * FROM company ";
$company_name = "";
$company_email = "";
$company_phone = "";
$company_address = "";
$domain =  "";
$com_id = 1;






if(isset($_POST['update'])){
   $company_name = $_POST['company_name'];
$company_email = $_POST['company_email'];
$company_phone = $_POST['company_phone'];
$company_address = $_POST['company_address'];
 //$company_eth_address =  $post['company_eth_address'];
 //$company_btc_address = $post['company_btc_address']; 
 $domain = $_POST['domain']; 
 $id = $_POST['id']; 
 $company_title = $_POST['company_title'];
   $company_contact_widget = mysqli_real_escape_string($con,$_POST['company_contact_widget']);

   if(strlen($company_contact_widget)>10){
                              $query = "UPDATE company set company_name = '$company_name',
                               company_email = '$company_email', 
                               company_phone = '$company_phone',
                               company_address = '$company_address',
                               domain = '$domain',
                               company_title = '$company_title',
                               company_contact_widget = '$company_contact_widget'
                                where id = '$id'";

                              }else{

                                $query = "UPDATE company set company_name = '$company_name',
                               company_email = '$company_email', 
                               company_phone = '$company_phone',
                               company_address = '$company_address',
                               domain = '$domain',
                               company_title = '$company_title'
                                where id = '$id'";

                              }

 

  $result =  mysqli_query($con,$query) or die(mysqli_error($con));
  if($result){
    $msg = '<div class="alert alert-success text-center">Sucessfully Saved</div>';

  } else{
    echo mysqli_error($con);
    $msg = '<div class="alert alert-danger text-center">Failed</div>';

  }                            

}


$sql = "SELECT * FROM company where id = '$com_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);


while ($row = mysqli_fetch_array($result)) {


 $company_name = $row['company_name'];
$company_email = $row['company_email'];
$company_phone = $row['company_phone'];
$company_address = $row['company_address'];
 $company_eth_address =  $row['company_eth_address'];
 $company_btc_address = $row['company_btc_address']; 
 $domain = $row['domain']; 
  $id = $row['id']; 

   $company_title = $row['company_title'];
   $company_contact_widget = $row['company_contact_widget'];

    # code...
}

$sql = "SELECT * FROM members where id = '$admin_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);
$admin_username = "";
$admin_passord = "";


while ($row = mysqli_fetch_array($result)) {
  $admin_username = $row['username'];
  $admin_passord = $row['password'];
}

//echo "<h1>_________________".$admin_passord."</h1>";


if(isset($_POST['update_password'])){
  $new_password = $_POST['new_password'];
  $c_new_password  = $_POST['c_new_password'];
  $current_password  = $_POST['password'];

  if(strlen($new_password) > 5){

  if($new_password == $c_new_password){
    if($admin_passord == $current_password){
      $sql_ = "UPDATE members set password = '$new_password' where id = '$admin_id'";
      $result =  mysqli_query($con,$sql_) or mysqli_error($con);
      if($result){
        //$admin_passord = $_POST['new_password'];
        $msg = '<div class="alert alert-success text-center"> Password successfully changed</div>';
        

        ?>
        <script>
        var delayInMilliseconds = 1000;

        setTimeout(function() {
          window.location.href = 'logout.php';
          
        }, delayInMilliseconds);
             </script>

             <?php
       

      }else{
        $msg = '<div class="alert alert-danger text-center"> operation faild</div>';


      }


    }else{
      $msg = '<div class="alert alert-danger text-center"> Current password is incorrect</div>';

    }

  }else{

    $msg = '<div class="alert alert-danger text-center"> Password does not match confirmation</div>';

  }
}else{
  $msg = '<div class="alert alert-danger text-center"> Password must be greater than 5 charaters</div>';


}

}


/////////////SELECT ALL TRANSACTIONS/////
$all_users = 0;
$all_deposit = 0;
$all_withdrawal = 0;
$system_balance = 0;

$verified_deposit = 0;
$pending_deposit = 0;
$pending_withdrawal = 0;
$total_bonus = 0;


$sql = "SELECT * FROM transactions ";
$result =  mysqli_query($con,$sql) or mysqli_error($con);



while ($row = mysqli_fetch_array($result)) {
  $status = $row['status'];
  $amount = $row['amount'];
  $transaction_type = $row['transaction_type'];
  if($transaction_type == 'Withdrawal'){
    $all_withdrawal += $amount;
    if($status == "pending"){
      $pending_withdrawal += $amount;

    }else if($status == "approved"){
      //$pending_deposit += $amount;

    }

  }else if($transaction_type == 'Investment'){
    $all_deposit += $amount;

    if($status == "pending"){
      $pending_deposit += $amount;

    }else if($status == "approved"){
      $verified_deposit += $amount;

    }


  }else if($transaction_type == 'Bonus'){
    $total_bonus += $amount;

  }
  
  // else if($status == 'Withdrawal'){

  // }

//   $sql = "SELECT * FROM requests ";
// $result =  mysqli_query($con,$sql) or mysqli_error($con);



// while ($row = mysqli_fetch_array($result)) {
//   $status = $row['status'];
//   $amount = $row['amount'];
//   $all_withdrawal += $amount;

//   if($status == "pending"){
//     $pending_withdrawal += $amount;
//   }

// }
  
}

/////////////SELECT ALL MEMEBERS/////


            
$sql_1 = "SELECT * from members";

$res = mysqli_query($con,$sql_1) or die("cant select members ".mysqli_error($con)); 

$system_balance = ($all_deposit - $all_withdrawal);


?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                    <?php echo  $msg ?>

                        <!-- Page-Title -->
                        
                    <div class="row">
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <!-- End row-->
                        <div class="row">
                            
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="fa fa-users"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo number_format(mysqli_num_rows($res)) ?></span>
                                        Total Users
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Active Users <span class="pull-right"><?php echo number_format(mysqli_num_rows($res)) ?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">$<?php echo number_format(($all_deposit)) ?></span>
                                        Total Deposit
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-warning"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">$<?php echo number_format(($all_withdrawal)) ?></span>
                                        Total Withdrawal
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-info"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">$ <?php echo number_format(($system_balance)) ?></span>
                                        System Balance
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row d-none">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Transaction Summary</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center text-primary">24 Hours</th>
                                                            <th class="text-center text-primary">7 days</th>
                                                            <th class="text-center text-primary">Last Month</th>
                                                            <th class="text-center text-primary">Year</th>
                                                            <th class="text-center text-primary">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td >$ 0.00 <span style="float: right;">$ 0.00</span></td>
                                                            <td >$ 0.00 <span style="float: right;">$ 0.00</span></td>
                                                            <td >$ 100.00 <span style="float: right;">$ 0.00</span></td>
                                                            <td >$ 790.5 K <span style="float: right;">$ 149.8 K</span></td>
                                                            <td>$ 790.5 K <span style="float: right;">$ 149.8 K</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center text-primary"><b>$ 0.00</b></td>
                                                            <td class="text-center text-primary"><b>$ 0.00</b></td>
                                                            <td class="text-center text-primary"><b>$ 100.00</b></td>
                                                            <td class="text-center text-primary"><b>$ 640.7 K</b></td>
                                                            <td class="text-center text-primary"><b>$ 640.7 K</b></td>
                                                        </tr>
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
                        
                        
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo number_format($verified_deposit)  ?></span>
                                        Verified Deposit
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-warning"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">$<?php echo number_format($pending_deposit)  ?></span>
                                        Pending Deposit
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">$<?php echo number_format($pending_withdrawal)  ?></span>
                                        Pen. Withdrawal
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">$ <?php echo number_format($total_bonus)  ?></span>
                                        Total Bonus
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right">0.0000</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Update Company Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-xl-6">
                                            <div class="form-group">
                                                <label >Name</label>
                                                <input class="form-control" name="company_name" type="text" value="<?php echo $company_name ?>">
                                            </div>
                                                <div class="form-group">
                                                <label >Address</label>
                                                <textarea class="form-control" name="company_address"><?php echo $company_address ?></textarea>
                                            </div>
                                            </div>
                                            <div class="col-xl-6">
                                            
                                            <div class="form-group">
                                                <label >Email Address</label>
                                                <input class="form-control" name="company_email" type="text" value="<?php echo $company_email ?>">
                                            </div>
                                                <div class="form-group">
                                                <label >Phone Number</label>
                                                <input class="form-control" name="company_phone" type="text" value="<?php echo $company_phone ?>">
                                            </div>
                                            </div>
                                                <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Bitcoin</label>
                                                <input type="text" class="form-control" name="btc" placeholder="Bitcoin Address" value="">
                                            </div>
                                            </div>
                                            
                                            
                                                
                                                <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Ethereum</label>
                                                <input type="text" class="form-control" name="eth" placeholder="Ethereum Address" value="ETHEREUM ADDRESS">
                                            </div>
                                            </div>
                                                
                                                
                                                
                                            <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Minimum Withdrawal</label>
                                                <input type="text" class="form-control" name="min_with" placeholder="Minimum Withdrawal" value="0">
                                            </div>
                                            </div>
                                                
                                                <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Maximum Withdrawal</label>
                                                <input type="text" class="form-control" name="max_with" placeholder="Maximum Withdrawal" value="2000000">
                                            </div>
                                            </div>
                                                
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Change Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                        <input type="hidden" name="id" value="1">
                                            <div class="form-group">
                                                <label >Username</label>
                                                <input class="form-control" name="username"  type="text" value="<?php echo $admin_username ?>">
                                            </div>
                                            <div class="form-group">
                                                <label >Current Password</label> <em class="text-warning" style="font-size: 0.8rem;"> </em>
                                                <input class="form-control"  name="password" type="password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label >New Password</label> <em class="text-warning" style="font-size: 0.8rem;"> </em>
                                                <input class="form-control" name="new_password" type="password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Retype New Password</label>
                                                <input type="password" name="c_new_password" value="" class="form-control">
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>


                         <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

              <?php


require "footer.php";
              
              ?>