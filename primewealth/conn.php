<?php
date_default_timezone_set('Europe/London');

$url = "https://primewealthbuilders.com/";
 $company_logo = "<div style='padding: 20px; background-color:white!important;height:100px'>
      <img src='https://primewealthbuilders.com/assets/img/logo-3.png'>
      </div>";

      $company_logo2 = $company_logo;


// $company_name = "Credence Wealth";
// $company_address = "22 Baker Street,
// London, United Kingdom,
// W1U 3BW";
// $company_phoneNumber = "12345678";
// $company_email = "support@credencewealth.net";


require 'model/model.php';
//$con = mysqli_connect("sdb-68.hosting.stackcp.net","aurexprimetrust","Aurex1@gmail.com","aurexprimetrust-353034399b47");
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
$company_telegram = "";

$company_eth_address = $company['company_eth_address'];
$company_btc_address = $company['company_btc_address'];
$company_usdt_address = $company['company_usdt_address'];

 $company_logo_link = "https://".$domain."/".$company_logo;
 $company_url = "https://".$domain;



 $payment_methods = [
   
    [
        'id' => 0,
        'name' => 'USDT (TRC20)',
        'address' => 'TBN2VGQSmRNEUaR3481wsEKvSeBVfNK4JB',
        'reg_date' => '2026-06-06',
        'qr_code' => 'usdt-trc20.png'
    ],
    [
        'id' => 1,
        'name' => 'Bitcoin',
        'address' => 'bc1q83qresvhcpqk4y9czj7vu23ur487r2cjtkgp2y',
        'reg_date' => '2026-06-06',
        'qr_code' => 'bitcoin.png'
    ],
    [
        'id' => 2,
        'name' => 'Ethereum',
        'address' => '0x59aED4DFC9a87CB37358906f422CFE848B31238d',
        'reg_date' => '2026-06-06',
        'qr_code' => 'ethereum.png'
    ],
    [
        'id' => 3,
        'name' => 'BNB',
        'address' => '0x59aED4DFC9a87CB37358906f422CFE848B31238d',
        'reg_date' => '2026-06-06',
        'qr_code' => 'ethereum.png'
    ],


    
    
];







?>