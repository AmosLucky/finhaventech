<?php
include "header.php";
$msg = "";

$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

        $alertType ="";

        $tid = "";
        $date = "";
        $amount = "";
        $transaction_type = "";
         $account_type = "";
        $name = "";
        $description = "";
        $status =  "";
        $account_number = "";
        $transaction_level = "";
        $bank_name = "";
        $code_type = "";


 if(isset($_GET['t'])){
  $t = mysqli_real_escape_string($con,$_GET['t']);
  $split = explode("_", $t);
  $id = $split[0];
  $sql = "SELECT * FROM transactions where id = '$id'";
   $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;
      if(mysqli_num_rows($result) == 1){

      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $tid = $row['id'];
        $date = $row['transaction_date'];
        $amount = $row['amount'];
        $transaction_type = $row['transaction_type'];
         $account_type = $row['account_sign'];
        $name = $row['name'];
        $description = $row['description'];
        $status =  $row['status'];
        $account_number = $row['account_number'];
         $transaction_level = $row['transaction_level'];
        $bank_name = $row['bank_name'];
        if($transaction_level == "1"){
          $code_type = "OTP";
        }else{
           $code_type = "OTP";

        }

      }
    }else{
       echo " <script>
        window.location.href='transfer';
        </script>";

    }

 }else{
  echo " <script>
        window.location.href='transfer';
        </script>";
 }
 

if(isset($_POST['save'])){
  $account_name = $_POST['account_name'];
  $account_number = $_POST['account_number'];
  $bank_name = $_POST['bank_name'];
  $saved_date = date("D M d m:s");

 if(strlen($account_number) > 5){
         if(strlen($account_name) > 2){
                 if(strlen($bank_name) > 3){

                  $sql = "INSERT INTO beneficiaries(
                  user_id,
                  account_name,
                  account_number,
                  bank_name,
                  saved_on
                ) values(
                '$user_id',
                '$account_name',
                '$account_number',
                '$bank_name',
                '$saved_date'
              )";

                 $result = mysqli_query($con,$sql) or die("Cant save ".mysqli_error($con));
                      if($result){
                         $alertType ="alert-success";
                       $msg = "Correct $code_type";

                      }



                 }else{
                  $alertType ="alert-danger";
                  $msg = "Please input a bank name";


                 }

               }else{
                  $alertType ="alert-danger";
                  $msg = "Please input an account name";

               }

             }else{
               $alertType ="alert-danger";
              $msg = "Please input a receiver account number";

             }

}

if(isset($_POST['verify'])){
  $pin = $_POST['pin'];

 

  if($transaction_level == "1" && $pin > 0){
    if($pin == $first_pin){

      $sql2 = "UPDATE users SET  first_pin = '0' where id = '$user_id'";
      $result2 = mysqli_query($con,$sql2)or die("We cant complete this transaction ".mysqli_error($con));


      if($second_pin == 66 && $result2){
        echo '<script>
    window.location.href="./blocked";
    </script>';
    return;
    
    
        
      }

      $OTP =  rand(1,100000);
      $_SESSION['OTP'] = $OTP;

      ///Email///

        $subject = "Welcome";
     $email = $email;
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
     Hello $fullname

   </h2>

  
<p class='block'>

Use <h2> $OTP </h2> to complete your transaction of USD $amount


<br>

</p>

   
 </div>

 <div class='footer'>
   <p>
     Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
$company_mail
   </p>
   
 </div>

</body>
</html>
";
              
               require "../mail.php"; 
               //return;





      ///////








      $sql = "UPDATE transactions SET status = 'Completed' where user_id = '$user_id' && id = '$tid'";

      $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

               
                 
      if($result){


        $sql = "UPDATE users SET balance = balance - '$amount', 
second_pin = '1' where id = '$user_id'";
$result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

    

       if($result){

$alertType ="alert-success";
$msg = "Transaction successful!! <br> Generating receipt...";
$t = "receipt?id=".$tid."_tyu8694kloghgh_";
?>
<script>
 $(document).ready(function(){
    $('#myModal1').modal('show');
    
    $('#link').attr('href',"<?php echo $t ?>");
  });
</script>

<?php

}
}
              

               

    }else{
      $alertType ="alert-danger";
              $msg = $code_type." is incorrect";

    }


  }else if($transaction_level == "2"){
     if($pin == $second_pin){

      $sql = "UPDATE transactions SET status = 'Completed' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));
                 
                  if($result){


                     $sql = "UPDATE users SET balance = balance - '$amount', 
     second_pin = '1' where id = '$user_id'";
      $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

                 

                    if($result){

       $alertType ="alert-success";
        $msg = "Transaction successful!! <br> Generating receipt...";
         $t = "receipt?id=".$tid."_tyu8694kloghgh_";
        ?>
          <script>
setTimeout(myFunction, 2000);
function myFunction() {
   window.location.href="<?php echo $t ?>";
}
</script>

        <?php

      }
      }

    }else{
      $alertType ="alert-danger";
              $msg = $code_type." is incorrect";

    }

  }else{
    $alertType ="alert-danger";
            $msg = $code_type." is incorrect";

  }
  
}



