<?php

require "header.php";

$msg = "";

if(isset($_POST['delete'])){
$id = $_POST['id'];

$sql = "DELETE FROM  members where id = '$id' ";

$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
if($result){

$msg = '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
}else{
$msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
}

}

if(isset($_POST['deactivate'])){
$id = $_POST['id'];

$sql = "UPDATE members set deleted = '1'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
if($result){

$msg = '<div class="alert alert-success text-center">SUCCESSFULLY DEACTIVATED</div>';
}else{
$msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
}

}

if(isset($_POST['activate'])){
$id = $_POST['id'];
$sql = "UPDATE members set deleted = '0'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
if($result){

$msg = '<div class="alert alert-success text-center">SUCCESSFULLY RESTORED</div>';
}else{
$msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
}

}











if (isset($_POST['update_balance'])) {

    $user_id_1 = intval($_POST['user_id']);

    $referral_balance     = $_POST['referral_balance'];
    $balance              = $_POST['balance'];
    $running_invest        = $_POST['running_invest'];
    $total_withdrawn       = $_POST['total_withdrawn'];
    $total_deposit         = $_POST['total_deposit'];
    $blocked_reward        = $_POST['blocked_reward'];
    $pendding_investment   = $_POST['pendding_investment'];

    /*
     * Update members table
     */
    $sql = "UPDATE members SET
                referral_balance = ?,
                balance = ?,
                running_invest = ?,
                bitcoin_wallet = ?,
                etherum_wallet = ?,
                
                blocked_balance = ?,
               
                pendding_investment = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssssssi",
            $referral_balance,
            $balance,
            $running_invest,
            $total_withdrawn,
            $total_deposit,
            
            $blocked_reward,
            
            $pendding_investment,
            $user_id_1
        );

        if (mysqli_stmt_execute($stmt)) {

            $msg = '<div class="alert alert-success text-center">
                        Account balances have been updated successfully.
                    </div>';

        } else {

            $msg = '<div class="alert alert-danger text-center">
                        Error updating account balances: ' .
                        htmlspecialchars(mysqli_stmt_error($stmt)) .
                    '</div>';
        }

        mysqli_stmt_close($stmt);

    } else {

        $msg = '<div class="alert alert-danger text-center">
                    Database error: ' .
                    htmlspecialchars(mysqli_error($con)) .
                '</div>';
    }
}



    ////////


    if (isset($_POST['update'])) {

    $user_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    $username    = trim($_POST['username'] ?? '');
    $phonenumber = trim($_POST['phonenumber'] ?? '');
    $email       = trim($_POST['email'] ?? '');
    $state       = trim($_POST['state'] ?? '');
    $new_password = $_POST['password'] ?? '';

    if (!$user_id || $username === '' || $email === '') {

        $msg = '<div class="alert alert-danger">
                    Please provide a valid user ID, username, and email.
                </div>';

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $msg = '<div class="alert alert-danger">
                    Please enter a valid email address.
                </div>';

    } else {

        // Do not change the password unless a new one is supplied.
        if ($new_password !== '') {

            // Use password_hash only if your login system uses
            // password_verify() to check passwords.
            $stored_password = password_hash(
                $new_password,
                PASSWORD_DEFAULT
            );

            $sql = "UPDATE members SET
                        username = ?,
                        phonenumber = ?,
                        password = ?,
                        email = ?,
                        state = ?
                    WHERE id = ?";

            $stmt = mysqli_prepare($con, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param(
                    $stmt,
                    "sssssi",
                    $username,
                    $phonenumber,
                    $stored_password,
                    $email,
                    $state,
                    $user_id
                );
            }

        } else {

            // Keep the existing password unchanged.
            $sql = "UPDATE members SET
                        username = ?,
                        phonenumber = ?,
                        email = ?,
                        state = ?
                    WHERE id = ?";

            $stmt = mysqli_prepare($con, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param(
                    $stmt,
                    "ssssi",
                    $username,
                    $phonenumber,
                    $email,
                    $state,
                    $user_id
                );
            }
        }

        if (!$stmt) {

            $msg = '<div class="alert alert-danger">
                        Database error. Unable to prepare the update.
                    </div>';

        } else {

            if (mysqli_stmt_execute($stmt)) {

                $msg = '<div class="alert alert-success">
                            Profile updated successfully!
                        </div>';

            } else {

                $msg = '<div class="alert alert-danger">
                            Error updating profile. Please try again.
                        </div>';
            }

            mysqli_stmt_close($stmt);
        }
    }
}




