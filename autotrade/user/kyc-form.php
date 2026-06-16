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
                $id_front = $_FILES['id_front']['tmp_name'];
                $id_back = $_FILES['id_back']['tmp_name'];
                 $dob = $_POST['dob'];
                $address = $_POST['address'];

                 $target_dir = "../uploads/";
                 $basename = basename($_FILES["id_front"]["name"]);
       $target_file =  $target_dir.basename($_FILES["id_front"]["name"]);

       $basename1 = basename($_FILES["id_back"]["name"]);
       $target_file1 =  $target_dir.basename($_FILES["id_back"]["name"]);
   
    


                $params =  array("firstname"=>$fname,"lastname"=>$lname,"phonenumber"=>$phone,"state"=>$state,
                "msg_title"=>$basename, "msg"=>$basename1, "address"=>$address,"is_verified" => '2',"dob"=>$dob);

                if(move_uploaded_file($_FILES["id_front"]["tmp_name"], $target_file)){
                    move_uploaded_file($_FILES["id_back"]["tmp_name"], $target_file1);

                $result = $model->updateTable("members",$params,$user_id);
                if($result['status']){
                   if(!$is_verified){
       $msg = '<div class="alert alert-success text-center">
    kYC successfully Completed

     </div>';
     $is_verified = true;
     
     
     echo "<script>
setInterval(function(){
    window.location.href = './kyc-form.php'
}, 1000);
</script>";
     
     

    }else{
       $msg = '<div class="alert alert-success text-center">
     kYC successfully Completed

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

            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                
            </div>
        </div>
    </div>
    <div>
    </div>
    <div>
    </div>
    <div>
    </div>    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2 col-sm-12">
                            <div class="p-3 text-center">
                                <h2 class="">Begin your ID-Verification</h2>
                                <p>To comply with regulation each participant will have to go through indentity verification
                                    (KYC/AML) to prevent fraud causes.</p>
                            </div>
                            <div class="p-2 shadow-lg">
                                <div class="p-4 row">
                                    <form  method="POST" enctype="multipart/form-data">
                                    <?php
                    echo $msg
                    ?>
                    <?php
                    echo $error
                    ?>
                                        <div class="col-12 border-bottom">
                                            <h5>Personal Details</h5>
                                            <p>Your simple personal information required for identification</p>
                                        </div>
                                        <div class="col-12">
                                            <small>Please type carefully and fill out the form with your personal details.
                                                Your
                                                can’t edit these details once you submitted the form.</small>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label for="firstname">First name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="fname" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="lastname">Last name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="lname" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" value="<?= $email ?>" name="email" class="form-control" required readonly>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="phone_number">Phone Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="phone" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="dob">Date of birth <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="dob" class="form-control"
                                                        data-toggle="date" placeholder="Select date" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="social_media">Twitter or Facebook username</label>
                                                    <input type="text" name="social_media" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Your Address</h5>
                                            <p>Your simple location information required for identification</p>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label for="address">Address line<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="address" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="city">City<span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="state">State<span class="text-danger">*</span></label>
                                                    <input type="text" name="state1" class="form-control" required>
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="country">Nationality <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="state" class="form-control" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Document Upload</h5>
                                            <p>Your simple personal document required for identification</p>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-12">
                                                    <div class="flex-wrap btn-group-toggle d-flex justify-content-around"
                                                        data-toggle="buttons">
                                                        <label class="mb-2 shadow-sm btn btn-primary active">
                                                            <i class="fas fa-atlas"></i>
                                                            <input type="radio" name="document_type"
                                                                value="Int'l Passport" autocomplete="off" checked> Int'l
                                                            Passport
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">
                                                            <i class="fas fa-flag"></i>
                                                            <input type="radio" name="document_type" value="National ID"
                                                                autocomplete="off"> National ID
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">
                                                            <i class="fas fa-address-card"></i>
                                                            <input type="radio" name="document_type"
                                                                value="Drivers License" autocomplete="off"> Drivers
                                                            License
                                                        </label>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class=" font-weight-bold">To avoid delays when verifying
                                                            account, Please make sure your document meets the criteria
                                                            below:</h6>
                                                        <ul class=" list-group">
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Chosen credential must not have expired.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Document should be in good condition and clearly visible.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Make sure that there is no light glare on the document.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p class="mt-3 text-black h6">Upload front side <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="id_front"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-id-card fa-6x"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="mt-3 text-black h6">Upload back side <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="id_back" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-credit-card-blank fa-6x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-12">
                                            <div class="mb-2 form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="defaultCheck1" required>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    All The Information I Have Entered Is Correct.
                                                </label>
                                            </div>
                                                <button type="submit" class="px-4 btn btn-primary" name="update_user">Submit
                                                    Application</button>
                                                                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php
            require "footer.php";

            ?>