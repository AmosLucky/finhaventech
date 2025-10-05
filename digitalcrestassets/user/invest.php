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
        $msg =  '<div class="alert alert-success text-center">successful, status:  approval</div>';
  
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

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- Add Project -->

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <a href="index"><p
                            class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p></a>
                    <p class="text-primary mb-0 hover-cursor">Investment
                        Funds</p>
                </div>
            </div>
            <div
                class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right ">
                <a href="withdraw"
                    class="btn btn-warning btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-download "></i>
                </a>
                <a href="transactions"
                    class="btn btn-danger  btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock"></i>
                </a>
                <a href="deposit"
                    class="btn btn-success btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus"></i>
                </a>
                <a href="plan" class="btn btn-primary mt-2 mt-xl-0">Make
                    Deposit</a>
            </div>
        </div> <!-- /breadcrumb -->

        <!--###############PLAN##################### ---->


        <?php 

        if(isset($_GET['plan'])&& $_GET['plan'] > 0){
            $palnid = $_GET['plan'];

           


            $sql =
            "SELECT * from investment_plans where id = '$palnid' and deleted = '0' ";
            $sn = 1;
            $result = mysqli_query($con,$sql) or
            die("cant select members ".mysqli_error($con));
            while ($row =
            mysqli_fetch_array($result)) {
            $plan_name = $row['name'];
            $min = $row['min_deposite'];
            $max = $row['max_deposite'];

            // $date = $row['reg_date'];
            // $qr_code = $row['qr_code'];
            // $ref_balance = $row['referral_balance'];
            $palnid = $row['id'];
        
        ?>


        <!-- Plans-->
        <div class="row">
            <div class="col-xl-8 col-lg-12" id="deposit-row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Crypto Investment</h4>
                        <p>
                        <?php echo $error ?>
                  <?php echo $msg ?>
                        </p>
                    </div>
                    <form method="POST" action="" id="form">
                        <div class="card-body">
                            <div class="basic-form">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Balance</label>
                                    </div>
                                    <select class="default-select form-control"
                                        name="channel">
                                        
                                        <option value="1">USD <?php echo number_format($balance,2); ?></option>

                                       
                                    </select>

                                </div>

                                <div class="input-group mb-3">
                                    <!-- <div class="input-group-prepend">
                                        <label class="input-group-text">Plan</label>
                                    </div> -->
                                    <!-- <select class="default-select form-control" id="bselectPlan">
                                              
                                                <option disabled selected="">Select a Plan</option>
                                                <option value="STARTER">STARTER</option>
                                                <option value="CLASSIC">CLASSIC</option>
                                                <option value="PREMIUM">PREMIUM</option>
                                            </select> -->
                                  
                                        <input type="hidden" name="plan" value="<?php echo $palnid."-".$min."-".$plan_name
                                            ?>" >

                                </div>

                                <div class="input-group mb-3  ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" placeholder="amount"
                                        required name="amount"
                                        class="form-control" id="amount"
                                        value="<?php if(isset($_GET['amount'])){ 
                                              echo $_GET['amount'];
                                          } ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                <div class="row justify-content-center">
                                          <button  class="btn btn-primary" name="invest" id="continue" type="submit">Continue</button>
                                          
                                        </div>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <?php }} else { ?>

        <!-- Plans End -->

       

        <div class="row">

        <?php
                       $sql = "SELECT * FROM investment_plans where deleted = '0'";
                       $result = $con->query($sql);
                       if($result){ 
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['name'];
              $id = $row['id'];
              $min =  $row['min_deposite'];
               $max =  $row['max_deposite'];
               $profit =  $row['daily_profit'];
                $name =  $row['name'];
                $capital_after =  $row['capital_after'];
                 $profit_after =  $row['profit_after'];
                 $referal_bonus =  $row['referal_bonus'];
                  $reg_date =  $row['reg_date'];
                  $daily_profit =  $row['daily_profit'];

                  $i++;

                            # code...
                        
                        ?>


            <div class="col-sm-6 col-lg-6 col-xl-3">
                <div class="card pricing-card">
                    <div class="card-body text-center">
                        <div class="card-category"><?php echo $name ?></div>
                        <h3 class="">$<?php echo number_format($min) ?> - $<?php echo number_format($max) ?></h3>
                        <ul class="list-unstyled leading-loose">
                            <li><i class="fe fe-check text-success mr-2"></i>
                            <?php echo $profit ?>% ROI</li>
                            <li><i class="fe fe-check text-success mr-2"></i>
                                Referral Bonus: <?php echo number_format($referal_bonus) ?>%</li>
                            <li><i class="fe fe-check text-success mr-2"></i>
                                Duration: <?php echo ($capital_after) ?> Day(s)</li>
                        </ul>
                        <div class="text-center mt-6">
                            <a href="invest?plan=<?php echo $id ?>"
                                class="btn btn-warning btn-block">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div><!-- col-end -->


            <?php } } } ?>

            

            

            
                

        </div>

        <!--###############PLAN##################### ---->

        <!-- row -->
        
        

      

              <!-- 111111111111111111111111111111111111 -->
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<script type="text/javascript">
          $(document).ready(function(){

              $("#form").submit(function(e){


                 var plan = $("#plan").find(":selected").val();
              var amount = $("#amount").val();
              const myArr = plan.split("-");
              var min = myArr[1];

              if(parseInt(amount) < parseInt(min)){
               //alert(min);
               // $("form").
                alert("minimum deposit is for this plan $"+ min);
                 return false;
              }
               
                

            });


          });




 
        </script>

<?php
require 'footer.php';

?>