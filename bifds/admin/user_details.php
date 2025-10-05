<?php
require_once "admin_head.php";
$error_msg = "";
$success_msg = "";
 $firstname = "";
      $surname = "";
      $username = "";
      $othername = "";
      $email = "";
      $password = "";
      $account_type = "";
      $phone = "";
      $gender = "";
      $date_of_birth ="" ;
      $address = "";
      $occupation = "";
      $marital_status = "";
      $currency = "";
      $pic = "";
      $active = 1;
      $fixed_deposit = "";
      $balance  = "";
      $savings_interest  = "";
      $second_pin = "";
      $first_pin  = "";


if(isset($_POST['apply'])){
      $firstname = $_POST['firstname'];
      $username = $_POST['username'];
      $surname = $_POST['surname'];
      $country = $_POST['country'];
      $othername = $_POST['othername'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $account_type = $_POST['account-type'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $date_of_birth = $_POST['date_of_birth'];
      $address = $_POST['address'];
      $occupation = $_POST['occupation'];
      $marital_status = $_POST['marital_status'];
     
      $currency = $_POST['currency'];
      //$pic = $_FILES['pic'];
      $balance = $_POST['balance'];
      $fixed_deposit = $_POST['fixed_deposit'];
       $savings_interest = $_POST['savings_interest'];
        $second_pin = $_POST['second_pin'];
      $first_pin  = $_POST['first_pin'];
       $account_number  = $_POST['account_number'];
       $user_id = $_POST['user_id'];

//       $target_dir = "../uploads/";
// $target_file = $target_dir . basename($_FILES["pic"]["name"]);
// $file_name =  basename($_FILES["pic"]["name"]);


// $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
//             $msg = "The file " . basename($_FILES["pic"]["name"]) . " has been uploaded.";
//            // basename($_FILES["fileToUpload"]["name"])

//         }

      if(strlen($firstname) > 1){
        if(strlen($username) > 1){
             if(strlen($othername) > 1){
                 if(strlen($email) > 1){
                     if(strlen($password) > 1){
                         if(strlen($account_type) > 1){

                             if(strlen($phone) > 1){
                                 if(strlen($gender) > 1){
                                     if(strlen($date_of_birth) > 1){
                                        if(strlen($address) > 1){
                                            if(strlen($occupation) > 1){
                                                if(strlen($marital_status) > 1){
                   
         
              if(strlen($currency) > 1){

                 $sql = "SELECT * From users where email = '$email'  || username = '$username'";
          $result = mysqli_query($con,$sql)or die(mysqli_error($con));
          $numRows = mysqli_num_rows($result);

          if($numRows == 1){
           /////////////////////////////////////////////////////////////////////////////////////
            $sql = "UPDATE  users set balance = '$balance',account_number = '$account_number', first_name = '$firstname',surname = '$surname',username = '$username',other_name = '$othername', email = '$email', password = '$password', account_type = '$account_type', gender = '$gender', phone = '$phone', dob = '$date_of_birth', address = '$address',occupation = '$occupation',marital_status = '$marital_status', account_currency = '$currency',fixed_deposit = '$fixed_deposit', savings_interest = '$savings_interest',second_pin = '$second_pin',first_pin = '$first_pin',country = '$country' where id = '$user_id'
            ";

            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($result){
               $success_msg = "Account update was successful ";

      
    
        

                       

///////////////////////////////////////////////////////////////////////////

               ///////////////////////////



            }else{
              $error_msg = "An error occoured";

            }



          






           /////////////////////////////////////////////////////////////////////////////////////// 
           } else{
              $error_msg = "more than one account deteccted";

            }
                                           




      }else{
        $error_msg = "Select currency ";

      }





      }else{
        $error_msg = "marital status too short";

      }





      }else{
        $error_msg = "Occupation too short";

      }





      }else{
        $error_msg = "Address too short";

      }




      }else{
        $error_msg = "Please chose date of birt";

      }




      }else{
        $error_msg = "Gender too short";

      }




      }else{
        $error_msg = "Phone too short";

      }




      }else{
        $error_msg = "account_type too short";

      }




      }else{
        $error_msg = "password too short";

      }




      }else{
        $error_msg = "Email too short";

      }




      }else{
        $error_msg = "Other too short";

      }




      }else{
        $error_msg = "username name too short";

      }



      }else{
        $error_msg = "First Name too short";

      }
}

$file_name = "";
if(isset($_POST['save'])){
    $user_id = $_POST['user_id'];

      $target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$file_name =  basename($_FILES["pic"]["name"]);
if(strlen($file_name) > 3){
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["pic"]["name"]) . " has been uploaded.";
           // basename($_FILES["fileToUpload"]["name"])
            $sql = "UPDATE users set profile_picture = '$file_name' where id = '$user_id'";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            if( $result){
                $msgt = "success";
                $error_msg = "Successful";

            }else{
                $error_msg = "failed to update";
            }


        }
    }else{
        $error_msg = "Please choose a picture to upload";

    }



}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="https://vinix-vue.envytheme.com/favicon.png">
    <title>Register</title>
    <link href="./register_files/app.8c22cb29.css" rel="preload" as="style">
    <link href="./register_files/chunk-vendors.8bc0f757.css" rel="preload" as="style">
    <link href="./register_files/app.b94c506f.js.download" rel="preload" as="script">
    <link href="./register_files/chunk-vendors.7dae25c3.js.download" rel="preload" as="script">
    <link href="./register_files/chunk-vendors.8bc0f757.css" rel="stylesheet">
    <link href="./register_files/app.8c22cb29.css" rel="stylesheet">
    <style type="text/css">
        .VueCarousel-navigation-button[data-v-453ad8cd] {
            position: absolute;
            top: 50%;
            box-sizing: border-box;
            color: #000;
            text-decoration: none;
            appearance: none;
            border: none;
            background-color: transparent;
            padding: 0;
            cursor: pointer;
            outline: none;
        }

        .VueCarousel-navigation-button[data-v-453ad8cd]:focus {
            outline: 1px solid lightblue;
        }

        .VueCarousel-navigation-next[data-v-453ad8cd] {
            right: 0;
            transform: translateY(-50%) translateX(100%);
            font-family: "system";
        }

        .VueCarousel-navigation-prev[data-v-453ad8cd] {
            left: 0;
            transform: translateY(-50%) translateX(-100%);
            font-family: "system";
        }

        .VueCarousel-navigation--disabled[data-v-453ad8cd] {
            opacity: 0.5;
            cursor: default;
        }

        /* Define the "system" font family */
        @font-face {
            font-family: system;
            font-style: normal;
            font-weight: 300;
            src: local(".SFNSText-Light"), local(".HelveticaNeueDeskInterface-Light"),
                local(".LucidaGrandeUI"), local("Ubuntu Light"), local("Segoe UI Symbol"),
                local("Roboto-Light"), local("DroidSans"), local("Tahoma");
        }
    </style>
    <style type="text/css">
        .VueCarousel-pagination[data-v-438fd353] {
            width: 100%;
            text-align: center;
        }

        .VueCarousel-pagination--top-overlay[data-v-438fd353] {
            position: absolute;
            top: 0;
        }

        .VueCarousel-pagination--bottom-overlay[data-v-438fd353] {
            position: absolute;
            bottom: 0;
        }

        .VueCarousel-dot-container[data-v-438fd353] {
            display: inline-block;
            margin: 0 auto;
            padding: 0;
        }

        .VueCarousel-dot[data-v-438fd353] {
            display: inline-block;
            cursor: pointer;
            appearance: none;
            border: none;
            background-clip: content-box;
            box-sizing: content-box;
            padding: 0;
            border-radius: 100%;
            outline: none;
        }

        .VueCarousel-dot[data-v-438fd353]:focus {
            outline: 1px solid lightblue;
        }
    </style>
    <style type="text/css">
        .VueCarousel-slide {
            flex-basis: inherit;
            flex-grow: 0;
            flex-shrink: 0;
            user-select: none;
            backface-visibility: hidden;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            outline: none;
        }

        .VueCarousel-slide-adjustableHeight {
            display: table;
            flex-basis: auto;
            width: 100%;
        }
    </style>
    <style type="text/css">
        .VueCarousel {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .VueCarousel--reverse {
            flex-direction: column-reverse;
        }

        .VueCarousel-wrapper {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .VueCarousel-inner {
            display: flex;
            flex-direction: row;
            backface-visibility: hidden;
        }

        .VueCarousel-inner--center {
            justify-content: center;
        }
    </style>
</head>

<body>

    <?php 



if(isset($_GET['v'])){
    $id = $_GET['v'];

    $sql = "select * from users where id = '$id'";
     $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $user_id = $row['id'];
                 $firstname = $row['first_name'];
      $username = $row['username'];
      $surname = $row['surname'];
      $country = $row['country'];
      $othername = $row['other_name'];
      $email = $row['email'];
      $password = $row['password'];
      $account_type = $row['account_type'];
      $phone = $row['phone'];
      $gender = $row['gender'];
      $date_of_birth = $row['dob'];
      $address = $row['address'];
      $occupation = $row['occupation'];
      $marital_status = $row['marital_status'];
     
      $currency = $row['account_currency'];
      $pic = $row['profile_picture'];
      $balance = $row['balance'];
      $fixed_deposit = $row['fixed_deposit'];
       $savings_interest = $row['savings_interest'];
        $second_pin = $row['second_pin'];
      $first_pin  = $row['first_pin'];
      $account_number  = $row['account_number'];

            ?>
   
    <div>
        <!---->

        <div>
           
            <div class="signup-are ptb-10 mt-3">
                <div class="container">
                    <div class="signup-form">
                        <h3>Update  Account</h3>
                        <span class="text-danger text-center"><?php echo $error_msg ?></span>
                        <span class="text-success text-center"><?php echo$success_msg; ?></span>
                               <form method="POST" enctype="multipart/form-data">
                                 <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

                            <div class="container m-5 border p-3">
                                   <div class="row justify-content-center">
                                 
                                    <img src="../uploads/<?php echo $pic ?>" width="50">
                                
                            </div>
                            <div class="row justify-content-center">
                                 
                                
                                   
                                    <div class="form-group">
                                        <input type="file" name="pic" class="form-control" value="<?php echo $pic?>"  accept="image/x-png,image/gif,image/jpeg">
                                        </div>
                                
                                
                            </div>
                             <div class="row justify-content-center">
                                <input type="submit" name="save" value="Change Picturer" class="btn btn-success">
                             </div>
                                
                            </div>

</form>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

                            
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input type="text" placeholder="Initial Balance"
                                            class="form-control" name="balance" 
                                            value="<?php echo $balance?>" ></div>
                                </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Account number</label>
                                        <input type="text" placeholder="Account number"
                                            class="form-control" name="account_number" 
                                            value="<?php echo $account_number?>" ></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                          <label>Fixed Deposit</label>
                                        <input type="text" placeholder="Fixed Deposit"
                                            class="form-control" name="fixed_deposit" value="<?php echo $fixed_deposit?>" ></div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Savings Interest</label>
                                        <input type="text" placeholder="Savings Interest"
                                            class="form-control" name="savings_interest" value="<?php echo $savings_interest?>" ></div>
                                </div>
                                <!--  -->

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Pin</label>
                                        <input type="text" placeholder="First Pin"
                                            class="form-control" name="first_pin" value="<?php echo $first_pin?>" ></div>
                                </div>
                                <!--  -->

                                   <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Second Pin</label>

                                        <input type="text" placeholder="Second Pin"
                                            class="form-control" name="second_pin" value="<?php echo $second_pin?>" ></div>
                                </div>
                                <!--  -->
                                


                                <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>First Name</label>
                                        <input type="text" placeholder="First Name"
                                            class="form-control" name="firstname" 
                                            value="<?php echo $firstname?>" ></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Surname</label>
                                        <input type="text" placeholder="Surname"
                                            class="form-control" name="surname" 
                                            value="<?php echo $surname?>" ></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Username</label>
                                        <input type="text" placeholder="Username"
                                            class="form-control" name="username" value="<?php echo $username?>" ></div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Othername</label>
                                        <input type="text" placeholder="Other Name"
                                            class="form-control" name="othername"
                                             value="<?php echo $othername?>" ></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="email" placeholder="email"
                                            class="form-control" name="email" value="<?php echo $email?>" ></div>
                                </div>



                                <div class="col-lg-6">
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" placeholder="Password"
                                            class="form-control" name="password" value="<?php echo $password ?>"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                          <label>Account Type</label>
                                        <input class="form-control" name="account-type" value="<?php echo $account_type?>">
                                            
                                        </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Phone</label>
                                        <input type="phone" placeholder="Phone"
                                            class="form-control"name="phone" value="<?php echo $phone?>" ></div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input class="form-control" name="gender" value="<?php echo $gender?>">
                                            
                                        </div>
                                </div>




                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" placeholder="Date of birth"
                                            class="form-control" name="date_of_birth" value="<?php echo 
                                            $date_of_birth?>">
                                        </div>
                                </div>

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Address</label>
                                       <textarea class="form-control" placeholder="Address" name="address" 
                                       value=""><?php echo $address?></textarea>
                                        </div>
                                </div>

                                  <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Occuption</label>
                                       <textarea class="form-control" placeholder="Occupation" name="occupation" value=""><?php echo $occupation?></textarea>
                                        </div>
                                </div>

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                         <label>Marital Status</label>
                                        <input class="form-control" name="marital_status" 
                                        value="<?php echo $marital_status?>">
                                            
                                        </div>
                                </div>



                                <div class="col-lg-6 d-none">
                                    <div class="form-group">

                                        <select class="form-control" name="currency" value="<?php echo $currency?>">
                                            <option>Lira(TRY)</option>
                                             <option>Dollar(US)</option>
                                              <option>Pounds</option>
                                              <option>Euro</option>
                                            
                                        </select>
                                        </div>
                                </div>

                                 

                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <p>
                                        Country
                                    </p>
                                        <input type="" class="form-control" name="country" value="<?php echo $country ?>" >
                                            
                                            
                                        
                                        </div>
                                </div>


                                


                                




                               <!--  <div class="col-lg-12">
                                    <div class="form-check"><input type="checkbox" id="checkme"
                                            class="form-check-input"><label for="checkme" class="form-check-label">Keep
                                            Me Sign Up</label></div>
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-primary" name="apply">
                                    Save
                                            <span></span>
                                        </button></div>
                                        <br>
                                      
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
           



<?php
}
}else{
    echo "No use FOund";
}

            }else{
    echo "YOU DID NOT CLICK ON ANY USER";
}
include 'admin_footer.php';


?>