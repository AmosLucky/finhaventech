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
                $lname = "";//$_POST['lname'];
                $phone = $_POST['phone'];
                $state = $_POST['state'];
                $image = $_FILES['image']['tmp_name'];
                 $dob = $_POST['dob'];
                $address = $_POST['address'];

                 $target_dir = "../uploads/";
                 $basename = basename($_FILES["image"]["name"]);
       $target_file =  $target_dir.basename($_FILES["image"]["name"]);
   
    


                $params =  array("firstname"=>$fname,"lastname"=>$lname,"phonenumber"=>$phone,"state"=>$state,
                "profile_pic"=>$basename, "address"=>$address,"is_verified" => '2',"dob"=>$dob);

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

                $result = $model->updateTable("members",$params,$user_id);
                if($result['status']){
                   if(!$is_verified){
       $msg = '<div class="alert alert-success text-center">
     successfully Updated

     </div>';
     $is_verified = true;
     
     
     echo "<script>
setInterval(function(){
    window.location.href = './account-settings.php'
}, 1000);
</script>";
     
     

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

            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Account Settings</h5>
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
        <?php
                    echo $msg
                    ?>
                    <?php
                    echo $error
                    ?>
            <div class="card">
                <div class="card-body">
                    <div class="row profile">
                        <div class="p-2 col-md-12 p-md-4">
                            <ul class="mb-4 nav nav-pills bg-light p-2">
                                <li class="nav-item">
                                    <a href="#per" class="nav-link active" data-toggle="tab">Personal Settings</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#pho" class="nav-link" data-toggle="tab">Profile Photo</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#set" class="nav-link" data-toggle="tab">Withdrawal Settings</a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="#pas" class="nav-link" data-toggle="tab">Password/Security</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sec" class="nav-link" data-toggle="tab">Other Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content p-2 p-md-4">
                                <div class="tab-pane fade show active" id="per">
                                    <form method="POST" enctype="multipart/form-data" >
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="">Fullname</label>
            <input type="text" class="form-control " value="<?= $firstname ?>" name="fname">
        </div>
        <div class="form-group col-md-6">
            <label class="">Email Address</label>
            <input type="email" class="form-control " value="<?= $email ?>" name="email" readonly>
        </div>
        <div class="form-group col-md-6">
            <label class="">Phone Number</label>
            <input type="text" class="form-control " value="<?= $phone ?>" name="phone">
        </div>
        <div class="form-group col-md-6">
            <label class="">Date of Birth</label>
            <input type="date" value="<?= $dob ?>" class="form-control " name="dob">
        </div>
        <div class="form-group col-md-6">
            <label class="">Country</label>
            <input type="text" value="<?= $country ?>" class="form-control " name="state" readonly>
        </div>
        <div class="form-group col-md-6">
            <label class="">Address</label>
            <textarea class="form-control " value="<?= $address ?>" placeholder="Full Address" name="address" row="3"><?= $address ?></textarea>
        </div>
        <div class="form-group col-md-6">
            <label class="">Choose Photo</label>
            <input type="file" name="image" class="form-control col-lg-8" required>
            <small>NOTE: allowed formats are jpeg, jpg, png</small>
        </div>

    </div>
    <button type="submit" name="update_user" class="btn btn-primary">Update Profile</button>
</form>


                                </div>
                                <div class="tab-pane fade" id="pho">
                                    <form method="POST" action="" id="updatephotoform" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="">    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="">Choose Photo</label>
            <input type="file" name="profile-photo" class="form-control col-lg-8" required>
            <small>NOTE: allowed formats are jpeg, jpg, png</small>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<script>
    // document.getElementById('updatephotoform').addEventListener('submit', function() {
    //     //alert('love');
    //     $.ajax({
    //         url: "https://dashboard.bits-base.com/dashboard/profileimg",
    //         type: 'POST',
    //         data: $('#updatephotoform').serialize(),
    //         success: function(response) {
    //             if (response.status === 200) {
    //                 $.notify({
    //                     // options
    //                     icon: 'flaticon-alarm-1',
    //                     title: 'Success',
    //                     message: response.success,
    //                 }, {
    //                     // settings
    //                     type: 'success',
    //                     allow_dismiss: true,
    //                     newest_on_top: false,
    //                     showProgressbar: true,
    //                     placement: {
    //                         from: "top",
    //                         align: "right"
    //                     },
    //                     offset: 20,
    //                     spacing: 10,
    //                     z_index: 1031,
    //                     delay: 5000,
    //                     timer: 1000,
    //                     url_target: '_blank',
    //                     mouse_over: null,
    //                     animate: {
    //                         enter: 'animated fadeInDown',
    //                         exit: 'animated fadeOutUp'
    //                     },

    //                 });
    //                 console.log(response)
    //             } else {

    //             }
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         },

    //     });
    // });
</script>                                </div>
                                <div class="tab-pane fade" id="set">
                                    <form method="post" action="javascript:void(0)" id="updatewithdrawalinfo">
    <input type="hidden" name="_token" value="Nk8PVv60VTmnX8XqbnnSWrziUkEcTMLDTPSbyGwq">    <input type="hidden" name="_method" value="PUT">    
    <fieldset class="mt-2">
        <div class="form-row">
                            <div class="form-group col-md-6">
                    <label class="">Bitcoin</label>
                    <input type="text" name="btc_address" value=""
                        class="form-control " placeholder="Enter Bitcoin Address">
                    <small class="">Enter your Bitcoin Address that will be used to withdraw your funds</small>
                </div>
                                        <div class="form-group col-md-6">
                    <label class="">Ethereum</label>
                    <input type="text" name="eth_address" value=""
                        class="form-control " placeholder="Enter Etherium Address">
                    <small class="">Enter your Ethereum Address that will be used to withdraw your funds</small>
                </div>
                                            </div>
    </fieldset>
    <button type="submit" class="px-5 btn btn-primary">Save</button>
</form>



<script>
    document.getElementById('updatewithdrawalinfo').addEventListener('submit', function() {
        // alert('love');
        $.ajax({
            url: "https://dashboard.bits-base.com/dashboard/updateacct",
            type: 'POST',
            data: $('#updatewithdrawalinfo').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    $.notify({
                        // options
                        icon: 'flaticon-alarm-1',
                        title: 'Success',
                        message: response.success,
                    }, {
                        // settings
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },

                    });
                } else {

                }
            },
            error: function(data) {
                console.log(data);
            },

        });
    });
