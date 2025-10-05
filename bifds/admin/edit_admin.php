
<?php
include 'admin_head.php';

$password = "";
$msg = "";



if(isset($_POST['submit'])){

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $old_password = $_POST['old_password'];

    if($new_password == $confirm_password){

        if($old_password == $admin_pass){


            $sql = "UPDATE users SET password = '$new_password'  WHERE id = '$admin_id' ";

            $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
            
            if($result){
            
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY UPDATED</div>';
            }else{
               $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE UPDATE</div>';
            }


        }else{
            $msg = '<div class="alert alert-danger text-center">Old Password dose not match</div>';
    
        }


    }else{
        $msg = '<div class="alert alert-danger text-center">Password dose not match confirmation</div>';

    }

  
}




?>

<div class="card shadow mb-4">
    <?php echo $msg ?>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit password</h6>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form">
                <input type="text" name="new_password" placeholder="New password" class="form-control">
              </div>

               <div class="form">
                <input type="text" name="confirm_password" placeholder="Confirm Password" class="form-control">
              </div>

              <div class="form">
                <input type="text" name="old_password" placeholder="Old Password" class="form-control">
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