if (isset($_POST['update_password'])) {

    $user_id = filter_input(
        INPUT_POST,
        'user_id',
        FILTER_VALIDATE_INT
    );

    $new_password  = $_POST['new_password'] ?? '';
    $new_passwordv = $_POST['new_passwordv'] ?? '';

    if (!$user_id || $new_password === '' || $new_passwordv === '') {

        $msg = '<div class="alert alert-danger">
                    Please fill in both password fields.
                </div>';

    } elseif ($new_password !== $new_passwordv) {

        $msg = '<div class="alert alert-danger">
                    Passwords do not match.
                </div>';

    } elseif (strlen($new_password) < 6) {

        $msg = '<div class="alert alert-danger">
                    Password must be at least 8 characters long.
                </div>';

    } else {

        $hashed_password = password_hash(
            $new_password,
            PASSWORD_DEFAULT
        );

        $sql = "UPDATE members SET password = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {

            mysqli_stmt_bind_param(
                $stmt,
                "si",
                $hashed_password,
                $user_id
            );

            if (mysqli_stmt_execute($stmt)) {

                if (mysqli_stmt_affected_rows($stmt) > 0) {

                    $msg = '<div class="alert alert-success">
                                Password updated successfully.
                            </div>';

                } else {

                    // Affected rows can be zero if the password
                    // was unchanged, so verify that the user exists.
                    $check_sql = "SELECT id FROM members WHERE id = ?";
                    $check_stmt = mysqli_prepare($con, $check_sql);

                    if ($check_stmt) {
                        mysqli_stmt_bind_param(
                            $check_stmt,
                            "i",
                            $user_id
                        );

                        mysqli_stmt_execute($check_stmt);
                        mysqli_stmt_store_result($check_stmt);

                        if (mysqli_stmt_num_rows($check_stmt) > 0) {
                            $msg = '<div class="alert alert-success">
                                        Password updated successfully.
                                    </div>';
                        } else {
                            $msg = '<div class="alert alert-danger">
                                        User not found.
                                    </div>';
                        }

                        mysqli_stmt_close($check_stmt);
                    }
                }

            } else {

                $msg = '<div class="alert alert-danger">
                            Error updating password. Please try again.
                        </div>';
            }

            mysqli_stmt_close($stmt);

        } else {

            $msg = '<div class="alert alert-danger">
                        Database error. Could not prepare the update.
                    </div>';
        }
    }
}







