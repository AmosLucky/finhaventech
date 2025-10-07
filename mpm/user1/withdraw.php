<?php
include "header.php";
$amount = "";
$wallet = "";
$error  = "";
$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['withdraw'])){

 
  $amount = $_POST['amount'];
   $wallet_address = $_POST['wallet_address'];
  //$status = "pending";
  $wallet_info = explode("-",$wallet_address);
  $type  = $wallet_info[0];
  $wallet_address = $wallet_info[1];

  $type = trim($type);
  $amount = trim($amount);
  $request_date = date("d m M h:i");
 // $wallet_address = "";
  $address_type = $type;
  

  
    if($amount >= 10){
        if(!$is_suspended){
            if(!$is_compounded){

      //$invest_date = date(" D d M m:i");
      //echo $balance;
      if(strlen($wallet_address) > 8 ){

      if($amount <= $balance){
       
         $new_balance = $balance -$amount;


        $sql = "UPDATE members SET balance = '$new_balance' where id = '$user_id'";
        $result = mysqli_query($con,$sql) or die("Cant proccess ".mysqli_error($con));
        if($result){






       
  
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


  if($result){

    ////// do insert ///////////

    $sql = "INSERT INTO transactions (user_id,user_name, amount, status, invest_date,name,address,wallet_type,transaction_type)
    VALUES(
    '$user_id',
    '$username',
    '$amount',
    'pending',
    '$request_date',
    '$balance',
    '$wallet_address',
    '$address_type',
    'Withdrawal'
    )
    ";

    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


    //// to do sucess 

    if($result){
      $error = '<div class="alert alert-success text-center">
     You have successfully requested for withdrawal

     </div>';
     
     ////////////////////////mailer////////////////
     $sql = "SELECT email, username from members where id = '$user_id'";

        $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
      $email = $row['email'];
      $username = $row['username'];
      # code...
    }

     
     
//$to = "$email"; // enter the users email here
$subject = 'Withdrawal Order';
//$from = $company_email; /// enter the email of you host example admin@netbaba.com
 
// Compose a simple HTML email message
$message = "<!DOCTYPE html>
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
        
        <h4>
            VargoFarm
        </h4>

        <h2>
            Hello $username

        </h2>

        <p class='block'>
            <b>Withdrawal </b>
            <br>

Hello $username,
<br>
 
Your request for withdrawal of USD$amount in $type has been approved.
<br>
<br>
        </p>

        
    </div>

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
 $msg2 = $message; 
//mail($to, $subject, $message, $headers);
require "../mail.php"; 
 
 
 //////////////////////////////////// end ///////////////////////////////
    }

  

    }

    /////////////////balance reduced//////////

  }
      }else{
     $error = '<div class="alert alert-danger text-center">
     Insufficient Balance

     </div>';

      ///// to do errorr///////

    }

    }else{
     $error = '<div class="alert alert-danger text-center">
     Invalid wallet address

     </div>';

      ///// to do errorr///////

    }

     }else{
     $error = "<div class='alert alert-danger text-center'>
    Your asset is locked for $compounded_duration days

     </div>";

      ///// to do errorr///////

    }

      

  }else{
     $error = '<div class="alert alert-danger text-center">
    Your account is restricted from making a withdrawal request

     </div>';

      ///// to do errorr///////

    }

}else{
     $error = '<div class="alert alert-danger text-center">
    The minimum withdrawal is $10

     </div>';

      ///// to do errorr///////

    }




    


  
  
}


// if(isset($_POST['add_wallet'])){
//   $address = $_POST['address'];
//   $wallet_type =  $_POST['wallet_type'];
//   if(strlen( $address) > 5){
//       if(strlen($wallet_type)>2){

//           $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
//           $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
//           if($result){
//                $error = '<div class="alert alert-success text-center">
//    Wallet succefully saved (this wallet will be an option when you will request for withdraw)

//    </div>';

//           }


//       }else{
//            $error = '<div class="alert alert-danger text-center">
//    Invalid type

//    </div>';
//       }

//   }else{
//       $error = '<div class="alert alert-danger text-center">
//    Invalid wallet address

//    </div>';
//   }

// }



