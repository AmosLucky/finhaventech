<?php
require "conn.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PickNpack Sample</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
    .main{
        height:600px; width:100%
    }
  </style>
</head>
<body>

<div class="row main" >
    <div class="col-md-6  p-3 d-none d-md-block" style="background:#007455">
        <center>
            <img src="images/logo.png" alt="" height="120">
        </center>
        <p class="p-3 text-light">
            PicknPack Sample is a fully responsive demo web application developed by Beamaxtech Team, created to showcase the structure, design, and functionality of a modern logistics and delivery platform. This sample site serves as a visual and functional representation of what a real-world solution could look like for businesses in the packaging, e-commerce, and delivery industries.

The goal of this demo is to present a user-friendly interface, clean navigation, and a streamlined experience for end-users—whether they are customers placing orders or administrators managing logistics. From layout design to user journey, every part of this platform was carefully built to reflect quality, speed, and reliability.

While this version of PicknPack is not connected to a live service, it demonstrates the core features that can be integrated into a working system, including order handling, account management, and scalable architecture. It can be adapted and expanded to suit the needs of businesses ranging from startups to enterprise-level operations.
        </p>
    </div>
    <div class="col-md-6 pt-5 " style="display:flex; justify-content:center">
        

    <form action="" style="width:80%">
        <h5>PicknPack Sample</h5>
        <h5>Logistics Management</h5>
        <br>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control w-100" placeholder="Enter email" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control w-100" placeholder="Enter password" 
    id="password" required>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <br>
    </label>
  </div>
  <button type="button" id="login" class="btn btn-primary w-100" 
  style="background:#000435">Login
  <div class="spinner-border text-light" style="display:none" id="progress"></div>

</button>
  <br>
  <br>

  <label class="form-check-label">
      Forgotten your password?
      <b>Reset it</b>
    </label>
</form>


    </div>

</div>

<script>

    $(document).ready(function(){
        $("#login").click(function(){
           var email = $("#email").val();
            var password = $("#password").val();

            $("#progress").show();


            
             $.ajax({
  type: "POST",
  url: "php/login_process.php",
  data: {
    "password":password,
    "email":email,
    "login":"login"
  },
  cache: false,
  success: function(data){
     $("#progress").hide();
    if(data == "success"){
        window.location.href='./dashboard/';
         
    }else{
        alert(data);
    }
  }
});
        });
    });
</script>


</body>
</html>