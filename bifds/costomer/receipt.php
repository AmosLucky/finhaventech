<?php
session_start();
include '../conn.php';
if(!isset($_SESSION['user'])){
   echo " <script>
        window.location.href='../login';
        </script>";

}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$account_number1 = "";




$user_id = $_SESSION['id'];

        $id = $_SESSION['id'];
       $balance =  "";//$_SESSION['balance'];
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];
        $_SESSION['phone'];
        //$_SESSION['state'];
        
          $_SESSION['firstname'];
        //  $_SESSION['referree'] ;



$sql = "SELECT * FROM users WHERE id =  '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    

    while ($row = mysqli_fetch_array($result)) {
      $account_number =  $row['account_number'];
      $account_type =  $row['account_type'];
      $account_number1 = $row['account_type'];
      $balance = $row['balance'];
     $account_currency = $row['account_currency'];
      //$bitcoin_address = $row['bitcoin_wallet'];
      //$_SESSION['balance'] = $row['balance'];
             $othername =  $row['other_name'];
             $surname =  $row['surname'];
      $fixed_deposit = $row['fixed_deposit'];
        $savings = $row['savings_interest'];
         $dob = $row['dob'];
         $country = $row['country'];
         $marital_status = $row['marital_status'];
         $address = $row['address'];
         $occupation = $row['occupation'];
      $first_pin = $row['first_pin'];
      $second_pin = $row['second_pin'];
      // $running_invest  = $row['running_invest'];
      // $pendding_invest = $row['pendding_investment'];
      // $pending_days = $row['pendding_days'];
      // $num_of_days = $row['num_of_days'];
      // $pending_profit = $row['pendding_profit'];
      // $profit = $row['profit'];
       $profile_picture = $row['profile_picture'];

      $firstname = $row['first_name'];
      //$lastname = $row['last_name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $active = $row['active'];
      $gender = $row['gender'];


      # code...
    }

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($con,$_GET['id']);
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
        $description = $row['description'] =!""?$row['description']:"--";
        $status =  $row['status'];
        $account_number1 = $row['account_number'];
        $transaction_level = $row['transaction_level'];
        $bank_name = $row['bank_name'];
        $bank_country = $row['bank_country'];
        $swift_code = $row['swift_code'] !=""?$row['swift_code']:"--";
        $routing_number = $row['routing_number'] !=""? $row['routing_number']:"--";
        if($transaction_level == "1"){
          $code_type = "Reflection PIN";
        }else{
           $code_type = "IMF Code";

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
 




?>


<!DOCTYPE html>
<html>
<style>
#idus {
    background-color: #222533 !important;
}
</style>