</script>
                                </div>
                                <div class="tab-pane fade" id="pas">
                                    <form method="POST">
       
     <div class="form-row">
        <div class="form-group col-md-6">
            <label class="">Old Password</label>
            <input type="password" name="old_password" class="form-control " required>
        </div>
        <div class="form-group col-md-6">
            <label class="">New Password</label>
            <input type="password" name="new_password" class="form-control " required>
        </div>
        <div class="form-group col-md-6">
            <label class="">Confirm New Password</label>
            <input type="password" name="new_passwordv" class=" form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="update_password">Update Password</button>
</form>
<div class="mt-4">
    <a href="" 
    class="text-decoration-none">Advance Account Settings <i class="fas fa-arrow-right"></i> </a>
</div>                                </div>
                                <div class="tab-pane fade" id="sec">
                                    <form method="POST" action="javascript:void(0)" id="updateemailpref">
    <input type="hidden" name="_token" value="Nk8PVv60VTmnX8XqbnnSWrziUkEcTMLDTPSbyGwq">    <input type="hidden" name="_method" value="PUT">    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="">Send confirmation OTP to my email when withdrawing my funds.</label>
            <div class="selectgroup">
                <label class="selectgroup-item">
                    <input type="radio" name="otpsend" id="otpsendYes" value="Yes" class="selectgroup-input"
                        checked="">
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="otpsend" id="otpsendNo" value="No" class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
        </div>
        
        <div class="mb-3 col-md-6">
            <label class="">Send me email when i get profit.</label>
            <div class="selectgroup">
                <label class="selectgroup-item">
                    <input type="radio" name="roiemail" id="roiemailYes" value="Yes" class="selectgroup-input"
                        checked="">
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="roiemail" id="roiemailNo" value="No" class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label class="">Send me email when my investment plan expires.</label>
            <div class="selectgroup">
                <label class="selectgroup-item">
                    <input type="radio" name="invplanemail" id="invplanemailYes" value="Yes"
                        class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="invplanemail" id="invplanemailNo" value="No"
                        class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
        </div>
        <div class="mt-2 col-12">
            <button type="submit" class="px-5 btn btn-primary">Save</button>
        </div>
    </div>

</form>



    <script>
        document.getElementById('otpsendYes').checked = true;
    </script>





    <script>
        document.getElementById('roiemailYes').checked = true;
    </script>


    <script>
        document.getElementById('invplanemailYes').checked = true;
    </script>



<script>
    document.getElementById('updateemailpref').addEventListener('submit', function() {
        // alert('love');
        $.ajax({
            url: "https://dashboard.bits-base.com/dashboard/update-email-preference",
            type: 'POST',
            data: $('#updateemailpref').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    $.notify({
                        // options
                        icon: 'flaticon-alarm-1',
                        title: 'Success',
                        message: response.success,
                    }, {
                        // settings
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },

                    });
                } else {

                }
            },
            error: function(data) {
                console.log(data);
            },

        });
    });
</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!-- Footer -->
            <?php
     require "footer.php";
?>