if(isset($_GET['v'])){
$id = $_GET['v'];
$user_id = $_GET['v'];

$sql = "select * from members where id = '$id'";
$result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
$checkuser = mysqli_num_rows($result);
if($checkuser == 1){
while ($row = mysqli_fetch_array($result)) {
$id = $row['id'];
$username =$row['username'];
// $_SESSION['balance'] = $row['balance'];
$email =$row['email'];
$phonenumber = $row['phonenumber'];
$city =$row['city'];
$state =$row['state'];
$gender = $row['gender'];
$profit = $row['profit'];

$referral_balance      = $row['referral_balance'];
$balanace               = $row['balanace'];
$running_invest         = $row['running_invest'];
//$total_withdrawn        = $row['total_withdrawn'];
//$total_deposit          = $row['total_deposit'];
$blocked_reward         = $row['blocked_balance'];
$pendding_investment    = $row['pendding_investment'];


$date =$row['date'];
$active =$row['active'];
if($active == '1'){
$status = "Active";
}else{
$status = "Deactive";

}

$referree= $row['referred_by'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$password = $row['password'];
$balance = $row['balance'];
$ref_balance = $row['referral_balance'];

$bitcoin_wallet = $row['bitcoin_wallet'];
$etherum_wallet = $row['etherum_wallet'];
$running_invest = $row['running_invest'];

$blocked_balance = $row['blocked_balance'];
$msg_title = $row['msg_title'];
$msg1 = $row['msg'];





    ///////

    $total_deposit = 0;
$total_withdrawal = 0;
$total_bonus = 0;


$sql = "SELECT * FROM transactions WHERE id = '$user_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);



while ($row = mysqli_fetch_array($result)) {
  $status = $row['status'];
  $amount = $row['amount'];
  $transaction_type = $row['transaction_type'];
  if($transaction_type == 'Withdrawal'){
    $total_withdrawal += $amount;
    

  }else if($transaction_type == 'Deposit'){
    $total_deposit += $amount;

    


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






if(isset($_POST['update_balance2'])){
    $msg = $_POST['msg'];
    $blocked_balance = $_POST['blocked_balance'];
    $msg_title = $_POST['msg_title'];
    
    
    $block_sql = "UPDATE members SET blocked_balance = '$blocked_balance', msg = '$msg' , msg_title = '$msg_title' WHERE id = '$user_id'";
    $res = mysqli_query($con, $block_sql);
    if($res){
        $msg = "<div class='alert-alert-success'>Success</div>";
        
    }else{
       $error =  mysqli_error($con);
        $msg = "<div class='alert-alert-danger'>Failed  $error</div>";
        
    }
    

}
?>





<!-- Content Wrapper. Contains page content -->

                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                    <?= $msg ?>


                        <!-- Page-Title -->
                        
<div class="row">
                        </div>

        <!-- <div class="row mb-3">
            <div class="container"
                style="display: flex; justify-content: space-between;width:100%">
                <div>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="deactivate"
                            class="btn btn-primary">Deactivate</button>
                    </form>
                </div>
                <div>

                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="activate"
                            class="btn btn-success">Activate</button>
                    </form>

                </div>


            </div>

        </div> -->
        <div>
            <!-- /.row -->

            <div class="row mb-3">
            <div class="container"
                style="display: flex; justify-content: space-between;width:100%">
              

                <div>

                    <!-- <a href="add_bonus.php?v=<?php echo $id ?>&n=<?php echo $username ?>">
                        <button type="submit" name
                            class="btn btn-success">Add Bonus</button>
                    </a> -->

                     <a href="edit_user_features.php?i=<?php echo $id ?>&n=<?php echo $username ?>">
                        <button type="submit" name
                            class="btn btn-info">Add Actions to Account</button>
                    </a>

                    

                </div>
                <div>

<!-- <a href="deduct_account.php?v=<?php echo $id ?>&n=<?php echo $username ?>">
    <button type="submit" name
        class="btn btn-secondary">Deduct Acccount</button>
</a> -->

</div>
                <div>
                    <form method="POST" action="members.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="delete_user"
                            class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>

        </div>
        <div>
            <!---ned -->

            <div class="row mb-3">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head bg-primary "
                            >
                            <div class="card-title text-white"> ACCOUNT INFORMATION
                            </div>
                        </div>
                        <div class="card-body">

                            <form method="POST">

    <input type="hidden" name="id"
           value="<?php echo htmlspecialchars((string)$id); ?>">

    <div class="form-group mb-3">
        <label>Username</label>
        <input type="text" name="username"
               value="<?php echo htmlspecialchars($username); ?>"
               class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Phone number</label>
        <input type="tel" name="phonenumber"
               value="<?php echo htmlspecialchars($phonenumber); ?>"
               class="form-control">
    </div>

    <div class="form-group mb-3">
        <label>New Password</label>
        <input type="" name=""
               class="form-control"
               placeholder="Leave blank to keep current password"
               value="<?php echo htmlspecialchars($password); ?>"
               autocomplete="new-password">
    </div>

    <div class="form-group mb-3">
        <label>Email address</label>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($email); ?>"
               class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Country</label>
        <input type="text" name="state"
               value="<?php echo htmlspecialchars($state); ?>"
               class="form-control"
               placeholder="Enter country">
    </div>

    <div class="form-group mb-3">
        <label>Status</label>
        <input type="text" class="form-control"
               value="<?php echo htmlspecialchars($status); ?>"
               readonly>
    </div>

    <div class="form-group mb-3">
        <label>Created On</label>
        <input type="text" class="form-control"
               value="<?php echo htmlspecialchars($date); ?>"
               readonly>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <button type="submit" name="update"
                class="btn btn-primary">
            Update Profile
        </button>
    </div>

</form>
                            

                        </div>
                    </div>
                </div>

                <!-- /////////////SECOND ROW//////// -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head bg-primary"
                            style=" color: white !important;">
                            <div class="card-title text-white"> TRANSACTION SUMRRY
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <div></div>

                                </div>

                                <!-- <div class="form-group mb-3">
                                    <label>System Balance</label>
                                    <br>
                                    <b>$0</b>

                                </div> -->
                                <div class="form-group mb-3">
                                    <label>Available Balance</label>
                                    <br>
                                    <b>$<?php echo number_format($balance) ?></b>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Deposit</label>
                                    <br>
                                    <b>$<?php echo number_format($total_deposit) ?></b>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Withdrawal</label>
                                    <br>
                                    <b>$<?php echo number_format($total_withdrawal) ?></b>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Bonuses</label>
                                    <br>
                                    <b>$<?php echo number_format($total_withdrawal) ?></b>

                                </div>
                                <!-- <div class="form-group mb-3">
                                    <label>Total Earning</label>
                                    <br>
                                    <b>$0</b>

                                </div> -->

                                <!-- Input Field Ends -->
                                <!-- Input Field Starts -->

                                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="update"
                                        class="btn btn-primary">Update Profile</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div> -->

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- //Row/// -->

            <div class="row">
                <!-- /////////////SECOND ROW//////// -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head bg-primary"
                            style=" color: white !important;">
                            <div class="card-title text-light"> TRANSACTIONS FROM <?php
                                echo $username ?>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered"
                                        id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>

                                            <tr>
                                                <th>S/N</th>
                                                <th>user</th>
                                                <th>amount</th>

                                                <th>Transaction Type</th>
                                                <th>Status</th>

                                                <th>date</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>user</th>
                                                <th>amount</th>

                                                <th>Transaction Type</th>
                                                <th>Status</th>

                                                <th>date</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php

                                            $sql =
                                            "select * from  transactions where user_id = '$user_id' order by id desc";

                                            $result = mysqli_query($con,$sql) or
                                            die("Error getting transactions ".mysqli_error($con));
                                            $sn = 0;
                                            while ($row =
                                            mysqli_fetch_array($result)) {

                                            $sn++;
                                            $user = "";

                                            # code...
                                            $date = $row['invest_date'];
                                            $amount = $row['amount'];
                                            $type = $row['transaction_type'];
                                            $wallet = $row['wallet_type'];
                                            $status = $row['status'];
                                            $user_id = $row['user_id'];
                                            $id = $row['id'];

                                            $sql1 =
                                            "SELECT username from members where id = '$user_id'";
                                            $result1 = mysqli_query($con,$sql1)
                                            or die("Error getting transactions ".mysqli_error($con));
                                            while ( $row1 =
                                            mysqli_fetch_array($result1)) {
                                            $user = $row1['username'];
                                            # code...
                                            }

                                            ?>

                                            <tr>
                                                <td><?php echo $sn ?></td>
                                                <td><?php echo $user ?></td>
                                                <td><?php echo "$".$amount ?></td>
                                                <td><?php echo $type ?></td>
                                                <td><?php echo $status ?></td>
                                                <td><?php echo $wallet ?></td>
                                            </tr>

                                            <?php
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- //// -->
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head bg-primary"
                            style="background-color: ; color: white !important;">
                            <div class="card-title text-light"> ACCOUNT INFORMATION
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input name="user_id" type="hidden" value="<?php echo $user_id ?>">

                                <div class="form-group mb-3">
                                    <label>New Password</label>
                                    <input class="form-control" value
                                        type="text" name="new_password">

                                </div>
                                <div class="form-group mb-3">
                                    <label>Reypr new password</label>
                                    <input type="text" name="new_passwordv"
                                        value
                                        class="form-control" placeholder>

                                </div>

                                <!-- Input Field Ends -->
                                <!-- Input Field Starts -->

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="update_password"
                                        class="btn btn-primary">Update Password</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>




                <!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
                 
<div class="col-xl-6">
    <div class="card custom-card">

        <div class="card-header justify-content-between blue-head bg-primary"
             style="color: white !important;">
            <div class="card-title text-light">
                ACCOUNT BALANCES
            </div>
        </div>

        <div class="card-body">

            <form method="POST">

                <input name="user_id"
                       type="hidden"
                       value="<?= htmlspecialchars($user_id) ?>">

                <!-- Affiliate Reward -->
                <div class="form-group mb-3">
                    <label>Affiliate Reward</label>
                    <input class="form-control"
                           type="text"
                           name="referral_balance"
                           value="<?= htmlspecialchars($referral_balance ?? '') ?>">
                </div>

                <!-- My Assets -->
                <div class="form-group mb-3">
                    <label>My Assets</label>
                    <input class="form-control"
                           type="text"
                           name="balance"
                           value="<?= htmlspecialchars($balance ?? '') ?>">
                </div>

                <!-- Active Resource -->
                <div class="form-group mb-3">
                    <label>Active Resource</label>
                    <input class="form-control"
                           type="text"
                           name="running_invest"
                           value="<?= htmlspecialchars($running_invest ?? '') ?>">
                </div>

                <!-- Total Take-Out -->
                <div class="form-group mb-3">
                    <label>Total Take-Out</label>
                    <input class="form-control"
                           type="text"
                           name="total_withdrawn"
                           value="<?= htmlspecialchars($bitcoin_wallet ?? '') ?>">
                </div>

                <!-- Added Resource -->
                <div class="form-group mb-3">
                    <label>Added Resource</label>
                    <input class="form-control"
                           type="text"
                           name="total_deposit"
                           value="<?= htmlspecialchars($etherum_wallet ?? '') ?>">
                </div>

                <!-- Margin/commission -->
                <div class="form-group mb-3">
                    <label>Margin/commission</label>
                    <input class="form-control"
                           type="text"
                           name="blocked_reward"
                           value="<?= htmlspecialchars($blocked_reward ?? '') ?>">
                </div>

                <!-- Pending transaction -->
                <div class="form-group mb-3">
                    <label>Pending transaction</label>
                    <input class="form-control"
                           type="text"
                           name="pendding_investment"
                           value="<?= htmlspecialchars($pendding_investment ?? '') ?>">
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <button type="submit"
                            name="update_balance"
                            class="btn btn-primary">
                        Update Balances
                    </button>

                    <div class="clearfix"></div>
                </div>

            </form>

        </div>
    </div>
</div>

                
                
                
                
                    
                
                

            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head bg-primary"
                            style=" color: white !important;">
                            <div class="card-title text-light"> WALLET ADDRESSES
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="datatable2"
                                    class="table mg-b-0 tx-12">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">SN</th>
                                            <th class="wd-15p">Type/Address</th>
                                            <!-- <th class="wd-20p">Delete</th> -->
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql =
                                        "SELECT * from wallets where user_id = '$user_id' order by id desc ";
                                        $sn = 0;
                                        $result = mysqli_query($con,$sql) or
                                        die("cant select members ".mysqli_error($con));
                                        while ($row =
                                        mysqli_fetch_array($result)) {
                                        $type = $row['type'];
                                        $address = $row['wallet'];
                                        // $date = $row['reg_date'];
                                        // $qr_code = $row['qr_code'];
                                        // $ref_balance = $row['referral_balance'];
                                        $id = $row['id'];
                                        $sn++;

                                        ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $type.": ".$address;
                                                ?></td>
                                            <td>
                                                
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

        </div>

    </div>

    <?php
    }}else{
    echo "YOU DID NOT CLICK ON ANY USER";
    }
    }else{
    echo "YOU DID NOT CLICK ON ANY USER";
    }

    require "footer.php";

    ?>