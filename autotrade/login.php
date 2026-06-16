<?php
session_start();

require 'conn.php';


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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Investment Platform</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:10px;
    background:
    linear-gradient(rgba(10,10,10,.85),rgba(10,10,10,.85)),
    url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
}

.container{
    width:100%;
    max-width:1000px;
    display:grid;
    grid-template-columns:1fr 1fr;
    background:rgba(255,255,255,.05);
    backdrop-filter:blur(20px);
    border-radius:18px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.1);
    box-shadow:0 15px 40px rgba(0,0,0,.5);
}

.left{
    background:linear-gradient(135deg,#0d1117,#1a1f29);
    padding:60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.left h1{
    color:#fff;
    font-size:42px;
    line-height:1.2;
    margin-bottom:20px;
}

.left p{
    color:#c7c7c7;
    line-height:1.8;
}

.highlight{
    color:#f0b90b;
}

.right{
    padding:50px;
    background:rgba(255,255,255,.03);
}

.logo{
    text-align:center;
    color:#f0b90b;
    font-size:28px;
    font-weight:700;
    margin-bottom:15px;
}

.form-title{
    text-align:center;
    color:#fff;
    margin-bottom:30px;
    font-size:28px;
}

.input-group{
    margin-bottom:18px;
}

label{
    display:block;
    color:#ddd;
    margin-bottom:8px;
    font-size:14px;
}

input{
    width:100%;
    padding:15px;
    border-radius:12px;
    border:1px solid rgba(255,255,255,.1);
    background:rgba(255,255,255,.08);
    color:#fff;
    outline:none;
}

input::placeholder{
    color:#bdbdbd;
}

input:focus{
    border-color:#f0b90b;
    box-shadow:0 0 15px rgba(240,185,11,.25);
}

.options{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin:15px 0 25px;
    color:#cfcfcf;
    font-size:14px;
}

.options a{
    color:#f0b90b;
    text-decoration:none;
}

.btn{
    width:100%;
    padding:16px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#f0b90b,#ffd95e);
    color:#111;
    font-weight:700;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
}

.register-link{
    text-align:center;
    margin-top:20px;
    color:#cfcfcf;
}

.register-link a{
    color:#f0b90b;
    text-decoration:none;
    font-weight:600;
}

.security{
    text-align:center;
    color:#999;
    margin-top:15px;
    font-size:13px;
}

@media(max-width:768px){

    .left h1,
    .left p{
        display:none;
    }

    .container{
        grid-template-columns:1fr;
    }

    .left{
        height:100px;
        padding:20;
    }

    .right{
        padding:30px 20px;
    }

}

</style>
</head>
<body>

<div class="container">

    <div class="left">

        <h1>
            Welcome Back To
            <span class="highlight">Smart Investments</span>
        </h1>

        <p>
            Access your investment dashboard, monitor portfolio performance,
            track earnings, and manage your financial future securely.
        </p>

    </div>

    <div class="right">

        <div class="logo">
            <?= $company_name ?>
        </div>

        <h2 class="form-title">Sign In</h2>


        <?= $error ?>

        <form action="" method="POST">

            <div class="input-group">
                <label>Email Address</label>
                <input
                    type="text"
                    name="email"
                    placeholder="Enter your username email "
                    required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required>
            </div>

            <div class="options">

                <label>
                    <input type="checkbox">
                    Remember Me
                </label>

                <a href="forgot_password.php">Forgot Password?</a>

            </div>

            <button type="submit" class="btn" name='login'>
                LOGIN TO ACCOUNT
            </button>

            <div class="security">
                🔒 Protected by 256-bit SSL Encryption
            </div>

            <div class="register-link">
                Don't have an account?
                <a href="register.php">Create Account</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>

