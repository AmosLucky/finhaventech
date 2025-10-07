<?php
include "header.php";
$error = "";
$rid = "";
$rusername = "";
$remail = "";
$ramount = "";




$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['transfer'])){
    $rusername = $_POST['username'];
    $amount = $_POST['amount'];
    if($amount >= 10){
        if($amount <= $balance){
        if(strlen($username) > 2){
            $sql = "SELECT * FROM members where username = '$rusername' || email =  '$rusername'";

            $result = mysqli_query($con, $sql) or die("an error occoured");
            if(mysqli_num_rows($result) == 1){

               while ($row = mysqli_fetch_array($result)) {

                $rid = $row['id'];
                $rusername = $row['username'];
                $remail = $row['email'];
                $ramount = $_POST['amount'];
                if($rid != $user_id){
                ?>
              <script>
                            $(document).ready(function(){
                                //alert(";;;");
                               $('#trns').modal('show');
                                });
                        </script>

                        <?php
                    }else{
                         $error = "<div class='alert alert-danger'>
    You can't transfer fund to your self
    </div>";

                    }
               }
            }else{
                $error = "<div class='alert alert-danger'>
    No user found with this username or email
    </div>";

            }

        }else{
         $error = "<div class='alert alert-danger'>
    Please enter a valid username or email
    </div>";
    }
}
    else{
         $error = "<div class='alert alert-danger'>
    Insuficient balance
    </div>";
    }

    }else{
         $error = "<div class='alert alert-danger'>
    Minimum transfer amount is $10
    </div>";
    }
   

}

if(isset($_POST['confirm'])){
    $details = $_POST['details'];
     
    $details_arr = explode("-",  $details);
    $rid = $details_arr[0];
    $ramount = $details_arr[1];
    $rusername = $details_arr[2];
    $remail = $details_arr[3];
     $request_date = date("d m M h:i");

    $sql = "UPDATE members set balance = balance - '$ramount' where id = '$user_id'";
    $result = mysqli_query($con, $sql) or die("An error occoured ".mysqli_error($con));
    if($result){

        
        $sql = "UPDATE members set balance = balance + '$ramount' where id = '$rid'";
    $result2 = mysqli_query($con, $sql) or die("An error occoured 2 ".mysqli_error($con));



    if($result2){
        $type = "Transfer";
        ///////////// insert into transactions//////////
         $sql = "INSERT INTO transactions (user_id,user_name, amount, status, invest_date,transaction_type,wallet_type,description)
    VALUES(
    '$user_id',
    '$username',
    '$ramount',
    'approved',
    '$request_date',
    
    '$type',
    'USD Debit',
    '$type'
    )
    ";

    $result3 = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


    //// to do sucess 

    if($result3){
        $type = "Received - $username";

         ///////////// insert into transactions//////////
         $sql = "INSERT INTO transactions (user_id,user_name, amount, status, invest_date,transaction_type,wallet_type,description)
    VALUES(
    '$rid',
    '$rusername',
    '$ramount',
    'approved',
    '$request_date',
    
    '$type',
    'USD Credit',
    '$type'
    )
    ";
       $result4 = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));

       if($result4){
          $error = '<div class="alert alert-success text-center">
     Fund transfer successful

     </div>';
       }

    
 }

    }

    }
}





?>
            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Fund Transfer</h5>
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
                    <div class="row profile">
                        <div class="col-md-12">
                            <div class="p-2 pb-3 p-md-5 pb-md-0 ">
                                <div class="row">
                                    <div class="mb-3 col-md-4 offset-md-4">
                                        <div class="p-3 card">
                                            <div class="d-flex align-items-center justify-content-around">
                                                <img src="themes/purposeTheme/assets/img/wallet.png"
                                                    alt="wallet" width="25">
                                                <div>
                                                    <h5 class="mb-1 d-inlne">
                                                        <b>$<?php echo number_format($pendding_balance,2) ?></b>
                                                    </h5>
                                                    <small class="text-muted">Your Account Balance</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 offset-md-2">
                                        <form method="post" >
                                        <?php echo $error ?>
                                           <div class="form-group">
                                                <label for="" class="">Recipient  username <span
                                                        class=" text-danger">*</span></label>
                                                <input type="text" name="username" class="form-control " required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="">Amount($) <span
                                                        class=" text-danger">*</span></label>
                                                <input type="number" min="50" name="amount"
                                                    placeholder="Enter amount you want to transfer to recipient"
                                                    class="form-control " required>
                                            </div>
                                            <div class="form-group">
                                                <h6 class="">Transfer Charges: <strong
                                                        class=" text-danger">0%</strong>
                                                </h6>
                                            </div>
                                            <!-- <input type="hidden" name="password" id="acntpass"> -->
                                            <div class="">
                                                <input type="submit" name="transfer" class="py-2 btn btn-primary btn-block"
                                                    value="Proceed">
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
    </div>

                    
                              <!-- Alert -->
            <form method="post">
                      
                      <div class="modal fade" id="trns" tabindex="-1" role="dialog" aria-labelledby="trns" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="">Transfer Details<br><small style="font-size: 12px;" class="text-muted"> 
                                    Please Confirm your transfer</small></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="">
                          <div class="pd-y-30 pd-xl-x-">
                            
                            <div class="pd-x- pd-y-10">
                              
                              <p>You are about to send <b class='text-success'>$<span id='mdamt'><?php echo ($ramount) ?> </span></b> to <b class='text-success'><span id='mdname'><?php echo $rusername ?></span></b></p>
                              <br>
                              <p>
                      Recipient Details:
                      <br>
                      <h5>Username: <span class='mdamt'><?php echo $rusername ?> </span></h5>
                      <h5>Email: <span class='mdamt'><?php echo $remail ?></span></h5>
                      <h5>Amount: <span class='mdamt'>$<?php echo $ramount ?></span></h5>
                  </p>
                  <input type="hidden" class="form-control" name="details" value="<?php echo $rid."-".$ramount."-".$rusername."-".$remail ?>">
                              <button class="btn btn-success btn-block" type="submit" name="confirm">Send</button>
                               <div class="form-group mt-4">
                                  <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                              </div><!-- form-group -->
                            </div>
                              
                          </div><!-- pd-20 -->
                        </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                      </form>
          
                      <!---END--->
            
            <!-- Footer -->
            <?php
     require "footer.php";
?>
