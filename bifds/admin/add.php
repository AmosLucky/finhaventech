<?php
include 'admin_head.php';




////////////////////////////////////////SEND CODE////////////////////////

$msg = "";
  $alertType ="";
  $accountNumber = "";
  $accountName = "";
  $bankName = "";
  $swiftCode = "";
  $transferType = "";
  $amount = "";
  $description = "" ;
    $transaction_date = "";


if(isset($_POST['send'])){
  $accountNumber = $_POST['accountNumber'];
  $accountName = $_POST['accountName'];
 
  $swiftCode = $_POST['swiftCode'];
  $transferType = $_POST['transferType'];
  $amount = $_POST['amount'];
  $description = $_POST['description'];
  $user_id = $_POST['user_id'];
    $transaction_date = $_POST['transaction_date'];
    $date = date_create($transaction_date);
   
    $transaction_date  = date_format($date,"M d Y");
     $transaction_type = $_POST['transaction_type'];
    
    

  if(strlen($accountNumber) > 5){
         if(strlen($accountName) > 2){
                
                  if(strlen($description) > 1){

                  ///////////////////////////
                   if(strlen($amount) > 0){

                  ///////////////////////////
                    ////////////////////INSERT///////////////////


      
        // = date("D M d m:s");
                     $status = "Completed";

                  //////////////EVERYTHING IS RIGHT?//////////////////////////
                     ////////////CUT THE BALANCE/////
                     //$new_balance -= 
                     if($transaction_type == "Credit"){

               $sql = "UPDATE users SET balance = balance + '$amount' where id = '$user_id'"; 
             }else{
               $sql = "UPDATE users SET balance = balance - '$amount' where id = '$user_id'";

             }
 
               $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

               if($result){
                 $sql = "INSERT INTO transactions (
                      user_id,
                      transaction_type,
                      name,
                      description,
                      status,
                      amount,
                      account_number,
                      transaction_date,
                      channel
                    ) values(
                    '$user_id','$transaction_type','$accountName',
                    '$description','$status','$amount','$accountNumber',
                      '$transaction_date','$transferType')";

                      $result = mysqli_query($con,$sql) or die("Cant send ".mysqli_error($con));
                      if($result){
                       
                         $alertType ="alert-success";
                      if($transaction_type == "Credit"){
                         $msg = "Transaction successful <br> $ $amount has been credited to $accountName";
                      }else{
                         $msg = "Transaction successful <br> $ $amount has been Debited from $accountName";

                      }

                         $accountNumber = "";
                         $amount = "";
                         $receivedOTP = "";
                           echo '<script>
                          if ( window.history.replaceState ) {
                              window.history.replaceState( null, null, window.location.href );
                                             }
                                         </script>';



                      }
                          


               } else{
                 $alertType ="alert-danger";
                 $msg = "We cant complete this transaction, please try again ";

               }


                


                }else{
                  $alertType ="alert-danger";
                  $msg = "Please input an amount";
            
               }
                 }else{
                  $alertType ="alert-danger";
                  $msg = "Please input description";
            
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

////////////////////////////////////////////////////////////



if(isset($_GET['a'])&& $_GET['a'] > 0){
    $id = $_GET['a'];


?>
 <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 text-gray-800"><b> Add Transaction </b></h1>
          <div class="justify-content-center text-center alert <?php echo $alertType ?>">
            <?php echo $msg ?></div>

<div class="row justify-content-center" id="deposit-row">
            

            <div class="col-lg-8">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                    <!-- <img src="img/btc.png" width="50"> -->
                   Add Transaction  </h6>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="form">
                          <input type="hidden"  name="user_id" class="form-control" 
                           value="<?php echo $id ?>">

                        </div>
                   
                         <div class="form">
                          <input type="number" id="accountNumber" name="accountNumber" class="form-control" placeholder="Account Number" value="<?php echo $accountNumber ?>">

                        </div>
                   
                       

                         <div class="form">
                          <input type="text" id="accountName" name="accountName" class="form-control" placeholder="Depsitors or Recivers Name"  value="<?php echo $accountName ?>">
                          <div id="spinner" style="display: none">
                            <div class="spinner-border text-success" ></div>
                          <span>Fetching Account...</span>
                          </div>

                        </div>
                        <div class="form">
                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><b>$</b></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Amount" name="amount" value="<?php echo $amount ?>">
                          </div>

                        </div>
                        <div class="form">
                          <input type="hidden" name="swiftCode" class="form-control" placeholder="Swift Code" 
                          value="<?php echo $swiftCode ?>">

                        </div>
                        <div class="form">
                          <textarea type="text" name="description" class="form-control" placeholder="Description"><?php echo $description ?></textarea>

                        </div>

                        <div class="form">
                          <select class="form-control" name="transferType">
                            <option value="Local">Local Transfer</option>
                            <option value="International">International Transfer</option>
                          </select>

                        </div>
                        <div class="form">
                          <select class="form-control" name="transaction_type">
                            <option value="Credit">Credit</option>
                            <option value="Debit">Debit</option>
                          </select>

                        </div>

                        <div class="form">
                          <span>Date</span>
                          <input type="date" name="transaction_date" class="form-control" placeholder="Date">

                        </div>
                     
                     
                      
                     
                   

              <div class="row justify-content-center">
               <button type="submit" name="send"  class="btn btn-primary" id="btc">
                 Save <i class="fa fa-paper-plane" aria-hidden="true"></i>
               </button>
                
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>






<?php

}else{
    echo "YOU DID NOT CLICK ON ANY USER";
    echo " <script>
        window.location.href='admin_dashboard.php';
        </script>";
}
include 'admin_footer.php';


?>