<body id="idus"
    style="background: #222533 !important; padding: 20px; font-size: 14px; line-height: 1.43; font-family: 'Helvetica Neue', 'Segoe UI', Helvetica, Arial, sans-serif;">
    <div
        style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        <center>
            <td style="background-color: #fff;"><img alt="" src="../img/favicon.png" width="90"></td>
            <div style="font-weight: 700; color: #0050b6; font-size: 20px; margin-top: -10px; padding-bottom: 10px;">
                <?php echo $company_name ?>            </div>
        </center>
        
        <div style="padding: 10px 70px;">
            <center><p style="color: green; font-size: 18px;"><b>TRANSFER SUCCESSFUL</b></p></center>
            <table style="margin-top: 10px; width: 100%;">
                <tr>
                    <td style="letter-spacing: 1px; color: #000000; font-size: 14px; font-weight: bold;">Payment Method
                        <br><small>Online Transfer</small>
                    </td>
                    <td
                        style="text-transform: uppercase; letter-spacing: 1px; color: #000000; font-weight: bold; text-align: right;">
                        Amount<br>
                        
                        <h5><?php echo $account_currency ?><?php  echo number_format($amount); ?></h5>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 2px 0px; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <div style="color: #111; font-size: 14px; font-weight: bold;"><?php echo $firstname." ".$surname." ".$othername;  ?>                
                             </div>
                        <div style="color: #000000; font-size: 12px;">Account:  <?php  echo $account_number ?></div>
                        <div style="color: #B8B8B8; font-size: 12px;"><?php if($transaction_type == "Debit"){ echo "Sender ";}else{ echo "Beneficiary";} ?></div>
                    </td>
                    <td
                        style="padding: 2px 0px; text-align: right;  font-size: 14px; font-weight: bold; color: #111; border-bottom: 1px solid rgba(0,0,0,0.05);">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0px;">
                        <div style="color: #111; font-size: 14px; font-weight: bold;"><?php  echo $account_number1 ?>                        </div>
                        <div style="color: #000000; font-size: 12px;">Account: <?php  echo $name ?> </div>
                        <div style="color: #B8B8B8; font-size: 12px;"><?php if($transaction_type == "Debit"){ echo "Beneficiary";}else{ echo "Sender";} ?></div>
                    </td>
                    <td style="padding:2px 0px; text-align: right; font-size: 14px; font-weight: bold; color: #111;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0px;">
                        <div style="color: #111; font-size: 14px; font-weight: bold;">Date</div>
                    </td>
                    <td style="padding: 5px 0px; text-align: right; font-size: 14px; font-weight: bold; color: #111;">
                        <?php echo $date ?>                   </td>
                <tr>
                    <td style="padding: 8px 0px;">
                        <div style="color: #111; font-size: 14px; font-weight: bold;">Reference</div>
                    </td>
                    <td style="padding: 8px 0px; text-align: right; font-size: 14px; color: #111;">
                        REF/<?php echo strtoupper($surname) ?>/<?php echo $id ?>_tyu8694kloghgh_                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 0px;">
                        <div style="color: #111; font-size: 14px; font-weight: bold;">Status</div>
                        <div style="color: #f00; font-size: 12px;"><?php echo $status ?></div>
                    </td>
                    <td style="padding: 15px 0px; text-align: right; font-size: 14px; font-weight: bold; color: #111;">
                        <div class="text-success">SUCCESSFUL</div>                    </td>
                </tr>
            </table>
            <table
                style="margin-left: auto; margin-top: 0px; border-top: 3px solid #eee; padding-top: 10px; margin-bottom: 20px;">
                <tr>
                    <td style="color: #B8B8B8; font-size: 12px; padding: 5px 0px;">Subtotal:</td>
                    <td
                        style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">
                        <?php echo $account_currency ?><?php  echo number_format($amount); ?></td>
                </tr>
                <tr>
                    <td style="color: #B8B8B8; font-size: 12px; padding: 5px 0px;">Tax:</td>
                    <td
                        style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">
                        <?php echo $account_currency ?>0.00</td>
                </tr>
                <tr>
                    <td style="color: #B8B8B8; font-size: 12px; padding: 5px 0px;">Other Charges</td>
                    <td
                        style="color: #45BB4C; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">
                        <?php echo $account_currency ?>0.00</td>
                </tr>
                <tr>
                    <td
                        style="color: #111; letter-spacing: 1px; font-size: 20px; padding: 5px 0px; text-transform: uppercase; font-weight: bold;">
                        Total</td>
                    <td
                        style="color: #4B72FA; text-align: right; font-weight: bold; padding: 0px 0px 5px 80px; font-size: 20px;">
                        <?php echo $account_currency ?><?php  echo number_format($amount); ?></td>
                </tr>
            </table>
            <br>
            <center>
                <a onClick="window.print()"
                style="color: white; font-weight: bolder; font-size: 14px; margin: 10px 0px; text-decoration: none; background: blue; padding: 3px 10px; border-radius: 8px;">Print
                Copy</a> <a href="dashboard.php"
                style="color: white; font-weight: bolder; font-size: 14px; margin: 10px 0px; text-decoration: none; background: red; padding: 3px 10px; border-radius: 8px;">Exit</a>
            </center>
        </div>
        <div style="background-color: #F5F5F5; padding: 20px; text-align: center;">

            <div style="color: #A5A5A5; font-size: 12px; font-weight: bold;"><?= $company_name ?></div>
        </div>
    </div>
    </div>
</body>


</html>