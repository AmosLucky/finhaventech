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
  $otpcode = $_POST['otpcode'];
  

  $type = trim($type);
  $amount = trim($amount);
  $request_date = date("d m M h:i");
 // $wallet_address = "";
  $address_type = $type;
  
  
  
    if($amount >= 10){

        if(isset($_SESSION['withdrawal_otp']) && $_SESSION['withdrawal_otp'] == $otpcode && strlen($otpcode) > 2 ){

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


 
Your request for withdrawal of USD$amount in $type has been approved.
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
    Incorrect OTP

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
                                               <form action="" method="POST">
                                               <div class="float-right m-1 btn-group d-inline">
                                                    <button name="getotp" type="submit" class="btn btn-primary btn-sm" href=""> <i class="fa fa-envelope"></i> Request OTP</button> 
                                                </div>
                                               </form>
                                                <!-- <input class="form-control " placeholder="Enter OTP" type="text" name="otpcode" required>
                                                <small class="">OTP will be sent to your email when you request</small> -->
                                            </div> 
                                                                        <form action="" method="post">
                                                                            

                                                                        



                                                                        <div class="form-group">
                                                <label class="m-1 d-inline">Enter OTP</label>
                                                <!-- <div class="float-right m-1 btn-group d-inline">
                                                    <a class="btn btn-primary btn-sm" href=""> <i class="fa fa-envelope"></i> Request OTP</a> 
                                                </div> -->
                                                <input class="form-control " placeholder="Enter OTP" type="text" name="otpcode" required>
                                                <small class="">OTP will be sent to your email when you request</small>
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
                                                <?php

$sql = "SELECT * from payment_methods ";
$sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
$name = $row['name'];
$address = $row['address'];
$date = $row['reg_date'];
$qr_code =  $row['qr_code'];
// $ref_balance  = $row['referral_balance'];
$id = $row['id'];

  ?>
  <option value="<?php echo $id ?>"><?php echo $name ?></option>

<?php  } ?>
                                                </select>

                                                
                                            
                                            </div>
                                                                                                                                                                            <div class="form-group">
                                                    <h5 class="">Enter Address </h5>
                                                    <input class="form-control " placeholder="Enter Wallet Address" type="text" name="wallet_address" required>
                                                    <!-- <small class="">USDT ERC20 is not a default withdrawal option in your account, please enter the correct wallet address to recieve your funds.</small> -->
                                                </div>  
                                                                                        
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
    
    <?php
    require "footer.php";

    ?>