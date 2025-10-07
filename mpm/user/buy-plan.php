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
      $msg =  '<div class="alert alert-failed text-center">Funding Couldnt strart mysqli_error($con) </div>';
    }





     }else{
    $msg =  '<div class="alert alert-failed text-center">Funding Couldnt strart mysqli_error($con) </div>';
  }






  }else{
    $msg =  '<div class="alert alert-failed text-center">Funding Couldnt strart mysqli_error($con) </div>';
  }



  if($result){

    $subject = "Funding";

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
         Your funding of USD$amount is waiting  approval.


         <p>
         <br>
         We appreciate your interest and the time you have taken to submit your funding request.
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
$subject = 'Funding ';
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
<!-- Page content -->
<div class="page-content">
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">
                    Start with your resource management and allocation
                </h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-body">
                    <div >
                        <div class="mt-4 row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="card-body">
                                        <form id="form" method="post">
                                        <?php echo $error ?>
                                        <?php echo $msg ?>
                                        <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
                                        <div class="select-menu" x-data="{ open: false }" :class="open ? 'active' : ''">
                                            <div class="">
                                                <p>Select Plan to Invest</p>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">Plan</label>
                                                </div>
                                                <!-- <select class="default-select form-control" id="bselectPlan">
                                              
                                                <option disabled selected="">Select a Plan</option>
                                                <option value="STARTER">STARTER</option>
                                                <option value="CLASSIC">CLASSIC</option>
                                                <option value="PREMIUM">PREMIUM</option>
                                            </select> -->
                                                <select class="default-select form-control" name="plan" id="plan">
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


                                        </div>
                                        <div class="mt-5 ">
                                            <div class="">
                                                <p>Choose Quick Amount to Start</p>
                                            </div>
                                            <div class="flex-wrap mb-1 d-flex justify-content-start align-items-center">
                                                <button class="mb-2 border-black rounded-none btn btn-light"
                                                    onclick="selectAmount('100')" type="button">$100</button>
                                                <button class="mb-2 border-black rounded-none btn btn-light"
                                                    onclick="selectAmount('250')" type="button">$250</button>
                                                <button class="mb-2 border-black rounded-none btn btn-light"
                                                    onclick="selectAmount('500')" type="button">$500</button>
                                                <button class="mb-2 border-black rounded-none btn btn-light"
                                                    onclick="selectAmount('1000')" type="button">$1,000</button>
                                                <button class="mb-2 border-black rounded-none btn btn-light"
                                                    onclick="selectAmount('1500')" type="button">$1,500</button>
                                                <button class="mb-2 border-black rounded-none btn btn-light"
                                                    onclick="selectAmount('2000')" type="button">$2,000</button>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <div class="">
                                                <p>Or Enter Your Amount</p>
                                                <div>
                                                    <input type="number" id="amount" required name="amount"
                                                        class="form-control d-block w-100" placeholder="1,000">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <p>Choose Payment Method</p>
                                        </div>
                                        <div class="select-menu2">
                                            <ul class="options2 d-block">
                                                <li class="mb-3 option2 bg-light border border-primary" id="acnt"
                                                    >
                                                    <i class="fas fa-wallet"></i>
                                                    <span class="option-text2 d-block mr-2">Account Balance </span> <br>
                                                    <span class="small">
                                                        $
                                                        <?= number_format($balance) ?>
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Your Funding Details</p>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <p class="mb-0 small">Name of plan</p>
                                                <b class="text-primary " id="plan_name"></b>
                                            </div>
                                            <!-- <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Plan Price</p>
                                                <span class="text-primary small">$1000000000</span>
                                            </div> -->
                                            <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Duration</p>
                                                <span class="text-primary small" id="plan_duration"></span>day(s)
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Profit</p>
                                                <span class="text-primary small" id="plan_profit">
                                                   
                                                </span>%
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Minimum Deposit</p>
                                                $<span class="text-primary small" id="plan_min"></span>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Maximum Deposit</p>
                                                $<span class="text-primary small" id="plan_max"></span>
                                            </div>
                                            <!-- <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Minimum Return</p>
                                                <span class="text-primary small">210%</span>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Maximum Return</p>
                                                <span class="text-primary small">210%</span>
                                            </div> -->
                                            <div class="mb-3 col-md-6">
                                                <p class="mb-0 small">Referral Bonus</p>
                                                <span class="text-primary small" id="plan_bonus"></span>%
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- <div class="justify-content-between d-md-flex">
                                            <span class="small d-block d-md-inline">Payment method:</span>
                                            <span class="small text-primary">Account Balance</span>
                                        </div> -->
                                        <!-- <hr> -->
                                        <!-- <div class="justify-content-between d-md-flex">
                                            <span class="d-block d-md-inline font-weight-bold">Amount to Invest:</span>
                                            <span class="text-primary font-weight-bold">$0</span>
                                        </div> -->
                                        <div class="mt-3 text-center">
                                            
                                                <button class="px-3 btn btn-primary" type="submit" name="invest" >
                                                    Confirm & Proceed
                                                </button>
                                            </form>
                                            <span class="mt-2 small text-primary" >
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Livewire Component wire-end:1uyFXkrJbhgVuw5zerd1 -->
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

    <script>
     $(document).ready(function(){
        $('#plan').on('change', function() {
            var details = this.value.split("-");
            var min = details[1];
            var name = details[2];
            var max = details[3];
            var profit = details[4];
            var duration = details[5];
            var referral_bonus = details[6];

            $("#plan_duration").html(duration);
            $("#plan_name").html(name);
            $("#plan_min").html(min);
            $("#plan_max").html(max);
            $("#plan_profit").html(profit);
            $("#plan_bonus").html(referral_bonus);
 // alert( referral_bonus );
});
var plan = $("#plan").find(":selected").val();
var details = plan.split("-");
            var min = details[1];
            var name = details[2];
            var max = details[3];
            var profit = details[4];
            var duration = details[5];
            var referral_bonus = details[6];

            $("#plan_duration").html(duration);
            $("#plan_name").html(name);
            $("#plan_min").html(min);
            $("#plan_max").html(max);
            $("#plan_profit").html(profit);
            $("#plan_bonus").html(referral_bonus);

     });
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
          alert("minimum deposit is for this plan $"+ min);
           return false;
        }
         
          

      });


    });





  </script>



    <!-- Footer -->
    <?php
     require "footer.php";
?>