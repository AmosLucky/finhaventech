<?php
include "header.php";
$amount = "";
$wallet = "";
$error  = "";
$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['withdraw'])){

 
  $amount = $_POST['amount'];
   $wallet_address = $_POST['wallet_address'];
  //$status = "pending";
  //$wallet_info = explode("-",$wallet_address);
  $type  =  $_POST['wallet_type'];
  $otpcode = 0;//$_POST['otpcode'];
  

  $type = trim($type);
  $amount = trim($amount);
  $request_date = date("d m M h:i");
 // $wallet_address = "";
  $address_type = $type;
  $save_wallet = isset($_POST['save_wallet']) ? 1 : 0;

 

  
  
  
    if($amount >= 10){

        // if(isset($_SESSION['withdrawal_otp']) && $_SESSION['withdrawal_otp'] 
        // == $otpcode && strlen($otpcode) > 2 ){
        if($is_restricted_withdrawal ==0){

        if(!$is_suspended){
            if(!$is_compounded){

      //$invest_date = date(" D d M m:i");
      //echo $balance;
      if(strlen($wallet_address) > 8 ){

      if($amount <= $balance){
       
         $new_balance = $balance -$amount;


        $sql = "UPDATE members SET balance = '$new_balance' where id = '$user_id'";
        $result = mysqli_query($con,$sql) or die("Cant proccess ".mysqli_error($con));
        if($result){






       
  
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


  if($result){

    ////// do insert ///////////

    $sql = "INSERT INTO transactions (user_id,user_name, amount, status, invest_date,name,address,wallet_type,transaction_type)
    VALUES(
    '$user_id',
    '$username',
    '$amount',
    'pending',
    '$request_date',
    '$balance',
    '$wallet_address',
    '$address_type',
    'Withdrawal'
    )
    ";

    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


    //// to do sucess 

    if($result){
      $error = '<div class="alert alert-success text-center">
     You have successfully requested for withdrawal

     </div>';
     
     ////////////////////////mailer////////////////
     $sql = "SELECT email, username from members where id = '$user_id'";

        $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
      $email = $row['email'];
      $username = $row['username'];
      # code...
    }


   $to = $company_email;

$subject = 'Withdrawal Alert';

$from = $company_email;

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: ".$from."\r\n";
$headers .= "Reply-To: ".$from."\r\n";
$headers .= "X-Mailer: PHP/".phpversion();

$message = '
<html>
<body>

<h3 style="color:#f40;">Withdrawal Alert</h3>

<p>
Hi Admin, a user just made a withdrawal order.
</p>

<p>
Email: '.$email.'<br>
Name: '.$username.'<br>
Amount: '.$amount.'<br>
</p>

</body>
</html>
';

$sent = mail($to, $subject, $message, $headers, '-f'.$from);

if ($sent) {
    echo "Email sent successfully.";
} else {
    echo "Email failed to send.";
}


////////////USER EMAIL///////////

     
     
//$to = "$email"; // enter the users email here
$subject = 'Withdrawal Order';
//$from = $company_email; /// enter the email of you host example admin@netbaba.com
 
// Compose a simple HTML email message
$message = "<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <style type='text/css'>
        body{
            margin: 20px;
        }
        .head{
            height: 50px;
            padding: 20px;
            background-color: #152238;

        }
        .body{
            padding: 20px;
            background-color: #F8F4E6;
        }
        .logo{
            height: 50px;
        }
        .footer{
            background-color: #152238;
            height: 100px;
            color: white;
            padding: 20px;

        }
        .block{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class='head'>
       $company_logo2
        
    </div>
    <div class='body'>
        
        

        <h2>
            Hello $username

        </h2>

        <p class='block'>
            <b>Withdrawal </b>
            <br>
Your withdrawal request of USD $amount has been received and is currently being processed by our finance team.
           <br>
Withdrawal Details:
<br>
* Amount: USD $amount
<br>
* Method: $address_type
<br>
If you did not initiate this request, please reach out to support immediately at
$company_name.


 

<br>
<br>
        </p>

        
    </div>

    <div class='footer'>
        <p>
            Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
$company_email
        </p>
        
    </div>

</body>
</html>
";
 $msg2 = $message; 
//mail($to, $subject, $message, $headers);
require "../mail.php"; 




if ($save_wallet == 1) {

    // Check if this exact wallet is already saved
    $check_wallet = mysqli_prepare(
        $con,
        "SELECT id FROM wallets 
         WHERE user_id = ? 
         AND wallet = ? 
         AND type = ?
         LIMIT 1"
    );

    mysqli_stmt_bind_param(
        $check_wallet,
        "iss",
        $user_id,
        $wallet_address,
        $address_type
    );

    mysqli_stmt_execute($check_wallet);

    $wallet_result = mysqli_stmt_get_result($check_wallet);

    if (mysqli_num_rows($wallet_result) == 0) {

        $insert_wallet = mysqli_prepare(
            $con,
            "INSERT INTO wallets (user_id, wallet, type)
             VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $insert_wallet,
            "iss",
            $user_id,
            $wallet_address,
            $address_type
        );

        mysqli_stmt_execute($insert_wallet);

        mysqli_stmt_close($insert_wallet);
    }

    mysqli_stmt_close($check_wallet);
}
 
 
 //////////////////////////////////// end ///////////////////////////////
    }

  

    }

    /////////////////balance reduced//////////

  }
      }else{
     $error = '<div class="alert alert-danger text-center">
     Insufficient Balance

     </div>';

      ///// to do errorr///////

    }

    }else{
     $error = 
     '<div class="alert alert-danger text-center">
     Invalid wallet address

     </div>';

      ///// to do errorr///////

    }

     }else{
     $error = "<div class='alert alert-danger text-center'>
    Your asset is locked for $compounded_duration days

     </div>";

      ///// to do errorr///////

    }

      

  }else{
     $error = '<div class="alert alert-danger text-center">
    Your account is restricted from making a withdrawal request

     </div>';

      ///// to do errorr///////

    }

}else{
     $error = '<div class="alert alert-danger text-center">
    Withdrawals are currently restricted on your account. Please contact support for assistance.

     </div>';

      ///// to do errorr///////

    }

}else{
    $error = '<div class="alert alert-danger text-center">
   The minimum withdrawal is $10

    </div>';

     ///// to do errorr///////

   }




    


  
  
}


