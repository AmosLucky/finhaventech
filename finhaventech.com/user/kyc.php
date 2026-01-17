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

    <!-- Start Main Content Area -->
    <div class="mt-5">

            
            <!-- DataTales Example -->
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Account KYC
                </h6>
            </div>
            <div class="card-body row">
                <div class="col-md-12 mx-auto">
                    <form method="post" action="" class="g-5"
                    enctype="multipart/form-data">
                    <?= $error ?>
                    <?=  $msg ?>
                        <input type="hidden" name="_token" value="CnmOxFIDJ8BpcVvXOZ15PJbp83DkMfmzh1V0OIRo">                        
                        <div class="row mt-3">
                            <div class="form-group col-md-6 mt-3">
                                <label for="inputAddress2">Date of Birth</label>
                                <input type="date" class="form-control" id="inputAddress2"
                                       placeholder="Enter your contact number" name="dob"
                                       value="">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="inputAddress2">Country</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                       placeholder="Enter country" name="state" value="">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="inputAddress2">ID Type</label>
                                <select class="form-control" id="inputAddress2" name="idType">
                                    <option value="">Select an option</option>
                                    <option>Drivers License</option>
                                    <option>National ID Card</option>
                                    <option>International Passport</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="inputAddress2">Phone Number</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                       placeholder="Enter Phone number" name="phone"/>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="inputAddress2">ID Image(front)</label>
                                <input type="file" class="form-control" id="inputAddress2"
                                       placeholder="Enter ID Number" name="id_front"/>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="inputAddress2">ID Image(Back)<sup>(optional)</sup> </label>
                                <input type="file" class="form-control" id="inputAddress2"
                                       placeholder="Enter ID Number" name="id_back"/>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <label for="inputAddress2">First name (As shown on the ID)<i class="ri-information-fill" data-bs-toggle="tooltip"
                                    title="A selfie image"></i> </label>
                                <input type="text" class="form-control" id="inputAddress2" name="fname"/>
                            </div>
                             <div class="form-group col-md-12 mt-3">
                                <label for="inputAddress2">Last name (As shown on the ID)<i class="ri-information-fill" data-bs-toggle="tooltip"
                                    title="A selfie image"></i> </label>
                                <input type="text" class="form-control" id="inputAddress2" name="lname"/>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <label for="inputAddress2">Address<i class="ri-information-fill" data-bs-toggle="tooltip"
                                    title="Membership ID issued by Prefinet"></i> </label>
                                <input type="text" class="form-control" id="inputAddress2" name="address"/>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary" name="update_user">Submit KYC</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    
    </div>

   <?php

   require "footer.php";

   ?>