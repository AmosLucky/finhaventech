<?php
include "header.php";
$error = "";
$msg = "";



$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['invest'])){

 $amount = $_POST['amount'];
$plan_details = $_POST['plan'];
//$channel = $_POST['channel'];
 $plan = explode("-",$plan_details);
 $plan_name=  $plan[2];
$plan_id = $plan[0];
$amount = $_POST['amount'];
  $wallet = "Investment"; //$_POST['channel_name'];
  //$msg = $_POST['note'];
  $status = "approved";
  $amount = trim($amount);
  $wallet = trim($wallet);

  if($amount > 0){
      $query = "SELECT balance, email from members where id = '$user_id'";
      $result2 = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result2){
                              while ($row = mysqli_fetch_array($result2)) {
                                $balance = $row['balance'];
                                $email = $row['email'];
                                # code...
                              }

                            }



    if($balance >= $amount){
   
      //////////////////////////////////DEBIT USER BALANCE///
         $sql = "UPDATE members set balance = balance - '$amount' where id = '$user_id'";
      $result = mysqli_query($con,$sql) or die("Can not submit1 ".mysqli_error($con));
      if($result){


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
        '0',
        'Investment'


      )";
  // $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  //  $sql = "insert into investments (
  //     user_id, 
  //     plan_id,
  //     plan_name,
  //     profit,
  //     amount,
  //     username
  //     )
  //       value(
  //       '$user_id',
  //       '$plan_id',
  //       '$plan_name',
  //       '0',
  //       '$amount',
  //       '$username'
  //     )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  if($result){


    ////INSERT INTO INVESTMENTS////


    ///////////////////////ADDING  RUNNING INVESTMENT TO USER/////////////
   $new_running_invest = floatval($running_invest) + floatval($amount);
   $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
      //////////////////////////////end //////////
     // $new_running_invest = floatval($running_invest) + floatval($amount);
  
     // if($num_of_days == 0){
     //   $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
     // }else{
     //   $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
     // }
  $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
     if($result){


      $sql = "insert into investments (
        user_id, 
        plan_id,
        plan_name,
        profit,
        amount,
        username,
        profit_running_hours,
        capital_running_hours
        )
          value(
          '$user_id',
          '$plan_id',
          '$plan_name',
          '0',
          '$amount',
          '$username',
          '0',
          '0'
        )";
    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    if($result){
        $msg =  '<div class="alert alert-success text-center">successful, status:  approved</div>';
  
    }else{
      $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
    }





     }else{
    $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
  }






  }else{
    $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
  }



  if($result){

    $subject = "Investment";

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
       
        <p class='block'>
         Welcome to $company_name.
         

         </p>
         Your investment of USD$amount is  approval.


         <p>
         <br>
         We appreciate your interest and the time you have taken to submit your investment request.
         <br>

Thank you for investing with our company.



    
    
         </p>
    
    
    
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


    // SendMail($email,"Payment approved",$msg2);

/////////////////////////////////

$to = $email; // enter the users email here
$subject = 'Investment ';
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


$message .= "
    $msg2
";
$message .= '</body></html>';
$sent = mail($to, $subject, $message, $headers);

/////////////////////END OF EMAIL//////////

    //// to do sucess 

    // echo "<script>
    // window.location.href='".'invest.php?t='.$wallet.'&amt='.$amount."';
    // </script>";

$to =  $company_email; // enter the users email here
$subject = 'Reinvestment alert';
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
Hi Admin a user just made a Reinvested 
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




    

  

    }

  }else{
     $error = '<div class="alert alert-danger text-center">
    Cant debit $user;

     </div>';

      ///// to do errorr///////

    }


    //// to do Errooo
  }else{
     $error = '<div class="alert alert-danger text-center">

    Insufficient Balance
     </div>';
      }

}else{
     $error = '<div class="alert alert-danger text-center">

    Invalid Amount
     </div>';
      }

    }




?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

        

    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">New Deposit</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="" id="form">
                         <?php echo $error ?>
                                        <?php echo $msg ?>
                        <input type="hidden" name="_token" value="oYND1vn6NxPhDZflSW8Dl92Bx2GtPLabOO526ItW">                                                <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount ($)</label>
                            <input type="number" class="form-control form-control-lg" id="amount"
                                   placeholder="Enter Amount to Invest" name="amount" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Package</label>
                            <select type="number" class="form-control form-control-lg" name="plan" id="plan">
                                 <?php

                                           $sql = "SELECT * from investment_plans where deleted = '0' ";
                                    $sn = 1;
                                   $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
                                   while ($row = mysqli_fetch_array($result)) {
                                      $name = $row['name'];
                                      $min = $row['min_deposite'];
                                      $max = $row['max_deposite'];
                                      $daily_profit = $row['daily_profit'];
                                      $duration = $row['capital_after'];
                                      $referral_bonus = $row['referal_bonus'];

                                      $min = number_format($min);
                                      $max = number_format($max);

                                      // $date = $row['reg_date'];
                                      // $qr_code =  $row['qr_code'];
                                      // $ref_balance  = $row['referral_balance'];
                                       $id = $row['id'];

                                            ?>
                                                    <option value="<?php echo $id." -".$min."-".$name."-".$max."-".$daily_profit."-".$duration."-".$referral_bonus ?>">
                                                        <?php echo $name." $($min - $max)" ?>
                                                    </option>


                                                    <?php  } ?>
                                
                              </select>
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label for="inputAddress2">Asset</label>
                            <select type="number" class="form-control form-control-lg" id="inputAddress2"
                                    name="asset">
                                <option value="">Select an Asset</option>
                                                                    <option value="TRC20">USDT</option>
                                                                    <option value="BTC">BITCOIN</option>
                                                                    <option value="ETHEREUM">ETH</option>
                                                                    <option value="TRX">Tron</option>
                                                            </select>
                        </div> -->
                        <div class="form-group col-md-12 mx-auto">
                            <label for="inputAddress2">Account</label>
                            <select type="number" class="form-control form-control-lg" id="inputAddress2"
                                    name="account">
                                <!-- <option value="">Select a Account</option> -->
                                <option value="1">From Account Balance  <span class="small">
                                                        ($
                                                        <?= number_format($balance) ?>
                                                        )
                                                    </span></option>
                                                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="invest"> Confirm & Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>



     <script>
        function selectAmount(amount) {
            //alert(amount);
            document.getElementById("amount").value = amount;

        }
    </script>




    
<script type="text/javascript">
    $(document).ready(function(){

        $("#form").submit(function(e){
           


           var plan = $("#plan").find(":selected").val();
        var amount = $("#amount").val();
        const myArr = plan.split("-");
        var min = myArr[1].replace(",","");
        
        

        if(parseInt(amount) < parseInt(min)){
         //alert(min);
         // $("form").
          alert("minimum deposit for this plan is $"+ min);
           return false;
        }
         
          

      });


    });





  </script>

   <?php

   require "footer.php";

   ?>