<?php
include "header.php";
$error = "";
$v = 1;

$timestamp = microtime(true); // current time with microseconds
$hash = md5($timestamp);      // hash it for uniqueness
$numbersOnly = preg_replace('/\D/', '', $hash); // remove letters, keep numbers
$uid = substr($numbersOnly, 0, 4);

$username = $_SESSION['user'];
$user_id = $_SESSION['id'];
if(!isset($_POST['channel']) || !isset($_POST['amount']) ){
   echo " <script>
        window.location.href='deposit.php';
        </script>";

  return;
}
$amount = $_POST['amount'];
// $plan_details = $_POST['plan'];
$channel = $_POST['channel'];
//  $plan = explode("-",$plan_details);
//  $plan_name=  $plan[2];
// $plan_id = $plan[0];
$payment_id;
$payment_methods;
 $payment_address;
$payment_qr;
// $sql = "SELECT * FROM payment_methods where id = '$channel'";
// $result = $con->query($sql);
// if($result){
  

//   while ($row = $result->fetch_array()) {
//     # code...
//     $payment_id = $row['id'];
//     $payment_methods = $row['name'];
//     $payment_address = $row['address'];
//     $payment_qr = $row['qr_code'];
//   }

// }else{
//   return;
// }
$payment_methods = [
    ["id"=>"1","name"=>"Bitcoin","address"=>"bc1qwk8h333emtqtkrvny7e84ummxv5sn9aca36agx"],
     ["id"=>"2","name"=>"Ethereum","address"=>"0x037c2814d5B653E59cC2Fc20EEa8d4121C8ac00B"],
      ["id"=>"3","name"=>"Usdt","address"=>"TDazcR6VJj7wyFg1JXW84KfBk1Kc8KQ5VC"],
       ["id"=>"4","name"=>"XRP","address"=>"rpov2FhHf6i1zLeR2YRdjZyEKh17K8T53M"]
];
$selected_payment_method = $payment_methods[$channel];

$payment_id = $selected_payment_method['id'];
    $payment_methods = $selected_payment_method['name'];
    $payment_address = $selected_payment_method['address'];
    $payment_qr = $selected_payment_method['qr_code']??"";




if(isset($_POST['confirm'])){
  if($_POST['v'] != 1){
    echo " <script>
        window.location.href = 'deposit.php';
    </script>";

  return;

  }

  $amount = $_POST['amount'];
  $wallet = $_POST['channel_name'];
  $msg = $_POST['note'];
  $status = "pending";
  $plan_name =""; //$_POST['plan_name'];
  $plan_id = ""; //$_POST['plan_id'];
  $payment_id = $_POST['channel_id'];
  $payment_name = $_POST['channel_name'];
//   $proof = $_FILES['proof'];
   $filname =  "nono";//basename($_FILES["proof"]["name"]);

//   $target_file = "../uploads/" . basename($_FILES["proof"]["name"]);
//   move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file);

  $amount = trim($amount);
  $wallet = trim($wallet);

  if($amount > 0){
    if(strlen($wallet) > 0){

      $invest_date = date(" D d M h:m");

  $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,
  invest_date,transaction_type,plan_id,plan_name,payment_id,payment_name,address, description)
        value(
        '$user_id',
        '$username',
        '$amount',
        '$wallet',
        '$status',
        '$invest_date',
        'deposit',
        '$plan_id',
        '$plan_name',
        '$payment_id',
        '$payment_name',
        '$payment_address',
        '$filname'



      )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


  if($result){

    //// to do sucess 

    // echo "<script>
        // window.location.href='".'invest.php?t='.$wallet.'&amt='.$amount."';
        // </script>";

$to =  $company_email; // enter the users email here
$subject = 'Deposit alert';
$from =  $company_email; /// enter the email of you host example admin@netbaba.com
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
//$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
$message .= '

<h3 style="color:#f40;">
Deposit
</h3>';

$message .= "
<p>
Hi Admin a user just made a deposit
<br>

Note-message: $msg <br>
Email $email<br>
Name: $user <br>
Amount : $amount <br>
Type : $wallet 
</p>
";
$message .= '</body></html>';
$sent = mail($to, $subject, $message, $headers);


////////////USER EMAIL//////////////



//////////////////////////////////////
     $subject = "Investment request ";
      $msg2 = "<!DOCTYPE html>
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

        <h4>
            VargoFarm
        </h4>

        <p class='block'>
            <b>Few steps away!!!</b>
                 <br>
                  You have  made a deposit request of USD$amount in $wallet.
                  <p class='block'>
                  Status : awaiting approval
                  <br>
                  
                  
                  </p>
                    
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
               
               // require "../mail.php";






///////////////////////////////////
    $error =  '<div class="alert alert-success text-center">
     Deposit was successful (status : waiting approval)

     </div>';
     $v = 0;

    

  

    }

  }else{
     $error = '<div class="alert alert-danger text-center">
     Please select a wallet

     </div>';

      ///// to do errorr///////

    }


    //// to do Errooo
  }else{
     $error = '<div class="alert alert-danger text-center">

     Please enter a valid amount
     </div>';
      }
  
}



