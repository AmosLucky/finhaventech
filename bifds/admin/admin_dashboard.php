<?php
include 'admin_head.php';

$msg = "";
if(isset($_POST['delete'])){
  $id = $_POST['id'];

  

  $sql = "DELETE FROM users where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}else if(isset($_GET['b'])){

   $id = $_GET['b'];
   $a = $_GET['a'];
   $status = "";
   $action = "";
   $second_pin = 0;
   if($a == 1){
    $status = false;
    $action = "Banned";
     $second_pin = 66;

   }else{
    $status = true;
    $action = "Activated";
    $second_pin = 0;


   }

  if($action == "Banned"){
    $sql = "UPDATE users set second_pin = '$second_pin', active = '0' where id = '$id' ";

  }else{
    $sql = "UPDATE users set second_pin = '$second_pin', active = '1' where id = '$id' ";
  }
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  "<div class='alert alert-success text-center'>Successfuly  $action</div>";
        //     echo " <script>
        // window.location.href='admin_dashboard.php';
        // </script>";

         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }
}

?>




<div class="container">
	
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>

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
              <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
                      <th>Name</th>
        <th>Account Number</th>
        
         <th>Password</th>
        <th>Email</th>
        <th>Balance</th>
        <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <tr>
                     <th>S/N</th>
                      <th>Name</th>
        <th>Account Number</th>
        
         <th>Password</th>
        <th>Email</th>
        <th>Balance</th>
         <th>Action</th>
         
                    </tr>
                    </tr>
                  </tfoot>
                  <tbody>
     <?php  

     $sql = "SELECT * from users WHERE   is_admin = '0' order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
     	$first_name = $row['first_name'];
     	//$referred_by = $row['referred_by'];
     	$password = $row['password'];
     	$balance =  $row['balance'];
     	//$ref_balance  = $row['referral_balance'];
     	$id = $row['id'];
     	$accounNumber = $row['account_number'];
     	$email = $row['email'];
      $active = $row['active'];
       $second_pin = $row['second_pin'];
     	//$running_invest = $row['running_invest'];
     	# code...
       $status_widget ="";
       if($second_pin == 66){
         $status_widget ="<div class='badge badge-danger'>Blocked</div>";
         $active = 2;


       }
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $first_name; ?></td>
        <td><?php echo $accounNumber.$status_widget; ?></td>
        <td><?php echo $password; ?></td> 
        <!--  <td><?php //echo $date; ?></td> -->
        <td><?php echo $email; ?></td>
        <td><?php echo $balance; ?></td>
        
         
           <td> 
           

        <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Action
    </button>
    <div class="dropdown-menu">
    <a class="dropdown-item text-success" href="edit.php?id=<?php echo $id ?>">
      Edit
       <i class="fa fa-pen" aria-hidden="true"></i>
    </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item text-success" href="add.php?a=<?php echo $id ?>">
      Deposit
       <i class="fa fa-plus-circle" aria-hidden="true"></i>
    </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item text-primary" href="history.php?v=<?php echo $id ?>">
        Histroy 
        <i class="fa fa-eye" aria-hidden="true"></i>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="admin_dashboard.php?b=<?php echo $id."&a=".$active ?>">
        
      <?php
      if($second_pin != 66){
        echo "Block Account";
      }else{
        echo "Activate";

      }
      ?>
    </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item text-danger" type="button" data-toggle="modal" data-target="#myModal<?php echo $id ?>">
      Delete
      <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
    </div>
  </div>
      </td>
        
        
        	

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="modal-title">Delete</span>
        </div>
        <div class="modal-body">
          <p>You are about to delete this user</p>
        </div>
        
        <div class="modal-footer">
        	<form method="POST">
        		<input type="hidden" name="id" value="<?php echo $id ?>">
        <button name="delete" type="submit" class="btn btn-danger">Confirm Delete User</button>
          	</form>
        </div>
      </div>
    </div>
  </div>

        	

        	</td>
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>



<?php
include 'admin_footer.php';


?>