if(isset($_POST['add_wallet'])){
  $address = $_POST['address'];
  $wallet_type =  $_POST['wallet_type'];
  if(strlen( $address) > 5){
      if(strlen($wallet_type)>2){

          $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
          $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
          if($result){
               $error = '<div class="alert alert-success text-center">
   Wallet succefully saved (this wallet will be an option when you will request for withdraw)

   </div>';

          }


      }else{
           $error = '<div class="alert alert-danger text-center">
   Invalid type

   </div>';
      }

  }else{
      $error = '<div class="alert alert-danger text-center">
   Invalid wallet address

   </div>';
  }

}



$sql = "SELECT * from wallets where user_id = '$user_id' ";
$sn = 1;
$result_wallets = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
$num_wallets =  mysqli_num_rows($result_wallets);



?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="container-fluid">

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div class="d-flex">
        <i class="mdi mdi-home text-muted hover-cursor"></i>
        <a href="index"><p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p></a>
        <p class="text-primary mb-0 hover-cursor">Withdrawal</p>
        
      </div>
    </div>

    <div
      class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
      <a href="withdraw" class="btn btn-success mt-2 mt-xl-0">
        <!-- <i class="mdi mdi-download "></i> -->
        Withdraw
      </a>
      <a href="deposit" class="btn btn-primary mt-2 mt-xl-0">Make Deposit</a>
      <!-- <a href="transactions"
        class="btn btn-danger  btn-icon mr-3 mt-2 mt-xl-0">
        <i class="mdi mdi-clock"></i>
      </a> -->
      <!-- <a href="deposit" class="btn btn-success btn-icon mr-3 mt-2 mt-xl-0">
        <i class="mdi mdi-plus">Deposit</i>
      </a> -->
      
    </div>


    
  </div> <!-- /breadcrumb -->

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title mb-4">Make Withdrawal</div>
        <form action="" method="post">
          <p> <div> <?php echo $error ?></div></p>
          <div class="row">
         

            <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label class="form-label float-left">Amount</label>
                <div class="input-group">
                  <input type="text" name="amount" class="form-control" value>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-light">USD</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label class="form-label float-left">Payment Wallet</label>
                <div class="input-group">
                  <div class="input-group-append w-100">
                    <?php  if($num_wallets > 0){ ?>
                    <select
                      class="default-select form-control"
                      name="wallet_address">
                      
                      <?php

                      
                     
                     

                     
             while ($row = mysqli_fetch_array($result_wallets)) {
                $type = $row['type'];
                $address = $row['wallet'];
                // $date = $row['reg_date'];
                // $qr_code =  $row['qr_code'];
                // $ref_balance  = $row['referral_balance'];
                 $id = $row['id'];

                        ?>
                        <option value="<?php echo  $type."-".$address ?>"><?php echo $type .": ". $address ?></option>
                        

                      <?php  } ?>
                    </select>

                   

                    <?php }else {?>
                      <button class="btn btn-primary mt-2 mt-xl-0" data-target="#modaladd" type="button" data-toggle="modal" ><i
                class="fa fa-refresh"></i>Add wallet payment wallet</button>

                      <?php } ?>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="float-right">
            <button class="btn btn-primary" type="submit" name="withdraw"><i
                class="fa fa-refresh"></i>Withdraw Funds</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <!--**********************************
            Content body end
        ***********************************-->

        <!-- Small modal -->
		<div class="modal" id="modaladd">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">ADD WALLET</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
                                      <form action="" method="post">
					<div class="modal-body">
					<div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="wallet_type" class="form-control select2">
                    <option label="Choose Wallet Type"></option>
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="Binance">Binance coin</option>
                    <option value="Litecoin">Litecoin</option>
                    <option value="Tehter">Tether USD</option>
                  </select>
                    </div><!-- form-group -->
                    <input type="hidden" value="778" name="id">
                    <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                      <input type="text" placeholder="Wallet Address" name="address" class="form-control" >
                    </div><!-- form-group -->
	
					</div>
					<div class="modal-footer justify-content-center">
                                            
                                              
						<button class="btn ripple btn-success" name="add_wallet" type="submit">ADD</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
                                          </form>
				</div>
			</div>
		</div>
		<!-- End Small Modal -->
		

  <?php
  require 'footer.php';

  ?>