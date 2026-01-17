<?php
include "header.php";

$error = "";
$msg = "";

            if(isset($_POST['update_password'])){

              $old_password = $_POST['old_password'];
              $new_password = $_POST['new_password'];
              $confirm = $_POST['new_passwordv'];

              if(strlen($new_password) > 5 && strlen($confirm) > 5){

                if($new_password == $confirm){

                  $sql = "SELECT * from members WHERE id = '$user_id' && password = '$old_password'";
                   $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));

                   $num = mysqli_num_rows($result);

                   if($num == 1){

                    $sql = "UPDATE members set password = '$new_password' WHERE id = '$user_id'";
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



              if(isset($_POST['update_user'])){
                
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $phone = $_POST['phone'];
                $state = $_POST['state'];
                $image = $_FILES['image']['tmp_name'];
                //$dob = $_POST['dob'];
                $address = $_POST['address'];

                $target_dir = "../uploads/";
                $basename = basename($_FILES["image"]["name"]);
      $target_file =  $target_dir.basename($_FILES["image"]["name"]);


                $params =  array("firstname"=>$fname,"lastname"=>$lname,"phonenumber"=>$phone,"state"=>$state,"profile_pic"=>$basename, "address"=>$address,"is_verified" => '2');

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

                $result = $model->updateTable("members",$params,$user_id);
                if($result['status']){
                   if(!$is_verified){
       $msg = '<div class="alert alert-success text-center">
    kYC successfully Completed

     </div>';
     $is_verified = true;
     
     
//      echo "<script>
// setInterval(function(){
//     window.location.href = './account'
// }, 1000);
// </script>";
     
     

    }else{
       $msg = '<div class="alert alert-success text-center">
    Account updated successfully

     </div>';

    }

                }else{
                    $msg = '<div class="alert alert-danger text-center">
    An error occurred

     </div>';

                }

              }else{
                 $msg = '<div class="alert alert-danger text-center">
    An error occurred

     </div>';

              }

              }





            ?>

 
<?= $msg ?>
<?=  $error ?>


    <!-- Start Main Content Area -->
    <div class="mt-5">


        
    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Account Settings
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">
                <form method="post" action="" class="g-5" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="oYND1vn6NxPhDZflSW8Dl92Bx2GtPLabOO526ItW">                                        <div class="row">
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" class="form-control" id="name" placeholder="First name"
                                   value="<?= $firstname ?>" name="fname">
                        </div>
                         <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Last Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Last name"
                                   value="<?= $lastname ?>" name="lname">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email"
                                   value="<?= $email ?>" disabled>
                        </div>
                       
                        <div class="form-group col-md-6 mt-3">
                           <label for="inputEmail4">Username</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="username"
                                   value="<?= $user ?>" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Phone</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter your contact number" name="phone"
                                   value="<?= $phone ?>">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Date of Birth</label>
                            <input type="date" class="form-control" id="inputAddress2"
                                   placeholder="Enter your contact number" name="dob"
                                   value="">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Country</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter country" name="state" value="<?= $country ?>">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Image</label>
                            <input type="file" class="form-control" id="inputAddress2"
                                   placeholder="Enter your contact number" name="image"
                                   value="">
                           
                        </div>
                    </div>
                    <div class="form-group col-md-12 mt-3">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter country" name="address" value="<?= $address ?>">
                        </div>
                    
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary" 
                        name="update_user">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- DataTales Example -->
   

    <div class="card mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Password Change
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">
                <form method="post" action="">
                    <input type="hidden" name="_token" value="oYND1vn6NxPhDZflSW8Dl92Bx2GtPLabOO526ItW">                    <div class="row mt-3">
                        <div class="form-group col-md-12 mt-3">
                            <label for="inputEmail4">Old Password</label>
                            <input type="password" class="form-control" id="name" placeholder="Enter old password"
                                   name="old_password">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">New Password</label>
                            <input type="password" class="form-control" id="inputEmail4"
                                   name="new_password" placeholder="Enter New Password">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Repeat New Password</label>
                            <input type="password" class="form-control" id="inputEmail4"
                                   name="new_passwordv" placeholder="Repeat New Password">
                        </div>

                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary" name="update_password">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </div>

   <?php

   require "footer.php";

   ?>