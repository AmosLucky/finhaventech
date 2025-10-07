<?php 

require 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?= $company_name ?>, the best investment platform" />
    <meta name="description" content="<?= $company_name ?>, the best investment platform" />
    <meta name="author" content="<?= $company_name ?>, the best investment platform" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php echo $company_name ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700%7CMontserrat:500,700&amp;display=swap" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature) -->
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/swiper/swiper.min.css" />
    <link rel="stylesheet" href="css/animate/animate.min.css"/>

    <!-- Template Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Smartsupp Live Chat script -->
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66ebdc854cbc4814f7db0734/1i84laqr5';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<!--End of Tawk.to Script-->
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'afd079368e102f78a02109ef22b56828c877712a';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>



  </head>
  <body>
    <!--<script src="//code.tidio.co/jkxfqglgflktgtgem4ynz2h1w2cpsuql.js" async></script>-->

    <!--=================================
    Header -->
    <header class="header header-style-02">
      <div class="header-top d-none d-md-block py-3">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-xl-3">
              <a class="navbar-brand" href="index">
                <img class="img-fluid" src="images/logo.png" alt="logo">
              </a>
            </div>
            <div class="col-xl-9 d-block d-md-flex justify-content-xl-end justify-content-center">
             
              <div class="d-flex me-3 me-md-5 d-none">
                <i class="fas fa-2x fa-mobile-alt text-dark"></i>
                <div class="ms-3">
                  <span class="text-dark fw-bold"><?php echo $company_phoneNumber ?> </span>
                  <p class="mb-0 small">Mon-Fri 8:30am-6:30pm </p>
                </div>
              </div>
              <div class="d-flex">
                <i class="far fa-2x fa-envelope text-dark"></i>
                <div class="ms-3">
                <span class="text-dark fw-bold"><?php echo $company_email ?></span>
                  <p class="mb-0 small">24 X 7 online support </p>
                </div>
              </div>


            </div>
        </div>
      </div>
      </div>
      <div class="header header-bottom header-sticky bg-dark">
        <nav class="navbar navbar-static-top navbar-expand-xl">
          <div class="container position-relative">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
            <a class="navbar-brand py-2 me-5" href="index">
              <img class="img-fluid" src="images/logo_light.png" alt="logo">
            </a>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="nav-item  active">
                  <a class="nav-link" href="index" >Home</a>
                  
                </li>
                <li class="nav-item  ">
                  <a class="nav-link" href="about-us" >About us</a>
                  
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="services" >Services</a>
                  
                </li>
                <li class="nav-item  ">
                  <a class="nav-link" href="contact-us" >Contact us</a>
                  
                </li>
                <li class="nav-item  ">
                  <a class="nav-link" href="signup" >Sign up</a>
                  
                </li>
                <li class="nav-item  ">
                  <a class="nav-link" href="signin" >Sign in</a>
                  
                </li>
                <li>
                   <li class="nav-item m-2">
                                     <div  id="google_translate_element" ></div>
                                </li>
                </li>


                               
                
               
               
               
                
              </ul>
            </div>
            <a class="btn btn-primary btn-md me-5 me-xl-0 d-none d-sm-block" href="login"> Sign In </a>
          </div>
        </nav>
      </div>
    </header>
    <!--=================================
    Header -->

    <!--=================================
    Banner -->