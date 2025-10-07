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

            <!-- container -->
            <div class="container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <a href="index.php"><p
                                    class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p></a>
                            <p class="text-primary mb-0 hover-cursor">Transfer
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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">Make Transfer</div>
                            <?php echo $error ?>
                            <form action="" method="post">
                                <div class="row">

                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label float-left">Amount</label>
                                            <div class="input-group">
                                                <input type="number" name="amount"
                                                    class="form-control" value>
                                                <div class="input-group-append">
                                                    <button type="button"
                                                        class="btn btn-light">USD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label float-left">Transfer
                                                To</label>
                                            <div class="input-group">
                                                <input type="text" name="username"
                                                    placeholder="Username of Reciever"
                                                    class="form-control" value>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="id" id="amount1"
                                        hidden value="1272" placeholder>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-primary"
                                        type="submit" name="transfer"><i
                                            class="fa fa-refresh"></i>Transfer</button>
                                </div>
                            </form>

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
                              
                              <p>You are sending <b class='text-success'>$<span id='mdamt'><?php echo number_format(((float)($ramount))) ?> </span></b> to <b class='text-success'><span id='mdname'><?php echo $rusername ?></span></b></p>
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
          
                        </div>
                    </div>
                </div>
            </div>
            <!-- /conatiner -->
        </div>
        <!-- /main-content -->

        <?php

        require "footer.php";

        ?>