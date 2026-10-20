<?php
session_start();
require 'conn.php';

if(
    !isset($_SESSION['reset_otp']) ||
    !isset($_SESSION['reset_email'])
){
    header("Location: forgot-password.php");
    exit;
}

$error = "";
$success = "";

if(isset($_POST['reset'])){

    $otp = trim($_POST['otp']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    if($otp != $_SESSION['reset_otp']){

        $error = "
        <div class='alert alert-danger text-center'>
            Invalid OTP
        </div>";

    }elseif(strlen($password) < 6){

        $error = "
        <div class='alert alert-danger text-center'>
            Password must be at least 6 characters
        </div>";

    }elseif($password != $confirm){

        $error = "
        <div class='alert alert-danger text-center'>
            Passwords do not match
        </div>";

    }else{

        $email = $_SESSION['reset_email'];

        $update = mysqli_query(
            $con,
            "UPDATE members
             SET password='$password'
             WHERE email='$email'"
        );

        if($update){

            unset($_SESSION['reset_email']);
            unset($_SESSION['reset_otp']);

            $success = "
            <div class='alert alert-success text-center'>
                Password changed successfully.<br>
                Redirecting to login...
            </div>";

            echo "
            <script>
                setTimeout(function(){
                    window.location='login.php';
                },3000);
            </script>";
        }
        else{

            $error = "
            <div class='alert alert-danger text-center'>
                Could not update password
            </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Reset Password</title>

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
    padding:20px;
    background:
    linear-gradient(rgba(10,10,10,.85),rgba(10,10,10,.85)),
    url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
}

.card-box{
    width:100%;
    max-width:500px;
    background:rgba(255,255,255,.05);
    backdrop-filter:blur(20px);
    border-radius:20px;
    padding:40px;
    border:1px solid rgba(255,255,255,.1);
}

h2{
    color:#fff;
    text-align:center;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:15px;
    margin-bottom:15px;
    border:none;
    outline:none;
    border-radius:12px;
    background:rgba(255,255,255,.08);
    color:#fff;
}

input::placeholder{
    color:#ccc;
}

.btn-main{
    width:100%;
    padding:15px;
    border:none;
    border-radius:12px;
    font-weight:700;
    background:linear-gradient(135deg,#f0b90b,#ffdb6d);
}

.info{
    color:#ccc;
    text-align:center;
    margin-bottom:20px;
}

</style>

</head>

<body>

<div class="card-box">

    <h2>Reset Password</h2>

    <p class="info">
        Enter the OTP sent to your email and choose a new password.
    </p>

    <?= $error ?>
    <?= $success ?>

    <form method="POST">

        <input
        type="text"
        name="otp"
        placeholder="Enter OTP"
        required>

        <input
        type="password"
        name="password"
        placeholder="New Password"
        required>

        <input
        type="password"
        name="confirm"
        placeholder="Confirm Password"
        required>

        <button
        type="submit"
        name="reset"
        class="btn-main">

            RESET PASSWORD

        </button>

    </form>

</div>

</body>
</html>

