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
//   $wallet_info = explode("-",$wallet_address);
//   $type  = $wallet_info[0];
 // $wallet_address = $wallet_info[1];

  $type = $_POST['wallet_address'];
  $amount = trim($amount);
  $request_date = date("d m M h:i");
 // $wallet_address = "";
  $address_type = $type;
  

  
    if($amount >= 10){
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
      $error = "<div class='alert alert-success text-center'>
     You have successfully requested for the withdrawal of USD$amount . Status: pending

     </div>";
     
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

Hello $username,
<br>
 
Your request for withdrawal of USD$amount in $type is waiting approval.
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
     $error = '<div class="alert alert-danger text-center">
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



?>

   
    <!-- Start Main Content Area -->
    <div class="mt-5">

        
    <div class="row">
        <div class="col-xl-7 mx-auto">
            
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">New Withdrawal</h5>
                        <span class="alert-content">$<?= number_format($balance,2) ?></span>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="">
                        <input type="hidden" name="_token" value="oYND1vn6NxPhDZflSW8Dl92Bx2GtPLabOO526ItW">  
                          <?= $error ?>                                              <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount ($)</label>
                            <input type="number" class="form-control" id="inputAddress2"
                                   placeholder="Enter Amount to Withdraw" name="amount" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Asset</label>
                            <select type="number" class="form-control" id="inputAddress2"
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
                        <div class="form-group col-md-12 mx-auto">
                            <label for="inputAddress2">Wallet Address</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter Address" name="wallet_address" required>
                        </div>
                        <div class="form-group col-md-12 mx-auto">
                            <label for="inputAddress2">Account</label>
                            <select type="number" class="form-control" id="inputAddress2"
                                    name="account">
                                <option value="">Balance  $(<?= number_format($balance) ?>)</option>
                               
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="withdraw">Withdraw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>

    <?php

    require "footer.php";

    ?>