<?php 

require 'header.php';

?>
    <!--=================================
    Header -->

    <!--=================================
    Inner Header -->
    <div class="inner-header bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
            <h1 class="breadcrumb-title mb-0">Contact us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
              <li class="breadcrumb-item"><a href="index"><i class="fas fa-home me-1"></i>Home</a></li>
              <li class="breadcrumb-item active"><span>Contact us</span></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  <!--=================================
  Inner Header -->

  <!--=================================
  Contact Address -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 pe-lg-5 border-end border-lg-none">
          <p class="mb-4 mb-lg-5">It would be great to hear from you! If you got any questions, please do not hesitate to send us a message. We are looking forward to hearing from you!</p>
         
          <h6 class="mb-3">Support Centre</h6>
          <p class="mb-0"><?php echo $company_address ?></p>
          <div><strong>Telephone:</strong><span class="text-primary ms-1"><?php echo $company_phone ?> </span></div>
          <div><strong>E-mail:</strong><span class="text-primary ms-1"><?php echo $company_email ?></span></div>
        </div>
        <div class="col-lg-7 ps-lg-5 mt-lg-0 mt-4">
          <h6 class="mb-4">Need Assistance? <br>Please Complete The Contact Form</h6>
          <form class="form-flat-style">
            <div class="row">
              <div class="mb-3 col-md-4">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="mb-3 col-md-4">
                <input type="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="mb-3 col-md-4">
                <input type="text" class="form-control" placeholder="Your Number">
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-12">
                <textarea rows="8" class="form-control" id="sector" placeholder="Your Message"></textarea>
              </div>
            </div>
            <a href="#" class="btn btn-primary btn-flat">Send Message</a>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Contact Address -->

  
 <?php 

 require "footer.php";

?>