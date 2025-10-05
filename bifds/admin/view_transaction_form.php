<?php
require "admin_head.php";
$msg = "";
$transaction_id = $_GET['d'];
$t_transaction = "SELECT * FROM transactions WHERE id = '$transaction_id'";
$t_transaction_exe = mysqli_query($con,$t_transaction);
$transaction = mysqli_fetch_assoc($t_transaction_exe);
$amount =  $transaction['amount'];
$user_id =  $transaction['user_id'];
$status = $transaction['status'];



if(isset($_POST['create_form'])){
    $form_title = $_POST['form_title'];
    $field_title = $_POST['field_title'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    
     

    $create_form_sql = "INSERT INTO transaction_forms(user_id,form_title,field_title,type,description)
     VALUES('$user_id','$form_title','$field_title','$type','$description')";

     $create_form_sql_exe = mysqli_query($con, $create_form_sql);
     if($create_form_sql_exe){
      $msg = "<div class='alert alert-success'>Form Created</div>";

     }else{
      $error = mysqli_error($conn);
      $msg = "<div class='alert alert-danger'>Form Error: $error</div>";

     }


     

    

}



if(isset($_POST['approve'])){
        $tid =  $_POST['t_id'];
        // echo "<script> alert('oo') </script>";

          $sql = "UPDATE transactions SET status = 'Completed' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));
                 
                  if($result){

                        $sql = "UPDATE users SET balance = balance - '$amount', 
     second_pin = '1' where id = '$user_id'";
      $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));
                    $msg = "<div class='alert alert-success'>Successful</div>";


                  }else{
                    $error = mysqli_error($con);
                    $msg = "<div class='alert alert-success'>failed $error</div>";

                  }

     }


     if(isset($_POST['reject'])){
         $t_id =  $_POST['t_id'];

          $sql = "UPDATE transactions SET status = 'Rejected' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));
        
     }
    


?>

<div class="card shadow mb-4">
    <?php echo $msg ?>


   

     <?php

     if($status == "processing" || $status == "Pending"){

     ?>

      <div class="container my-5 ">
        <form action="" method="POST">
            <input type="hidden" name="t_id" value="<?= $transaction_id ?>" >
            <input type="submit" class='btn btn-primary' value='Approve Transaction' name="approve">

        </form>

    </div>

     <div class="container mb-2">
        <form action="" method="POST">
            <input type="hidden" name="t_id" value="<?= $transaction_id ?>" style="display:none">
            <input type="submit" class='btn btn-danger' value='Reject Transaction' name="reject">

        </form>

    </div>


    


<?php } ?>

    <div class="container">
        <h6 class="m-0 font-weight-bold text-primary"> Status (<?= $status ?>) $(<?= $amount ?>)</h6>
      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Transacion Values </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
                      <th>form_title</th>
       
        
         <th>type</th>
        <!-- <th>status</th> -->
        <th>Value</th>
        <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                 
                  <tbody>
     <?php  

     $sql = "SELECT * from form_values WHERE   transaction_id = '$transaction_id' ";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {

      // $form_title = $row['form_title'];
    $field_title = $row['name'];
    $type = $row['type'];
   // $description = $row['description'];
     $form_id = $row['id'];
     $value = $row['content'];
    // $status = $row['status'];
    $value_id = $row['id'];
     

       
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
       
        <td><?php echo $field_title; ?></td>
        <td><?php echo $type; ?></td> 
        <!--  <td><?php //echo $date; ?></td> -->
        <!-- <td><small><?php //echo // $status; ?></small></td> -->
        <td><small>
          <?php
          if($type == "text"){
          ?>
          <?= $value ?>

          <?php }else{ ?>
            <img src="../uploads/forms/<?php echo $value; ?>" alt="" width="150">

            <?php } ?>

        </small></td>
        
        
         
           <td> 
           

        <div class="dropdown">
    <!-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Action
    </button> -->
    <div class="dropdown-menu">
    
     
      <a class="dropdown-item text-danger" type="button" data-toggle="modal" data-target="#myModal<?php echo $form_id ?>">
      Delete
      <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
    </div>
  </div>
      </td>
        
        
        	

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $form_id?>" role="dialog">
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
        		<input type="hidden" name="id" value="<?php echo $form_id ?>">
        <button name="delete" type="submit" class="btn btn-danger">Confirm Delete Form</button>
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

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create Form</h6>
            </div>
            <div class="card-body">
              <form method="POST" class='d-none'>
                <div class="form">
                <input type="text" name="form_title" placeholder="Form Title" class="form-control">
              </div>

               <div class="form">
                <input type="text" name="field_title" placeholder="Field Title" class="form-control">
              </div>

              <div class="mt-2">
                <span>Field Type</span>
                <select name="type" id="" class="form-control">
                    <option value="file">File</option>
                    <option value="text">Text</option>
                </select>
                
              </div>

               <div class="mt-3" >
                <span>Field Description (Optional)</span>
               <textarea name="description" id="" class="form-control"
               placeholder="Any description"
               ></textarea>
                
              </div>


               <div class="form mt-4">
               <input type="submit" name="create_form" class="form-control btn btn-primary" value="SUBMINT">
              </div>
                
              </form>
                            
              </div>
              </div>
              </div>



<?php
require "admin_footer.php";


?>