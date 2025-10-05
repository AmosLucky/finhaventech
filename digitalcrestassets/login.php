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


       echo " <script>
        window.location.href='adminpanel';
        </script>";



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
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->

    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-2 col-lg-2">
			</div>
			
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<!-- Logo Starts -->
				<a class="visible-xs" href="index.html">
					<img id="logo" class="img-responsive mobile-logo" src="images/logo-dark.png" alt="logo">
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h2 class="title-head hidden-xs">Secured <span>Login</span></h2>
							 <p class="info-form">Welcome Back</p>
							 <?= $error ?>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						<form method="POST">
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="email" id="username" placeholder="username" type="text" required>
							</div>
							<!-- Input Field Ends -->
							
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
							</div>
							<!-- Input Field Ends -->
							
							   
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="login">Login</button>
								<p class="text-center">Dont have an account ? <a href="register">Create account</a>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						<!-- Form Ends -->
					</div>
				</div>
				
			</div>
		</div>
        <!-- Template JS Files -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/custom.js"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="js/styleswitcher.js"></script>

    </div>
    <!-- Wrapper Ends -->
</body>


<!-- Mirrored from slimhamdi.net/bayya/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Sep 2024 10:48:42 GMT -->
</html>