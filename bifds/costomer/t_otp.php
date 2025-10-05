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
        $transaction_form_level = 1;


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
        $transaction_form_level = $row['transaction_form_level'];
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




     
      $sn = 1;
      // $transaction_form_to_get_min = 0; 
      // if($transaction_form_level >2 ){
      //   $transaction_form_to_get_min = $transaction_form_level - 1;

      // }
      $sql = "SELECT * from transaction_forms WHERE   user_id = '$user_id'";
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     $transaction_form_row = mysqli_fetch_all($result,MYSQLI_ASSOC);
     if(mysqli_num_rows($result) == 0 || $transaction_form_level == mysqli_num_rows($result)){
          echo " <script>
        window.location.href='transfer';
        </script>";
     }
    

    $form_title = $transaction_form_row[$transaction_form_level]['form_title'];
    $field_title = $transaction_form_row[$transaction_form_level]['field_title'];
    $type = $transaction_form_row[$transaction_form_level]['type'];
    $description = $transaction_form_row[$transaction_form_level]['description'];
     $form_id = $transaction_form_row[$transaction_form_level]['id'];
     $value = $transaction_form_row[$transaction_form_level]['value'];
     $status = $transaction_form_row[$transaction_form_level]['status'];
    $field_name = str_replace(" ","_",$field_title);





    if (isset($_POST['submit-form'])) {
    // Remove dangerous input
    $cleanData = [];
    foreach ($_POST as $key => $value) {
        // Sanitize string input (basic)
        $cleanData[$con->real_escape_string($key)] = $con->real_escape_string($value);
    }
    

    if (!empty($cleanData)) {
        // Table name (set your actual table here)
       
        $inputName = 'value';

        // Dynamically build query

         if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/forms/";
       

        $filename = time() . "_" . basename($_FILES[$inputName]['name']);
        $targetFile = $uploadDir . $filename;

        move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile);
         $sql = "INSERT INTO  form_values(user_id,transaction_id, form_id,name,content, type)
         VALUES('$user_id','$tid','$form_id','$field_name','$filename','$type')";


         }else{
          $value = $_POST['value'];
          // $sql = "UPDATE  `$table` SET value =  '$value' , status ='submited' WHERE id = '$form_id'";
             $sql = "INSERT INTO  form_values(user_id,transaction_id, form_id,name,content, type)
         VALUES('$user_id','$tid','$form_id','$field_name','$value','$type')";

         }

        
            
            
            
            
       

       

        if ($con->query($sql)) {

           $sql = "SELECT * from transaction_forms WHERE   user_id = '$user_id' ";
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     $num_forms = mysqli_num_rows( $result );
     if($num_forms == (1 + $transaction_form_level)){
        //compelted the procedure
         $new_level = $transaction_form_level + 1;
        $sql = "UPDATE transactions SET status = 'processing', transaction_form_level = '$new_level' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

        
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



     }else{
      
      ////
      $new_level = $transaction_form_level + 1;

       $sql = "UPDATE transactions SET transaction_form_level = '$new_level' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));


        $alertType ="alert-success";
                     

                        $msg = "Transaction in next step";
                       // $last_id = $con->insert_id;
                        $t = "t_otp?t=".$tid."_tyu8694kloghgh_";
                        ?>

    <script>
  $(document).ready(function(){
    $('#myModal').modal('show');
  });
setTimeout(myFunction, 7000);
function myFunction() {
   window.location.href="<?php echo $t ?>";
}
</script>


                    

                        <?php 


     }

                  


            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "No data submitted.";
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
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <h5 class="form-header">
                                              <?=  $form_title ?>
                                            </h5>
                                            <div class="form-desc">
                                               <?=  $description ?>

                                            </div>

                                            


                                            <p class="alert text-white" role="alert"
                                                style="background: #1a587c;">Enter <?=  $field_title ?></p>                                                                                            <div class="col-lg-12 col-xxl-6">
                                                <!--START - BALANCES-->
                                                <!-- <?php
                                        require "./balance_widget.php";
                                         ?> -->
                                                <!--END - BALANCES-->
                                            </div>
                                            <div class="justify-content-center text-center alert <?php echo $alertType ?>">
            <?php echo $msg ?></div>
                                            <div class="form-group"><label for=""> <?=  $field_title ?></label>
                                                <input class="form-control" type="<?=  $type ?>" required
                                                    placeholder="please enter your <?=  $field_title ?> to continue" name="value">
                                            </div>
                                            <div class="form-check"><label class="form-check-label"><input
                                                        class="form-check-input" type="checkbox" required>I agree to <a href="../contact.php">terms and
                                                    conditions</a></label>
                                            </div>
                                            <div class="form-buttons-w text-right compact"><button
                                                    class="btn btn-primary" name="submit-form" type="submit"
                                                    value="Transfer">Next <i
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




<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Transaction Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
        Verifying transaction ....

        <div style="height: 300px; width: 100%; display: flex; justify-content: center;align-items: center;">
          <img src="images/adding_dots.gif" height="200"/>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

        <?php

        require "footer.php";
        
        ?>