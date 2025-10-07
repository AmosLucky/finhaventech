<?php
session_start();

require 'header.php';


$error = "";



// if(isset( $_SESSION['user'])){

//         echo " <script>
//         window.location.href='dashboard/index.php';
//         </script>";
//         }




        if(isset($_POST['login'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $usernamev = mysqli_real_escape_string($con,$username);
    $passwordv = mysqli_real_escape_string($con,$password);

    $sql = "select * from members where email = '$usernamev'  && password = '$passwordv' || username = '$usernamev'  && password = '$passwordv' ";
    $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $isAdmin = $row['is_admin'];
             $is_suspended = $row['is_suspended'];
              $suspension_reason = $row['suspension_reason'];
               $is_deleted = $row['deleted'];


           if($is_deleted){
              $error = '<div class="alert alert-danger text-center">
              No User found with this username and password
              </div>';

           }else{
            /////////////////////////////NORMAL LOGIN//////////

              if($isAdmin){
                $_SESSION['admin_id'] = $row['id'];
             $_SESSION['admin'] =$row['username'];
              $id = $_SESSION['admin_id'];
                $_SESSION['admin'];
        


          //insert into transaction


      //  echo " <script>
      //   window.location.href='admin';
      //   </script>";



    }else if($is_suspended){
         $error = "<div class='alert alert-danger text-center'>
         $suspension_reason
              
              </div>";

    }else{
             
             $_SESSION['id'] = $row['id'];
             $_SESSION['user'] =$row['username'];
            // $_SESSION['balance'] =  $row['balance'];
              $_SESSION['email'] =$row['email'];
             $_SESSION['phonenumber'] =  $row['phonenumber'];
            $_SESSION['balance'] = $row['balance'];
             $_SESSION['state'] =$row['state'];
              $_SESSION['gender'] =$row['gender'];
               $is_comounded = $row['isCompounded'];
            
              $_SESSION['referree'] =  $row['referree'];
               $_SESSION['firstname'] =  $row['firstname'];
                $_SESSION['password'] =  $row['password'];
             $_SESSION['is_admin'] =  $row['is_admin'];
              $_SESSION['isCompounded'] =  $row['isCompounded'];
        echo " <script>
        window.location.href='user/';
        </script>";

    }
           }
            
        }

        // $id = $_SESSION['id'];
        // $_SESSION['balance'];
        // $user = $_SESSION['user'];
        // $_SESSION['email'];
        // $_SESSION['phonenumber'];
        // $_SESSION['state'];
        
        //   $_SESSION['firstname'];
        //   $_SESSION['referree'] ;
        //   $isAdmin = $_SESSION['is_admin'];


          //insert into transaction
         


       



        

    }
    //user more than two
    else{

        $error = '<div class="alert alert-danger text-center">We cant find your account please check your username or password</div>';

    }


}


// if(isset($_POST['login'])){
//   $login_name = $_POST['username'];
//   $login_psw = $_POST['password'];
// }
// else if(isset($_POST['signup'])){
//   $fname = $_POST['fname'];
//   $lname = $_POST['lname'];
//   $email = $_POST['email'];
//   $uname = $_POST['uname'];
//   $pass = $_POST['psw'];
//   $phone = $_POST['phone'];
// }

?>
    <!--=================================
    Inner Header -->
    <div class="inner-header bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
            <h1 class="breadcrumb-title mb-0">Sign In</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
              <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home me-1"></i>Home</a></li>
              <li class="breadcrumb-item active"><span>Sign In</span></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  <!--=================================
  Inner Header -->

  <!--=================================
  Login -->
  <section class="space-ptb login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-9 col-sm-11">
          
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
              <?php echo  $error ?>
              <form method="POST" class="row mt-4 align-items-center form-flat-style gx-2">
                <div class="mb-3 col-sm-12">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" placeholder="Username" name="email">
                </div>
                <div class="mb-3 col-sm-12">
                  <label class="form-label">Password:</label>
                  <input type="Password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-sm-6">
                  <div class="d-grid">
                  <button type="submit" name="login" class="btn btn-primary btn-flat">Sign in</button>
                  </div>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3 justify-content-sm-end">
                    <li class="me-1"><a class="text-dark" href="signup">Don't have an account? Click here</a></li>
                  </ul>
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Login -->

  <!--=================================
  Footer -->
  <?php 

require "footer.php";

?>