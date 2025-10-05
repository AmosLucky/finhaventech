<?php
require "admin_head.php";
$msg = "";
$user_id = $_GET['a'];

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


?>

<div class="card shadow mb-4">
    <?php echo $msg ?>

    <div class="container">
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
                      <th>form_title</th>
        <th> field_title</th>
        
         <th>type</th>
        <th>status</th>
        <th>Value</th>
        <th>Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
     <?php  

     $sql = "SELECT * from transaction_forms WHERE   user_id = '$user_id' ";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {

       $form_title = $row['form_title'];
    $field_title = $row['field_title'];
    $type = $row['type'];
    $description = $row['description'];
     $form_id = $row['id'];
     $value = $row['value'];
     $status = $row['status'];
     

       
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $form_title; ?></td>
        <td><?php echo $field_title; ?></td>
        <td><?php echo $type; ?></td> 
        <!--  <td><?php //echo $date; ?></td> -->
        <td><small><?php echo $status; ?></small></td>
        <td><small>
          <?php
          if($type == "text"){
          ?>
          <?= $value ?>

          <?php }else{ ?>
            <img src="../uploads/forms/<?php echo $value; ?>" alt="">

            <?php } ?>

        </small></td>
        
        
         
           <td> 
           

        <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Action
    </button>
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
              <form method="POST">
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