// if(isset($_POST['add_wallet'])){
//   $address = $_POST['address'];
//   $wallet_type =  $_POST['wallet_type'];
//   if(strlen( $address) > 5){
//       if(strlen($wallet_type)>2){

//           $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
//           $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
//           if($result){
//                $error = '<div class="alert alert-success text-center">
//    Wallet succefully saved (this wallet will be an option when you will request for withdraw)

//    </div>';

//           }


//       }else{
//            $error = '<div class="alert alert-danger text-center">
//    Invalid type

//    </div>';
//       }

//   }else{
//       $error = '<div class="alert alert-danger text-center">
//    Invalid wallet address

//    </div>';
//   }

// }



if(isset($_POST['add_wallet'])){
  $address = $_POST['address'];
  $wallet_type =  $_POST['wallet_type'];
  if(strlen( $address) > 5){
      if(strlen($wallet_type)>2){

          $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
          $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
          if($result){
               $error = '<div class="alert alert-success text-center">
   Wallet succefully saved (this wallet will be an option when you will request for withdraw)

   </div>';

          }


      }else{
           $error = '<div class="alert alert-danger text-center">
   Invalid type

   </div>';
      }

  }else{
      $error = '<div class="alert alert-danger text-center">
   Invalid wallet address

   </div>';
  }

}



$sql = "SELECT * from wallets where user_id = '$user_id' ";
$sn = 1;
$result_wallets = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
$num_wallets =  mysqli_num_rows($result_wallets);