?>        

<div class="content-w">


                <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <form action="" method="post">
                                            <h5 class="form-header">Enter your OTP to continue fund transfer</h5>
                                            <div class="form-desc">Please note that every successful transfer is not
                                                reversable</a>
                                            </div>

                                            


                                            <p class="alert text-white" role="alert"
                                                style="background: #1a587c;">Enter OTP</p>                                                                                            <div class="col-lg-12 col-xxl-6">
                                                <!--START - BALANCES-->
                                                <?php
                                        require "./balance_widget.php";
                                         ?>
                                                <!--END - BALANCES-->
                                            </div>
                                            <div class="justify-content-center text-center alert <?php echo $alertType ?>">
            <?php echo $msg ?></div>
                                            <div class="form-group"><label for=""> OTP</label>
                                                <input class="form-control" type="text" required
                                                    placeholder="please enter your otp to continue" name="pin">
                                            </div>
                                            <div class="form-check"><label class="form-check-label"><input
                                                        class="form-check-input" type="checkbox" required>I agree to <a href="../contact.php">terms and
                                                    conditions</a></label>
                                            </div>
                                            <div class="form-buttons-w text-right compact"><button
                                                    class="btn btn-primary" name="verify" type="submit"
                                                    value="Transfer">Transfer Fund <i
                                                        class="os-icon os-icon-grid-18"></i></button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Chat</span></div>
  <div class="floated-chat-w">
    <div class="floated-chat-i">
      <div class="chat-close"><i class="os-icon os-icon-close"></i></div>
      <div class="chat-head">
        <div class="user-w with-status status-red">
          <div class="user-avatar-w">
            <div class="user-avatar"><img alt="" src="img/avatar1.jpeg"></div>
          </div>
          <div class="user-name">
            <h6 class="user-title">MIKE</h6>
            <div class="user-role">Customer Service</div>
          </div>
        </div>
      </div>
      <div class="chat-messages">
        <div class="message">
          <div class="message-content">Hi Jerry, how can I help you?</div>
        </div>
        <div class="date-break">19th May 03:58 11pm</div>
        <div class="message">
          <div class="message-content">We are currently offline, please drop your message and we will reply you shortly</div>
        </div>
      </div>
      <div class="chat-controls">
        <input class="message-input" placeholder="Type your message here..." type="text">
        <div class="chat-extra"></div>
      </div>
    </div>
  </div>-->
                </div>
                </div>
            </div>
        </div>

 


 <!-- The Modal -->
<div class="modal fade" id="myModal1">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Transaction Status</h4>
        <hr>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
        <h3>Transaction Successful</h3>

        <div style="height: 300px; width: 100%; display: flex; justify-content: center;align-items: center;">
          <img src="images/check.png" height="200"/>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="link">
        <button type="button" class="btn btn-primary" >Ok</button>
        </a>
      </div>

    </div>
  </div>
</div>

        <?php

        require "footer.php";
        
        ?>