<?php
include "header.php";

$otp_type = ["","ITAC","NRTCC","IMFIAC","CECC"];
$otp_full_name = ["","International Transfer Activation Code",
"Non Resident Tax Clearance Code",
"IMF Insurance Approval Code",
"Currency Exchange Conversion Code"];
$otp = ["","ITAC89482","NRTCC83543","IMFIAC22597","CECC35724"];

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
        $code_type = "ITAC Code";




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
       echo $transaction_type = $row['transaction_type'];
         $account_type = $row['account_sign'];
        $name = $row['name'];
        $description = $row['description'];
        $status =  $row['status'];
        $account_number = $row['account_number'];
         $transaction_level = $row['transaction_level'];
        $bank_name = $row['bank_name'];

          $code_type = $otp_type[$transaction_level];

        if($status == "Completed"){
          echo " <script>
          window.location.href='transfer';
          </script>";

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
 

// if(isset($_POST['save'])){
//   $account_name = $_POST['account_name'];
//   $account_number = $_POST['account_number'];
//   $bank_name = $_POST['bank_name'];
//   $saved_date = date("D M d m:s");

//  if(strlen($account_number) > 5){
//          if(strlen($account_name) > 2){
//                  if(strlen($bank_name) > 3){

//                   $sql = "INSERT INTO beneficiaries(
//                   user_id,
//                   account_name,
//                   account_number,
//                   bank_name,
//                   saved_on
//                 ) values(
//                 '$user_id',
//                 '$account_name',
//                 '$account_number',
//                 '$bank_name',
//                 '$saved_date'
//               )";

//                  $result = mysqli_query($con,$sql) or die("Cant save ".mysqli_error($con));
//                       if($result){
//                          $alertType ="alert-success";
//                        $msg = "Correct $code_type";

//                       }



//                  }else{
//                   $alertType ="alert-danger";
//                   $msg = "Please input a bank name";


//                  }

//                }else{
//                   $alertType ="alert-danger";
//                   $msg = "Please input an account name";

//                }

//              }else{
//                $alertType ="alert-danger";
//               $msg = "Please input a receiver account number";

//              }

// }

if(isset($_POST['verify'])){
  $pin = $_POST['pin'];

              //   if($second_pin == 66 && $result2){
              //     echo '<script>
              // window.location.href="./blocked";
              // </script>';
              //   return;



              // }

 

  if(strlen($pin) > 0){

    if($pin == $otp[$transaction_level]){



    //   $sql2 = "UPDATE users SET  first_pin = '0' where id = '$user_id'";
    //   $result2 = mysqli_query($con,$sql2)or die("We cant complete this transaction ".mysqli_error($con));



    //  $sql = "UPDATE users SET
    //  second_pin = '$OTP' where id = '$user_id'";
    //   $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));





    if($transaction_level == 4){

     
      $sql = "UPDATE transactions SET status = 'Completed' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));
                 
                  if($result){


                     $sql = "UPDATE users SET balance = balance - '$amount', 
     second_pin = '0' where id = '$user_id'";
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

    $next_level = $transaction_level + 1;


    $sql = "UPDATE transactions SET
    transaction_level = '$next_level' where user_id = '$user_id' 
    && id = '$tid'";
     $result = mysqli_query($con,$sql)or 
     die("We cant complete this transaction ".mysqli_error($con));


               
                 
                  if($result){
                    $alertType ="alert-success";
                    $msg = "Pin successful!! <br> Redirectinfg...";
                     $t = "t_otp?t=".$tid."_tyu8694kloghgh_";

                   
      
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
    $msg = $code_type." is invalid";
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
                                            <h5 class="form-header">Enter your <?php echo $otp_full_name[$transaction_level] ?> to continue fund transfer</h5>
                                            <div class="form-desc">Please note that every successful transfer is not
                                                reversable</a>
                                            </div>

                                            


                                            <p class="alert text-white" role="alert"
                                                style="background: #1a587c;">Transfer amount: <b><?php echo $account_currency ?> <?php echo $amount ?></b></p>                                                                                            <div class="col-lg-12 col-xxl-6">
                                                <!--START - BALANCES-->
                                             <!--    <?php
                                        //require "./balance_widget.php";
                                         ?> -->
                                                <!--END - BALANCES-->
                                            </div>
                                            <div class="justify-content-center text-center alert <?php echo $alertType ?>">
            <?php echo $msg ?></div>
                                            <div class="form-group"><label for=""> Enter <?php echo $code_type ?></label>
                                                <input class="form-control" type="text" required
                                                    placeholder="please enter your <?php echo $code_type ?> to continue" name="pin">
                                            </div>
                                            <div class="form-check"><label class="form-check-label"><input
                                                        class="form-check-input" type="checkbox" required>I agree to terms and
                                                    conditions</label>
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
        <?php

        require "footer.php";
        
        ?>