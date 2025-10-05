<?php
if(isset($_POST['opt'])){
    $otp = $_POST['opt'];
    $cotp = $_POST['cotp'];

    if($otp == $cotp){
       header("Location:otp.php?msg=succesful");
    }else{
        header("Location:otp.php?msg=incorrect");
    }

}