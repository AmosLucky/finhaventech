<?php

require "header.php";
$msg = "";

if(isset($_POST['add_fund'])){
    $invest_date = date(" D d M h:m");
   
    
    $username = $_POST['username']; 
    $amount = $_POST['amount']; 

    $sql = "SELECT * FROM members where username = '$username'";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
   if(mysqli_num_rows($res) == 1){
    while($row = mysqli_fetch_array($res)){
        $user_id = $row['id'];

        //////adding/////

        


   $fund_type = $_POST['fund_type'];
   if($fund_type == 1){
    $query = "UPDATE members set referral_balance = referral_balance + $amount, balance = balance 
    + $amount where id = '$user_id'";
   }else if($fund_type == 2){
    $query = "UPDATE members set  balance = balance 
    + $amount where id = '$user_id'";
   }else if($fund_type == 3){
    $query = "UPDATE members set running_invest = running_invest + $amount where id = '$user_id'";
   }else if($fund_type == 4){
    $query = "UPDATE members set profit = profit + $amount where id = '$user_id'";
   }
   


//////////////////////////////////////////////////////////

$result = mysqli_query($con,$query) or die("Can not submit ".mysqli_error($con));
if( $result){

    $invest_date = date(" D d M h:m");
    $status = "approved";

    $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,
            invest_date,transaction_type,plan_id,plan_name,payment_id,payment_name)
          value(
          '$user_id',
          '$username',
          '$amount',
          'USD',
          '$status',
          '$invest_date',
          'Bonus',
          1,
          1,
          '0',
          'Bonus'
  
  
        )";

        $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));




 $msg = '<div class="alert alert-success">Successfully Added</div>';
}else{
$msg = '<div class="alert alert-danger">Failed</div>';

}
        

    }
   }else{
    $msg = "<div class='alert alert-danger'>User not found</div>";
   }
    

}

?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">
<div><?php echo $msg ?></div>
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <!-- End row-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Send Bonus </h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="" >
                                            </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                              <select name="fund_type"  class="form-control">
                              <option value="2">Balance</option>
                              <option value="4">Profit</option>
                                
                              </select>
                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Amount</label>
                                                <input type="number" class="form-control" name="amount" placeholder="0000">
                                            </div>
                                            </div>
                                            <div class="col-md-12">    
                                                <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox1" value="1" name="show_bonus" checked type="checkbox">
                                                    <label for="checkbox1">
                                                        Show on User Transaction Details
                                                    </label>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="add_fund" class="btn btn-primary waves-effect waves-light">Send Bonus  </button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
                <?php

require "footer.php";

?>