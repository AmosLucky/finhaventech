<?php

require "header.php";

$msg ="";
if(isset($_POST['bulk'])){
  $message1 = $_POST['message'];
   $title = $_POST['title'];

    if(strlen($title) > 2 && strlen($message1)>2){

$sql = "SELECT * FROM members";
$res = mysqli_query($con,$sql) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($res)) {
    $sn++;
  $email = $row['email'];
  
  $to =  $email; // enter the users email here
  $subject = $title;
  $from =  $company_email;

  $to =  $email; // enter the users email here
$subject =  $title;
$from =  $company_email; /// enter the email of you host example admin@netbaba.com
echo $company_email;

$msg2 = "<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title></title>
  <style type='text/css'>
    body{
      margin: 20px;
    }
    .head{
      height: 50px;
      padding: 20px;
      background-color: #152238;

    }
    .body{
      padding: 20px;
      background-color: #F8F4E6;
    }
    .logo{
      height: 50px;
    }
    .footer{
      background-color: #152238;
      height: 100px;
      color: white;
      padding: 20px;

    }
    .block{
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class='head'>
    $company_logo2
    
  </div>
  <div class='body'>
    
    <h4>
      $subject
    </h4>

    <p class='block'>

    $body
    

    
  </div>

  <div class='footer'>
    <p>
      Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
$company_mail
    </p>
    
  </div>

</body>
</html>
";

require '../mail.php';

$msg = "<div class='alert alert-success text-center'>Message sent!!</div>";



}



    }
}

?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <!-- End row-->
                                                <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Bulk Message</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Subject</label>
                                                <input type="text" class="form-control" name="title" placeholder="Subject">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Message</label>
                                                <textarea type="text" class="form-control" rows="5" name="message" placeholder="Write Message"></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="bulk" class="btn btn-primary waves-effect waves-light">Send Message To Users</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                                            </div> <!-- container -->
                               
                </div> <!-- content -->

            <?php
            require "footer.php";
            
            ?>