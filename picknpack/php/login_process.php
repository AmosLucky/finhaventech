<?php
session_start();
require "../conn.php";

if(isset($_POST['login'])){
    $password =  $_POST['password'];
    $email =  $_POST['email'];

    $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    $res = mysqli_query($conn,$sql);
    if($res){
       $num_user = mysqli_num_rows($res);
       if($num_user == 1){
        $user = mysqli_fetch_assoc($res);
         $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
           $_SESSION['user_id'] = $user['id'];
        //   echo "<script>window.location.href='../dashboard/';</script>";
          //header("Location:../dashboard/");
          echo "success";

       }else{
        echo  "Account not found";
        
       }

    }else{
        $error = mysqli_error($conn);
        echo  "Unable to login: $error";
    }
    

}