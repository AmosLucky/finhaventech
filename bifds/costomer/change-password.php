<?php 

require "header.php";

$error = "";

            if(isset($_POST['update_password'])){

              $old_password = $_POST['old_password'];
              $new_password = $_POST['new_password'];
              $confirm = $_POST['new_passwordv'];

              if(strlen($new_password) > 5 && strlen($confirm) > 5){

                if($new_password == $confirm){

                  $sql = "select * from users WHERE id = '$user_id' && password = '$old_password'";
                   $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));

                   $num = mysqli_num_rows($result);

                   if($num == 1){

                    $sql = "UPDATE users set password = '$new_password' WHERE id = '$user_id'";
                   $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
                   if($result){

                  
                     $error = '<div class="alert alert-success text-center">
                      Your password has been changed successfully

                       </div>';

                              ///// to do errorr///////

                        }




                     }else{
                             $error = '<div class="alert alert-danger text-center">
                           Error: The old password You entered is incorrect 

                             </div>';

      ///// to do errorr///////

    }



                   }else{
                     $error = '<div class="alert alert-danger text-center">
                     Error: Password does not match its comfirmation

                     </div>';

      ///// to do errorr///////

    }



                }else{
                           $error = '<div class="alert alert-danger text-center">
                         
                          Password must be greater than 5 characters

                           </div>';

      ///// to do errorr///////

    }



              }



?>
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w wider">
            <div class="logo-w"><a href="dashboard.php"><img alt="" src="images/logo.png"></a></div>
            <h4 class="auth-header">Hello <?php echo $fullname ?></h4>
            <?php
                    echo $error
                    ?>
            <form action="" method="post">
                                <input class="form-control" hidden="hidden" name="email" value="jerrysmithmail0@gmail.com" readonly
                    type="email">
                <div class="form-group">
                    <label for=""> Current Password</label>
                    <input class="form-control" name="old_password" type="password">
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> New Password</label>
                            <input class="form-control" name="new_password" type="password">
                            <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input class="form-control" name="new_passwordv" type="password">
                        </div>
                    </div>
                </div>
                <div class="buttons-w">
                    <button name="update_password" type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
   <?php

   require "footer.php";
   
   ?>