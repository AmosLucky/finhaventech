<?php
include "header.php";
$error = "";
$v = 1;

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
$sql = "SELECT * FROM payment_methods where id = '$channel'";
$result = $con->query($sql);
if($result){
  
  while ($row = $result->fetch_array()) {
    # code...
    $payment_id = $row['id'];
    $payment_methods = $row['name'];
    $payment_address = $row['address'];
    $payment_qr = $row['qr_code'];
  }

}else{
  return;
}

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
  $proof = $_FILES['proof'];
  $filname =  basename($_FILES["proof"]["name"]);

  $target_file = "../uploads/" . basename($_FILES["proof"]["name"]);
  move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file);

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

<!-- Page content -->
<div class="page-content">

    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Make Payment</h5>
            </div>
        </div>
    </div>
    <div>
    </div>
    <div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <?php  echo $error; ?>
                        </div>
                        <div class="p-2 shadow-lg card p-md-4">
                            <div class="alert alert-modern alert-warning">
                                <span class="badge badge-warning badge-pill">
                                    Your payment method
                                </span>
                                <span class="alert-content">
                                    <!-- <?= $payment_methods ?> -->
                                     Account Funding
                                </span>
                            </div>
                            <div class="card-body">
                                <div>
                                    <h6 class="">You are to make payment of
                                        <strong>$
                                            <?= number_format($amount) ?>
                                        </strong>
                                        using
                                        your selected payment method.
                                    </h6>
                                    <h4>
                                    </h4>
                                </div>
                                <!-- <div class="mt-5">
                                    <h6 class="mt-4">
                                        <strong>
                                            <?= $payment_methods ?> Address:
                                        </strong>
                                    </h6>
                                    <div class="mb-3 form-group">
                                        <input type="text" class="form-control readonly"
                                            value="<?= $payment_address ?>" readonly>
                                        
                                    </div>
                                    <div>
                                    <img style="height:200px"  id="imageResult" src="../uploads/<?php echo $payment_qr ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                    </div>
                                </div> -->




                                <div class="mt-5">
                                    <h6 class="">
                                        <strong>Account Funding Address:</strong>
                                    </h6>
                                    <div class="mb-3 form-group">

                                        <div class="input-group">
                                            <input type="text" class="form-control readonly "
                                                value="Please message our support for wallet address" id="reflink"
                                                readonly="">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" onclick="myFunction()"
                                                    type="button" id="button-addon2"><i
                                                        class="fas fa-copy"></i></button>
                                            </div>
                                        </div>
                                        <small class=""><strong>Network Type:</strong>
                                            Cryptocurrency
                                        </small>
                                    </div>
                                </div>





                                <div>

                                </div>



                                <div>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <p class="">Upload Payment proof after payment.</p>
                                            <input type="file" name="proof" class="form-control col-lg-8 " required>
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


                                        <div class="form-group">
                                            <button type="submit" name="confirm" class="btn btn-primary"
                                                value="Submit Payment">
                                                <?php 

                                                    if($v == 1){
                                                    echo "Submit Payment";
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
        </div>
    </div>


    <?php
require "footer.php";

?>