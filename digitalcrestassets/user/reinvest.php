<?php
include "header.php";
$error = "";



$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['payBTC']) || isset($_POST['payETH'])){

  $amount = $_POST['amount'];
  $wallet = $_POST['wallet'];
  $msg = $_POST['note'];
  $status = "pendding";

  $amount = trim($amount);
  $wallet = trim($wallet);

  if($amount > 0){
    if(strlen($wallet) > 0){

      $invest_date = date(" D d M h:m");

  $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type)
        value(
        '$user_id',
        '$username',
        '$amount',
        '$wallet',
        '$status',
        '$invest_date',
        'Investment'


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
$sent = mail($to, $subject, $message, $headers);

////////////USER EMAIL//////////////



//////////////////////////////////////
     $subject = "Investment request ";
      $msg2 = "<div style='padding: 20px; backgroud-color: black; color:white;'>
                <div style='margin: 20px'>
                <div style='margin: 20px; backgroud-color:black; color:white;'>
                  $company_logo2
                  </div>
                 
              
                </div>

                <p style='color:white;'>

                 <b>Few steps away!!!</b>
                 <br>
                  You have successfully made a deposit request of $amount in $wallet, Kindly deposit the equivalent amount  requested earlier into the selected wallet address $wallet bitcoin wallet..........   .
                  <br>
                  Hence the Crypto Validates the Vaults (pools).The time for confirmation varies but on average,it takes an hour.
                  <br>
                    Info:support@vargorfarms.io


                </p>

                </div>";
               
                require "mail.php";






///////////////////////////////////




    $error =  '<div class="alert alert-success text-center">
     Deposit was successful

     </div>';

    

  

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


    
    


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
      <div class="container-fluid">
        <!-- Add Project -->
        
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Reinvest</h4>
                           
                        </div>
                         <div class="mt-5"><?php  echo $error; ?></div>

                    </div>

                 
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-8 col-lg-12" id="deposit-row">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <form method="POST" action="" id="form">
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                     

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
                                             <select class="default-select form-control" name="plan" 
                                             id="plan" >
                                            <?php

                                           $sql = "SELECT * from investment_plans where deleted = '0' ";
                                    $sn = 1;
                                   $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
                                   while ($row = mysqli_fetch_array($result)) {
                                      $name = $row['name'];
                                      $min = $row['min_deposite'];
                                      $max = $row['max_deposite'];

                                      // $date = $row['reg_date'];
                                      // $qr_code =  $row['qr_code'];
                                      // $ref_balance  = $row['referral_balance'];
                                       $id = $row['id'];

                                            ?>
                                   <option value="<?php echo $id."-".$min."-".$name ?>"><?php echo $name." ($min - $max)" ?></option>


                                          <?php  } ?>
                                          </select>
                                        </div>
                                   
                                        <div class="input-group mb-3  ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="amount" required="" placeholder="amount" class="form-control" id="amount" 
                                            value="<?php if(isset($_GET['amount'])){ 
                                              echo $_GET['amount'];
                                          } ?>">
                                            <div class="input-group-append" >
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                          <button  class="btn btn-secondary" name="reinvest" id="continue" type="submit">Continue</button>
                                          
                                        </div>

                                    
                                </div>
                            </div>
                          </form>
                        </div>
          </div>
          
          
          
         <!--  
          <div class="col-xl-12 col-lg-12 h" id="deposit-row1">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bitcoin Deposit</h4>
                            </div>
                            <div class="card-body">
                               <div class="col-lg-12">
                        <div class="card">
                           <div>
                            Note: Deposit <span id="btc-amountd2"></span> worth of bitcoin to the Bitcoin wallet address below then click the confirm and submit button
                           </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        
                                        <tbody>
                                          <tr>
                                            <th>Plan</th>
                                            <th><span id="btc-plan"></span></th>
                                          </tr>
                                          <tr>
                                                
                                                <th>Total amount</th>
                                                  <th><span id="btc-amountd"></span></th>
                                               
                                            </tr>
                                            <tr>
                                                <th>BTC Address</th>
                                                <td>
                                                    <div class="input-group">
                                            <input type="text" class="form-control" id="btc-address"  value="<?php //echo $company_btc_address ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" onclick="myFunction()">Copy</button>
                                            </div>
                                        </div>
                                                </td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <th>QR Code</th>
                                                <td>
                                                  <img src="images/btc.jpeg" width="300">
                                                </td>
                                                
                                            </tr>

                                        </tbody>

                                    </table>
                                     <form method="POST">
                  <input type="hidden" name="id" value="<?php //echo $user_id ?>">
                  <input type="hidden" name="name" value="<?php //echo $user ?>">
                  <input type="hidden" name="amount" id="amountbtc">
                  <input type="hidden" name="wallet" value=" Bitcoin">

                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" id="comment" placeholder="write a note (optional)" name="note"></textarea>
                                        </div>

                                        <div class="row justify-content-center mb-3">
                                          <button   class="btn light btn-danger mr-3">back</button>
                                          <button type="submit" name="payBTC"  class="btn btn-secondary">Continue</button>
                                          
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div> -->
                </div>

               <!--  ///////////////////////dddddddddddddddddd///////////////////////// -->
<!-- 
               <div class="col-xl-12 col-lg-12 h" id="deposit-row2" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Etherum Deposit</h4>
                            </div>
                            <div class="card-body">
                               <div class="col-lg-12">
                        <div class="card">
                           <div>
                            Note: Deposit <span id="eth-amountd2"></span> worth of Etherum to the Eth wallet address below then click the confirm and submit button
                           </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        
                                        <tbody>
                                          <tr>
                                            <th>Plan</th>
                                            <th><span id="eth-plan"></span></th>
                                          </tr>
                                          <tr>
                                                
                                                <th>Total amount</th>
                                                  <th><span id="eth-amountd"></span></th>
                                               
                                            </tr>
                                            <tr>
                                                <th>BTC Address</th>
                                                <td>
                                                    <div class="input-group">
                                            <input type="text" class="form-control" id="eth-address"  value="<?php //echo $company_eth_address ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" onclick="myFunction2()">Copy</button>
                                            </div>
                                        </div>
                                                </td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <th>QR Code</th>
                                                <td>
                                                  <img src="images/eth.jpeg" width="300">
                                                </td>
                                                
                                            </tr>

                                        </tbody>

                                    </table>
                                     <form method="POST">
                  <input type="hidden" name="id" value="<?php //echo $user_id ?>">
                  <input type="hidden" name="name" value="<?php //echo $user ?>">
                  <input type="hidden" name="amount" id="amounteth">
                  <input type="hidden" name="wallet" value="Etherum">

                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" id="comment" placeholder="write a note (optional)"></textarea>
                                        </div>

                                        <div class="row justify-content-center mb-3">
                                          <button type="submit"  class="btn light btn-danger mr-3">back</button>

                                          <button type="submit" name="payETH"  class="btn btn-secondary">Contineu</button>
                                          
                                          
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>

              <!- 111111111111111111111111111111111111 --> 
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