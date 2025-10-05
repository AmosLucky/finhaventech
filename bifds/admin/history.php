<?php
include 'admin_head.php';


if(isset($_POST['update'])){

$id = $_POST['id'];
 
               $password = $_POST['password'];
               $balance = $_POST['balance'];
        $ref_balance  = $_POST['ref_balance'];
       
       
        $running_invest = $_POST['running_invest'];


        $sql = "UPDATE users SET password = '$password', balance = '$balance', referral_balance = '$ref_balance', running_invest = '$running_invest' WHERE id = '$id' ";

         $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));

         if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY UPDATED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE UPDATE</div>';
         }


            



}









if(isset($_GET['d'])){
  $id = $_GET['d'];

  $sql = "DELETE FROM transactions WHERE id = '$id'";
     $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));

     if($result){
      echo "<div class='alert alert-danger'>Deleted</div>";

     }
   


}






if(isset($_POST['reverse'])){

  $user_id = $_POST['id'];
  $t_id = $_POST['tid'];
  $amount = $_POST['amount'];

  $sql1 = "UPDATE users set balance = balance + '$amount' WHERE id = '$user_id'";
  $res = mysqli_query($con,$sql1);
  $sql2 = "UPDATE transactions set status = 'reversed'  WHERE id = '$t_id'";

  $res1 = mysqli_query($con,$sql2);

  if($res1){

   echo $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY REVERSED</div>';

  }




}






if(isset($_GET['v'])){
    $id = $_GET['v'];

    $sql = "select * from users where id = '$id'";
     $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
       
?>

 <!-- Card Body -->
                <div class="card-body">
                     <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                            
                    <tr>
                      <th>S/N</th>
                     
                      <th>Name</th>
                      <!-- <th>Description</th> -->
                      <th>Amount</th>
                       <th>Type</th>
                      <th>Status</th>
                       <th>Date</th>
                       <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>S/N</th>
                     
                      <th>Name</th>
                      <!-- <th>Description</th> -->
                      <th>Amount</th>
                       <th>Type</th>
                      <th>Status</th>
                       <th>Date</th>
                       <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   

                    <?php
      


      $sql = "select * from  transactions where user_id = '$id' order by id desc"; 
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;

      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $date = $row['transaction_date'];
        $amount = $row['amount'];
        $transaction_type = $row['transaction_type'];
         $account_type = $row['account_sign'];
        $name = $row['name'];
        $description = $row['description'];
        $status =  $row['status'];
        $tid =  $row['id'];
        $sign = "";
        if($account_type == "Lira(TRY)"){
          $sign = "$";

        }else if($account_type == "Dollar(US)"){
          $sign = "$";

        }else if($account_type == "Pounds"){
          $sign = "E";

        }else if($account_type == "Euro)"){
          $sign = "EU";

        }
        $alert_type = "";

        if($transaction_type == "debit"){
          $alert_type = "btn-danger";

        }else  if($transaction_type == "credit"){
          $alert_type = "btn-success btn-sm";

        }
      

      ?>

      <tr>
        <td><?php  echo $sn ?></td>
        
        <td><?php  echo $name ?></td>
         <td><?php  echo "$".$amount ?></td>
         <td><span class=" btn <?php echo $alert_type ?>"><?php  echo $transaction_type ?></span></td>
        
        <td><span class="btn btn-success"><?php  echo $status ?></span></td>
        <td><?php  echo $date ?></td>

        <td>
           <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Action
    </button>
    <div class="dropdown-menu">
      <div class="dropdown-divider"></div>
          <a href="history.php?d=<?php echo $id ?>" class="btn btn-danger">Delete</a>
          <div class="dropdown-divider"></div>

           <a href="view_transaction_form.php?d=<?php echo $tid ?>" class="btn btn-primary">View Transacion Form</a>
      </div>
      </div>
          
          
          <?php 

          if($transaction_type == "Debit" && $status == "Completed" ){

          ?>
          <form method="POST" action="history.php?v=<?php echo $id ?>">
            <input type="hidden" value="<?php echo $id ?>" name="id" >
            <input type="hidden" value="<?php echo $tid ?>" name="tid" >
            <input type="hidden" value="<?php echo $amount ?>" name="amount" >
            <input type="submit" value="Reverse" name="reverse" class="btn btn-warning" >
          </form>

          <?php

          } 

          ?>
          </td>
        
      </tr>

      <?php
      }


      ?>
       

                      </tbody>
                </table>
              </div>
                  
                  <!-- <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div> -->
                </div>





<?php
}}else{
    echo "YOU DID NOT CLICK ON ANY USER";
}

include 'admin_footer.php';


?>