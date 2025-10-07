<?php
include "header.php";
$error = "";
$v = 1;

$username = $_SESSION['user'];
$user_id = $_SESSION['id'];
if(!isset($_POST['channel']) || !isset($_POST['amount']) || !isset($_POST['plan'])){
   echo " <script>
        window.location.href='deposit.php';
        </script>";

  return;
}
$amount = $_POST['amount'];
$plan_details = $_POST['plan'];
$channel = $_POST['channel'];
 $plan = explode("-",$plan_details);
 $plan_name=  $plan[2];
$plan_id = $plan[0];
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
        window.location.href='deposit.php';
        </script>";

  return;

  }

  $amount = $_POST['amount'];
  $wallet = $_POST['channel_name'];
  $msg = $_POST['note'];
  $status = "pending";
  $plan_name = $_POST['plan_name'];
  $plan_id = $_POST['plan_id'];
  $payment_id = $_POST['channel_id'];
  $payment_name = $_POST['channel_name'];
  //$invest_date = $_POST['invest_date'];

  $amount = trim($amount);
  $wallet = trim($wallet);

  if($amount > 0){
    if(strlen($wallet) > 0){

      $invest_date = date(" D d M h:m");

  $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type,plan_id,plan_name,payment_id,payment_name)
        value(
        '$user_id',
        '$username',
        '$amount',
        '$wallet',
        '$status',
        '$invest_date',
        'Investment',
        '$plan_id',
        '$plan_name',
        '$payment_id',
        '$payment_name'


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
//$sent = mail($to, $subject, $message, $headers);


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
            <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                
          <div class="card card-body pd-20 mg-t-10 text-center">
              <!-- <h1 class="card-title text-center" >
                  <img src="../images/BTC.png" style="width: 80px; height: auto;" alt="logo"/>
              </h1> -->
              <h6 class="slim-card-title text-muted mg-b-20"> Deposit </h6>
              <h2 class="text-primary mg-b-20">USD <?php echo number_format($amount,2) ?> <br>
              <!-- <?php //echo $payment_methods ?>  -  $<?php //echo $amount ?> -->
              </h2>
              <h6 class="text-primary mg-b-20"> worth of <?php echo $payment_methods ?>  to the <?php echo $payment_methods ?>  wallet below</h6>
              
              <hr>
              <div class="image-area mt-2"><img style="height:200px"  id="imageResult" src="../uploads/<?php echo $payment_qr ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div><br>
              <h5 class="mg-b-20 tx-primary"><?php echo $payment_address ?></h5>
              <br>
              <div class="mt-5"><?php  echo $error; ?></div>
              <div class="form-group">
                    <div class="input-group">
                      <p id="paddress" style="display:none"><?php echo $payment_address ?></p>
                        <input type="text" readonly id='' class="form-control" value="<?php echo $payment_address ?>">
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" id='ref_btn' type="button" onclick="myFunction()">Copy Wallet Address <i class="fa fa-copy"></i></button>
                         
                      </div>
                    </div>
                  </div>
              <p class="text-muted">Note: This wallet address accepts only <?php echo $payment_methods ?> payment.</p><br>
              <form method="post">

              <input type="hidden" name="id" value="<?php echo $user_id ?>">
                  <input type="hidden" name="name" value="<?php echo $user ?>">
                  <input type="hidden" name="amount" id="amountbtc" value="<?php echo $amount ?>">
                  <input type="hidden" name="plan_id" value="<?php echo $plan_id  ?>">
                  <input type="hidden" name="plan_name" value="<?php echo $plan_name  ?>">
                  <input type="hidden" name="plan" value="<?php echo $plan_details  ?>">
                  <input type="hidden" name="channel" value="<?php echo $channel  ?>">
                   <input type="hidden" name="channel_name" value="<?php echo $payment_methods  ?>">
                   <input type="hidden" name="channel_id" value="<?php echo $payment_id  ?>">
                   <input type="hidden" name="note" value="crypto deposit">
                    <input type="hidden" name="v" value="<?php echo $v  ?>">
              <div class="form-group row">
                      <div class="col-6">
                        <a href="deposit" class="btn btn-success btn-block text-white btn-md rounded-0 mb-4">
                          <i class="fas fa-upload"></i>Back</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" name="confirm"
                        class="btn btn-warning btn-block text-white btn-md rounded-0 mb-4">
                          <i class="fas fa-exchange"></i> <?php 

                          if($v == 1){
                            echo "Confirm";
                          }else{
                            echo "Finish";
                          }
                          
                          ?> 
</button>
                      </div>
                    </div>

                </form>
              <a class="" href="index.php">Back To Home </a>
            </div>
            </div>
            </div>
                  </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <script type="text/javascript">
                
                function myFunction() {
                  var copyText = document.getElementById("paddress");
                var temp = document.createElement("textarea");
                document.body.appendChild(temp);
                temp.value= copyText.innerText
                temp.select();
                document.execCommand("copy");
                  alert("successfully Copied : " + temp.value);
                }
                </script>
                

    <?php
require "footer.php";

?>