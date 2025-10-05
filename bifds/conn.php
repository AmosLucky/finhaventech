<?php

//$con = mysqli_connect("shareddb-p.hosting.stackcp.net","emirate-3736","emirate1","emirate-31313511af");
$con = mysqli_connect("localhost","root","","banking2");
if($con){
    //echo "yyyyyyyyyyyyyyyyyy";
}else{
    echo "nnnnnnnnnnnnnnnnnnnnnnnn";
}
$company_logo2 = "
      <img src='https://www.blue-ridgetrust.com/images/logo.png' 
      style='height: 50px;'>
      ";
$company_name = "BLUE RIDGE";
$company_email = "support@blue-ridgetrust.com";
$company_mail = $company_email;
$domain = "https://blue-ridgetrust.com";

$company_phone = "(456)789500595";
$company_address = "Head quarters: Providence,Rhode Island United States";
///$company_support_email = "customerservice@emirateonlineuk.com";




?>