?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

        
    <div class="card">
        <div class="card-body">
            <div class="alert alert-success">Deposit Initiated. Follow the instruction below to complete it</div>
            <?= $error ?>



            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice <strong>ID: #<?= $user_id ?>BC0B<?= $payment_id."-".$uid ?></strong></p>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;"><?= $user ?></span></li>
                                <li class="text-muted"><?= $company_address ?></li>
                                <li class="text-muted"><i class="fas fa-phone"></i> </li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span><?= $user_id ?>BC0B<?= $payment_id."-".$uid ?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span><?=  date("Y-m-d H:i:s"); ?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                    <span class="me-1 fw-bold">Status:</span>
                                                                            <span class="badge badge-info">Pending</span>
                                                                        </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row justify-content-center table-responsive">
                        <table class="table table-striped table-borderless ">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Qr</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Asset</th>
                                <th scope="col">Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Account Funding</td>
                                    <td>
                                        <img style="height:200px"  id="imageResult" src="../uploads/<?php echo $payment_qr ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                    </td>
                                    
                                    <td>$<?= $amount ?></td>
                                    <td><?= $payment_methods ?></td>
                                    <td><?= $payment_address ?></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xl-12 text-center text-info alert alert-primary">
                            <div>
                                <img style="height:200px"  id="imageResult" src="../uploads/<?php echo $payment_qr ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                            </div>
                                                            <p>
                                    You are to send <b>$<?= $amount ?> of <?= $payment_methods ?></b>
                                    to the address <b style="font-size:20px;" id="address"><?= $payment_address ?></b>.<br>
                                    After making payment, contact support for instant crediting.
                                </p>
                                                        <button class="btn btn-primary copy" data-clipboard-target="#address">Copy</button>
                        </div>
                    </div>
                    <hr>


                    <div>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <!--<p class="">Upload Payment proof after payment.</p>-->
                                            <!--<input type="file" name="proof" class="form-control col-lg-8 " required>-->
                                        </div>

                                        <input type="hidden" name="id" value="<?php echo $user_id ?>">
                                        <input type="hidden" name="name" value="<?php echo $user ?>">
                                        <input type="hidden" name="amount" id="amountbtc" value="<?php echo $amount ?>">
                                        <input type="hidden" name="plan_id" value="<?php echo $plan_id  ?>">
                                        <input type="hidden" name="plan_name" value="<?php echo $plan_name  ?>">
                                        <input type="hidden" name="plan" value="<?php echo $plan_details  ?>">
                                        <input type="hidden" name="channel" value="<?php echo $channel  ?>">
                                        <input type="hidden" name="channel_name"
                                            value="<?php echo $payment_methods  ?>">
                                        <input type="hidden" name="channel_id" value="<?php echo $payment_id  ?>">
                                        <input type="hidden" name="note" value="crypto deposit">
                                        <input type="hidden" name="v" value="<?php echo $v  ?>">
                                        <br>


                                        <div class="form-group">
                                            <button type="submit" name="confirm" class="btn btn-primary w-100"
                                                value="Submit Payment">
                                                <?php 

                                                    if($v == 1){
                                                    echo "Complete Payment";
                                                    }else{
                                                    echo "Finish";
                                                    }

                                                    ?>
                                            </button>
                                        </div>
                                    </form>
                                </div>







                </div>
            </div>
        </div>
    </div>


    </div>

   <?php

   require "footer.php";

   ?>