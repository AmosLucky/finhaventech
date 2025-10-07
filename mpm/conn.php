<?php

$url = "https://www.nexusdigitalfund.com";
 $company_logo = "<div style='padding: 20px; background-color:white!important'>
      <img src='https://www.nexusdigitalfund.com/images/logo.png' height= '80' width='80'>
      </div>";

      $company_logo2 = $company_logo;




require 'model/model.php';
//$con = mysqli_connect("localhost","","digitalcrest1@gmail.COM","");
$con = mysqli_connect("localhost","root","","crypto_app");
$model = new Model($con);
$company = $model -> selectFromTable("company","id = '1'")['msg'][0];
//print_r($company);


//$company_logo = "uploads/".$company['company_logo'];
$domain = $company['domain'];
$company_name = $company['company_name'];
$company_address = $company['company_address'];
$company_phoneNumber = $company['company_phone'];
$company_phone = $company['company_phone'];
$company_email = $company['company_email'];
$company_contact_widget = $company['company_contact_widget'];
$company_title = $company['company_title'];

 $company_logo_link = "https://".$domain."/".$company_logo;
 
//  $s = "Delete * from members where LENGTH(username) > 30";
//  mysqli_query($conn,$s);






?>