if(isset($_POST['getotp'])){
    $code = rand ( 10000 , 99999 );

    $_SESSION['withdrawal_otp'] = $code;


    //$to = "$email"; // enter the users email here
$subject = 'Withdrawal Order';
//$from = $company_email; /// enter the email of you host example admin@netbaba.com
 
// Compose a simple HTML email message
$message = "<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <style type='text/css'>
        body{
            margin: 20px;
        }
        .head{
            height: 50px;
            padding: 20px;
            background-color: #152238;

        }
        .body{
            padding: 20px;
            background-color: #F8F4E6;
        }
        .logo{
            height: 50px;
        }
        .footer{
            background-color: #152238;
            height: 100px;
            color: white;
            padding: 20px;

        }
        .block{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class='head'>
       $company_logo2
        
    </div>
    <div class='body'>
        
        

        <h2>
            Hello $username

        </h2>

        <p class='block'>
           <p> Your withdrawal OTP is <b>$code</b>


 

<br>
<br>
        </p>

        
    </div>

    <div class='footer'>
        <p>
            Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
$company_email
        </p>
        
    </div>

</body>
</html>
";
 $msg2 = $message; 
//mail($to, $subject, $message, $headers);
require "../mail.php"; 

$error = 
'<div class="alert alert-success text-center">
Withdrawal OTP Sent!!!

</div>';
 
 
 //////////////////////////////////// end ///////////////////////////////

    
}



?>
            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Withdrawal Details</h5>
            </div>
        </div>
    </div>
    <div>
            </div>
    <div>
    </div>
	<div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-md-2">
                            <div class="p-2 rounded p-md-4 card ">
                                <div class="card-body">
                                    <div class="mb-3 alert alert-modern alert-success">
                                        <span class="text-center badge badge-success badge-pill">
                                            Balance
                                        </span>
                                        <span class="alert-content">$<?= number_format($balance,2) ?></span>
                                    </div>

                                    <br>
                                    <br>

                                    <?= $error ?>

                                    <div class="form-group">
                                                <!-- <label class="m-1 d-inline">Enter OTP</label> -->
                                               <!-- <form action="" method="POST">
                                               <div class="float-right m-1 btn-group d-inline">
                                                    <button name="getotp" type="submit" class="btn btn-primary btn-sm" href=""> 
                                                        <i class="fa fa-envelope"></i> Request OTP</button> 
                                                </div>
                                               </form> -->
                                                <!-- <input class="form-control " placeholder="Enter OTP" type="text" name="otpcode" required>
                                                <small class="">OTP will be sent to your email when you request</small> -->
                                            </div> 
                                     <form action="" method="post">
                                                                            

                                                                        



                                                                        <div class="form-group">
                                                <!-- <label class="m-1 d-inline">Enter OTP</label> -->
                                                <!-- <div class="float-right m-1 btn-group d-inline">
                                                    <a class="btn btn-primary btn-sm" href=""> <i class="fa fa-envelope"></i> Request OTP</a> 
                                                </div> -->
                                                <!-- <input class="form-control " placeholder="Enter OTP" type="text" name="otpcode" required>
                                                <small class="">OTP will be sent to your email when you request</small> -->
                                            </div> 
                                        <div class="form-group">
                                            <label class="">Enter Amount to withdraw($)</label>
                                            <input class="form-control " placeholder="Enter Amount" type="number" name="amount" required>
                                        </div>
                                        

                                                                                    
                                            <h5 class="">Enter Wallet Type </h5>
                                            <div class="form-group">
                                            <select
                      class="default-select form-control"
                      name="wallet_type">

                       <?php foreach ($payment_methods as $row): ?>
        <option value="<?php echo $row['name']; ?>">
            <?php echo $row['name']; ?>
        </option>
    <?php endforeach; ?>
                                               
                                                </select>

                                                
                                            
                                            </div>
                                                                                                                                                                            <div class="form-group">
                                                    <h5 class="">Enter Address </h5>
                                                    <input class="form-control" 
                                                     id="wallet_address"
                                                    placeholder="Enter Wallet Address" type="text" name="wallet_address" required>
                                                    <!-- <small class="">USDT ERC20 is not a default withdrawal option in your account, please enter the correct wallet address to recieve your funds.</small> -->
                                                </div>  

                                                <div class="form-group">
    <!-- <h5>Enter Address</h5>

    <input
        class="form-control"
        id="wallet_address"
        placeholder="Enter Wallet Address"
        type="text"
        name="wallet_address"
        required
    >
</div> -->

<div class="form-group">
    <label>
        <input type="checkbox" name="save_wallet" value="1">
        Save this wallet address for future withdrawals
    </label>
</div>


<?php
$sql = "SELECT id, wallet, type 
        FROM wallets 
        WHERE user_id = '$user_id'
        ORDER BY id DESC";

$result_wallets = mysqli_query($con, $sql) 
    or die("Cannot fetch wallets: " . mysqli_error($con));

$num_wallets = mysqli_num_rows($result_wallets);
?>

<?php if ($num_wallets > 0): ?>

    <div class="form-group">
        <h5>Saved Wallets</h5>

        <?php while ($wallet = mysqli_fetch_assoc($result_wallets)): ?>

            <div class="saved-wallet mb-2">
                <button
                    type="button"
                    class="btn btn-success btn-block text-left wallet-option"
                    data-address="<?php echo htmlspecialchars($wallet['wallet'], ENT_QUOTES, 'UTF-8'); ?>"
                    data-type="<?php echo htmlspecialchars($wallet['type'], ENT_QUOTES, 'UTF-8'); ?>"
                >
                    <strong>
                        <?php echo htmlspecialchars($wallet['type']); ?> : <?php echo htmlspecialchars($wallet['wallet']); ?>
                    </strong>
                    <br>

                    <!-- <small>
                        <?php echo htmlspecialchars($wallet['wallet']); ?>
                    </small> -->
                </button>
            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>
                                                                                        
                                                                                <div class="form-group">
                                            <button class="btn btn-primary" type='submit' name="withdraw">Complete Request</button>
                                        </div>
                                    </form>
                                                                    </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
	</div>



    <script>
document.addEventListener('DOMContentLoaded', function () {

    const walletOptions = document.querySelectorAll('.wallet-option');
    const walletAddress = document.getElementById('wallet_address');
    const walletType = document.querySelector('select[name="wallet_type"]');

    walletOptions.forEach(function (wallet) {

        wallet.addEventListener('click', function () {

            const address = this.getAttribute('data-address');
            const type = this.getAttribute('data-type');

            // Fill wallet address
            walletAddress.value = address;

            // Select wallet type
            walletType.value = type;

            // Optional visual selection
            walletOptions.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');
        });

    });

});
</script>
    
    <?php
    require "footer.php";

    ?>