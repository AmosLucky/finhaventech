<?php
include 'admin_head.php';

$msg = "";
if(isset($_POST['submit'])){

  $bank = $_POST['bank'];
  $account_number = $_POST['account_number'];
  $account_name = $_POST['account_name'];
  $sql = "SELECT * FROM bank_details where account_number = '$account_number'";
    $result = mysqli_query($con,$sql)or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
    if($num > 1){
       $msg = "ACCOUNT NUMBER ALREADY EXISTS";
      // echo " <script>
      //   window.location.href= 'add_bank.php';
     
    }else{
      ///////////////////////////////////////


  if($account_number > 123){
    $sql = "INSERT INTO bank_details(bank_name,full_name,account_number) 
                    values ('$bank','$account_name','$account_number')";
                    $result = mysqli_query($con,$sql)or die(mysqli_error($con));
                    if($result){
                       $msg = "successfully added bank";

                    }


  }else{
    $msg = "Account valid";


  }
  ////////////////////////////////////////

}


  



}
?>




<div class="container">
	
    <div class=" text-center">
      <b class="p-3"> <h5><?php  echo $msg; ?></b> </h5>
    </div>

	<!-- <table class="table table-striped">
    <thead>
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>referred_by</th>
        <th>registered on</th>
        <th>balance</th>
        <th>referal balance</th>
        <th>bitcoin wallet</th>
        <th>etherum wallet</th>
         <th>Running investment</th>
      </tr>
    </thead>
    <tbody> -->
       <!-- DataTales Example -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Bank</h6>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form">
                <input type="text" name="bank" placeholder="Bank Name" class="form-control">
              </div>

               <div class="form">
                <input type="text" name="account_number" placeholder="Account Number" class="form-control">
              </div>

               <div class="form">
                <input type="text" name="account_name" placeholder="Account Name" class="form-control">
              </div>

               <div class="form">
               <input type="submit" name="submit" class="form-control btn btn-primary" value="SUBMINT">
              </div>
                
              </form>
                            
              </div>
              </div>
              </div>



<?php
include 'admin_footer.php';


?>