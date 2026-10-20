<?php
session_start();
require 'conn.php';

$message = "";
$error = "";

/*
|--------------------------------------------------------------------------
| SEND OTP
|--------------------------------------------------------------------------
*/
if(isset($_POST['send_otp'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);

    $check = mysqli_query($con,
        "SELECT * FROM members WHERE email='$email'"
    );

    if(mysqli_num_rows($check) == 1){

        $otp = rand(100000,999999);

        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_otp'] = $otp;

        $subject = "Password Reset OTP";

        $msg2 = "
        <h2>Password Reset Request</h2>
        <p>Your OTP code is:</p>
        <h1>$otp</h1>
        <p>This code expires when you leave the page.</p>
        ";

        // SendMail($email,$subject,$msg);
        
        require 'mail.php';
        // header("Location: reset-password.php");
        echo '<script>window.location.href = "reset-password.php";</script>';
        
//exit;


       

        $message = "
        <div class='alert alert-success text-center'>
        OTP sent successfully.
        </div>";
    }
    else{

        $error = "
        <div class='alert alert-danger text-center'>
        Email not found.
        </div>";
    }
}

/*
|--------------------------------------------------------------------------
| VERIFY OTP + CHANGE PASSWORD
|--------------------------------------------------------------------------
*/
if(isset($_POST['change_password'])){

    $otp = trim($_POST['otp']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    if($otp != $_SESSION['reset_otp']){

        $error = "
        <div class='alert alert-danger text-center'>
        Invalid OTP
        </div>";

        $_SESSION['show_modal'] = true;
    }
    else{

        if(strlen($password) < 6){

            $error = "
            <div class='alert alert-danger text-center'>
            Password must be at least 6 characters.
            </div>";

            $_SESSION['show_modal'] = true;
        }
        else if($password != $confirm){

            $error = "
            <div class='alert alert-danger text-center'>
            Passwords do not match.
            </div>";

            $_SESSION['show_modal'] = true;
        }
        else{

            $email = $_SESSION['reset_email'];

            mysqli_query($con,
            "UPDATE members
            SET password='$password'
            WHERE email='$email'");

            unset($_SESSION['reset_otp']);
            unset($_SESSION['reset_email']);
            unset($_SESSION['show_modal']);

            $message = "
            <div class='alert alert-success text-center'>
            Password updated successfully.
            <br><br>
            <a href='login.php' class='btn btn-success'>
            Login Now
            </a>
            </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<title>Forgot Password</title>

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
margin-bottom:25px;
text-align:center;
}

label{
color:#ddd;
margin-bottom:8px;
}

input{
width:100%;
padding:15px;
border-radius:12px;
border:none;
outline:none;
background:rgba(255,255,255,.08);
color:#fff;
margin-bottom:15px;
}

.btn-main{
width:100%;
padding:15px;
border:none;
border-radius:12px;
font-weight:700;
background:linear-gradient(135deg,#f0b90b,#ffdb6d);
}

.modal-content{
background:#1a1f29;
color:#fff;
border-radius:20px;
}

</style>

</head>

<body>

<div class="card-box">

    <h2>Forgot Password</h2>

    <?= $message ?>
    <?= $error ?>

    <form method="POST">

        <label>Email Address</label>

        <input
        type="email"
        name="email"
        placeholder="Enter your email"
        required>

        <button
        class="btn-main"
        type="submit"
        name="send_otp">

        SEND OTP

        </button>

    </form>

</div>

<!-- OTP MODAL -->
<div class="modal fade"
id="otpModal"
tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">
Verify OTP
</h5>

</div>

<div class="modal-body">

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
name="change_password"
class="btn btn-warning w-100">

UPDATE PASSWORD

</button>

</form>

</div>

</div>

</div>

</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<?php if(isset($_SESSION['show_modal'])){ ?>

<script>

var otpModal =
new bootstrap.Modal(
document.getElementById('otpModal')
);

otpModal.show();

</script>

<?php } ?>

</body>
</html>